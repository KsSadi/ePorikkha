<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ePorikkha</title>

@include('layouts.admin.partials.style')
</head>
<body>

@include('layouts.admin.partials.sidebar')
<!-- Main Content -->
<div class="admin-main">

@include('layouts.admin.partials.header')
    <!-- Content -->
    <main class="admin-content">
       @yield('content')
    </main>
</div>

@include('layouts.admin.partials.script')
</body>
</html>
