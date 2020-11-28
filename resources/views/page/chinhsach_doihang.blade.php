@extends('home')
@section('content')
<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Chính sách đổi hàng</h4>
		<div class="site-pagination">
			<a href="{{route('trang-chu')}}">Home</a> /
			<a href="{{route('my-account')}}"></a> 
		</div>
	</div>
</div>
<!-- Page info end -->

<!-- login_register section -->
<div class="mb-5 mt-5 ">
	<div class="container">
		<div class="row">
	
			<div class="col-sm-10" >
				<div class="form-login">
					
			 	 <?php
            echo $role_return ->noi_dung;
         
            ?>
				</div>
			</div>  
				
		</div>


	</div>
</div>

<!-- login_register section emd -->
@endsection