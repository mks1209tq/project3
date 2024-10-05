<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Site</title>
    
    <!-- @vite('resources/css/app.css') -->
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/ps.jpg') }}" alt="Logo" class="logo">
        </div>
    </header>

    <main>
        <!-- Add your main content here -->
        <h2></h2>
        <p>This is ce</p>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
    </footer>
</body>
</html>