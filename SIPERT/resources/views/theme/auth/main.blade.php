<!DOCTYPE html>
<html>
@include('theme.auth.head')
<body>
    {{ $slot }}
@include('theme.auth.js')
</body>
</html>