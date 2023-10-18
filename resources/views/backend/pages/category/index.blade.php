@extends('backend.layout.app')
@section('content')
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description">
                    <a href="{{ route('panel/category/Create') }}"  >New category</a>
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
                                        Description
                                    </th>
                                    <th>
                                        Slug
                                    </th>
                                    <th>
                                        Sub Category
                                    </th>
                                    <th>
                                        Edit
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (!@empty($categories) && $categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{ $category->image }}" alt="image" />
                                            </td>

                                            <td>
                                                {{ $category->name }}
                                            </td>

                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>
                                                {{ $category->description }}
                                            </td>
                                            <td>
                                                {{ $category->slug }}
                                            </td>
                                            <td>
                                                {{ $category->sub_category }}
                                            </td>
                                            <td class="d-flex" >
                                                <form action="{{ route('panel/category/Edit',$category->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </form>

                                                <form action="{{ route('panel/category/Delete', $category->id) }}"
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
