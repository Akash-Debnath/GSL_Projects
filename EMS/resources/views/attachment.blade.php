@extends('index')
@section('title', 'Attachment')
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
                    <li class="breadcrumb-item"><a href="#">Remark
                        </a></li>
                    <li class="breadcrumb-item"><a href="#">Attachment</a></li>
                    <li class="breadcrumb-item active">Attachment Board</li>
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

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">

            <div class="card-header">
                <div class="common-card-header">

                    <button type="button" onclick="location.href ="; class="btn btn-info ml-auto" data-toggle="modal" data-target="#modal-default">
                        <a class="anchor-btn" href="{{ route('attachment.create') }}"><span class=" fas fa-plus "> </span> Add New Attachment</a>
                    </button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-hover table-bordered  selectpicker" data-live-search="true">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Subject</th>
                            <th>From</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $attachments->currentPage() == 1 ? 0 : ($attachments->currentPage() - 1) * 20 ?>
                        @foreach ($attachments as $file )
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><a href="{{ route('attachment.show', $file->id) }}">{{ $file->subject }}</td>
                                <td>{{ $file->employee ? $file->employee->name : 'Not found' }}</td>
                                <td>{{ $file->message_date }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="card-footer overflow-auto ">
                {!! $attachments->Links('pagination::bootstrap-4') !!}
            </div>
            <div class="card-footer">
                <!-- Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin. -->
            </div>

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
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection