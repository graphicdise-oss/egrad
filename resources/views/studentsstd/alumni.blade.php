<!DOCTYPE html>
<html>

<head>
    <title>Student Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ฟอนต์เอง*/
        @font-face {
            font-family: 'FC Home Regular';
            src: url('{{ asset('fonts/FC-Home-Regular.otf') }}') format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        .fc-font {
            font-family: 'FC Home Regular', sans-serif;
        }

        * {
            box-sizing: border-box;
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



                <form method="GET" action="{{ route('alumni') }}" class="flex gap-2 mb-4">
                    {{-- เลือกหลักสูตร --}}
                    <select name="detail" class="border p-2 rounded">
                        <option value="">-- เลือกหลักสูตร --</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->detail }}" {{ request('detail') == $course->detail ? 'selected' : '' }}>
                                {{ $course->namelevel_full }} {{ $course->detail }}
                            </option>
                        @endforeach
                    </select>

                    {{-- กรอกรหัสนักศึกษา --}}
                    <input type="text" name="id_no" value="{{ request('id_no') }}" placeholder="รหัสนักศึกษา"
                        class="border p-2 rounded">

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">ค้นหา</button>
                </form>







                <!-- ปุ่มดาวน์โหลด Excel -->
                <!-- Export เฉพาะผลการค้นหา -->
                <a href="{{ route('students.export.all', ['faculty' => request('branch_one')]) }}"
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
                                <th style="width: 7%;" class="border px-3 py-2">รหัส</th>

                                <th style="width: 10%;" class="border px-3 py-2">ชื่อ - นามสกุล</th>

                                <th style="width: 5%;" class="border px-3 py-2">เข้าศึกษา</th>
                                <th style="width: 20%;" class="border px-3 py-2">สาขา</th>
                                <th style="width: 10%;" class="border px-3 py-2">ปริญญา</th>
                                <th style="width: 10%;" class="border px-3 py-2">สถานะ</th>

                                <th style="width: 10%;" class="border px-3 py-2">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-center">
                            @foreach($students as $student)
                                <tr class="hover:bg-gray-100">
                                    <td class="border px-3 py-2">{{ $student->id_no}}</td>
                                    <td class="border px-3 py-2">
                                        {{ $student->pname . ' ' . $student->name . ' ' . $student->lname }}
                                    </td>
                                    <td class="border px-3 py-2">{{ $student->term }}</td>
                                    <td class="border px-3 py-2">{{ $student->detail }}</td>
                                    <td class="border px-3 py-2">{{ $student->namelevel_full }}</td>
                                    <td class="border px-3 py-2">{{ $student->status_name}}</td>




                                    <td class="border px-3 py-2 space-x-1">
                                        <a href="{{ route('students.edit', $student->id_no) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                            ดูข้อมูล
                                        </a>

                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br><br>
                    {{ $students->links() }}

                </div>
            </div>
        </div>
    </div>
</body>


<script>
    window.onload = function () {
        const urlParams = new URLSearchParams(window.location.search);
        const facCode = urlParams.get('branch_one');
        const nationCode = urlParams.get('chart'); // ✅ เพิ่มบรรทัดนี้
        const autoSubmit = urlParams.get('auto');
        const form = document.getElementById('filter-form');

        // ✅ ใส่ค่าให้ select field ถ้ามีใน URL
        if (facCode) {
            const facSelect = form.querySelector('[name="branch_one"]');
            if (facSelect) facSelect.value = facCode;
        }

        if (nationCode) {
            const nationSelect = form.querySelector('[name="chart"]');
            if (nationSelect) nationSelect.value = nationCode;
        }

        // ✅ ทำ auto-submit เฉพาะตอนที่ส่งมากับ auto=1 และยังไม่เคย submit
        if (autoSubmit === '1' && form && !form.dataset.autoSubmitted) {
            form.dataset.autoSubmitted = 'true';
            // form.submit();
        }
    };
</script>




</html>
<script>
    function toggleSubMenu(id) {
        const submenu = document.getElementById(id);
        const arrow = document.getElementById('arrow-' + id);

        if (submenu) submenu.classList.toggle('hidden');
        if (arrow) arrow.classList.toggle('rotate-180');
    }
</script>