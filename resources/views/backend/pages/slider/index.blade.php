@extends('backend.layout.app')
@section('content')
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description">
                        Add class <code>.table-striped</code>
                    </p>
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
                                        Amount
                                    </th>
                                    <th>
                                        Deadline
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!@empty($sliders) && $sliders->count()>0)
                                    @foreach ( $sliders as $slider )
                                        <tr>
                                    <td class="py-1">
                                        <img src="{{ $slider->image }}" alt="image" />
                                    </td>
                                    <td>
                                        {{ $slider->name }}
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $slider->content }}
                                    </td>
                                    <td>
                                        May 15, 2023
                                    </td>
                                    <td><label class="badge badge-{{ $slider->status == '1' ? 'success' : 'danger' }}">Pending</label></td>

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
