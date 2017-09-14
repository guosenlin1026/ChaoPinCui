<?php 
/**
 * desc: 工具类
 * autoer: guosenlin
 * date: 2017/09/14
 */
namespace App\Utils;

use Illuminate\Support\Facades\Auth;

class IQuery{

	public function upload($request, $filename, $isThumb=false)
	{
        if ($request->hasFile($filename)) {
            $file = $request->file($filename);
            $path = config('app.image_path').'/';
            $Extension = $file->getClientOriginalExtension();
            $filename = 'SZGC_'.time().'.'. $Extension;
            $check = $file->move($path, $filename);
            $filePath = $path.$filename; //原图路径加名称
            $newfilePath = $path.'SZGC_S_'.time().'.'. $Extension;//缩略图路径名称
            $this->img_create_small($filePath, config('app.thumb_width'), config('app.thumb_height'), $newfilePath);  //生成缩略图
            $pic['p'] = $filePath;//原图
            if ($isThumb) {
            	$pic['t'] = $newfilePath;//缩略图
            	$this->destroyPic($request->$filename, $request->thumb);
            }else {
            	$this->destroyPic($request->$filename);
            }
            return $pic;//返回原图 缩略图 的路径 数组
        } else {
	        if ($request->$filename != 'del') {
	            $pic['p']= $request->$filename;//原图
	            if ($isThumb) $pic['t']= $request->thumb;//缩略图
	        }
	        return $pic;//返回原图 缩略图 的路径 数组
        }
	}

	//生成缩略图
    public function img_create_small($big_img, $width, $height, $small_img) {  //原始大图地址，缩略图宽度，高度，缩略图地址
        $imgage = getimagesize($big_img); //得到原始大图片
        switch ($imgage[2]) { // 图像类型判断
        	case 1:
        	$im = imagecreatefromgif($big_img);
        	break;
        	case 2:
        	$im = imagecreatefromjpeg($big_img);
        	break;
        	case 3:
        	$im = imagecreatefrompng($big_img);
        	break;
        }
        $src_W = $imgage[0]; //获取大图片宽度
        $src_H = $imgage[1]; //获取大图片高度
        $tn = imagecreatetruecolor($width, $height); //创建缩略图
        imagecopyresampled($tn, $im, 0, 0, 0, 0, $width, $height, $src_W, $src_H); //复制图像并改变大小
        imagejpeg($tn, $small_img); //输出图像
    }

    // 删除图片
    public function destroyPic($name='', $thumb='')
    {
    	if ($name != null && $name != '') {
            $name = str_replace("\\","/",public_path().'/'.($name));
            $thumb = str_replace("\\","/",public_path().'/'.($thumb));
            if (is_file($name)) unlink($name);
            if (is_file($thumb)) unlink($thumb);
        }
    }
}