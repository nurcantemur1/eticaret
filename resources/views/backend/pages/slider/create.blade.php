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

                @if (!empty($slider->id))
                    @php
                        $routelink = route('panel/Slider/Update', $slider->id);
                    @endphp
                @else
                    @php
                        $routelink = route('panel/Slider/Add');

                    @endphp
                @endif

                <form action="{{ $routelink }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf
                     @if (!empty($slider->id))
                    @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name"
                            value="{{ $slider->name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Content</label>
                        <input type="text" class="form-control" id="content" placeholder="content" name="content"
                            value="{{ $slider->content ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Link</label>
                        <input type="text" class="form-control" id="link" placeholder="link" name="link"
                            value="{{ $slider->link ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                        @php
                            $status = $slider->status ?? '';
                        @endphp
                        <select class="form-control" id="status" name="status">
                            <option value="1" {{ $status == 1 ? 'selected' : '' }}>On</option>
                            <option value="0"{{ $status == 0 ? 'selected' : '' }}>Off</option>
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
