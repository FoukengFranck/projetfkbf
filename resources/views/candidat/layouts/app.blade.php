<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <title>@yield('title', 'Dashboard Candidat')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50">

  @include('candidat.layouts.sidebar')
  @include('candidat.layouts.topbar')

  <main class="pl-64 pt-16 p-6">
    <div class="max-w-7xl mx-auto">
      @yield('content')
    </div>
  </main>

</body>
</html>
