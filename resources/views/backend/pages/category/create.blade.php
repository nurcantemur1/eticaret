@extends('backend.layout.app')

@section('content')
    <div class="row">

    </div>
    <div class="col-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic form elements</h4>
                <p class="card-description">
                    Basic form elements
                </p>

                @if (session()->get('success'))
                    <div class="alert alert-primary">{{ session()->get('success') }}</div>
                @else
                    @if ($errors->count() > 0)
                        @foreach ($errors->all() as $item)
                            <div class="alert alert-primary">{{ $item }}</div>
                        @endforeach
                    @endif
                @endif

                @if (!empty($category->id))
                    @php
                        $routelink = route('panel/category/Update', $category->id);
                    @endphp
                @else
                    @php
                        $routelink = route('panel/category/Add');

                    @endphp
                @endif

                <form action="{{ $routelink }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf
                     @if (!empty($category->id))
                    @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name"
                            value="{{ $category->name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Description</label>
                        <input type="text" class="form-control" id="description" placeholder="description" name="description"
                            value="{{ $category->description ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Slug</label>
                        <input type="text" class="form-control" id="slug" placeholder="slug" name="slug"
                            value="{{ $category->link ?? '' }}">
                    </div>

                     <div class="form-group">
                        <label for="name">Sub category</label>
                        <select name="sub_category" id="" class="form-control">
                            <option value=""> Category chooes</option>
                            @if ($subcategory)
                                @foreach ($subcategory as $item)
                                    <option value="{{ $item->id }}" {{ isset($category) && $item->sub_category == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    </div>
@endsection
