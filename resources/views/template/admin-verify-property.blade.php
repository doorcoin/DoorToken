<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <!-- row -->

        <div class="row">

                <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form>
                                <div class="form-row">
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Search by Keyword">
                                    </div>

                                        <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Properties that need Verification</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if($properties->count())
                                <table class="table table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Address</th>
                                            <th>Owner</th>
                                            <th>Status</th>
                                            <th>Date Added</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $property)
                                        <tr>
                                            <td></td>
                                            <td><a href="{{route('admin.verify.property.detail.view', ['id' => $property->id])}}">{{$property->address1}}</a></td>
                                            <td><a href="admin_user_details.html">{{$property->user->fname . ' ' . $property->user->lname}}</a></td>
                                            <td><span class="badge badge-danger">{{$property->status ? 'Verified' : 'Not Verified'}}</span></td>
                                            <td>{{$property->created_at->format('M Y')}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('admin.verify.property.detail.view', ['id' => $property->id])}}">Verify</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                There is no property to verify.
                            @endif
                        </div>
                    </div>
                </div>
            </div>






        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
