@extends('school.a_common.main')
@section('schoolContent')


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
<!-- ========================================================================== -->


<div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Teacher</h4>
                    <div class="table-responsive">





                    <!-- <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label><strong>Status :</strong></label>
                <select id='status' class="form-control" style="width: 200px">
                    <option value="">--Select Status--</option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
            </div>
        </div>
    </div> -->




                        <table class="table table-bordered data-table verticle-middle table-hover table-striped dataTable">

                            <thead>
                                <tr>
                                    <!-- <th scope="col">SL</th> -->
                                    <th scope="col">Name</th>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">School Name</th>
                                    <th scope="col">school Registration Id</th>
                                    <th scope="col">Session</th>
                                    <th scope="col">admission_date</th>
                                    <th scope="col">father_name</th>
                                    <th scope="col">gender</th>
                                    <th scope="col">date_of_birtg</th>
                                    <th scope="col">mobileno</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- {{-- @foreach ($schooldata as $sdata)--}}


                                <tr>
                                    <td>{{--$loop->index + 1--}}</td>
                                    <td>{{--$sdata->first_name--}} {{--$sdata->middle_name--}} {{--$sdata->last_name--}}</td>
                                    <td>{{--$sdata->roll_no--}}</td>
                                    <td>{{--$sdata->schoolname--}}</td>
                                    <td>{{--$sdata->schoolRegistrationId--}}</td>
                                    <td>{{--$sdata->year--}}</td>
                                    <td>{{--$sdata->adate--}}</td>
                                    <td>{{--$sdata->father_name--}}</td>
                                    <td>{{--$sdata->gender--}}</td>
                                    <td>{{--$sdata->date_of_birtg--}}</td>
                                    <td>{{--$sdata->mobileno--}}</td>



                                    </td>
                                    <td>


                                         <div class="dropdown custom-dropdown">
                                            <div data-toggle="dropdown"><i class="fa fa-ellipsis-v fa-2x"></i>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <li><a class="dropdown-item" href="{{--route('school.addclass_schoolid', [$sdata->student_id])--}}"> <i class="fa fa-plus color-muted m-r-5"></i> Class Room</a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="fa fa-pencil color-muted m-r-5"></i> Edit</a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="fa fa-close color-danger"></i> Delete</a></li>

                                            </div>
                                        </div>
                                        <!-- <a href="" class="btn mb-1 btn-rounded btn-success ml-4"><span class="btn-icon-left"><i class="fa fa-plus color-success"></i> </span>Class Room</a>




                                </tr>
                                {{-- @endforeach--}} -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<!-- ========================================================================== -->
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



@endsection
@section('schoolScript')

<script src="{{asset('./public/school')}}/plugins/validation/jquery.validate.min.js"></script>
    <script src="{{asset('./public/school')}}/plugins/validation/jquery.validate-init.js"></script>

    <script src="{{asset('./public/school')}}/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('./public/school')}}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('./public/school')}}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>


<script type="text/javascript">
  $(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('school.my_student') }}",
          data: function (d) {
                d.status = $('#status').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            // {data: 'index + 1', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'roll_no', name: 'roll_no'},
            {data: 'schoolname', name: 'schoolname'},
            {data: 'schoolRegistrationId', name: 'schoolRegistrationId'},
            {data: 'year', name: 'year'},
            {data: 'adate', name: 'adate'},
            {data: 'father_name', name: 'father_name'},
            {data: 'gender', name: 'gender'},
            {data: 'date_of_birtg', name: 'date_of_birtg'},
            {data: 'mobileno', name: 'mobileno'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    $('#status').change(function(){
        table.draw();
    });

  });
</script>
@endsection
