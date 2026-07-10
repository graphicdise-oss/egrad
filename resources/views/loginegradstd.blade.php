<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Graduate Login</title>

    <style>
        /* ฟอนต์ FC Home Regular */
        @font-face {
            font-family: 'FC Home Regular';
            src: url('{{ asset('fonts/FC-Home-Regular.otf') }}') format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        /* ฟอนต์ FC Minimal Bold */
        @font-face {
            font-family: 'FC Minimal Bold';
            src: url('{{ asset('fonts/FC-Minimal-Bold.otf') }}') format('opentype');
            font-weight: bold;
            font-style: normal;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #ffadefff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            position: relative;
        }

        /* แถบบนในกล่อง */
        .login-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            margin-bottom: 10px;
            padding-bottom: 5px;

        }

        .login-header .title {
            font-family: 'FC Minimal Bold';
            font-size: 22px;
            color: #ff77d0;
        }

        .login-header a {
            text-decoration: none;
            background-color: #ff77d0;
            color: white;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.2s;
        }

        .login-header a:hover {
            background-color: #ff91e9ff;
        }

        .logo-text {
            font-weight: bold;
            font-size: 20px;
            color: #ff91e9ff;
            margin-top: 10px;
        }

        .copyright {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"],
        .btn {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            /* ✅ ปรับให้ขนาดรวม border/padding */
        }

        input[type="submit"],
        .btn {
            background-color: #ff91e9ff;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #ff77d0;
        }
    </style>
</head>

<body>
    <div class="login-box">

        <!-- ✅ ส่วนหัวในกล่อง -->
   

        <img src="{{ asset('images/apply/logoba.png') }}" alt="Logo"
            style="width:150px; height:150px; object-fit:contain; margin-bottom:10px;">

        <form method="POST" action="{{ route('gradstd.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="id_no" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="idcard" required>
            </div>
            @error('login')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
            <input type="submit" value="Login">
        </form>
        @if(session('error'))
            <div style="background:#ffe1e1; color:#d8000c; padding:8px; border-radius:6px; margin-top:10px;">
                {{ session('error') }}
            </div>
        @endif

        <div class="logo-text">E-Graduate นักศึกษา</div>
        <div class="copyright">Copyright © บัณฑิตวิทยาลัย | Graduate School</div>
    </div>
</body>

</html>