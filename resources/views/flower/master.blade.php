<!DOCTYPE html>
<html lang="en">
<head>
<title>	
@yield('title')
</title>
@include('flower.inc._meta')
@yield('meta')
@include('flower.inc._css')
@yield('css')
<head>
<body>
@include('flower.inc.header')
@yield('content')
@include('flower.inc.footer') ?>
@yield('script')
</body>
</html>