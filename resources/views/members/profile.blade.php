@extends('layouts_admin.admin')
@section("content")
    @include('layouts_admin._breadcrumbs')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="@if(!empty($member->avatar)) {{asset('/images/'.$member->avatar)}} @else {{asset('/images/user.jpg')}} @endif" class="img-circle" width="150">
                            <h4 class="card-title m-t-10">{{$member -> name}}</h4>
                        </center>
                    </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>

                        <h6>{{$member -> email}}</h6> <small class="text-muted p-t-30 db">Phone</small>

                        <h6>{{$member -> phone}}</h6> <small class="text-muted p-t-30 db">Address</small>

                        <h6>{{$member -> address}}</h6>

                        <div class="map-box">
                            <iframe id="gmap_canvas"width="100%" height="150" style="border:0" allowfullscreen
                                    src="https://maps.google.com/maps?q={{urldecode($member -> address)}}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="settings" role="tabpanel">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="post" action="{{route('my_profile')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">

                                        <label class="col-md-12">Full Name</label>

                                        <div class="col-md-12">

                                            <input type="text" name="name" value="{{$member->name }}" class="form-control form-control-line">

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="example-email" class="col-md-12">Email</label>

                                        <div class="col-md-12">

                                            <input type="email" name="email" value="{{$member->email }}" class="form-control form-control-line" name="example-email" id="example-email">

                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <label class="col-md-12">Phone No</label>

                                        <div class="col-md-12">

                                            <input type="text" name="phone"  value="{{$member->phone}}" class="form-control form-control-line">

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-12">Address</label>

                                        <div class="col-md-12">

                                            <input type="text" name="address" value="{{$member->address}}" class="form-control form-control-line">

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-12">Gender</label>

                                        <div class="col-sm-12">

                                            <select name="gender" class="form-control form-control-line">

                                                <option value="0">Nữ</option>

                                                <option value="1">Nam</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-12">

                                            <button class="btn btn-success">Update Profile</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
