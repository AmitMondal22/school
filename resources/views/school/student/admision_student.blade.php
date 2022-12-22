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
                                <h4 class="card-title">Admision Student</h4>
                                <div class="basic-form">

                                <form action="{{route('school.student_admision')}}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" require name="f_name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Middle Name</label>
                                                <input type="text" class="form-control" require name="m_name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" require name="l_name">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Father Name</label>
                                                <input type="text" class="form-control" require name="father_name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mother name</label>
                                                <input type="text" class="form-control" require name="mother_name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>parent_Guardian_Name</label>
                                                <input type="text" class="form-control" require name="parent_Guardian_Name">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                        <label>Gender </label>
                                        <div class="form-group col-md-4">
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="gender" value="Male"> Male </label>
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="gender" value="Female"> Female</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender" value="Others"> Others</label>
                                        </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Date Of Birth</label>
                                                <input type="date" class="form-control" require name="dob" id="mdate" data-dtp="dtp_0YUfQ">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Admission Date</label>
                                                <input type="date" class="form-control" require name="admission_date" id="mdate" data-dtp="dtp_0YUfQ">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Aadhar No</label>
                                                <input type="text" class="form-control" require name="aadharno">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mobile No</label>
                                                <input type="number" class="form-control" require name="mobileno">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Email</label>
                                                <input type="email" class="form-control" require name="email">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Adress</label>
                                                <!-- <input type="text" class="form-control" require name="aadharno"> -->
                                                <textarea class="form-control h-150px" rows="1" id="comment" name="adress"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>School</label>
                                                <select id="schoolid" class="form-control" required name="school_id">

                                                        @foreach ($school as $s)
                                                    <option value="{{$s->schoolid}}">{{$s->schoolname}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>class</label>
                                                <select id="classid" class="form-control" required name="class_id">



                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>session</label>
                                                <select id="session_id" class="form-control" required name="session_id">
                                                    <option value="2">2022-2023</option>
                                                    <option value="3">2023-2024</option>
                                                    <option value="4">2024-2025</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label>Country</label>
                                                <select id="country" class="form-control" required name="country_id">
                                                    <option selected="">Select country</option>
                                                        @foreach ($country as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>State</label>
                                                <select id="state" class="form-control" required name="state_id">
                                                    <option selected="">Select State</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>City</label>
                                                <select id="city" class="form-control" required name="city_id">
                                                    <option selected="">Select City</option>

                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Pin</label>
                                                <input type="text" class="form-control" required name="pin">
                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-dark">Save</button>
                                    </form>
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


    <script src="{{asset('./public/school')}}/plugins/moment/moment.js"></script>
    <script src="{{asset('./public/school')}}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="{{asset('./public/school')}}/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="{{asset('./public/school')}}/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="{{asset('./public/school')}}/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="{{asset('./public/school')}}/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('./public/school')}}/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{asset('./public/school')}}/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="{{asset('./public/school')}}/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="{{asset('./public/school')}}/js/plugins-init/form-pickers-init.js"></script>

    <script>
            $("#country").change(function(){

                var country_id=$(this).val();

                $.get('{{ url('') }}/org/state/'+ country_id,
                function(data){
                    $('#state').html(data);
                });

            });

            $("#state").change(function(){

                var state=$(this).val();

                $.get('{{ url('') }}/org/city/'+ state,
                function(data){
                    $('#city').html(data);
                });

            });



            $("#schoolid").change(function(){

                var schoolid=$(this).val();

                $.get('{{ url('') }}/org/classs/'+ schoolid,
                function(data){
                    $('#classid').html(data);
                });

            });
    </script>
@endsection
