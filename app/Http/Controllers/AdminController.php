<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index(){ //tra ve cho nguoi dung dang nhap admin
        return view('admin_login');
    }
    public function show_dashboard(){ //tra ve trang chu
        return view('admin.dashboard');//trang dashboard
    }
    public function dashboard(Request $request){ //dang nhap vao trang admin (admin_login)
        //check email, pass, table admin
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);//ma hoa password
        //dua gia tri database admin
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        // echo '<pre>';
        // print_r($result);
        // echo '<pre>';
        if($result){ //neu gia tri cua bang
            Session::put('admin_name', $result->admin_name); //neu gia tri tra dung
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','tai khoan va mat khau khong ton tai!!'); //goi bien mess xett admin khong ton taij
            return Redirect::to('/admin');
        }
    }
    public function logout(){ //dang xuat (goi o phan duoi wed.php)
        Session::put('admin_name',null); //put gia tri nguoi dung rỗng => trả về trang admin
        Session::put('admin_id', null); 
        return Redirect::to('/admin');// tra ve trang dang nhap
    }
}
