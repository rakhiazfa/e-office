<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Jquery JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    {{-- App CSS --}}
    @vite('./resources/css/app.css')
    
    <title>{{ $title }}</title>
</head>

<body>
    
    {{ $slot }}

    {{-- App JS --}}
    @vite('./resources/js/app.js')
</body>

</html>
