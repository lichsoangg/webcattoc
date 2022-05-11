<!DOCTYPE html>
<html lang="en">
    @include('client.share.head-css')
<body>
    @include('client.share.header')
    @yield('content')
@include('client.share.foot-css')
@yield('js')
</body>

</html>
