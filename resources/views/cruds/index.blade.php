<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 11 CRUD and Image Upload Example Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="
        anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 11 CRUD and Image Upload Example Tutorial</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ url('add-vacancy') }}"> Create Vacancy</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
            @php
                $i = 1;
            @endphp
            @foreach ($vacancies as $vc)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $vc->title }}</td>
                    <td><img src="{{ asset('storage/images/' . $vc->image) }}" alt="Your Image" width="60px"
                            height="40px"></td>
                    <td>{{ $vc->description }}</td>
                    <td>
                        <form action="{{ url('delete/' . $vc->id) }}" method="get">

                            <a class="btn btn-outline-primary btn-sm" href="{{ url('edit/' . $vc->id) }}"> <i
                                    class="bi bi-pencil-square"></i>
                            </a>
                            @csrf
                            @method('get')
                            <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                    class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>

        {!! $vacancies->links() !!}
</body>

</html>
