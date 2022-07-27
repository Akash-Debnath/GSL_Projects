@extends('index')
@section('title', ' ~ Departments')
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
                <h1>Department List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Settings</a></li>
                    <li class="breadcrumb-item"><a href="#">Department</a></li>
                    <li class="breadcrumb-item active">Department List</li>
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
        <button type="button" class="btn btn-info ml-auto " data-toggle="modal" data-target="#modal-default">
            <span class=" fas fa-plus "> </span> Add New Department
        </button>


        <!-- modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title ">Add a new Department</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                        <div class="row">
                            <div class="col-12">
                                <label for="title">Department</label>
                                <input type="text" placeholder="Department" id="title" name="dept_name" class="form-control">
                            </div>
                        </div>
                    
                    <div class="row d-flex">
                        <div class="  col-3 col-md-2">
                            <button type="button" class="btn btn-danger btn-sm form-control" data-dismiss="modal">Close</button>
                   
                    
                           
                        </div>

                        <div class=" col-md-3 col-5 ml-auto">
                          <button type="submit" class="btn btn-info   btn-sm form-control ">Save Changes</button>
                        </div>
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
       <div class="row">
           <div class="col-12">
            <table class="table table-hover table-bordered  selectpicker" data-live-search="true">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Department</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php  $i = $department->currentPage()==1 ? 0 : ($department->currentPage() -1 )*20  @endphp
                    @foreach ($department as $dept)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $dept->dept_name }}</td>
                        <td style=""> 
                            <div class="row d-flex justify-content-center ">
                                <a class="btn btn-warning editbtn btn-sm"  data-toggle="modal" data-target="#editModal" onclick="getData({{ $dept->id }})"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg> </a> 
                                <form action="{{ route('department.destroy', $dept->id ) }}" method="post" style="display: unset;" class="ml-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete department : {{ $dept->dept_name }}?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                        <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                      </svg></button>
                                </form>
                            </div>
                        </td>
                        {{-- <td>  --}}
                            {{-- <a href="#" class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#modal-default1">Edit</a> <a class="btn btn-danger btn-sm" href="#">Delete</a> </td> --}}
                    </tr> 
                    @endforeach
                   
                </tbody>
            </table>
           </div>
       </div>
       
         <!-- modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title ">Edit Department</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('update-department') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="deptId" value="" id="deptId" />
                   
                        <div class="row">
                            <div class="col-12">
                                <label for="title">Department</label>
                                <input type="text" placeholder="Department" id="dept_name" name="dept_name" class="form-control">
                            </div>
                        </div>
                  
                    <div class="row ">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-sm form-control" data-dismiss="modal">Close</button>
                   
                    
                           
                        </div>

                        <div class="col-md-3 ml-auto">
                          <button type="submit" class="btn btn-success   btn-sm form-control">Save Changes</button>
                        </div>
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
    <div class="card-footer overflow-auto ">
        {!! $department->Links('pagination::bootstrap-4') !!}
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
{{-- @section('script')
@parent
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
  
  
    })
    
  </script>
@endsection --}}
@section('add-script')

{{-- <script src="{{ asset('scripts/jquery.js') }}"></script> --}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

function getData(id) {
    $('#deptId').val(id);
    $.ajax({
            type: "GET",
            url: "edit-department/"+id,
            success: function(response){
                $('#dept_name').val(response.department.dept_name);
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                console.log(errorMessage) ;
            }
        });
}

</script>


@endsection
@endsection
