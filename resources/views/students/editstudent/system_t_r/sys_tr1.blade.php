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

                <h2 class="text-lg font-semibold mb-4">@lang('form.sys_tr1_1')
                    <hr>
                </h2>
                <form method="POST"
                    action="{{ route('student.section.save', ['section' => 'sys_tr1', 'id_no' => $student->id_no]) }}">
                    @csrf


                    <div class="flex items-center space-x-4 mb-4">
                        <!-- รอบที่ 1 -->
                        <div class="text-sm text-gray-700 w-1/12 text-right">@lang('form.sys_tr1_2')</div>

                        <!-- @lang('form.sys_tr1_7') -->
                        <div class="flex items-center space-x-2 w-5/12">
                            <div class="text-sm text-gray-700 whitespace-nowrap">@lang('form.sys_tr1_7')</div>
                            <input type="date" name="sysfr1" value="{{ old('approval_date', $student->sysfr1 ?? '') }}"
                                class="w-full p-2 text-sm bg-gray-50 focus:outline-none">
                        </div>

                        <!-- วันที่รับคืน -->
                        <div class="flex items-center space-x-2 w-5/12">
                            <div class="text-sm text-gray-700 whitespace-nowrap">@lang('form.sys_tr1_6')</div>
                            <input type="date" name="sysfr1_1"
                                value="{{ old('approval_date', $student->sysfr1_1 ?? '') }}"
                                class="w-full p-2 text-sm bg-gray-50 focus:outline-none">
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 mb-4">
                        <!-- รอบที่ 2 -->
                        <div class="text-sm text-gray-700 w-1/12 text-right">@lang('form.sys_tr1_3')</div>

                        <!-- @lang('form.sys_tr1_7') -->
                        <div class="flex items-center space-x-2 w-5/12">
                            <div class="text-sm text-gray-700 whitespace-nowrap">@lang('form.sys_tr1_7')</div>
                            <input type="date" name="sysfr2" value="{{ old('approval_date', $student->sysfr2 ?? '') }}"
                                class="w-full p-2 text-sm bg-gray-50 focus:outline-none">
                        </div>

                        <!-- วันที่รับคืน -->
                        <div class="flex items-center space-x-2 w-5/12">
                            <div class="text-sm text-gray-700 whitespace-nowrap">@lang('form.sys_tr1_6')</div>
                            <input type="date" name="sysfr2_2"
                                value="{{ old('approval_date', $student->sysfr2_2 ?? '') }}"
                                class="w-full p-2 text-sm bg-gray-50 focus:outline-none">
                        </div>
                    </div>


                    <div class="flex items-center space-x-4 mb-4">
                        <!-- รอบที่ 3 -->
                        <div class="text-sm text-gray-700 w-1/12 text-right">@lang('form.sys_tr1_4')</div>

                        <!-- @lang('form.sys_tr1_7') -->
                        <div class="flex items-center space-x-2 w-5/12">
                            <div class="text-sm text-gray-700 whitespace-nowrap">@lang('form.sys_tr1_7')</div>
                            <input type="date" name="sysfr3" value="{{ old('approval_date', $student->sysfr3 ?? '') }}"
                                class="w-full p-2 text-sm bg-gray-50 focus:outline-none">
                        </div>

                        <!-- วันที่รับคืน -->
                        <div class="flex items-center space-x-2 w-5/12">
                            <div class="text-sm text-gray-700 whitespace-nowrap">@lang('form.sys_tr1_6')</div>
                            <input type="date" name="sysfr3_3"
                                value="{{ old('approval_date', $student->sysfr3_3 ?? '') }}"
                                class="w-full p-2 text-sm bg-gray-50 focus:outline-none">
                        </div>
                    </div>


                    <div class="flex items-center space-x-4 mb-4">
                        <!-- รอบที่ 4 -->
                        <div class="text-sm text-gray-700 w-1/12 text-right">@lang('form.sys_tr1_5')</div>

                        <!-- @lang('form.sys_tr1_7') -->
                        <div class="flex items-center space-x-2 w-5/12">
                            <div class="text-sm text-gray-700 whitespace-nowrap">@lang('form.sys_tr1_7')</div>
                            <input type="date" name="sysfr4" value="{{ old('approval_date', $student->sysfr4 ?? '') }}"
                                class="w-full p-2 text-sm bg-gray-50 focus:outline-none">
                        </div>

                        <!-- วันที่รับคืน -->
                        <div class="flex items-center space-x-2 w-5/12">
                            <div class="text-sm text-gray-700 whitespace-nowrap">@lang('form.sys_tr1_6')</div>
                            <input type="date" name="sysfr4_4"
                                value="{{ old('approval_date', $student->sysfr4_4 ?? '') }}"
                                class="w-full p-2 text-sm bg-gray-50 focus:outline-none">
                        </div>
                    </div>


                    <div class="flex flex-col items-center justify-center text-center space-y-2 mt-4">


                         <!-- ปุ่มลิงก์ -->
                        <a href="{{ asset('pdfs/m_w_r_b/form_9.pdf') }}" target="_blank"
                            class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white font-medium px-4 py-2 rounded shadow">
                            <!-- ไอคอน -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6l5 5v14a2 2 0 0 1-2 2z" />
                            </svg>
                            @lang('form.ดาวน์โหลด')
                        </a>

                        <!-- คำอธิบาย -->
                        <p class="text-gray-600 text-sm max-w-md">
                            @lang('form.form9') @lang('form.form9_1')
                        </p>
                    </div>


                    <!-- ช่องที่ 2 + ป้ายท้าย -->

                    <br>
                    <hr>
                    <div class="flex justify-center mt-8 space-x-4">
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700">
                            @lang('form.บันทึก')
                        </button>

                        <button type="reset" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                            @lang('form.รีเซ็ต')
                        </button>

                                                             @php
    $subject = "อัปเดตข้อมูลระบบการตรวจรูปแบบการพิมพ์วิทยานิพนธ์/การค้นคว้าอิสระ (มรว.บ. 9)";
    $fullName = trim(preg_replace('/\s+/', ' ', "{$student->pname} {$student->name} {$student->lname}")); // ✅ รวมชื่อให้เหลือช่องว่างเดียว

    $body = "เรียนคุณ {$fullName}\n\n"
          . "ได้มีการอัปเดทข้อมูลระบบการตรวจรูปแบบการพิมพ์วิทยานิพนธ์/การค้นคว้าอิสระ (มรว.บ. 9)"
          . "กรุณาเข้าสู่ระบบ E-Graduate เพื่อดำเนินการตรวจสอบข้อมูลเพิ่มเติมได้ที่ลิงก์ด้านล่าง\n\n"
          . "https://egrad.vru.ac.th/gradstd/login\n\n" 
          . "---------------------------------------------\n\n"
. "Dear {$fullName}\n\n"
. "Thesis/Independent Study (IS) Format Checking System (MRW.B. 9)"
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