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
                                <h4 class="card-title">Class Room</h4>
                                <div class="basic-form">

                                <form action="{{route('school.addclass')}}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Class name</label>
                                                <input type="text" class="form-control" require name="class_name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Class Serial No</label>
                                                <input type="text" class="form-control" require name="class_position">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Select School</label>
                                                <input type="hidden" name="schoolid" value="{{$schooldataone}}">
                                                <select id="school" class="form-control" name="schoolid" @if($schooldataone) disabled @endif >
                                                <option value="">Select School</option>
                                                    @foreach ($schooldata as $sd )


                                                    <option value="{{$sd->schoolid}}" @if ($schooldataone==$sd->schoolid)
                                                    selected readonly
                                                    @endif >{{$sd->schoolname}}</option>
                                                    @endforeach

                                                </select>
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
@endsection
