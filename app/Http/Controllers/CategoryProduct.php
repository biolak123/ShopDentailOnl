<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    // hiện thị thêm sảm phẩm
    public function add_category_product(){
        return view('admin.add_category_product'); //trả về noi dung hien thị của thêm sản phẩm
    }
    //hiện thị toàn bộ danh mục sản phẩm
    public function all_category_product(){
        $all_category_product = DB::table('tbl_category_product')->get();
        $manage_category_product = view('admin.all_category_product')
        ->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product',  $manage_category_product); 
        //gan vao bien manager
    }
    //luu them category product
    public function save_category_product(Request $request)
    {
        //tạo mảng
        $data = array();
        //gọi mảng bên DB SQL
        //biến[ten cột]= biến hàm-> tên cấu trúc
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        DB::table('tbl_category_product')->insert($data);
        //bien goi thong bao
        Session::put('message','Them danh mục san pham thanh cong');
        return Redirect::to('/add-category-product');
    }
    //An va Hien san pham
    //$category_product_id : la ham kich hoat duoi dg dan trong web
    //ẩn
    public function unactive_category_product($category_product_id ){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)
        ->update(['category_status'=>1]); //mảng status un=1
        Session::put('message', 'không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    //hiện
    public function active_category_product($category_product_id ){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)
        ->update(['category_status'=>0]); //mảng status un=0
        Session::put('message', 'kích hoạt sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    //
    public function edit_category_product($category_product_id){
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)
        ->get();//lấy ra dữ liệu thuộc id của bản thân nó
        $manage_category_product = view('admin.edit_category_product')
        ->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',  $manage_category_product); 
        //gan vao bien manager
    }
    //REQUEST LÀ LẤY YÊU CẦU
    public function update_category_product(Request $request, $category_product_id){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)
        ->update($data); //hàm status un=1
        Session::put('message', 'cập nhật danh muc sản phẩm thành công');
        return Redirect::to('all-category-product'); //trả về hiện toàn bộ danh mục sản phẩm
    }
    //delete category product
    public function delete_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)
        ->delete(); //hàm xóa
        Session::put('message', 'xóa danh muc sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
}
