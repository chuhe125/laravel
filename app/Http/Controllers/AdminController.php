<?php

namespace App\Http\Controllers;
use App\Http\Requests\Adminrequest;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function doLogin(Adminrequest $request){
        $a_name=$request->post('a_name');
        $a_pwd=$request->post('a_password');

        $model=new Admin();
        $response=$model->doLogin($a_name,$a_pwd);
        return $response ;

    }
    public  function  register(Adminrequest $request){
        $res=Admin::register($request);
        return $res?   //判断
            json_success("注册成功",$res,200):
            json_fail("注册失败",null,100);

    }

}
