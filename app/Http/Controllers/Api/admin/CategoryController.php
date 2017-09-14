<?php
/**
 * controller: Category
 * autoer: guosenlin
 * date: 2017/09/14
*/
namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Model\Category;

class CategoryController extends Controller
{
	// 分页信息
    public function index(Request $request)
    {
    	$datas = Category::paginate(config('app.page'));
    	return response()->json($datas);
    }

    // 查看
    public function show($id)
    {
    	return Category::find($id);
    }

    // 单条删除
    public function destroy($id)
    {
    	$model = Category::find($id);
    	if ($model->destroy()) return $id;
    	return 0;
    }

    // 编辑
    public function edit($id)
    {
    	return Category::find($id);
    }

    // 编辑保存
    public function update(Request $request, $id)
    {
    	return $this->storeOrUpdate($request, $id);
    }

    // 新建保存
    public function store(Request $request)
    {
    	return $this->storeOrUpdate($request);
    }

    // 新建、编辑 保存方法
    private function storeOrUpdate($request, $id=-1)
    {
        $pid = $request->pid;
    	$this->validate($request, [
            'name' => ['required','max:30',
                Rule::unique('categories')->ignore($id)->where(function($query) use ($id, $pid) {
                    if ($pid) {
                        $query->whereNotNull('pid')->whereNull('deleted_at');
                    } else {
                        $query->whereNull('pid')->whereNull('deleted_at');
                    }
                })
            ],
            'pid' => ['required','max:30',
                Rule::unique('categories')->ignore($id)->where(function($query) use ($id) {
                    $query->where('id',$id)->whereNull('deleted_at')->whereNull('pid');
                })
            ],
            'desc' => 'nullable|max:255'
        ]);

        if ($id == -1) {
        	$model = new Category;
        } else {
        	$model = Category::find($id);
        }

        $arr = ['name','desc','pid'];
        $model->setRawAttributes($request->only($arr));
        $model->ico = IQuery::upload($request,'ico')['p'];
        $model->img = IQuery::upload($request,'img')['p'];

        if ($model->save()) return 1;
        return 0;
    }
}
