
@extends('home')
@section('content')
<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Tra cứu đơn hàng</h4>
		<div class="site-pagination">
			<a href="{{route('trang-chu')}}">Home</a> /
			<a href="">Tra cứu đơn hàng</a>

		</div>
	</div>
</div>
<!-- Page info end -->

<!-- tracking section -->
<section class="news-section">
	<div class="container">
		<div class="row">
		<div class="col-md-9 blog-main">
          <div class="blog-post">
            <p class="blog-post-meta">Để theo dõi đơn hàng của bạn xin vui lòng nhập ID đơn hàng của bạn vào ô dưới đây và nhấn nút "Theo dõi". ID đơn hàng đã được gửi cho bạn qua biên lai và qua email xác nhận mà bạn nhận được.</p>
           <p>ID của đơn hàng</p>
           <input class="form" class="" type="input" name="id_order">
           <button class="site-btn">Tra cứu</button>
           <br><br><br><br>
           
          </div><!-- /.blog-post -->
        </div>
       
        </div>
	</div>
		
	</section>
	<!-- tracking section end -->

<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>SẢN PHẨM LIÊN QUAN</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach($sanpham_lienquan as $sl)
				<div class="product-item">
					<div class="pi-pic" onclick="window.location='{{route('shop',[$sl->id.'?',$ten_flie = Str::slug($sl->ten_san_pham, '-')])}}';">
						@if($sl->gia_khuyen_mai > 0)
						<div class="tag-sale">ON SALE</div>
						@endif
						<img class="thumb" src="resources/img/product/{{$sl->hinh}}" alt="">
						<div class="pi-links">
							<a href="{{route('shop',[$sl->id.'?',$sl->ten_file])}}" class="add-card"><i class="flaticon-bag"></i><span>thêm vào giỏ</span></a>
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

				@endforeach
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->

	@endsection