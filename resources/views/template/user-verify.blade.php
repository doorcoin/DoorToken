<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <!-- row -->

        @if ($user->is_verified)
            <div class="row">
                You have been alreday verified your account. No action needed!
            </div>
        @else
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Instructions</h4>
                        </div>
                        <div class="card-body">
                            <h4>How to Verify your Account</h4>
                            <p>
                                In order to receive rewards we have to first verify your account. Please upload the following
                            </p>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                        Drivers License (Front and Back)
                                </li>
                                <li class="list-group-item d-flex px-0 justify-content-between">
                                        Picture of you holding your Drivers License
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Upload a File</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form custom_file_input">
                                <form method="POST" action="{{route('user.verify.upload')}}" enctype="multipart/form-data">
                                    @csrf
                                    <label>Upload Document (.pdf, .jpg)</label>
                                    <div class="input-group mb-3">

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="document" required>
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Type of Document</label>
                                        <select id="inputState" class="form-control" name="type" required>
                                            <option selected disabled hidden>Choose...</option>
                                            @foreach ($available as $option)
                                                <option value="{{$option}}">{{$option}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Verification Documents</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($documents->count())
                                    <table class="table table-striped table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Document</th>
                                                <th>Status</th>
                                                <th>Type</th>
                                                <th>Uploaded</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($documents as $document)
                                                <tr>
                                                    <td></td>
                                                    <td><a href="">{{$document->name}}</a></td>
                                                    <td>
                                                        @if ($document->status)
                                                            <span class="badge badge-success">Verified</span>
                                                        @else
                                                            <span class="badge badge-warning">In Review</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$document->type}}</td>
                                                    <td>{{$document->created_at->format("m/d/Y")}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    There is no document to verify this user
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
