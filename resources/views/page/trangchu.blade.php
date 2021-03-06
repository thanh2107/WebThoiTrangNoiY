
@extends('home')
@section('content')
	<!-- Hero section -->
	{{-- <?php
	
	$user = Auth::user();
	
	$user ->address = "a";
	$user ->save();
	echo $user ->address;

	?> --}}
{{-- 	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			@foreach($slide as $sl)
			@if($sl->link_product_id !=0)
			<a id="{{$sl->id}}"  class="cursor-poi" href="{{route('shop',$sl->link_product_id)}}">
			@else
				@if($sl->link_catelory_id !=0)
				<a id="{{$sl->id}}"  class="cursor-poi" href="{{route('loai-san-pham',['',$sl->link_catelory_id])}}">
				@else
					<a>
				@endif
			@endif


			<img style="width: 100%" class="hs-item set-bg img-fluid" alt="Responsive image" src="resources/img/slide/{{$sl->img}}">
			
			</a>
			@endforeach

		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section> --}}
	<!-- Hero section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>SẢN PHẨM MỚI NHẤT</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach($new_product as $new) 
				<div class="product-item">
					<div class="pi-pic" onclick="window.location='{{route('shop',[$new->id.'?',$new->ten_file])}}';">
						<div class="tag-new">New</div>
						<img src="resources/img/product/{{$new->hinh}}" alt="">
						<div class="pi-links">
							<a href="{{route('shop',[$new->id.'?',$new->ten_file])}}" class="add-card"><i class="flaticon-bag"></i><span>thêm vào giỏ</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
							@if($new->gia_khuyen_mai > 0)
							<span>{{number_format($new->gia)}}₫</span>
								<h6 class="sale">{{number_format($new->gia_khuyen_mai)}}₫</h6>
								<p>{{$new->ten_san_pham}} </p>
								<br>
								
							@else
								<h6>{{number_format($new->gia)}}₫</h6>
								<p>{{$new->ten_san_pham}} </p>
							@endif
					</div>
				</div>
				@endforeach
			
			</div>
		</div>
	</section>
	<!-- letest product section end sadsad-->



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>GIỚI THIỆU SẢN PHẨM BÁN CHẠY NHẤT</h2>
			</div>
			<ul class="product-filter-menu">
				@foreach($loai as $ls)
				<li><a href="{{route('loai-san-pham',[$ls->id_loai_san_pham.'?',$ten_LSP= Str::slug($ls->ten_LSP, '-')])}}">{{$ls->ten_LSP}}</a></li>
				@endforeach
		
			</ul>						
			<div class="row">
				@foreach($best_selling as $sl)
				<div class="col-lg-3 col-sm-6"> 
					<div class="product-item">
						<div class="pi-pic"  onclick="window.location='{{route('shop',[$sl->id.'?',$sl->ten_file])}}';">
								
							@if($sl->gia_khuyen_mai > 0)
							<div class="tag-sale">ON SALE</div>
							@endif
							<img class="thumb" src="resources/img/product/{{$sl->hinh}}" alt="">
							<div class="pi-links">
								<a href="{{route('shop',[$sl->id.'?',$sl->ten_file])}}" class="add-card"><i class="flaticon-bag"></i><span>THÊM VÀO GIỎ</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						
						</div>
						<div class="pi-text">
							
							@if($sl->gia_khuyen_mai > 0)
							<span>{{number_format($sl->gia)}}₫</span>
								<h6 class="sale">{{number_format($sl->gia_khuyen_mai)}}₫</h6>
								<p>{{$sl->ten_san_pham}} </p>
								<br>
								
							@else
								<h6>{{number_format($sl->gia)}}₫</h6>
								<p>{{$sl->ten_san_pham}} </p>
							@endif
							
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
			<div class="text-center pt-5">
				<button class="site-btn sb-line sb-dark">TẢI THÊM</button>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="resources/img/banner-bg.jpg">
				<div class="tag-new">NEW</div>
				<span>New Arrivals</span>
				<h2>STRIPED SHIRTS</h2>
				<a href="#" class="site-btn">SHOP NOW</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->
	@endsection