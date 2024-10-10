<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Site</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/ps.jpg') }}" alt="Logo" class="logo w-20 float-right">
        </div>
    </header>

    <main>
        <!-- Add your main content here -->
         <div class="border-b-2 border-black-100 h-64 w-50 header">
             <h2>Salary Certificate</h2>
         </div>
         <div class="body">
             <p class="text-yellow-500">This is ce</p>dasd
         </div>

         <div class="footer">
         <footer>
        <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
    </footer>
         </div>
    </main>
adasd
    

    @vite('resources/js/app.js')

</body>
</html>