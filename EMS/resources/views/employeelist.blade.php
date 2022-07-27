@extends('index')
@section('title', 'Employee List')
@section('wrapper')
@parent
{{-- @section('preloader')
@parent
@endsection --}}

{{-- @section('main-header')
@parent
@endsection --}}

{{-- @section('main-sidebar')
@parent
@endsection --}}

@section('content-wrapper')
@parent
@section('content-header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Employee List</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Employee</a></li>
                    <li class="breadcrumb-item"><a href="#">All</a></li>
                    <li class="breadcrumb-item active">Employee List </li>
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
    <div class="col-12">
        <div class="card ">
            <div class="card-header">
                
                
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-md-3 col-12">
                            <form action="" >
                                <select id="employee" class=" form-control select2" style="width: 100%;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="" selected hidden> Search by ID or name </option>
                                    @foreach ($employeeSearch as $e )
                                    <option value="employees/{{ $e->emp_id }}">{{ $e->emp_id }} - {{ $e->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div class="col-md-3 ml-auto mt-md-0 mt-3">
                           
                            <a  class="btn btn-info btn-md btn-block " href="{{ route('employees.create') }}"> <span class=" fas fa-plus "> </span> Add New Employee</a>
                            
                        </div>
                    </div>
                </div>


            </div>


            <div class="card-body overflow-auto">
                <table class="table table-hover table-bordered selectpicker" data-live-search="true">

                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Joining Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $employees->currentPage() == 1 ? 0 : ($employees->currentPage() - 1) * 20 ?>
                        @foreach ($employees as $index => $emp)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $emp->emp_id }}</td>
                            <td><a href="{{ route('employees.show', $emp->emp_id) }}">{{ $emp->name }}</a></td>
                            <td>{{ $emp->department ? $emp->department->dept_name:'' }}</td>
                            <td>{{ $emp->userDesignation ? $emp->userDesignation->designation:'' }}</td>
                            @if($emp->status == 'P')
                            <td>Permanent</td>
                            @elseif($emp->status == 'R')
                            <td>Regular</td>
                            @elseif($emp->status == 'C')
                            <td>Contractual</td>
                            @elseif($emp->status == 'T')
                            <td>Probationary</td>
                            @endif
                            <td>{{ $emp->jdate }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer overflow-auto ">
                {!! $employees->withQueryString()->Links('pagination::bootstrap-4') !!}
            </div>
        </div>
        <!-- end editing-->
    </div>

</div>
</div>

@endsection
@endsection
@endsection
@endsection



{{-- @section('main-footer')
@parent
@endsection --}}

{{-- @section('control-sidebar')
@parent
@endsection --}}


@endsection