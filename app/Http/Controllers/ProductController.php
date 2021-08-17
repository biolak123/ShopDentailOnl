<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class ProductController extends Controller
{
      // hiện thị thêm sảm phẩm
      public function add_product(){
          //hàm lấy ra thư mục loại sp theo id
        $category_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('category_product',$category_product)->with('brand_product',$brand_product); 
    }
    //hiện thị toàn bộ danh mục sản phẩm
    public function all_brand_product(){
        $all_brand_product = DB::table('tbl_brand')->get();
        $manage_brand_product = view('admin.all_brand_product')
        ->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',  $manage_brand_product); 
        //gan vao bien manager
    }
    //luu them category product
    public function save_product(Request $request)
    {
        //tạo mảng
        $data = array();
        //gọi mảng bên DB SQL
        //biến[ten cột]= biến hàm-> tên cấu trúc
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_category;//trả về id để trùng với sql
        $data['brand_id'] = $request->product_brand;//trả về id để trùng với sql
        $data['product_status'] = $request->product_status;
        //biến định dạng file ảnh
        $get_image = $request->file('product_image');
        if($get_image){
        $get_name_image =$get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();//định dạng đuôi file
        $get_image->move('public/upload/products', $new_image);
        $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
        //bien goi thong bao
        Session::put('message','Them san pham thanh cong');
        return Redirect::to('/add-product');
        }
        $data['product_image'] = '';
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        DB::table('tbl_product')->insert($data);
        //bien goi thong bao
        Session::put('message','Them san pham thanh cong');
        return Redirect::to('/add-product');
    }
    //An va Hien san pham
    //$category_product_id : la ham kich hoat duoi dg dan trong web
    //ẩn
    public function unactive_brand_product($brand_product_id ){
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)
        ->update(['brand_status'=>1]); //mảng status un=1
        Session::put('message', 'không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    //hiện
    public function active_brand_product($brand_product_id ){
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)
        ->update(['brand_status'=>0]); //mảng status un=0
        Session::put('message', 'kích hoạt sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    //
    public function edit_brand_product($brand_product_id){
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)
        ->get();//lấy ra dữ liệu thuộc id của bản thân nó
        $manage_brand_product = view('admin.edit_brand_product')
        ->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',  $manage_brand_product); 
        //gan vao bien manager
    }
    //REQUEST LÀ LẤY YÊU CẦU
    public function update_brand_product(Request $request, $brand_product_id){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)
        ->update($data); //hàm status un=1
        Session::put('message', 'cập nhật danh muc sản phẩm thành công');
        return Redirect::to('all-brand-product'); //trả về hiện toàn bộ danh mục sản phẩm
    }
    //delete category product
    public function delete_brand_product($brand_product_id){
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)
        ->delete(); //hàm xóa
        Session::put('message', 'xóa danh muc sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
}
