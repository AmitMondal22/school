@extends('wrongcode_admin.common.main')
@section('wrongcodeContent')


<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Register</h2>
                </div>
            </div>
        </div>

        <div class="row column1">
            <!-- ================================================================ -->

            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Register User</h2>
                        </div>
                    </div>

                    <form action="{{route('wc_register')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row padding_infor_info">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mobile">Mobile No:</label>
                                    <input type="text" class="form-control" placeholder="Enter mobile No" id="mobile" name="mobile">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="dateofbirth">Date Of Birth:</label>
                                    <input type="date" class="form-control" placeholder="Enter Date Of Birth" id="dateofbirth" name="dateofbirth">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mr-4">Gender:</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" value="Male">Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" value="Female">Female
                                        </label>
                                    </div>
                                    <div class="form-check-inline disabled">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" value="Others">Others
                                        </label>
                                    </div>
                            </div>
                            <!-- <div class="row padding_infor_info"> -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="sel1">User Role:</label>
                                        <select class="form-control" id="sel1" name="userrole">
                                            <option value="">Select User Role</option>
                                            <option value="S">Customer Support </option>
                                            <option value="M">Marketing Executive </option>
                                            <option value="AC">accountant</option>
                                            <option value="AD">Admin</option>
                                            <option value="SA">Super Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                <label for="dateofbirth">Upload Profile Pic:</label>
                                    <!-- <input type="date" class="form-control" placeholder="Enter Date Of Birth" id="dateofbirth"> -->
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pwd">Adress:</label>
                                        <textarea class="form-control" placeholder="Enter Adress" rows="" name="adress"></textarea>
                                    </div>
                                </div>


                                <button type="submit" class="btn cur-p btn-success float-right">Save</button>

                                <!-- <button type="submit" class="btn btn-primary float-right">Submit</button> -->
                            </div>
                    </form>
                </div>
            </div>




            <!-- ================================================================ -->
        </div>
    </div>
    <!-- end dashboard inner -->
</div>
@endsection
@section('wrongcodeScript')
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

@endsection
