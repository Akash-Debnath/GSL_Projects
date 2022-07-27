@extends('index')
@section('title', 'Notices')
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
                <h4>Notice Board</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Remark
                        </a></li>
                    <li class="breadcrumb-item"><a href="#">Notice </a></li>
                    <li class="breadcrumb-item active">Notice Board</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('main-content')
@parent

@if($message = Session::get('success'))
  <div class="alert alert-success text-center">{{ $message }}</div>
@elseif($message = Session::get('fail'))
  <div class="alert alert-danger text-center">{{ $message }}</div>
@endif

@section('container-fluid')
@parent
<!--edit here-->
@section('row')

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            @section('card-elem')
            @yield('card')
            <div class="card-header">
                <div class="common-card-header">

                    {{-- @if($message = Session::get('success'))
                        <div class="alert alert-success text-center">{{ $message }}</div>
                    @elseif($message = Session::get('fail'))
                        <div class="alert alert-danger text-center">{{ $message }}</div>
                    @endif --}}

                    <button type="button" class="btn btn-info ml-auto " data-toggle="modal" data-target="#modal-default">
                        <a class="anchor-btn" href="{{ route('notice.create') }}"><span class=" fas fa-plus "> </span> Add New Notice</a>
                    </button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-hover table-bordered table-responsive-sm selectpicker" data-live-search="true">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Notice No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $notices->currentPage() == 1 ? 0 : ($notices->currentPage() - 1) * 20 ?>
                        @foreach ($notices as $notice)
                        <tr>
                            <td>{{++$i}}</td>
                            <td><a href="{{ route('notice.show', $notice->id) }}">{{ $notice->subject }}</td>
                            <td>{{ $notice->notice_date }}</td>
                            <td> {{ $notice->id }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer overflow-auto ">
                {!! $notices->Links('pagination::bootstrap-4') !!}
            </div>
            <div class="card-footer">
                <!-- Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin. -->
            </div>
            @show
        </div>
    </div>
    <!-- /.col-->
</div>


@endsection
<!-- end editing-->
@endsection
@endsection
@endsection



{{-- @section('main-footer')
@parent
@endsection

@section('control-sidebar')
@parent
@endsection --}}
<!-- jquery for search bar purposes -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        var employee = ["alex", "Daniel", "Tom", "Zerry"];
        $("#dept").select2({
            data: employee
        });
    });
</script>-->

<!-- staff search -->
<!-- <script>
    $(document).ready(function() {
        var employee = ["alex", "Daniel", "Tom", "Zerry"];
        $("#staff").select2({
            data: employee
        });
    });
</script>  -->
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection