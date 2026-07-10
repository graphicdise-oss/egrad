<!DOCTYPE html>
<html>

<head>
    <title>Student Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
     <meta name="robots" content="noindex, nofollow">
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


<form method="GET" action="{{ route('visatime') }}" id="filterForm" class="flex gap-2 mb-4">

    {{-- เลือกระดับปริญญา --}}
                    <select name="namelevel_full" id="namelevel_full" class="form-control">
                        <option value="">-- {{ __('major.เลือกระดับปริญญา') }} --</option>

                        <option value="ปริญญาโท" {{ request('namelevel_full') == 'ปริญญาโท' ? 'selected' : '' }}>
                            {{ __('major.ปริญญาโท') }}
                        </option>

                        <option value="ปริญญาเอก" {{ request('namelevel_full') == 'ปริญญาเอก' ? 'selected' : '' }}>
                            {{ __('major.ปริญญาเอก') }}
                        </option>
                    </select>


            {{-- เลือกสาขา --}}
            @php
                $allowedCourses = [
                    "หลักสูตรและการสอน",
                    "นวัตกรรมการบริหารการศึกษา",
                    "การจัดการเทคโนโลยี",
                    "การจัดการระบบสุขภาพ",
                    "นวัตกรรมการจัดการสิ่งแวดล้อม",
                    "รัฐประศาสนศาสตร์",
                    "นวัตกรรมการบริหารปกครอง และการประกอบการเพื่อสังคม",
                    "การจัดการปกครอง",
                    "ทัศนศิลป์และการออกแบบ",
                    "การจัดการธุรกิจ",
                    "สิ่งแวดล้อมศึกษา",
                    "นวัตกรรมเพื่อการพัฒนาที่ยั่งยืน",
                    "การบริหารธุรกิจ",
                ];
            @endphp

                    <select name="detail" id="detail" class="form-control">
                        <option value="">-- @lang('major.select_major') --</option>

                        @foreach($courses as $item)
                            @if(in_array(trim($item->detail), $allowedCourses))
                                <option value="{{ $item->detail }}" {{ request('detail') == $item->detail ? 'selected' : '' }}>
                                    @lang('major.' . $item->detail)
                                </option>
                            @endif
                        @endforeach
                    </select>


    <input type="text" name="id_no" id="id_no" value="{{ request('id_no') }}"
        placeholder="@lang('major.student_id')" class="border p-2 rounded">

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('major.ค้นหา')</button>
</form>

{{-- ✅ ปุ่มดาวน์โหลด --}}
<div class="flex gap-2 mt-2">
    <button id="excelAll" class="bg-green-600 text-white px-4 py-2 rounded">Download Excel</button>
  
</div>

<script>
    // ✅ ปุ่มดาวน์โหลดทั้งหมด
    document.getElementById('excelAll').addEventListener('click', function () {
        const params = new URLSearchParams({
            namelevel_full: document.getElementById('namelevel_full').value,
            detail: document.getElementById('detail').value,
            id_no: document.getElementById('id_no').value
        });
        window.location.href = "{{ route('visatime.exportAll') }}?" + params.toString();
    });


</script>



                <br><br>



                <div class="overflow-x-auto">
                    <table class="min-w-full table-fixed border border-gray-300 text-sm text-gray-700">
                        <thead class="bg-gray-200 text-center">
                            <tr>
                                <th style="width: 7%;" class="border px-3 py-2">@lang('form.รหัส')</th>

                                <th style="width: 10%;" class="border px-3 py-2">@lang('form.ชื่อ_นามสกุล')</th>

                                <th style="width: 5%;" class="border px-3 py-2">@lang('form.เข้าศึกษา')</th>
                                <th style="width: 20%;" class="border px-3 py-2">@lang('form.สาขา')</th>
                               
                                <th style="width: 8%;" class="border px-3 py-2">@lang('form.วันหมดอายุVISA')</th>
                                <th style="width: 5%;" class="border px-3 py-2">@lang('form.เเจ้งเตือน')</th>
                                <th style="width: 5%;" class="border px-3 py-2">@lang('form.หนังสือรับรอง')</th>
                                <th style="width: 10%;" class="border px-3 py-2">@lang('form.จัดการ')</th>
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
                                   
                                    

                                   @php
    $visa_exp_date = $student->dateidcard_end ?? null;
    $text_color = '#000000'; // default ดำ

    if ($visa_exp_date) {
        try {
            // แยกวัน/เดือน/ปีจาก string เช่น 28/05/2576
            [$day, $month, $year] = explode('/', $visa_exp_date);

            // แปลง พ.ศ. → ค.ศ.
            if ((int)$year > 2400) {
                $year = (int)$year - 543;
            }

            // สร้าง Carbon ด้วยฟอร์แมต d/m/Y
            $expiryDate = \Carbon\Carbon::createFromFormat('d/m/Y', "$day/$month/$year");

            $now = \Carbon\Carbon::now();
            $daysLeft = $now->diffInDays($expiryDate, false);

            if ($daysLeft <= 45 && $daysLeft >= 0) {
                $text_color = 'red';
            } elseif ($daysLeft < 0) {
                $text_color = 'gray'; // หมดอายุแล้ว
            } else {
                $text_color = 'green';
            }
        } catch (\Exception $e) {
            $expiryDate = null;
        }
    }
@endphp

<td class="border px-3 py-2" style="color: {{ $text_color }}">
    {{ $visa_exp_date }}
</td>


<td class="border px-3 py-2">
{{-- ปุ่ม Gmail --}}
  {{-- ปุ่ม Gmail (เปิด Gmail Web โดยตรง) --}}
<a href="https://mail.google.com/mail/u/0/?fs=1
         &to={{ $student->email }}
         &su={{ urlencode($subject) }}
         &body={{ urlencode($body) }}
         &tf=cm"
   target="_blank"
   class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-sm">
   Gmail
</a>



</td>

                                   

                                    <td class="border px-3 py-2">
                                        <div class="flex space-x-2">
                                            {{-- ปุ่ม PDF --}}
                                            <a href="{{ route('students.pdf', $student->id_no) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                                PDF
                                            </a>

                                            {{-- ปุ่ม Gmail --}}

                                        </div>
                                    </td>

                                    <td class="border px-3 py-2 space-x-1">

                                        <a href="{{ route('students.edit', $student->id_no) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                            แก้ไข
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