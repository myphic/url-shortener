<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Url shortener</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="w-100">
@yield('content')

<script src="{{ asset('js/app.js') }}" ></script>
<script>
    $(document).ready(function() {

        $("#btn-submit").click(function (e) {
            e.preventDefault();

            let url = $("input[name=url]").val();
            let link = $('#link');
            let token = $("input[name='_token']").val();
            $.ajax({
                type: 'POST',
                url: "{{ route('links.send') }}",
                data: {
                    _token: token,
                    url: url
                },
                success: function (data) {
                    link.text(data['url'])
                    link.attr('href', data['url'])
                }

            });
        });
    })
</script>
</body>
</html>
