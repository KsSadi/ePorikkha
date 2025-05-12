<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePorikkha - @yield('pageTitle', 'Dashboard')</title>
  @include('layouts.style')

</head>
<body>
<div class="dashboard-container">
    @include('layouts.header')

  @yield('content')


@include('layouts.footer')


    @include('layouts.script')
</div>


</body>
</html>
