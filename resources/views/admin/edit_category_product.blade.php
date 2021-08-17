@extends('admin_layout')
@section('content_admin')
<!--tra ve main content start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
                </header>
                <?php
                $message = Session::get('message'); //get mess o ben CategoryProductcontroller
	            if($message){
		        echo '<span class="text-alert">',$message,'</span>'; //hien gia tri cua bieen LUY Y CU PHAP
		        Session::put('message', null); //hien tin nhan va gia tri tro ve rong
	            }
	            ?>
                <div class="panel-body">
                    @foreach($edit_category_product as $key => $edit_value)
                    <div class="position-center">
                        <!-- update phải dựa vào id -->
                        <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="POST">
                            <!--phuong thuc POST va tao duong dan luu tuyet doi-->
                            {{csrf_field()}}
                            <!--bảo mật đg dẫn-->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <!-- hiện thị tên cần sửa -->
                                <input type="text" value="{{$edit_value->category_name}}" name="category_product_name"
                                    class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <!-- hiện thị nội dung cần sửa -->
                                <textarea style="resize: none" rows="5" type="text"
                                name="category_product_desc"
                                class="form-control" id="exampleInputPassword1">{{$edit_value->category_desc}}</textarea>
                            </div>


                            <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            
        </section>
    </div>
</div>
@endsection