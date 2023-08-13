<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{ $title }}
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <x-navbar/>
    
    <main>
        <div class="vh-100 d-flex flex-column justify-content-between">
            <div class="container">
                {{ $slot }}
            </div>
    
            <div class="mt-5">
                <x-footer/>
            </div>
        </div>
    </main>
    
    @livewireScripts
</body>
</html>