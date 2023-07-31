@extends('template')

@section('title')
    Stuff
@endsection

@section('header')
    Stuff
@endsection

@section('content')
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Add Stuff
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label">Name</label>
                                    <input type="text" class="form-control" name="name"">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>File input</label>
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
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <div class="form-group">
                                    <select class="form-control select2" style="width: 100%;" name="type">
                                        <option selected="selected">Select your type</option>
                                        <option value="vegetables">Vegatables</option>
                                        <option value="fruits">Fruits</option>
                                        <option value="plants">Plants</option>
                                    </select>
                                </div>
                                @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label">Price</label>
                                    <input type="number" class="form-control" name="price">
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label">Plants Date</label>
                                    <input type="date" class="form-control" name="planting_date">
                                    @error('planting_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Availablity</label>
                                <div class="form-group">
                                    <select class="form-control select2" style="width: 100%;" name="availability">
                                        <option selected="selected">Select your Availablity</option>
                                        <option value="available">Available</option>
                                        <option value="not_available">Not Available</option>
                                    </select>
                                </div>
                                @error('availability')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Update---->
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fa-solid fa-plus"></i> Add Stuff
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Planting Date</th>
                        <th>Availablity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <img width="50px" src="{{ asset('imageFile/' . $item->image) }}" alt=""
                                    srcset="">
                            </td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->planting_date }}</td>
                            <td>{{ $item->availability }}</td>
                            <td>
                                <a onclick="return confirm('Sure delete ? {{ $item->name }}')"
                                    href="destroy/{{ $item->id }}" class="btn btn-danger"><i
                                        class="fa-solid fa-trash"></i></a>
                                <a class="btn btn-success" href="/show/{{ $item->id }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Planting Date</th>
                        <th>Availablity</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
@endsection
