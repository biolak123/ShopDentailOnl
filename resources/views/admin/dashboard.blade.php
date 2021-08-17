@extends('admin_layout')
@section('content_admin')
<h1>WELCOME TO <?php
	$name = Session::get('admin_name'); //get admin_name
	if($name){
		echo $name; //hien gia tri cua bieen LUY Y CU PHAP
	}
	?></h1>
@endsection