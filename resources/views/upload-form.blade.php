<!DOCTYPE html>
<html>

<head>
    <title>Laravel 11 Multiple Image Upload with Validation Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        @if (session('status'))
            <div class="alert alert-success" style="margin: 1% 8%">
                {{ session('status') }}
            </div>
        @endif
        <div class="main">
            <div class="card-header text-center font-weight-bold mb-2">
                <h2>Laravel 11 Multiple Image Upload with Validation Example </h2>
            </div>
            <form name="upload-multiple-image" method="POST" action="{{ url('upload-image') }}" accept-charset="utf-8"
                enctype="multipart/form-data">
                @csrf

                <div class="row" style="margin: 2% 8%">

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Select Multiple Images</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple="">
                    </div>

                    @error('images')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
