@extends('index')
@section('title', 'Policy')
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
                <h1>Policy Board</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Remark</a></li>
                    <li class="breadcrumb-item"><a href="#">Policy</a></li>
                    <li class="breadcrumb-item active">Policy Board </li>
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
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <button type="button" class="btn btn-info ml-auto  " data-toggle="modal" data-target="#modal-default">
            <span class=" fas fa-plus "> </span> Add Policy
        </button>
        

        <!-- modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title ">Add New Policy</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('policy.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <label for="title">Policy Title</label>
                                <input type="text" placeholder="Enter.." id="title" name="policy_title" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <label class="d-block" for="title">Attachment</label>
                                <input type="file" id="title" name="file_name" class="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between ">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" >Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--////modal--finish  -->


    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered table-responsive-sm selectpicker" data-live-search="true">
            <thead>
                <tr>
                    <th class="text-center">SL</th>
                    <th>Policy Title</th>
                    <th>Attachment</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $policy->currentPage() == 1 ? 0 : ($policy->currentPage() - 1) * 20 ?>
                @foreach ($policy as $p)
                <tr>
                    <td class="text-center">{{ ++$i }}</td>
                    <td>{{ $p->policy_title }}</td>
                    <td>{{ $p->policyFile ? $p->policyFile->filename : 'Not Found' }} <a href="{{ url('download', $p->file_name) }}" class="btn  btn-primary btn-xs">    Download</a> </td>
                    <td > 
                        <form action="{{ route('policy.destroy',$p->id) }}" method="post" >
                            @csrf
                            @method('DELETE')
                            
                            <div class="row d-flex justify-content-center align-items-center">
                              
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">
                                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                          </svg></button>
                                
                            </div>
                        </form>
                        {{-- <a class="btn btn-danger btn-m" href="{{ route('policy.destroy',$p->id) }}">Delete</a>  --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer overflow-auto ">
        {!! $policy->Links('pagination::bootstrap-4') !!}
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

@endsection