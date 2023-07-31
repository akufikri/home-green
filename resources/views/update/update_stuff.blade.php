@extends('template')
@section('header')
    Update Stuff
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 ">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form action="/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label">Name</label>
                                            <input type="text" class="form-control" name="name""
                                                value="{{ $data->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>File input</label>
                                        <input type="text" value="{{ $data->image }}" class="form-control border-0"
                                            readonly style="cursor: no-drop;">
                                        <div class="input-group">

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="image">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <div class="form-group">
                                            <select class="form-control select2" style="width: 100%;" name="type">
                                                <option selected="selected">{{ $data->type }}</option>
                                                <option value="vegetables">Vegatables</option>
                                                <option value="fruits">Fruits</option>
                                                <option value="planst">Plants</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label">Price (Rp)</label>
                                            <input type="number" class="form-control" name="price"
                                                value="{{ $data->price }}">
                                    </div>
                                    <div class="form-group">
                                        <label">Plants Date</label>
                                            <input type="date" class="form-control" name="planting_date"
                                                value="{{ $data->planting_date }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Availablity</label>
                                        <div class="form-group">
                                            <select class="form-control select2" style="width: 100%;" name="availability">
                                                <option selected="selected">{{ $data->availability }}</option>
                                                <option value="available">Available</option>
                                                <option value="not_available">Not Available</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="gap-2"><button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
@endsection
