<!DOCTYPE html>
<html lang="en">
@include('theme.auth.head')

<body>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                {{ $slot }}
            </div>
        @include('theme.auth.footer')
        </div>
    </div>
    @include('theme.auth.js')
    @yield('custom_js')
</body>
    
</html>