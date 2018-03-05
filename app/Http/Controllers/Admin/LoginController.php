<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

require_once "resources/org/code/Code.class.php";

class LoginController extends CommonController
{
    protected $obj;

    public function __construct(){
        $this->obj = new \Code;
    }

    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(){
        if( $input = Input::all() ){

//            $code = new \Code();
            $_code = $this->obj->get();

            if( strtoupper( $input['code'] ) != $_code ){

                return back()->with('msg','验证码错误');
            }


            $users = Users::first();
            $username = $users->user_name;
            $userpass = $users->user_pass;
            if( $username != $input['user_name'] || Crypt::decrypt( $userpass ) != $input['user_pass'] ){
                return back()->with( 'msg','用户名或者密码错误' );
            }
            session( ['user' => $users] );
            return redirect( 'admin/index' );
        }else{
            return view( 'admin.login' );
        }

    }

    /**
     * 验证码
     */
    public function code(){
//        $code = new \Code();
        $this->obj->make();
    }

    /**
     * 退出功能
     */
    public function logout(){
        session( ['user'=>null] );
        return redirect( 'admin/login' );
    }

    /**
     * 修改密码功能
     */
    public function pass(){
        if( $pass = Input::all() ){
            $rules = [
                'password' => 'required|between:6,20|confirmed',
            ];

            $validator = Validator::make( $pass,$rules,[
                'password.required'=>'新密码不能为空',
                'password.between'=>'新密码必须在6到20位之间',
                'password.confirmed'=>'新密码与确认密码不相同',
            ] );
            if( $validator->passes() ){
                $users = Users::first();
                $userpass = $users->user_pass;
                if( Crypt::decrypt( $userpass ) == $pass['password_o'] ){
                    $users->user_pass = Crypt::encrypt( $pass['password'] );
                    $users->update();
                    return back()->with( 'errors','密码修改成功' );
                }else{

                    return back()->with( 'errors','原密码不正确！' );
                }
            }else{

                return back()->withErrors( $validator );
            }


        }else{
            return  view( 'admin/pass' );
        }

    }




}
