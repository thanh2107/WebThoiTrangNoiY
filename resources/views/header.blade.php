

	<!-- Header section -->
	<header class="header-section">
		<div>
			<div class="header__top bgbl pt__10 pb__10 pl__15 pr__15 fs__12">
			<div class="header-text mr__15">
				<i class="fa fa-phone" aria-hidden="true"></i> 
				<span style="" class="__cf_call__">Gọi: <a href="">0988895726</a> (Nếu không mua được)</span>
			</div>
			</div>
		</div>
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{route('trang-chu')}}" class="site-logo">
							<img style="max-width: 80%" src="resources/img/logo12.png" alt="">
							
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form" action="{{'search'}}" method="post">
							  {{csrf_field()}}
							<input name="keywords_submit"  type="text" placeholder="Tìm kiếm trong đồ lót giá sỉ....">
							<button name="btn_search" type="submit"><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								
								@if(Auth::check()&&Auth::user()->level=='0')
								<ul style="" class="main-menu">
									<li><i class="flaticon-profile"></i></li>
									<li><a href="{{route('my-account')}}">{{Auth::user()->name}}</a> 
										<ul class="sub-menu">
											<li><a href="{{route('orders',Auth::user()->id)}}"><i class="fa fa-tasks"></i> Đơn hàng</a></li>
											<li><a href="{{route('logout')}}"><i class="fa fa-key"></i>   Đăng xuất</a></li>
											
										</ul>	
									</li>
								</ul>	
								@else
								<i class="flaticon-profile"></i>
								<a href="{{route('login')}}">Đăng nhập/Tạo tài khoản</a> 
								@endif

							
								
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>{{Cart::count()}}</span>
								</div>
								<a  style="display: contents;" href="{{URL::to('show-cart')}}">Giỏ hàng</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href= "{{route('trang-chu')}}">Trang chủ</a></li>
					<li><a href="">Đồng giá</a>
						<ul class="sub-menu">
							@foreach($dong_gia as $dg)

							<?php
							$sa = Str::slug($dg->ten_donggia, '-');
							?>
							<li><a href="{{route(Str::slug($dg->ten_donggia, '-'),[$dg->id.'?',$ten_dg= Str::slug($dg->ten_donggia, '-')])}}">{{$dg->ten_donggia}}</a></li>
							@endforeach
						</ul>	
					</li>

						<li id="menu-item-8149" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="/shop/">Sản phẩm</a>
		<ul class="sub-menu" style="display: table; width: 300px">
			<li id="menu-item-25725" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children sub-column-item"><a href="https://bomsister.vn/quan-lot-nu/">Quần lót nữ</a>
						<ul class="sub-menu">
							<li>
							@foreach($loai_sp as $loai)
							@if($loai->trang_thai==1 && $loai->id_loai_lsp==1)
							<li><a href="{{route('loai-san-pham',[$loai->id_loai_san_pham.'?',$ten_LSP= Str::slug($loai->ten_LSP, '-')])}}">{{$loai->ten_LSP}}</a></li>
							@endif
							@endforeach
							</li>
						</ul>
			</li>
			<li id="menu-item-25734" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children sub-column-item"><a href="https://bomsister.vn/ao-nguc/">Áo lót nữ</a>
				<ul class="sub-menu">
					<li>
						@foreach($loai_sp as $loai)
						@if($loai->trang_thai==1&& $loai->id_loai_lsp==2)
						<li><a href="{{route('loai-san-pham',[$loai->id_loai_san_pham.'?',$ten_LSP= Str::slug($loai->ten_LSP, '-')])}}">{{$loai->ten_LSP}}</a></li>
						@endif
						@endforeach
					</li>
				</ul>
			</li>
			<li id="menu-item-25740" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children sub-column-item"><a href="https://bomsister.vn/bralette/">Bralette</a>
									<ul class="sub-menu">
					<li>
						@foreach($loai_sp as $loai)
						@if($loai->trang_thai==1&& $loai->id_loai_lsp==3)
						<li><a href="{{route('loai-san-pham',[$loai->id_loai_san_pham.'?',$ten_LSP= Str::slug($loai->ten_LSP, '-')])}}">{{$loai->ten_LSP}}</a></li>
						@endif
						@endforeach
					</li>
				</ul>							
			</li>
		</ul>
	</li>
					<li><a href="">Phụ kiện
						<span class="new">Mới</span>
					</a></li>
					<li><a href="#">Cửa hàng</a>
						<ul class="sub-menu">
							<li><a href="#">CN1: 1 CMT8 </a></li>
							<li><a href="#">CN2: 1 Lý Thường Kiệt</a></li>
							<li><a href="#">CN3: 1 Nguyễn Thị Minh Khai</a></li>
	
						</ul>
					</li>
				{{-- 	<li><a href="#">Sự kiện</a></li>
					<li><a href="#">Reviews</a></li> --}}
					<li><a href="{{route('lien-he')}}">Liên hệ</a></li>
					<li><a href="{{route('tin-tuc')}}">Tin tức</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->
