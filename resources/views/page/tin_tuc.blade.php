
@extends('home')
@section('content')
<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Bài viết</h4>
		<div class="site-pagination">
			<a href="{{route('trang-chu')}}">Home</a> /
			<a href="{{route('tin-tuc')}}">Bài viết</a>
		</div>
	</div>
</div>
<!-- Page info end -->

<!-- Contact section -->
<section class="news-section">
	<div class="container">
		<div style="padding-top: 10px;" class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
      </div>
		<div class="row mb-2">
			@foreach($news as $n)
			<div class="col-md-6">
				<div class="card flex-md-row mb-4 box-shadow h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
						<h4 class="mb-0">
							<a class="text-dark" href="{{route('bai-viet',[$n->id.'?',$tieu_de = Str::slug($n->tieu_de, '-')])}}">{{$n->tieu_de}}</a>
						</h4>
						<div class="mb-1 text-muted">Nov 12</div>
						<p class="card-text mb-auto">{{$n->mo_ta}}</p>
						<a href="{{route('bai-viet',[$n->id.'?',$tieu_de = Str::slug($n->tieu_de, '-')])}}">Continue reading</a>
					</div>
					<img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="resources/img/news/{{$n->img}}" data-holder-rendered="true">
				</div>
			</div>
			@endforeach
	
		</div>
		
	</section>
	<!-- Contact section end -->



	@endsection