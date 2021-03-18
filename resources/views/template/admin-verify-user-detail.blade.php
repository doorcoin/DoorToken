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
                            @if ($documents->count())
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
                                        @foreach ($documents as $document)
                                            <tr>
                                                {{-- <td></td> --}}
                                                <td><a href="{{ url('/storage/documents/'.$document->name) }}" target="_blank">{{$document->name}}</a></td>
                                                <td>
                                                    @if ($document->status)
                                                        <span class="badge badge-success">Verified</span>
                                                    @else
                                                        <span class="badge badge-warning">In Review</span>
                                                    @endif
                                                </td>
                                                <td>{{$document->type}}</td>
                                                <td>{{$document->created_at->format("m/d/Y")}}</td>
                                                <td>
                                                    <form method="POST" action="{{route('admin.verify.user', ['id' => $document->id])}}">
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
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
