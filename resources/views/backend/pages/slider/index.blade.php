@extends('backend.layout.app')
@section('content')
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description">
                    <a href="{{ route('panel/Slider/Create') }}"  >New Slider</a>
                    </p>
                    @if (session()->get('success'))
                    <div class="alert alert-primary">{{ session()->get('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        name
                                    </th>
                                    <th>
                                        Progress
                                    </th>
                                    <th>
                                        Content
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Edit
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (!@empty($sliders) && $sliders->count() > 0)
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{ $slider->image }}" alt="image" />
                                            </td>

                                            <td>
                                                {{ $slider->name }}
                                            </td>

                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>
                                                {{ $slider->content }}
                                            </td>

                                            <td>
                                                <div class="checkbox" item-id="{{ $slider->status }}">
                                                    <label>
                                                      <input type="checkbox" class="state" data-on="On" data-off="Off" data-offstyle="danger" {{ $slider->status == '1' ? 'success' : 'danger' }} data-toggle="toggle" >
                                                      Option one is enabled
                                                    </label>
                                                  </div>

                                            </td>
                                            <td class="d-flex" >
                                                <form action="{{ route('panel/Slider/Edit',$slider->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </form>

                                                <form action="{{ route('panel/Slider/Delete', $slider->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                </form>
                                            <td>
                                        </tr>
                                    @endforeach
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
