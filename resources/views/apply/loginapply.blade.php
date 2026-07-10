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

        .fc-home {
            font-family: 'FC Home Regular', sans-serif;
        }

        .fc-minimal {
            font-family: 'FC Minimal Bold', sans-serif;
        }
    </style>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #ffd2efff;
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
            text-align: center;
            width: 30%;
        }

        .icon {
            width: 100px;
            height: 100px;
            color: #ff77d0;
            margin: 0 auto 2px;
        }

        h1 {

            color: #ff77d0;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            line-height: 1.5;
        }

        input[type="submit"] {
            background-color: #ff77d0;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #ff77d0;
        }

        .logo-text {
            font-weight: bold;
            font-size: 20px;
            color: #ff77d0;
            margin-top: 10px;
        }

        .copyright {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="login-box" style="font-family: 'FC Minimal Bold', sans-serif;">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#ff77d0"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10" />
            <circle cx="12" cy="10" r="3" />
            <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662" />
        </svg>
        <h1>Graduate Login</h1>
        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <div style="font-family: 'FC Home Regular', sans-serif;">
            <div class="logo-text">GRADUATE SCHOOL</div>
            <div class="copyright">บัณฑิตวิทยาลัย</div>
        </div>
    </div>
</body>

</html>