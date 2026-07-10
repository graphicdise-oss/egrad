<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'VRU Form')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<style>
    input.form-control,
    select.form-select {
        border: 2px solid #ff77d0 !important;
    }
</style>


<body>

    <!-- ส่วน Header VRU อยู่บนสุด -->
    <nav class="navbar border-bottom" style="background-color: #ff77d0;">

        <div class="container d-flex justify-content-between align-items-center">
            <!-- โลโก้ -->
             <div class="d-flex align-items-center">
                <img src="{{ asset('images/apply/logoapply.jpg') }}" alt="VRU Logo"
                    style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 4px solid white;" />


            </div>

            <div class="d-flex flex-column align-items-center text-end">
                <div class="d-flex align-items-center">
                    <a  class="nav-link" style="color: #ffffffff;">Admin</a>
                    <span class="text-white mx-2">|</span>
                    <a href="/logout" class="nav-link" style="color: #ffffffff;">@lang('form.logout')</a>
                </div>
            </div>
        </div>
    </nav>


    <body>
        <div class="container mt-4">
            @yield('content')
        </div>
    </body>

</html>