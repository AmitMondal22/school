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





            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="email-left-box">
                                <h5 class="mt-5 m-b-10">Date</h5>


                                <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2022 - 01/01/2024" id="date_input">
                                <h5 class="mt-3 m-b-10">Action</h5>
                                    <div class="list-group mail-list mb-3">
                                            <select name="" id="status" class="form-control ">
                                                <option value="">All Student</option>
                                                <option value="A">Active</option>
                                                <option value="PO">Pass Out Students</option>
                                            </select>
                                    </div>

                                <h5 class="mt-5 m-b-10">School</h5>
                                    <div class="mail-list">

                                    <div class="btn-group m-b-20 btn-block">
                                            <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">
                                                School <span class="caret m-l-5"></span>
                                            </button>
                                            <div class="dropdown-menu list-school">

                                            </div>
                                        </div>


                                    </div>

                                    <h5 class="mt-3 m-b-10">Class</h5>
                                    <div class="list-group mail-list" >
                                        <div class="form-group" id="class_list">

                                        </div>
                                    </div>
                                </div>
                                <div class="email-right-box">

                                    <div class="compose-content table-responsive">



                                        <table class="table table-bordered data-table verticle-middle table-hover table-striped dataTable" cellspacing="0" width="100%">

                                            <thead>
                                                <tr>
                                                    <!-- <th scope="col">SL</th> -->
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Roll No</th>
                                                    <th scope="col">School Name</th>
                                                    <th scope="col">school Registration Id</th>
                                                    <th scope="col">Session</th>
                                                    <th scope="col">admission_date</th>
                                                    <th scope="col">class_name</th>
                                                    <th scope="col">father_name</th>
                                                    <th scope="col">gender</th>
                                                    <th scope="col">date_of_birtg</th>
                                                    <th scope="col">mobileno</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>





                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>

        <!-- ========================================================================== -->
    </div>
    <!-- #/ container  -->
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


<script type="text/javascript">




    $(function() {
        function array_checkbox(){
            var arr = [];
            $(':checkbox:checked').each(function(){
                arr.push($(this).val());
            });
            return arr;
        }

        var table = $('.data-table').DataTable({



            processing: true,
            serverSide: true,


            lengthMenu : [10, 50, 100],
            scrollCollapse: true,
            order: [[0, 'asc']],
            orderClasses: false,
            colReorder: true,

            ajax: {
                url: "{{ route('school.my_student_filter') }}",
                data: function(d) {
                    d.status = $('#status').val(),
                    d.search = $('input[type="search"]').val(),
                    d.date_input = $('#date_input').val(),
                    d.class_id= array_checkbox()

                }
            },
            columns: [
                // {data: 'index + 1', name: 'id'},
                {
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'roll_no',
                    name: 'roll_no'
                },
                {
                    data: 'schoolname',
                    name: 'schoolname'
                },
                {
                    data: 'schoolRegistrationId',
                    name: 'schoolRegistrationId'
                },
                {
                    data: 'year',
                    name: 'year'
                },
                {
                    data: 'adate',
                    name: 'adate'
                },
                {
                    data: 'class_name',
                    name: 'class_name'
                },
                {
                    data: 'father_name',
                    name: 'father_name'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'date_of_birtg',
                    name: 'date_of_birtg'
                },
                {
                    data: 'mobileno',
                    name: 'mobileno'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });


        $('#status').change(function() {
            table.draw();
        });
        $('#date_input').change(function() {
            table.draw();
        });
        $(document).on("change", ".class_all", function(){
            table.draw();

        });

    });
</script>

<script>
$.get('{{route("school_list", Auth::guard("orgSadmin")->user()->school_user_id)}}',
    function(data){
         $('.list-school').html(data);

    });
</script>

<script>
    function school_id(school_id){

        $('#overlay').fadeIn();
        $.get('{{route("get_class_html","/")}}'+'/'+school_id,
        function(data){


            $('#class_list').html(data);
            $('#overlay').fadeOut();
        });
    }



</script>
@endsection

