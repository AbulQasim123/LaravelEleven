<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Currency Exchange Rate Calculator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Laravel Currency Exchange Rate Calculator
            </div>
            <div class="card-body">
                <form id="currency-exchange-rate" action="#" method="post" class="form-group">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" name="amount" class="form-control" value="1">
                        </div>
                        <div class="col-md-4">
                            <select name="from_currency" class="form-control">
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency }}">{{ $currency }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="to_currency" class="form-control">
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency }}">{{ $currency }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" name="submit" id="btnSubmit" class="btn btn-primary">Click To
                                Exchange Rate </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <span id="output"></span>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#btnSubmit").click(function(event) {
                event.preventDefault();
                var form = $('#currency-exchange-rate')[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{ url('currency') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 800000,
                    beforeSend: function() {
                        $('#btnSubmit').attr('disabled', true);
                        $('#btnSubmit').html(
                            '<i class="fa fa-spinner fa-spin"></i> Processing...');
                    },
                    success: function(data) {
                        $("#output").html(data);
                        $("#btnSubmit").prop("disabled", false);
                    },
                    error: function(e) {
                        $("#output").html(e.responseText);
                        console.log("ERROR : ", e);
                        $("#btnSubmit").prop("disabled", false);
                    },
                    complete: function() {
                        $('#btnSubmit').attr('disabled', false);
                        $('#btnSubmit').html('Click To Exchange Rate');
                    }
                });
            });
        });
    </script>
</body>

</html>
