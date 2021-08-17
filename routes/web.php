<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//fontend(hoat dong cho ng dung)
Route::get('/',[HomeController::class,'index']); //goi tra ve trang wellcome
Route::get('/trangchu',[HomeController::class,'index']); //goi tra ve trang wellcome

//back end (Hoat dong o phia sever )
Route::get('/admin',[AdminController::class,'index']);//tra ve duong dan admin dan toi admincontroller
Route::get('/dashboard',[AdminController::class,'show_dashboard']); // tra ve trang chu giao dien cua admin(dashboard)
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);// chu y phuong thuc post(dua du lieu nhap vao)
Route::get('/logout',[AdminController::class,'logout']);//tra ve trang dang xuat o controller
//category Product
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product']);
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product']);
//quy tắc ghi hàm là ko có gạch trên và có dấu, quy tắc ghi đuôi đường dẫn là - 
Route::post('/save-category-product',[CategoryProduct::class,'save_category_product']);
//ẩn & hiện danh mục sản phẩm
//nhớ đuôi đường dẫn là biến ko có $
Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class,'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class,'active_category_product']);
//edit san pham
Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class,'edit_category_product']);
//delete san pham
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class,'delete_category_product']);
//update
Route::post('/update-category-product/{category_product_id}',[CategoryProduct::class,'update_category_product']);
//-------------------------------------
//Brand Product
//--------------------------------------
Route::get('/add-brand-product',[BrandProduct::class,'add_brand_product']);
Route::get('/all-brand-product',[BrandProduct::class,'all_brand_product']);
//quy tắc ghi hàm là ko có gạch trên và có dấu, quy tắc ghi đuôi đường dẫn là - 
Route::post('/save-brand-product',[BrandProduct::class,'save_brand_product']);
//ẩn & hiện danh mục sản phẩm
//nhớ đuôi đường dẫn là biến ko có $
Route::get('/unactive-brand-product/{brand_product_id}',[BrandProduct::class,'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}',[BrandProduct::class,'active_brand_product']);
//edit san pham
Route::get('/edit-brand-product/{brand_product_id}',[BrandProduct::class,'edit_brand_product']);
//delete san pham
Route::get('/delete-brand-product/{brand_product_id}',[BrandProduct::class,'delete_brand_product']);
//update
Route::post('/update-brand-product/{brand_product_id}',[BrandProduct::class,'update_brand_product']);
//-------------------------------------
//Product
//--------------------------------------
Route::get('/add-product',[ProductController::class,'add_product']);
Route::get('/all-product',[ProductController::class,'all_product']);
//quy tắc ghi hàm là ko có gạch trên và có dấu, quy tắc ghi đuôi đường dẫn là - 
Route::post('/save-product',[ProductController::class,'save_product']);
//ẩn & hiện danh mục sản phẩm
//nhớ đuôi đường dẫn là biến ko có $
Route::get('/unactive-product/{product_id}',[ProductController::class,'unactive_product']);
Route::get('/active-product/{product_id}',[ProductController::class,'active_product']);
//edit san pham
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
//delete san pham
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);
//update
Route::post('/update-product/{product_id}',[ProductController::class,'update_product']);
