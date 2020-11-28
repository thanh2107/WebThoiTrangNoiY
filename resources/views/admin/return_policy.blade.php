
@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
             Chính sách đổi trả

         </header>
         <?php
         $message = Session::get('message');
         if($message){

            echo '<span class="alert alert-info">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <div class="panel-body">


            <div class="p-2 center">
                <form role="form" name="mainForm" action="{{'save-return-policy'}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
  
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung</label>
                      <textarea  required="" id="summernote" name="editordata">
                        <?php 
                        echo $role_return->noi_dung;
                        ?>
                      </textarea>
                    </div>
                    <button type="submit" name="save_return_policy" class="btn btn-success">Lưu</button>
                   
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
      height: 500,
      minHeight: 100,
      maxHeight: 8000,
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