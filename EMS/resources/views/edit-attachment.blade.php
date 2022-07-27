@extends('index')
@section('title', 'Employee-list')

@section('wrapper')
@parent
{{-- @section('preloader')
@parent
@endsection

@section('main-header')
@parent
@endsection

@section('main-sidebar')
 @parent
@endsection --}}

@section('content-wrapper')
@parent

@section('content-header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Attachment Board</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Remark </a></li>
                    <li class="breadcrumb-item"><a href="{{ route('attachment.index') }}">Attachment</a></li>
                    <li class="breadcrumb-item active">Edit Attachment </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('main-content')
@parent
@section('container-fluid')
@parent
<!--edit here-->
@section('row')
<div class="row d-flex justify-content-center ">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <form action="{{ route('attachment.update') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date">Date</label>
                                <input type="date" placeholder="Enter.." id="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="subject">Subject</label>
                                <input type="text" placeholder="Subject" id="subject" class="form-control">
                            </div>
                        </div>
                    </div>

                    

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <label for="to">To</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <select id="dept" class="form-control ">
                                        <option value="" selected hidden> Search by Department </option>
                                        <option></option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-4">
                                <select id="emp" class="form-control ">
                                    <option value="" selected hidden> Search by ID or name </option>

                                </select>
                            </div>
                        </div>
                    </div>

                    



                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <label for="summernote">Message</label>
                                <textarea class="form-control" id="summernote" col="10" row="5">
                                     Place <em>some</em> <u>text</u> <strong>here</strong>
                                 </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 form-group">
                                <div class="control-group" id="fields">
                                    <label class="control-label" for="field1">
                                        Upload File
                                    </label>
                                    <div class="controls">
                                        <div class="entry input-group upload-input-group">
                                            <input class="form-control" name="fields[]" type="file">
                                            <button class="btn btn-upload btn-info btn-add" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid mt-3">
                        <div class="row  d-flex justify-content-end">
                            <div class="col-md-2  ">
                                <button class="btn btn-sm btn-danger btn-block ">
                                    Cancel</button>
                            </div>
                            <div class="col-md-2 mt-2 mt-md-0">
                                <button class="btn btn-sm btn-info btn-block ">Done</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- ./row -->

@endsection
@endsection
@endsection
@endsection



{{-- @section('main-footer')
@parent
@endsection

@section('control-sidebar')
@parent
@endsection --}}

<!-- extra js section -->
@section('script')

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- CodeMirror -->
<script src="{{ asset('plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('plugins/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('plugins/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ asset('plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

<!-- custom file -->

<script>
    $(function() {
        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();

            var controlForm = $('.controls:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="fa fa-trash"></span>');
        }).on('click', '.btn-remove', function(e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });
</script>
@endsection
@endsection