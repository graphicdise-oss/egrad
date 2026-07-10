<!DOCTYPE html>
<html>

<head>
    <title>Student Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> <style>
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



                <form method="GET" action="{{ route('studentslist.index') }}" class="mb-4">
                    <input type="text" name="faculty" placeholder="ค้นหาสาขา" value="{{ request('faculty') }}"
                        class="border p-2 rounded" />
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">ค้นหา</button>
                </form>

                <!-- ปุ่มดาวน์โหลด Excel -->
                <!-- Export เฉพาะผลการค้นหา -->
                <a href="{{ route('students.export.all', ['faculty' => request('faculty')]) }}"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 mr-2">
                    excel all
                </a>

                <a href="{{ route('students.export.current', ['page' => request()->get('page', 1), 'faculty' => request('faculty')]) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    excel page({{ request()->get('page', 1) }})
                </a>


                <br><br>


                <div class="overflow-x-auto">
                    <table class="min-w-full table-fixed border border-gray-300 text-sm text-gray-700">
                        <thead class="bg-gray-200 text-center">
                            <tr>
                                <th class="border px-3 py-2">รหัส</th>
                                <th class="border px-3 py-2">ชื่อ</th>
                                <th class="border px-3 py-2">นามสกุล</th>
                                <th class="border px-3 py-2">ตำเเหน่ง</th>
                                <th class="border px-3 py-2">เมล</th>
                                
                                
                                <th class="border px-3 py-2">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-center">
                            @foreach($staff as $s)
                                <tr>
                                    <td>{{ $s->STAFF_ID }}</td>
                                    <td>{{ $s->FIRST_NAME_TH }}</td>
                                    <td>{{ $s->LAST_NAME_TH }}</td>
                                    <td>{{ $s->POSITION }}</td>
                                    <td>{{ $s->EMAIL }}</td>
                                    <!-- เพิ่ม column อื่น ๆ ตามต้องการ -->
                                     <td class="border px-3 py-2 space-x-1">
    <a href="{{ route('staff.edit', $s->STAFF_ID) }}"
       class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
        แก้ไข
    </a>

    <form action="{{ route('staff.destroy', $s->STAFF_ID) }}" method="POST" class="inline-block"
          onsubmit="return confirm('คุณแน่ใจว่าต้องการลบข้อมูลนี้?');">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-sm">
            ลบ
        </button>
    </form>
</td>

                                </tr>
                            @endforeach

                            
                        </tbody>
                    </table>
                    <br><br>
                    
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