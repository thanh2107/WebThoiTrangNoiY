
@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
             Thêm Bài viết

         </header>
         <?php
         $message = Session::get('message');
         if($message){

            echo '<span class="alert alert-info">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        @if(count($errors)>0 && Session::get('message_add') == 'add_news')
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}<br>    
            @endforeach
        </div>
        @endif
        <div class="panel-body">


            <div class="position-center">
                <form role="form" name="mainForm" action="{{'save-news'}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên bài viết</label>
                        <input type="text" class="form-control" id="news_title" name="news_title" placeholder="Tên slide" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả ngắn</label>
                        <input required="" type="text" class="form-control" id="short_desc" name="short_desc" placeholder="Tên danh mục" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung</label>

                      <textarea required="" id="summernote" name="editordata"></textarea>
                    </div>
                    <div class="form-group">
                         <label for="exampleInputPassword1">Hình ảnh nhỏ bài viết</label>
                    </div>
                    <div class="form-group col-md-6 col-not-pdleft">
                        <input type="file" class="form-control" id="news_img" required="" name="news_img"   onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div style="margin-bottom: 0;" class="form-group col-md-6">
                        <img  style="display: block;" id="blah" alt="your image" width="200" height="150" />
                    </div>
                        

                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <select name="news_status" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>

                    <button type="submit" name="add_news" class="btn btn-info">Thêm Bài viết</button>
                   
                </form>
            
                   <span id="result"></span>
            </div>

        </div>
    </section>

</div>
 <script type="text/javascript">

    $(document).ready(function() {

    $('#summernote').summernote({
      placeholder: 'Enter content....',
      tabsize: 2,
      height: 200,
      minHeight: 100,
      maxHeight: 300,
      focus: true,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
      popover: {
        image: [
          ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
          ['float', ['floatLeft', 'floatRight', 'floatNone']],
          ['remove', ['removeMedia']]
        ],
        link: [
          ['link', ['linkDialogShow', 'unlink']]
        ],
        table: [
          ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
          ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
        ],
        air: [
          ['color', ['color']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']]
        ]
      },
      codemirror: {
        theme: 'monokai'
      }
    });
  
});
</script>

</div>
@endsection