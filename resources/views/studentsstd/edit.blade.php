<!DOCTYPE html>
<html>

<head>
    <title>Student Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="robots" content="noindex, nofollow">

</head>

<body class="bg-gray-100 min-h-screen fc-font   ">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(isset($notification))
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                // ดึงค่าข้อความจาก Controller มาใส่ตัวแปร JS
                // ใช้เครื่องหมาย Backtick ( ` ) ครอบเพื่อรองรับข้อความยาวๆ หรือมีการเว้นบรรทัด
                let msgMoney = `{{ $notification->warn_money ?? '' }}`;
                let msgReg = `{{ $notification->warn_reg ?? '' }}`;
                let htmlContent = "";

                // เช็คว่ามีข้อความ "เรื่องเงิน" ไหม?
                if (msgMoney && msgMoney.trim() !== "") {
                    htmlContent += `
                            <div style="text-align: left; margin-bottom: 15px; background: #fee2e2; padding: 10px; border-radius: 8px;">
                                <strong style="color: #dc2626; font-size: 1.1em;">💰 แจ้งเตือนชำระเงิน:</strong><br>
                                <span style="color: #333;">${msgMoney}</span>
                            </div>
                        `;
                }

                // เช็คว่ามีข้อความ "เรื่องลงทะเบียน" ไหม?
                if (msgReg && msgReg.trim() !== "") {
                    htmlContent += `
                            <div style="text-align: left; margin-bottom: 5px; background: #e0f2fe; padding: 10px; border-radius: 8px;">
                                <strong style="color: #0284c7; font-size: 1.1em;">📝 แจ้งเตือนลงทะเบียน:</strong><br>
                                <span style="color: #333;">${msgReg}</span>
                            </div>
                        `;
                }

                // ถ้ามีข้อความอย่างใดอย่างหนึ่ง ให้เด้ง Popup!
                if (htmlContent !== "") {
                    Swal.fire({
                        title: '🔔 แจ้งเตือนนักศึกษา', // หัวข้อ Popup
                        html: htmlContent,                // เนื้อหาที่เราประกอบร่างข้างบน
                        icon: 'info',                     // ไอคอน (info, warning, error, success)
                        confirmButtonText: 'รับทราบ',
                        confirmButtonColor: '#10B981',    // สีปุ่ม (สีเขียวเข้ากับธีมหน้าเว็บ)
                        width: '500px'
                    });
                }
            });
        </script>
    @endif

</body>

</html>


<div class="flex min-h-screen">

    <!-- Sidebar -->
    @include('layoutsstd.menuleft3')
    @include('layoutsstd.menutop')


    <div class="p-8">
        <!-- กล่องใหม่ พื้นหลังขาว -->

        <div class="flex min-h-screen">
            <!-- ฝั่งซ้าย: รายการแบบฟอร์ม -->
            <div class="w-1/3 p-6 bg-white border-r">
                <h2 class="text-lg font-semibold mb-4">@lang('form.form')</h2>

                <ul class="relative border-l-4 border-green-500 pl-4 space-y-6 pl-6">
                    <!-- มรจ.บ. 1 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_1.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form1')</strong><br>
                            @lang('form.form1_1')
                        </a>
                    </li>

                    <!-- มรจ.บ. 2 -->
                    <li class="relative border-b border-green-200 ">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_2.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form2')</strong><br>
                            @lang('form.form2_1')
                        </a>
                    </li>

                    <!-- มรจ.บ. 3 -->
                    <li class="relative border-b border-green-200 ">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_3.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form3')</strong><br>
                            @lang('form.form3_1')
                        </a>
                    </li>

                    <!-- มรจ.บ. 4 -->
                    <li class="relative border-b border-green-200 ">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_4.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form4')</strong><br>
                            @lang('form.form4_0')
                        </a>
                    </li>

                    <!-- มรจ.บ. 4/1 -->
                    <li class="relative border-b border-green-200 ">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_4-1.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form4/1')</strong><br>
                            @lang('form.form4_1')
                        </a>
                    </li>

                    <!-- มรจ.บ. 4/2 -->
                    <li class="relative border-b border-green-200 ">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_4-2.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form4/2')</strong><br>
                            @lang('form.form4_2')
                        </a>
                    </li>

                    <!-- มรจ.บ. 4/3 -->
                    <li class="relative border-b border-green-200 ">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_4-3.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form4/3')</strong><br>
                            @lang('form.form4_3')
                        </a>
                    </li>

                    <!-- มรจ.บ. 5 -->
                    <li class="relative border-b border-green-200 ">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_4-3.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form5')</strong><br>
                            @lang('form.form5_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 6 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_6.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form6')</strong><br>
                            @lang('form.form6_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 7 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_7.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form7')</strong><br>
                            @lang('form.form7_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 8 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_8.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form8')</strong><br>
                            @lang('form.form8_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 8/1 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_8-1.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form8/1')</strong><br>
                            @lang('form.form8_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 8/2 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_8-2.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form8/1')</strong><br>
                            @lang('form.form8_2')
                        </a>
                    </li>

                    <!-- มรว.บ. 8/3 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_8-3.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form8/3')</strong><br>
                            @lang('form.form8_3')
                        </a>
                    </li>

                    <!-- มรว.บ. 9 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_9.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form9')</strong><br>
                            @lang('form.form9_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 10 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_10.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form10')</strong><br>
                            @lang('form.form10_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 10/1 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_10-1.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form10/1')</strong><br>
                            @lang('form.form10_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 11 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_11.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form11')</strong><br>
                            @lang('form.form11_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 12 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_12.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form12')</strong><br>
                            @lang('form.form12_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 13 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_13.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form13')</strong><br>
                            @lang('form.form13_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 14 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_14.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form14')</strong><br>
                            @lang('form.form14_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 15 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_15.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form15')</strong><br>
                            @lang('form.form15_1')
                        </a>
                    </li>

                    <!-- มรว.บ. 16 -->
                    <li class="relative border-b border-green-200">
                        <div class="absolute -left-2 top-1 w-3 h-3 bg-green-500 rounded-full -left-[15px]"></div>
                        <a href="{{ asset('pdfs/m_w_r_b/form_16.pdf') }}" target="_blank"
                            class="block text-green-700 hover:underline">
                            <strong>@lang('form.form16')</strong><br>
                            @lang('form.form16_1')
                        </a>
                    </li>

                </ul>
            </div>

            <!-- ฝั่งขวา: ฟอร์มกรอกข้อมูลนักศึกษา -->
            <div class="w-2/3 p-8 bg-white">
                <form action="{{ route('students.update', $student->id_no) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <h2 class="text-xl font-bold mb-4">@lang('form.ข้อมูลนักศึกษา')</h2>
                    <h2 class="mb-4">

                    </h2>

                    {{-- 1 --}}
                    <form method="POST" action="{{ route('apply.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">@lang('form.academic_year') </label>
                                <input type="text" name="term" value="{{ $student->term }}"
                                    class="w-full border px-3 py-2 mb-4" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">@lang('form.หลักสูตร')</label>
                                <input type="text" name="detail" value="{{ $student->detail }}"
                                    class="w-full border px-3 py-2 mb-4" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">@lang('form.ปริญญา')</label>
                                <input type="text" name="id_no" value="{{ $student->namelevel_full }}"
                                    class="w-full border px-3 py-2 mb-4" required>
                            </div>
                        </div>
                        {{-- 1รวม--}}

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">@lang('form.รหัสนักศึกษา')</label>
                                <input type="text" name="id_no" value="{{ $student->id_no }}"
                                    class="w-full border px-3 py-2 mb-4" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">@lang('form.สถานะ')</label>
                                <input type="text" name="status_name" value="{{ $student->status_name }}"
                                    class="w-full border px-3 py-2 mb-4" required>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <h5 class="mt-4">@lang('form.description_2')
                            <small class="text-danger" style="font-size: 0.8rem;">
                                (For international students: If unsure, please enter "Foreigner")
                            </small>
                        </h5>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">@lang('form.prefix') </label>
                                <input name="prefix" type="text" value="{{ $student->pname}}"
                                    class="w-full border px-3 py-2 mb-4">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">@lang('form.first_name') </label>
                                <input name="name_na" type="text" value="{{ $student->name }}"
                                    class="w-full border px-3 py-2 mb-4">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">@lang('form.last_name') </label>
                                <input name="surname_su" type="text" value="{{ $student->lname }}"
                                    class="w-full border px-3 py-2 mb-4">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">@lang('form.passport_number') </label>
                                <input name="idcard" type="text" value="{{ $student->idcard }}"
                                    class="w-full border px-3 py-2 mb-4">
                            </div>
                        </div>













                        {{-- 4 --}}
                        <div class="row row-cols-1 row-cols-md-3 g-3 mb-3">
                            <div class="col">
                                <label class="form-label">@lang('form.address') </label>
                                <input name="address" type="text" class="form-control" required
                                    value="{{ old('address', $student->homeadd) }}">
                            </div>

                            <div class="col">
                                <label class="form-label">@lang('form.เบอร์โทร')</label>
                                <input name="tel" type="text" class="form-control" required
                                    value="{{ old('tel', $student->tel) }}">
                            </div>

                            <div class="col">
                                <label class="form-label">@lang('form.mail') </label>
                                <input name="email" type="email" class="form-control" required
                                    value="{{ old('email', $student->email) }}">
                            </div>

                        </div>


                        {{-- 5 --}}

                        <div class="row row-cols-1 row-cols-md-4 g-3 mb-3">





                        </div>



                        <h5 class="mt-2 text-base font-semibold">
                            @lang('form.description_4')
                            <small class="text-danger" style="font-size: 0.8rem;">
                                @lang('form.description_4_1')
                            </small>
                        </h5>
                        <div class="row mb-3">

                            <div class="col-md-3">
                                <label class="form-label">@lang('form.pass_s_d') </label>
                                <input name="dateidcard_start" type="text" value="{{ $student->dateidcard_start }}"
                                    class="w-full border px-3 py-2 mb-4">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">@lang('form.pass_e_d') </label>
                                <input name="dateidcard_end" type="text" value="{{ $student->dateidcard_end}}"
                                    class="w-full border px-3 py-2 mb-4">
                            </div>
                        </div>




                        {{-- 6 --}}




                    </form>
            </div>
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