@extends('backend.layout.app')
@section('content')
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>

                    @if (session()->get('success'))
                    <div class="alert alert-primary">{{ session()->get('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        First name
                                    </th>
                                    <th>
                                        Last name
                                    </th>
                                    <th>
                                        E mail
                                    </th>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Message
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (!@empty($messages) && $messages->count() > 0)
                                    @foreach ($messages as $item)
                                        <tr>
                                            <td class="py-1">
                                                {{ $item->fname }}
                                            </td>

                                            <td>
                                                {{ $item->lname }}
                                            </td>

                                            <td>
                                                {{ $item->email }}
                                            </td>
                                            <td>
                                                {{ $item->subject }}
                                            </td>
                                            <td>
                                                {{ $item->message }}
                                            </td>

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
