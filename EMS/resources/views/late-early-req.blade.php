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
                <h4>Upload Attendance Information</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Attendance </a></li>
                    <li class="breadcrumb-item"><a href="#">Upload</a></li>
                    <li class="breadcrumb-item active">Upload Attendance Information</li>
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

<div class="row d-flex justify-content-center">
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header">
                <h4 class=" text-center mb-0">Send request for early/late office time</h4>
            </div>
            <div class="card-body">
                <form action="{{url('late-early-req-send')}}" class="p-1" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-12">
                            <label for="request">Request For</label>
                            <div class="check" id="request">
                                <div class="form-check">
                                    <input class="form-check-input" name="late" value="R" type="checkbox">
                                    <label class="form-check-label">Will be late to come in office</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="early" value="R" type="checkbox">
                                    <label class="form-check-label">Have to go early from office</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="absent" value="R" type="checkbox">
                                    <label class="form-check-label">Absent for official work outside</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="special" value="R" type="checkbox">
                                    <label class="form-check-label">Special absent</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="date">Date</label>

                            <input type="date" name="date" value="{{date('y-m-d')}}" id="date" class="form-control">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="reason">Reason</label>
                            <textarea name="reason" id="reason" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-info btn-sm btn-block">Send Auto Mail to Manager</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
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



<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection