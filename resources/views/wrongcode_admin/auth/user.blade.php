@extends('wrongcode_admin.common.main')
@section('wrongcodeContent')


<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>My Employee</h2>
                </div>
            </div>
        </div>

        <div class="row column1">
<!-- ================================================================ -->

<div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>All Employee <small></small></h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">

                                                <tr>
                                                   <th style="width: 2%">No</th>
                                                   <th style="width: 20%">Name</th>
                                                   <th>Email</th>
                                                   <th>DP</th>
                                                   <th>Mobile</th>
                                                   <th>Date Of Birth</th>
                                                   <th>Gender</th>
                                                   <th>Adress</th>
                                                   <th>Role</th>
                                                   <th>Status</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                             @if(!empty($data) && $data->count())
                @foreach($data as $key => $value)
                                                <tr>
                                                   <td>{{$key + $data->firstItem()}}</td>
                                                   <td>{{$value->name}}</td>
                                                   <td>{{$value->email}}</td>
                                                   <td>
                                                      <ul class="list-inline">
                                                         <li>
                                                            <img width="40" src="{{asset('./public/wc_dp')}}/{{$value->dp}}" class="rounded-circle" alt="#">
                                                         </li>
                                                      </ul>
                                                   </td>
                                                   <td>{{$value->mobile_no}}</td>
                                                   <td>{{$value->d_o_b}}</td>
                                                   <td>{{$value->gender}}</td>
                                                   <td>{{$value->adress}}</td>
                                                   <td>{{$value->user_role}}</td>
                                                   <td>{{ ($value->status == 'A') ? 'Active' : 'Deactive' }}</td>


                                                   <td>
                                                      <button type="button" class="btn btn-success btn-xs">Success</button>
                                                   </td>
                                                </tr>
                                                @endforeach
                                                @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
                                             </tbody>
                                          </table>


                                       </div>
                                    </div>
                                 </div>

                              </div>

                           </div>

                        </div>
                        <!-- end row -->

                        {!! $data->links() !!}


<!-- ================================================================ -->
        </div>
    </div>
    <!-- end dashboard inner -->
</div>
@endsection
@section('wrongcodeScript')


@endsection
