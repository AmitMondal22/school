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
                                <h4 class="card-title">Create School</h4>
                                <div class="basic-form">
                                    <form action="{{route('school.schoolAdd')}}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>School Name</label>
                                                <input type="text" class="form-control" placeholder="School Name" required name="schoolname">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>School Registration id</label>
                                                <input type="text" class="form-control" placeholder="School Registration id" required name="reg_id">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Address</label>
                                                <input type="text" class="form-control" required name="adress">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>School Mobile No</label>
                                                <input type="text" class="form-control" required name="mobile_no">
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
                                        <button type="submit" class="btn btn-dark">Create</button>
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
</script>

@endsection
