<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>

    
    <link rel="stylesheet" href="{{ asset('argon/css/argon-dashboard.css') }}">
</head>
<body>
    @yield('content')

    
    <script src="{{ asset('argon/js/argon-dashboard.js') }}"></script>
</body>
</html>
