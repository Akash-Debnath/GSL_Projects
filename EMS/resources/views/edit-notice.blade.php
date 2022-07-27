@extends('index')
@section('title', 'Edit-Notice')
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
                <h4>Edit Notice</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Board</li>
                    <li class="breadcrumb-item"><a href="{{ url('notice') }}">Notice </a></li>
                    <li class="breadcrumb-item active">Edit Notice </li>
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
            <div class="card-header">

            </div>

            {{-- @if($message = Session::get('success'))
                <div class="alert alert-success text-center">{{ $message }}</div>
            @elseif($message = Session::get('fail'))
                <div class="alert alert-danger text-center">{{ $message }}</div>
            @endif --}}

            <div class="card-body">
                <form action="{{ route('notice.update', $notices->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date">Date</label>
                                <input type="date" value="{{ $notices->notice_date }}" id="date" name="notice_date" class="form-control">
                            </div>
                            <div class="col-md-6 mt-md-0 mt-3">
                                <label for="subject"></label>
                                <input type="text" value="{{ $notices->subject }}" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>

   
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <label for="summernote">Message</label>
                                <textarea class="form-control" id="summernote" name="notice" col="10" row="5">
                                     {{ $notices->notice  }}
                                </textarea>
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
                                <button type="submit" class="btn btn-sm btn-info btn-block ">Done</button>
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
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
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