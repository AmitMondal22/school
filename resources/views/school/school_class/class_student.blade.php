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
                    <h4 class="card-title">Student</h4>

                    <div class="toolbar" role="toolbar">
                                        <!-- <div class="btn-group m-b-20">
                                            <button type="button" class="btn btn-light"><i class="fa fa-archive"></i>
                                            </button>
                                            <button type="button" class="btn btn-light"><i class="fa fa-exclamation-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-light"><i class="fa fa-trash"></i>
                                            </button>
                                        </div> -->
                                        <!-- <div class="btn-group m-b-20">
                                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="fa fa-folder"></i>  <b class="caret m-l-5"></b>
                                            </button>
                                            <div class="dropdown-menu"><a class="dropdown-item" href="javascript: void(0);">Social</a>  <a class="dropdown-item" href="javascript: void(0);">Promotions</a>  <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                            </div>
                                        </div> -->
                                        <div class="btn-group m-b-20">
                                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tag"></i>  <b class="caret m-l-5"></b>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" id="class_level_up" href="javascript: void(0);">Class Level Up</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                            </div>
                                        </div>
                                        <div class="btn-group m-b-20">
                                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">More <span class="caret m-l-5"></span>
                                            </button>
                                            <div class="dropdown-menu"><a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a>  <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>  <a class="dropdown-item"
                                                href="javascript: void(0);">Add Star</a>  <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                                            </div>
                                        </div>
                                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered  verticle-middle table-hover">
                            <thead>
                                <tr>

                                    <th scope="col"><input type="checkbox" name="" class="chicbox" id="checkAll"></th>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Father Name</th>
                                    <th scope="col">Mother Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Date of birth</th>
                                    <th scope="col">Aadhar No</th>
                                    <th scope="col">Mobileno</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">School Name</th>
                                    <th scope="col">School Registration Id</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schooldata as $sdata)


                                <tr>

                                    <td><input type="checkbox" stid="{{$sdata->student_id}}" name="options[]" value="{{$sdata->student_school_class_id}}" class="chicbox"></td>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$sdata->first_name}} {{$sdata->middle_name}} {{$sdata->last_name}}</td>
                                    <td>{{$sdata->father_name}}</td>
                                    <td>{{$sdata->mother_name}}</td>
                                    <td>{{$sdata->gender}}</td>
                                    <td>{{$sdata->date_of_birtg}}</td>
                                    <td>{{$sdata->aadhar_no}}</td>
                                    <td>{{$sdata->mobileno}}</td>
                                    <td>{{$sdata->email}}</td>
                                    <td>{{$sdata->schoolname}}</td>
                                    <td>{{$sdata->schoolRegistrationId}}</td>


                                    </td>
                                    <td>


                                         <div class="dropdown custom-dropdown">
                                            <div data-toggle="dropdown"><i class="fa fa-ellipsis-v fa-2x"></i>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <li><a class="dropdown-item" href="{{route('school.addclass_schoolid', [$sdata->classroom_id])}}"> <i class="fa fa-plus color-muted m-r-5"></i> Add Class</a></li>
                                                <li><a class="dropdown-item" href="{{route('class.info', [$sdata->classroom_id])}}"> <i class="fa fa-address-card-o color-muted m-r-5"></i> Class Room</a></li>
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
<script>
    $("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
<script>
    // $('.chicbox').change(function(){
    //     var checked = []
    //     $("input[name='options[]']:checked").each(function ()
    //     {
    //         checked.push(parseInt($(this).val()));
    //     });

    //     console.log(checked);
    // });

    // ==================================Upgarde Class===========================

    $('#class_level_up').click(function(){
        var checked = []
        $("input[name='options[]']:checked").each(function ()
        {
            checked.push(parseInt($(this).val()));
        });


        var stid = []
        $("input[name='options[]']:checked").each(function ()
        {
            stid.push(parseInt($(this).attr('stid')));
        });
        console.log(stid);


        $.ajax({
            type: 'POST',
            url: "{{ route('apiClass_level_up') }}",
            data: {checked:checked,stid:stid},
            dataType: "text",
            success: function(resultData) {
                // alert(resultData);
                if(resultData==1){
                    location.reload();
                }
                if(resultData==2){
                   alert('contact now');
                }
                if(resultData==3){

                    alert('Class Not Found ! Add New Class ');
                }
            }
        });

    });

    // ==================================End Upgarde Class===========================
</script>
@endsection
