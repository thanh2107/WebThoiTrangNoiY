
@extends('home')
@section('content')
<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Bài viết</h4>
		<div class="site-pagination">
			<a href="{{route('trang-chu')}}">Home</a> /
			<a href="{{route('tin-tuc')}}">Bài viết</a>/
			<a href="">{{$baiviet ->tieu_de}}</a>
		</div>
	</div>
</div>
<!-- Page info end -->

<!-- Contact section -->
<section class="news-section">
	<div class="container">
		<div class="row">
		<div class="col-md-9 blog-main">
          <div class="blog-post">
            <h2 class="blog-post-title">{{$baiviet ->tieu_de}}</h2>
            <p class="blog-post-meta">{{$baiviet ->created_at}}</p>
            <?php
            echo $baiviet ->noi_dung;
            $view=1;
            ?>

           <p>View{{$view}}</p>
          </div><!-- /.blog-post -->
        </div>
       <aside class="col-md-3 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">Thông tin-tuc</h4>
            <p class="mb-0"> <a href="{{route('trang-chu')}}">Đồ Lót Giá Sỉ</a> - Chuyên cung cấp tất cả các dòng sản phẩm thời trang. <em
            	>Chuyên cung cấp Sỉ & Lẻ Đồ Lót - Nam & Nữ.</em></p>
          </div>

          <div class="p-3">
            <h4 style="color: #f51167" class="font-italic">Sản phẩm bán chạy</h4>
            <ul class="list-unstyled mb-0">

              	<div class="row">
				@foreach($best_selling as $sl)
				<div class="p-3 mb-3"> 
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
      
            </ul>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Liên hệ</h4>
            <ol class="list-unstyled">
              <li><a href="#">Zalo</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </aside>
        </div>
	</div>
		
	</section>
	<!-- Contact section end -->

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