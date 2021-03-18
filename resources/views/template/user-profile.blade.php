<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">

        @if ($errors)
            @foreach ($errors as $error)
                {{$error->message}}
            @endforeach
        @endif
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Information</h4>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{route('profile.update')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$user->fname}}" name="fname">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$user->lname}}" name="lname">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$user->email}}" name="email">
                                </div>
                                    <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="(941) 334-3334" name="phone">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$user->address1}}" name="address1">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Address 2</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$user->address2}}" name="address2">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" class="form-control" value="{{$user->city}}" name="city">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>State</label>
                                    <select id="inputState" class="form-control" value="{{$user->state}}" name="state">
                                        <option selected>FL</option>
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Zip</label>
                                    <input type="text" class="form-control" value="{{$user->zip}}" name="zip">
                                </div>
                            </div>

                            <div class="form-row" style="margin-top:20px;">
                                <div class="form-group col-md-12">
                                    <b>Admin Only</b>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Default Zip for Matching Leads</label>
                                    <input type="text" class="form-control" placeholder="" value="34232" name="default_zip">
                                </div>
                            </div>

                            {{-- <div class="form-row">
                                <div class="form-group col-md-12" style="margin-left:20px;">
                                    <input type="checkbox" class="form-check-input" id="check1" value="" checked>
                                    <label class="form-check-label" for="check1">Profile is Verified</label> <BR>

                                    <input type="checkbox" class="form-check-input" id="check1" value="" checked>
                                    <label class="form-check-label" for="check1">Phone is Verified</label><BR>
                                    <input type="checkbox" class="form-check-input" id="check1" value="" checked>
                                    <label class="form-check-label" for="check1">Email is Verified</label>
                                </div>
                            </div> --}}

                            <button type="submit" class="btn btn-info">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
