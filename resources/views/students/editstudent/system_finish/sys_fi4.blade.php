<!DOCTYPE html>
<html>

<head>
    <title>E - Graduate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <meta name="robots" content="noindex, nofollow">


</head>

<body class="bg-gray-100 min-h-screen fc-font">


    <div class="flex min-h-screen">

        <!-- Sidebar -->
        @include('layouts.menuleft3')
        @include('layouts.menutop')


        <div class="p-8">
            <!-- กล่องใหม่ พื้นหลังขาว -->
            <!-- กล่องกลางจอ -->

            <div class="bg-white p-6 shadow-md w-3/4 border">

                <h2 class="text-lg font-semibold mb-4">@lang('form.sys_fi4_1')
                    <hr>
                </h2>
                 <form method="POST"
                    action="{{ route('student.section.save', ['section' => 'sys_fi4', 'id_no' => $student->id_no]) }}">
                    @csrf

                    <div class="flex items-center space-x-4 mb-6">
                        <!-- Label -->
                        <label class="w-1/4 text-right text-sm font-medium text-gray-700">
                            @lang('form.status')
                        </label>

                        <!-- ฝั่งขวา -->
                              <div class="w-3/4 flex space-x-2 items-center">
                            <div class="w-full"> <!-- ✅ แก้ตรงนี้: ให้ขยายเต็ม -->
                                <div
                                    class="flex items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                    <!-- ไอคอน -->

                                    <!-- Select -->
                                <select name="sys_fi4" class="text-sm form-select">
                                        <option value="">@lang('form.select')</option>
                                     
                                        <option value="in_progress" {{ ($student->sys_fi4 ?? '') == 'in_progress' ? 'selected' : '' }}>
                                            @lang('form.อยู่ในระหว่างดำเนินการ')
                                        </option>
                                        <option value="in_progress2" {{ ($student->sys_fi4 ?? '') == 'in_progress2' ? 'selected' : '' }}>
                                            @lang('form.ดำเนินการเรียบร้อยแล้ว')
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- ครั้งที่ + ณ วันที่ (จัดหน้าแบบเดียวกับด้านบน) -->
                    <div class="flex items-center space-x-4 mb-6">
                        <!-- Label -->
                        <label class="w-1/4 text-right text-sm font-medium text-gray-700">
                           @lang('form.sys_fi4_2')
                        </label>

                        <!-- ฝั่งขวา -->
                        <div class="w-3/4 flex space-x-4 items-center">

                            <!-- ช่องครั้งที่ -->
                            <div class="w-1/3">
                                <input type="text" name="sys_fi4_time"
                                    class="w-full border border-gray-500 p-2 text-sm rounded-md bg-gray-50 shadow-sm"
                                    placeholder="ครั้งที่" value="{{ $student->sys_fi4_time ?? '' }}">
                            </div>
                           

                            <!-- ช่องวันที่ -->
                            <div class="w-2/3">
                               <input type="date" name="sys_fi4_date"
                                    value="{{ old('sys_fi4_date', $student->sys_fi4_date ?? '') }}"
                                    class="w-full border border-gray-500 p-2 text-sm rounded-md bg-gray-50 shadow-sm">
                            </div>

                        </div>
                    </div>





                    <!-- ช่องที่ 2 + ป้ายท้าย -->

                    <br>
                    <hr>
                    <div class="flex items-center space-x-4 md-4 mt-8">
                        <!-- ช่องซ้าย (เว้นที่ให้ตรงกับ label 1/4) -->
                        <div class="w-1/4"></div>

                        <!-- ช่องขวา (ที่วางปุ่ม 3/4) -->
                        <div class="w-3/4 flex space-x-2">
                         <button type="submit"
                                class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                                @lang('form.บันทึก')

                            </button>
                            <button type="reset" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                @lang('form.รีเซ็ต')
                            </button> 
                            @php
                                $subject = "อัปเดทข้อมูลระบบการเสนอขอจบการศึกษา / คณะกรรมการสภามหาวิทยาลัย";
                                $fullName = trim(preg_replace('/\s+/', ' ', "{$student->pname} {$student->name} {$student->lname}")); // ✅ รวมชื่อให้เหลือช่องว่างเดียว

                                $body = "เรียนคุณ {$fullName}\n\n"
                                    . "ได้มีการอัปเดทระบบการเสนอขอจบการศึกษา / คณะกรรมการสภามหาวิทยาลัย"
                                    . "กรุณาเข้าสู่ระบบ E-Graduate เพื่อดำเนินการตรวจสอบข้อมูลเพิ่มเติมได้ที่ลิงก์ด้านล่าง\n\n"
                                    . "https://egrad.vru.ac.th/gradstd/login\n\n"
                                    . "---------------------------------------------\n\n"
                                    . "Dear {$fullName}\n\n"
                                    . "The information regarding the Graduation Submission System / University Council Committee has been updated."
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
                        </div>
                    </div>



                </form>

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