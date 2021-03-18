<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Verification Documents</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Document</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th>Uploaded</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="{{ url('/storage/documents/'.$property->filename) }}" target="_blank">{{$property->filename}}</a></td>
                                        <td>
                                            @if ($property->status)
                                                <span class="badge badge-success">Verified</span>
                                            @else
                                                <span class="badge badge-danger">Not Verified</span>
                                            @endif
                                        </td>
                                        <td>Utility Bill</td>
                                        <td>{{$property->created_at->format('M Y')}}</td>
                                        <td>
                                            <form method="POST" action="{{route('admin.verify.property', ['id' => $property->id])}}">
                                                @csrf
                                                {{-- <input type="hidden" name="dic_id" value={{$document->id}}> --}}
                                                <input type="hidden" name="verify" value="true">
                                                <button type="submit" class="badge btn-success" style="width: 100%">Accept</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form>
                                                @csrf
                                                <input type="hidden" name="verify" value="false">
                                                <button type="submit" class="badge btn-danger" style="width: 100%">Decline</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
