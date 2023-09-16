<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.meta')
        <title>Laravel Web</title>
        @include('includes.style')
    </head>
    <body>
        <!-- Navigation-->
        @include('includes.nav')
        <!-- Page Header-->
        @include('includes.header')
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Footer-->
        @include('includes.footer')
        <!-- Bootstrap core JS-->
        @include('includes.script')
    </body>
</html>
