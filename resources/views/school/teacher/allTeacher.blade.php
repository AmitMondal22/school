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
                        <table class="table table-bordered  verticle-middle table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">School Name</th>
                                    <th scope="col">School Registration id</th>
                                    <th scope="col">Teacher Name</th>
                                    <th scope="col">Date of birth</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schooldata as $sdata)


                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$sdata->schoolname}}</td>
                                    <td>{{$sdata->schoolRegistrationId}}</td>
                                    <td>{{$sdata->name}}</td>
                                    <td>{{$sdata->dateofbirth}}</td>
                                    <td>{{$sdata->class_name}}</td>


                                    </td>
                                    <td>


                                         <div class="dropdown custom-dropdown">
                                            <div data-toggle="dropdown"><i class="fa fa-ellipsis-v fa-2x"></i>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <li><a class="dropdown-item" href="{{route('school.addclass_schoolid', [$sdata->teacher_id])}}"> <i class="fa fa-plus color-muted m-r-5"></i> Class Room</a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="fa fa-pencil color-muted m-r-5"></i> Edit</a></li>
                                                <li><a class="dropdown-item" href="#"> <i class="fa fa-close color-danger"></i> Delete</a></li>

                                            </div>
                                        </div>
                                        <!-- <a href="" class="btn mb-1 btn-rounded btn-success ml-4"><span class="btn-icon-left"><i class="fa fa-plus color-success"></i> </span>Class Room</a> -->




                                </tr>
                                @endforeach
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
@endsection
