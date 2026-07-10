<!DOCTYPE html>
<html>

<head>
    <title>Course All</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
 <style>
    /* ✅ ฟอนต์ TH Sarabun New (Regular) */
    @font-face {
        font-family: 'THSarabunNew';
        src: url('{{ asset('fonts/THSarabunNew.ttf') }}') format('truetype');
        font-weight: 400;
        font-style: normal;
    }

    /* ✅ ฟอนต์ TH Sarabun New (Bold) */
    @font-face {
        font-family: 'THSarabunNew';
        src: url('{{ asset('fonts/THSarabunNew-Bold.ttf') }}') format('truetype');
        font-weight: 700;
        font-style: normal;
    }

    /* ✅ ตั้งค่าให้ฟอนต์นี้เป็นฟอนต์หลักของทั้งหน้า */
    body, html {
        font-family: 'THSarabunNew', sans-serif;
        font-size: 18px; /* ฟอนต์นี้ค่อนข้างเล็ก ปรับให้ใหญ่ขึ้นนิด */
    }

    /* ✅ กำหนด class สำหรับตัวหนา */
    .bold {
        font-weight: 700;
    }
</style>
<meta name="robots" content="noindex, nofollow">
</head>

<body class="bg-gray-100 min-h-screen fc-font">



    <div class="flex min-h-screen">

        <!-- Sidebar -->
        @include('layouts.menuleft2')
        @include('layouts.menutop')


        <div class="p-8">
            <!-- กล่องใหม่ พื้นหลังขาว -->
            <div class="fade-up" style="
    background-color: white;
    border-radius: 16px;
    padding: 24px;
    margin-top: 0px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
">



                <br><br>


                <div class="overflow-x-auto">
             <table class="min-w-full border border-gray-300 text-sm text-gray-700">
                <thead class="bg-gray-200 text-center">
                    <tr>
                        <th class="border px-3 py-2 w-1/6">ระดับ</th>
                        <th class="border px-3 py-2 w-2/3">ชื่อหลักสูตร</th>
                        <th class="border px-3 py-2 w-1/6">จัดการ</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-center">
                    @foreach($courses as $course)
                        <tr class="hover:bg-gray-100">
                            <td class="border px-3 py-2">{{ $course->namelevel_full }}</td>
                            <td class="border px-3 py-2 text-left">{{ $course->detail }}</td>
                            <td class="border px-3 py-2">
                               <a href="{{ url('/students?detail=' . urlencode(trim($course->detail))) }}"
   class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded text-sm">
   นักศึกษา
</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

                </div>


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