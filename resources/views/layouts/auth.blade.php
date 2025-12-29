<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Stockify - Auth</title>
</head>

<body class="bg-gray-100">

  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-2xl mx-auto">
      @yield('content')
    </div>
  </div>
</body>

</html>
