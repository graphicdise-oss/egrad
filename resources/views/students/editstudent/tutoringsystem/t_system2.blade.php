<!DOCTYPE html>
<html>

<head>
    <title>E - Graduate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 <meta name="robots" content="noindex, nofollow">

</head>

<body class="bg-gray-100 min-h-screen fc-font">


    <div class="flex min-h-screen">

        <!-- Sidebar -->
        @include('layouts.menuleft3')
        @include('layouts.menutop')


        <div class="p-8">
            <!-- กล่องใหม่ พื้นหลังขาว -->

            <div class="flex min-h-screen">
                <!-- ฝั่งซ้าย -->
                <div class="w-1/2 bg-white p-6 border-r">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold">@lang('form.t_system2_1')</h2>
                        <a href="https://gradtest.vru.ac.th/%e0%b8%9b%e0%b8%8f%e0%b8%b4%e0%b8%97%e0%b8%b4%e0%b8%99%e0%b8%a7%e0%b8%b4%e0%b8%8a%e0%b8%b2%e0%b8%81%e0%b8%b2%e0%b8%a3/"
                            target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center gap-2">
                            <i class="fa-solid fa-calendar-days text-xl"></i>
                            ปฏิทินวิชาการ
                        </a>
                    </div>
                    <form method="POST"
                        action="{{ route('student.section.save', ['section' => 't_system2', 'id_no' => $student->id_no]) }}">
                        @csrf

                        <div class="flex items-center gap-2 mb-4">
                            <label for="status" class="text-sm  shrink-0">@lang('form.status')</label>
                            <select name="comp_exam_status2" id="status" class="form-select">
                                <option value="">@lang('form.กรุณาเลือกข้อมูล')</option>
                                <option value="Y" {{ ($student->comp_exam_status2 ?? '') === 'Y' ? 'selected' : '' }}>
                                    @lang('form.ผ่าน')
                                </option>
                                <option value="N" {{ ($student->comp_exam_status2 ?? '') === 'N' ? 'selected' : '' }}>
                                    @lang('form.ไม่ผ่าน')
                                </option>
                            </select>
                        </div>
                        <hr>
                        <br>
                        <button type="submit" class="btn btn-success me-2">@lang('form.บันทึก')</button>
                        <button type="reset" class="btn btn-primary">@lang('form.รีเซ็ต')</button>

                         @php
    $subject = "อัปเดทข้อมูลการสอบวัดคุณสมบัติ";
    $fullName = trim(preg_replace('/\s+/', ' ', "{$student->pname} {$student->name} {$student->lname}")); // ✅ รวมชื่อให้เหลือช่องว่างเดียว

    $body = "เรียนคุณ {$fullName}\n\n"
          . "ได้มีการอัปเดทข้อมูลการสอบวัดคุณสมบัติรู้"
          . "กรุณาเข้าสู่ระบบ E-Graduate เพื่อดำเนินการตรวจสอบข้อมูลเพิ่มเติมได้ที่ลิงก์ด้านล่าง\n\n"
          . "https://egrad.vru.ac.th/gradstd/login\n\n" 
          . "---------------------------------------------\n\n"
. "Dear {$fullName}\n\n"
. "Qualifying Examination"
. "has been updated. Please log in to the E-Graduate system to review the updated information at the link below.\n\n"
. "https://egrad.vru.ac.th/gradstd/login\n\n";
@endphp
         


                            <a href="https://mail.google.com/mail/u/0/?fs=1
        &to={{ $student->email }}
        &su={{ urlencode($subject) }}
        &body={{ urlencode($body) }}
        &tf=cm" target="_blank" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-md transition">
                                ✉️ แจ้งเตือนอีเมล
                            </a>
                    </form>
                </div>

                <!-- ฝั่งขวา -->
               


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