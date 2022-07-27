@extends('index')
@section('title', ' ~ Holiday List')
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
                <h1>List of Holidays</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Remark</a></li>
                    <li class="breadcrumb-item"><a href="#">Holiday</a></li>
                    <li class="breadcrumb-item active">List of Holidays </li>
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
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <span>Holidays: 3</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group ">
                            <span>Spent: 1</span>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <div class="form-group" >
                            <span>Remaining: 2</span>
                        </div>
                    </div>


                    @php
                        $already_selected_year = date('Y');
                        $start_year = 2009;
                    @endphp


                    <div class="col-md-2 ml-auto">
                        <div class="form-group ">
                            <form action="{{ url('holiday-search') }}" method="POST">
                                @csrf
                                <select id="year" name="date_year" class="form-control sel" onchange="this.form.submit()">
                                        <option value="" selected hidden> --Select Year-- </option>
                                    @foreach (range($already_selected_year, $start_year) as $year)
                                        <option value="{{ $year }}"> {{ $year }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-md-2 ml-auto">
                        <div class="form-group ">
                            <button type="button" class="btn btn-info btn-md  form-control" data-toggle="modal" data-target="#modal-default">
                                <span class=" fas fa-plus "> </span> Add Holiday
                            </button>
    
                            <!-- modal -->
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h4 class="modal-title ">Add a New Holiday</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
    
                                            <form action="{{ route('holiday.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                               
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="from">From</label>
                                                            <input type="date" class="form-control" id="from" name="date">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="to">To</label>
                                                            <input type="date" class="form-control" id="to" name="">
                                                        </div>
                                                    </div>
                                               
    
                                              
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="desc">Description</label>
                                                            <textarea class="form-control" id="description" name="description" cols="30"
                                                                rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                
                                                <div class="row d-flex justify-content-between">
                                                    <div class="col-md-2 ">
                                                        <button type="button" class="btn btn-danger btn-sm form-control" data-dismiss="modal">Close</button>
                                                    
                                                    </div>
                    
                                                    <div class="col-md-3 ">
                                                        <button type="submit" class="btn btn-success btn-sm mt-2 mt-md-0 form-control" >Save Changes</button>
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
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-responsive-sm selectpicker"
                    data-live-search="true">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $holiday->currentPage() == 1 ? 0 : ($holiday->currentPage() - 1) * 20 ?>
                        @foreach ($holiday as $h )
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $h->date }}</td>
                            <td>{{ $h->description }}</td>

                            @php
                            $date1 = $h->date;
                            $date2 = date('Y-m-d');
                            $spent=0;
                            $remain=0;
                            @endphp

                            @if($date1 < $date2)
                                <td style="color:red">Spent</td>
                                {{-- count --}}
                            @else
                                <td style="color:green">Remaining</td>
                            @endif
                            <td> <div class="row d-flex justify-content-center">
                                <a class="btn btn-warning btn-sm" onclick="getData({{ $h->id }})" data-toggle="modal" data-target="#editModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg>
                                    </a> 

                                <form action="{{ route('holiday.destroy', $h->id ) }}" method="post" class="ml-1" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                        <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                    </svg> </button> 
                                </form>
                            </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <!-- modal -->
                <div class="modal fade" id="editModal">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title ">Edit Holiday</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ url('update-holiday') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="holidayId" value="" id="holidayId" />
                                   
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="f">From</label>
                                                <input type="date" class="form-control" id="f" name="date">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="t">To</label>
                                                <input type="date" class="form-control" id="t">
                                            </div>
                                        </div>
                                  

                                    
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="desc">Description</label>
                                                <textarea class="form-control" id="desc" name="description" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>
                                    
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-md-2 ">
                                            <button type="button" class="btn btn-danger btn-sm form-control" data-dismiss="modal">Close</button>
                                        
                                        </div>
        
                                        <div class="col-md-3 ">
                                            <button type="submit" class="btn btn-success btn-sm mt-2 mt-md-0 form-control" >Save Changes</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </form>
            </div>
           
            <div class="card-footer overflow-auto ">
                {!! $holiday->withQueryString()->Links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
</div>
@endsection
<!-- end editing-->
@endsection
@endsection
@endsection

@section('script')
@parent
<script>
//     $(function () {
//       //Initialize Select2 Elements
//       $('.select2').select2()
  
//       //Initialize Select2 Elements
//       $('.select2bs4').select2({
//         theme: 'bootstrap4'
//       })
  
  
//     })
    
//   </script>
@endsection


@section('add-script')


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function getData(id) {
    $('#holidayId').val(id);
    $.ajax({
            type: "GET",
            url: "edit-holiday/"+id,
            success: function(response){
                // console.log(response.holidays.date);
                $('#f').val(response.holidays.date);
                $('#t').val(response.holidays.date);
                $('#desc').val(response.holidays.description);
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                console.log(errorMessage) ;
            }
        });
}
</script>
@endsection
@endsection