<?php
/**
 * controller: User
 * autoer: guosenlin
 * date: 2017/09/14
*/
namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Model\User;
use IQuery;

class UserController extends Controller
{
	// 分页信息
    public function index(Request $request)
    {
    	$datas = User::paginate(config('app.page'));
    	return response()->json($datas);
    }

    // 查看
    public function show($id)
    {
    	return User::find($id);
    }

    // 单条删除
    public function destroy($id)
    {
    	$model = User::find($id);
    	if ($model->destroy()) return $id;
    	return 0;
    }

    // 编辑
    public function edit($id)
    {
    	return User::find($id);
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
    	$this->validate($request, [
            'name' => ['required','max:30',
                Rule::unique('users')->ignore($id)->where(function($query) use ($id) {
                    $query->whereNull('deleted_at');
                })
            ],
            'email' => ['required','max:50',
                Rule::unique('users')->ignore($id)->where(function($query) use ($id) {
                    $query->whereNull('deleted_at');
                })
            ],
            'phone' => ['required','max:20',
                Rule::unique('users')->ignore($id)->where(function($query) use ($id) {
                    $query->whereNull('deleted_at');
                })
            ],
            'sex' => 'required',
            'age' => 'nullable|datetime',
            'real_name' => 'nullable|max:30',
            'password' => 'nullable|max:100',
            'openid' => 'nullable|max:50',
            'address' => 'nullable|max:100'
        ]);

        if ($id == -1) {
        	$model = new User;
        	$arr = ['name','real_name','sex','age','email','phone','address','password'];
        } else {
        	$model = User::find($id);
        	$arr = ['real_name','sex','age','email','phone','address'];
        }

        $model->setRawAttributes($request->only($arr));
        $model->img = IQuery::upload($request,'img')['p'];

        if ($model->save()) return 1;
        return 0;
    }
}
