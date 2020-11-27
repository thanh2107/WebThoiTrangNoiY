@extends('home')
@section('content')
<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Thông tin tài khoản</h4>
		<div class="site-pagination">
			<a href="{{route('trang-chu')}}">Home</a> /
			<a href="{{route('my-account')}}">Tài khoản</a> 
		</div>
	</div>
</div>
<!-- Page info end -->

<!-- login_register section -->
<div class="mb-5 mt-5 ">
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
					<div class="form-login">
  					<br>
                    <ul class="category-menu account">
                     
                         <li><a href="{{route('orders',Auth::user()->id)}}">Đơn hàng
                    	</a></li>
                    	 <li><a href="{{route('orders-tracking')}}">Tra hành trình đơn hàng
                    	</a></li>
                    	 <li><a href="{{route('logout')}}">Đăng xuất
                    	</a></li>

                    </ul>
                </div>
			</div>
			<div class="col-sm-10" >
				<div class="form-login">
					
					<form  class="account" id="login"action="{{route('save-account')}}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						@if(count($errors)>0 && Session::get('last_auth_attempt') == 'my_account')
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
								{{$err}}<br>
								@endforeach
							</div>
						@endif
						@if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}
						</div>
						@endif
						<p class="row-login"> 
							<label>Username
								<span class="required">*</span>
							</label>
							<input value="{{Auth::user()->name}}" class="input-login" type="text" name="username" id="username">
								<input type="hidden" name="level" value="0">
						</p>
						<p class="row-login"> 
							<label>Email
								<span class="required">*</span>
							</label>
							<input value="{{Auth::user()->email}}" class="input-login" type="text" name="email" id="email">
								<input type="hidden" name="level" value="0">
						</p>
						<p class="row-login"> 
							<label>SĐT
								<span  class="required">*</span>
							</label>
							<input value="{{Auth::user()->phone}}" class="input-login" type="text" name="phone" id="phone">
								<input type="hidden" name="level" value="0">
						</p>
						<p class="row-login">
							<legend>Thay đổi mật khẩu</legend>
						</p>	
						<p class="row-login"> 
							<label>Mật khẩu hiện tại 
								<span class="required">*</span>
							</label>
							<input value="" class="input-login" type="password" name="password_current" id="password_current">
						</p>
						<p class="row-login"> 
							<label>Mật khẩu mới (bỏ trống nếu không đổi)
															</label>
							<input class="input-login" type="password" name="password1" id="password1">
						</p>
						<p class="row-login"> 
							<label>Xác nhận mật khẩu mới
								
							</label>
							<input class="input-login" type="password" name="password2" id="password2">
						</p>	
						<p class="row-login">
							<button type="submit" class="float-right m-0" name="login" value="Log in">Lưu thay đổi</button>
						</p>
					</form>
				</div>
			</div>  
				
		</div>


	</div>
</div>

<!-- login_register section emd -->
@endsection