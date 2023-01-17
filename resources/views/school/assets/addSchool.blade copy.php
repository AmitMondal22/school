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
                                <h4 class="card-title">Vertical Form</h4>
                                <div class="basic-form">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" placeholder="1234 Main St">
                                        </div>
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input type="text" class="form-control" placeholder="Apartment, studio, or floor">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>City</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>State</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected="selected">Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Zip</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Check me out</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-dark">Sign in</button>
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
