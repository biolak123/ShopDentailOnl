@extends('admin_layout')
@section('content_admin') <!--tra ve main content start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục thương hiệu sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                <?php
                $message = Session::get('message'); //get mess o ben CategoryProductcontroller
	            if($message){
		        echo '<span class="text-alert">',$message,'</span>'; //hien gia tri cua bieen LUY Y CU PHAP
		        Session::put('message', null); //hien tin nhan va gia tri tro ve rong
	            }
	            ?>
                    <form role="form" action ="{{URL::to('/save-brand-product')}}" method="POST"> 
                    <!--phuong thuc POST va tao duong dan luu tuyet doi-->
                        {{csrf_field()}} <!--bảo mật đg dẫn-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" 
                            placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none" rows="5" type="text" name="brand_product_desc" class="form-control" id="exampleInputPassword1"
                                placeholder="Enter Desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hiện Thị</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                                
                            </select>
                        </div>
                       
                        <button type="submit" name="brand_product_product" class="btn btn-info">Thêm thương hiệu</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection