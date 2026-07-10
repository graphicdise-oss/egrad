<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ | Q&A</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-pink-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <div class="flex flex-col items-center space-y-2">
            <div class="w-20 h-20 rounded-full bg-pink-200 flex items-center justify-center text-4xl text-pink-700">
                <i class="fa fa-user"></i>
            </div>
            <h2 class="text-xl font-semibold text-pink-800">Answer Login</h2>
            <div class="w-16 border-t border-pink-300 mb-4"></div>
        </div>

        <form method="POST" action="{{ route('qanda.login') }}" class="space-y-4">
            @csrf
            <div class="relative">
                <span class="absolute left-3 top-2.5 text-gray-500">
                    <i class="fa fa-user"></i>
                </span>
                <input type="text" name="username" placeholder="Username"
                    class="w-full pl-10 p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <div class="relative">
                <span class="absolute left-3 top-2.5 text-gray-500">
                    <i class="fa fa-lock"></i>
                </span>
                <input type="password" name="password" placeholder="Password"
                    class="w-full pl-10 p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded shadow">
                Login
            </button>
        </form>

        <div class="text-center mt-6">
            <p class="text-pink-700 font-semibold text-lg">
                <i class="fa fa-graduation-cap"></i> Q&A
            </p>
            <p class="text-sm text-gray-500 mt-1">© บัณฑิตวิทยาลัย | Graduate School</p>
        </div>
    </div>

</body>

</html>