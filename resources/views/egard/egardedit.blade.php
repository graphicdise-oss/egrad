<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>ระบบจัดการข้อมูล</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ใส่ใน <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-gray-100 min-h-screen">

    <!-- โครงหลักของหน้า: flex -->
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        @include('layouts.menuleft')
        @include('layouts.menutop')


        <div class="p-8">
            <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
                <h2 class="text-[22px] font-semibold">เพิ่มข้อมูลประธานหลักสูตร</h2>
                <br>
                <hr>
                <br>
                <!-- Container Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 justify-items-center">
                    <div class="w-[240px] bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="images/edit.jpg" alt="image" class="w-full h-auto">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-green-600/60 opacity-0 hover:opacity-100 transition flex flex-col items-center justify-center text-white">
                                <p class="mb-2">หลักสูตรและการสอน</p>
                                <a href="saka_study1.php"><i class="fa fa-pencil fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-2 font-semibold">
                            หลักสูตรและการสอน (ป.ตรี)
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="w-[240px] bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="images/edit.jpg" alt="image" class="w-full h-auto">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-green-600/60 opacity-0 hover:opacity-100 transition flex flex-col items-center justify-center text-white">
                                <p class="mb-2">หลักสูตรและการสอน</p>
                                <a href="saka_study1.php"><i class="fa fa-pencil fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-2 font-semibold">
                            หลักสูตรและการสอน (ป.โท)
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="w-[240px] bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="images/edit.jpg" alt="image" class="w-full h-auto">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-green-600/60 opacity-0 hover:opacity-100 transition flex flex-col items-center justify-center text-white">
                                <p class="mb-2">หลักสูตรและการสอน</p>
                                <a href="saka_study1.php"><i class="fa fa-pencil fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-2 font-semibold">
                            หลักสูตรและการสอน (ป.เอก)
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="w-[240px] bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="images/edit.jpg" alt="image" class="w-full h-auto">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-green-600/60 opacity-0 hover:opacity-100 transition flex flex-col items-center justify-center text-white">
                                <p class="mb-2">หลักสูตรและการสอน</p>
                                <a href="saka_study1.php"><i class="fa fa-pencil fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-2 font-semibold">
                            การบริหารการศึกษา (ป.ตรี)
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="w-[240px] bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="images/edit.jpg" alt="image" class="w-full h-auto">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-green-600/60 opacity-0 hover:opacity-100 transition flex flex-col items-center justify-center text-white">
                                <p class="mb-2">หลักสูตรและการสอน</p>
                                <a href="saka_study1.php"><i class="fa fa-pencil fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-2 font-semibold">
                            การบริหารการศึกษา (ป.โท)
                        </div>
                    </div>

                </div> <!-- 🟢 ปิด grid container ตรงนี้ -->


                <!-- Container Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 justify-items-center">
                    <div class="w-[240px] bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="images/edit.jpg" alt="image" class="w-full h-auto">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-green-600/60 opacity-0 hover:opacity-100 transition flex flex-col items-center justify-center text-white">
                                <p class="mb-2">หลักสูตรและการสอน</p>
                                <a href="saka_study1.php"><i class="fa fa-pencil fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-2 font-semibold">
                           นวัตกรรมการบริหาร (ป.โท)
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="w-[240px] bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="images/edit.jpg" alt="image" class="w-full h-auto">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-green-600/60 opacity-0 hover:opacity-100 transition flex flex-col items-center justify-center text-white">
                                <p class="mb-2">หลักสูตรและการสอน</p>
                                <a href="saka_study1.php"><i class="fa fa-pencil fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-2 font-semibold">
                            นวัตกรรมดิจิทัล (ป.ตรี)
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="w-[240px] bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="images/edit.jpg" alt="image" class="w-full h-auto">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-green-600/60 opacity-0 hover:opacity-100 transition flex flex-col items-center justify-center text-white">
                                <p class="mb-2">หลักสูตรและการสอน</p>
                                <a href="saka_study1.php"><i class="fa fa-pencil fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-2 font-semibold">
                            หลักสูตรและการสอน (ป.เอก)
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="w-[240px] bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="images/edit.jpg" alt="image" class="w-full h-auto">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-green-600/60 opacity-0 hover:opacity-100 transition flex flex-col items-center justify-center text-white">
                                <p class="mb-2">หลักสูตรและการสอน</p>
                                <a href="saka_study1.php"><i class="fa fa-pencil fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-2 font-semibold">
                            การบริหารการศึกษา (ป.ตรี)
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="w-[240px] bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="images/edit.jpg" alt="image" class="w-full h-auto">
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-green-600/60 opacity-0 hover:opacity-100 transition flex flex-col items-center justify-center text-white">
                                <p class="mb-2">หลักสูตรและการสอน</p>
                                <a href="saka_study1.php"><i class="fa fa-pencil fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-2 font-semibold">
                            หลักสูตรและการสอน (ป.โท)
                        </div>
                    </div>

                </div> <!-- 🟢 ปิด grid container ตรงนี้ -->



            </div>
        </div>
    </div>

</body>

</html>
<script>
    function toggleSubMenu(id) {
        const submenu = document.getElementById(id);
        const arrow = document.getElementById('arrow-' + id);

        if (submenu) submenu.classList.toggle('hidden');
        if (arrow) arrow.classList.toggle('rotate-180');
    }
</script>