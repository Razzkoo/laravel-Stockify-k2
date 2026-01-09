<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Stockify - Auth</title>
</head>

<body class="min-h-screen relative overflow-hidden">

<!-- BACKGROUND -->
    <div class="absolute inset-0 -z-10">
        <video autoplay muted loop playsinline
               class="w-full h-full object-cover">
            <source src="/video/bg-welcome-pink.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-2xl mx-auto">
      @yield('content')
    </div>
  </div>
</body>

</html>
