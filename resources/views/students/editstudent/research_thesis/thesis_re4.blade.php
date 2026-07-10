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

                <h2 class="text-lg font-semibold mb-4">@lang('form.thesis_re4_1')
                    <hr>
                </h2>
                <form method="POST"
                    action="{{ route('student.section.save', ['section' => 'thesis_re4', 'id_no' => $student->id_no]) }}">
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
                                      <select name="data_collection" class="text-sm form-select">
                                        <option value="">@lang('form.select')</option>
                                    
                                        <option value="in_progress" {{ ($student->data_collection ?? '') == 'in_progress' ? 'selected' : '' }}>
                                            @lang('form.อยู่ในระหว่างดำเนินการ')
                                        </option>
                                        <option value="in_progress2" {{ ($student->data_collection ?? '') == 'in_progress2' ? 'selected' : '' }}>
                                            @lang('form.ดำเนินการเรียบร้อยแล้ว')
                                        </option>

                                        <option value="not_progress" {{ ($student->data_collection ?? '') == 'not_progress' ? 'selected' : '' }}>
                                            @lang('form.ไม่ต้องเก็บข้อมูล')
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-6">
                        <!-- Label -->
                        <label class="w-1/4 text-right text-sm font-medium text-gray-700 pt-2">
                            @lang('form.form7')
                        </label>

                        <!-- ปุ่ม + คำอธิบาย -->
                        <div class="w-3/4">
                            <!-- ปุ่มดูเอกสาร -->
                            <a href="{{ asset('pdfs/m_w_r_b/form_7.pdf') }}" target="_blank"
                                class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white font-medium px-4 py-2 rounded shadow mb-2">
                                <!-- ไอคอน -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6l5 5v14a2 2 0 0 1-2 2z" />
                                </svg>
                                @lang('form.ดาวน์โหลด')
                            </a>

                            <!-- คำอธิบาย -->
                            <p class="text-sm text-gray-600">
                                @lang('form.form7_1')
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-6">
                        <!-- Label -->
                        <label class="w-1/4 text-right text-sm font-medium text-gray-700 pt-2">
                            @lang('form.form14')
                        </label>

                        <!-- ปุ่ม + คำอธิบาย -->
                        <div class="w-3/4">
                            <!-- ปุ่มดูเอกสาร -->
                            <a href="{{ asset('pdfs/m_w_r_b/form_14.pdf') }}" target="_blank"
                                class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white font-medium px-4 py-2 rounded shadow mb-2">
                                <!-- ไอคอน -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6l5 5v14a2 2 0 0 1-2 2z" />
                                </svg>
                                @lang('form.ดาวน์โหลด')
                            </a>

                            <!-- คำอธิบาย -->
                            <p class="text-sm text-gray-600">
                                 @lang('form.form14_1')
                            </p>
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
                                $subject = "อัปเดทข้อมูลการเก็บข้อมูล";
                                $fullName = trim(preg_replace('/\s+/', ' ', "{$student->pname} {$student->name} {$student->lname}")); // ✅ รวมชื่อให้เหลือช่องว่างเดียว

                                $body = "เรียนคุณ {$fullName}\n\n"
                                    . "ได้มีการอัปเดทข้อมูลการเก็บข้อมูล"
                                    . "กรุณาเข้าสู่ระบบ E-Graduate เพื่อดำเนินการตรวจสอบข้อมูลเพิ่มเติมได้ที่ลิงก์ด้านล่าง\n\n"
                                    . "https://egrad.vru.ac.th/gradstd/login\n\n"
                                    . "---------------------------------------------\n\n"
                                    . "Dear {$fullName}\n\n"
                                    . "The data collection information has been updated."
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