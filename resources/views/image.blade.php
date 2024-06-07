<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Validation - Tutsmake.com</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card mt-5">
                    <div class="card-header bg-success">
                        <h3 class="text-white text-center"><strong>Image Validation in Laravel</strong></h3>
                    </div>
                    <div class="card-body">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="{{ url('store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label><b>Please Select Image</b></label>
                                <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
