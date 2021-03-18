<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Property Information</h4>
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
                        <div class="basic-form">
                            <form method="POST"  action="{{ route('property.add.create') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Property Type</label>
                                        <select class="form-control" name="property_type_id" required>
                                            <option selected disabled hidden>Choose a type</option>
                                            @foreach ($property_types as $type)
                                                <option value="{{$type->id}}">{{$type->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Parcel Number</label>
                                        <input type="text" class="form-control" placeholder="" name="parcel_number" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Property Address</label>
                                        <input type="text" class="form-control" placeholder="" name="address1" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Property Address 2</label>
                                        <input type="text" class="form-control" placeholder="" name="address2">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state" required>
                                        <!-- <select id="inputState" class="form-control" name="state">
                                            <option selected>Choose...</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select> -->
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Zip</label>
                                        <input type="text" class="form-control" name="zip" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Area Lot SF</label>
                                        <input type="number" class="form-control" name="area_lot_sf" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Area Building SF</label>
                                        <input type="number" class="form-control" name="area_building_sf" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Number of Beds</label>
                                        <input type="number" class="form-control" name="num_beds">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Number of Bath</label>
                                        <input type="number" class="form-control" name="num_bath">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Tax Value</label>
                                        <input type="number" class="form-control" name="tax_value" step="0.01" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Narket Value</label>
                                        <input type="number" class="form-control" name="market_value" step="0.01" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Year of Built</label>
                                        <input type="number" class="form-control" name="year_built" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Relevant Resources</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="resources[]"
                                                    accept=".pdf, .doc, .docx, .jpeg, .jpg, .png" required="" multiple>
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                        <label>Relevant Resources</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" required>
                                        <label class="form-check-label">
                                            Check to confirm you are the Owner or Authorized Agent of this Property
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Property</button>
                            </form>
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
