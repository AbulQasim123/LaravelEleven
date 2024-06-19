<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sweet Alert </title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">SweetAlert2 Messages</div>

                    <div class="card-body">
                        <p>Click on the buttons below to display different types of SweetAlert2 messages:</p>
                        <button onclick="window.location='{{ url('/success') }}'" class="btn btn-success">Success
                            Message</button>
                        <button onclick="window.location='{{ url('/warning') }}'" class="btn btn-warning">Warning
                            Message</button>
                        <button onclick="window.location='{{ url('/error') }}'" class="btn btn-danger">Error
                            Message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Auto-close the alert messages after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            $('.swal2-popup').fadeOut();
        }, 3000);
    </script>

</body>

</html>
