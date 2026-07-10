<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>เข้าสู่ระบบ | E-Graduate</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-green-100 min-h-screen flex items-center justify-center">

  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
    <div class="flex flex-col items-center space-y-2">
      <div class="w-20 h-20 rounded-full bg-green-200 flex items-center justify-center text-4xl text-green-700">
        <i class="fa fa-user"></i>
      </div>
      <h2 class="text-xl font-semibold text-green-800">Graduate Login</h2>
      <div class="w-16 border-t border-green-300 mb-4"></div>
    </div>

    <form class="space-y-4">
      <div class="relative">
        <span class="absolute left-3 top-2.5 text-gray-500">
          <i class="fa fa-user"></i>
        </span>
        <input type="text" placeholder="Username" class="w-full pl-10 p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400">
      </div>

      <div class="relative">
        <span class="absolute left-3 top-2.5 text-gray-500">
          <i class="fa fa-lock"></i>
        </span>
        <input type="password" placeholder="Password" class="w-full pl-10 p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400">
      </div>

      <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded shadow">
        Login
      </button>
    </form>

    <div class="text-center mt-6">
      <p class="text-green-700 font-semibold text-lg">
        <i class="fa fa-graduation-cap"></i> E-Graduate
      </p>
      <p class="text-sm text-gray-500 mt-1">Copyright © บัณฑิตวิทยาลัย | Graduate School</p>
    </div>
  </div>

</body>
</html>
