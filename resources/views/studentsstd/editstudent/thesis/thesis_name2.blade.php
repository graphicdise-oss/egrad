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
        @include('layoutsstd.menuleft3')
        @include('layoutsstd.menutop')


        <div class="p-8">
            <!-- กล่องใหม่ พื้นหลังขาว -->
            <!-- กล่องกลางจอ -->

            <div class="bg-white p-6 shadow-md w-4/5 border">

                <h2 class="text-lg font-semibold mb-4">@lang('form.thesis_name2_1')
                    <hr>
                </h2>

                <form method="POST"
                    action="{{ route('studentstd.section.save', ['section' => 'thesis_name1', 'id_no' => $student->id_no]) }}">
                    @csrf

                    <div class="flex space-x-4 mb-2">
                        <!-- ช่องกรอกประเภทข้อมูล -->
                        <div class="w-1/2">
                            <div
                                class="flex items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <div class="flex items-center justify-center px-3 border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                    </svg>
                                </div>
                                <input type="text" class="flex-1 p-2 text-sm bg-gray-50 focus:outline-none" name="name"
                                    value="{{ $student->name ?? '' }}" readonly>

                            </div>
                        </div>

                        <!-- 2 -->
                        <div class="w-1/2">
                            <div
                                class="flex items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <div class="flex items-center justify-center px-3 border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                    </svg>

                                </div>
                                <input type="text" class="flex-1 p-2 text-sm bg-gray-50 focus:outline-none" name="lname"
                                    value="{{ $student->lname ?? '' }}" readonly>
                            </div>
                        </div>
                    </div>


                    <div class="flex items-center space-x-4 mb-2">
                        <!-- Label ด้านหน้า -->
                        <label for="group_name" class="w-1/4 text-right text-sm font-medium text-gray-700">
                            @lang('form.thesis_name1_2')
                        </label>
                        <!-- ช่องกรอกด้านขวา -->
                        <div class="w-3/4">
                            <div
                                class="flex items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <!-- input -->
                                <input type="text" name="id_no" class="flex-1 p-2 text-sm bg-gray-50 focus:outline-none"
                                    value="{{ $student->id_no ?? '' }}" readonly>
                            </div>
                        </div>
                    </div>


                    <div class="flex items-center space-x-4 mb-2">
                        <!-- Label ด้านหน้า -->
                        <label for="group_name" class="w-1/4 text-right text-sm font-medium text-gray-700">
                            @lang('form.thesis_name1_3')
                        </label>
                        <!-- ช่องกรอกด้านขวา -->
                        <div class="w-3/4">
                            <div
                                class="flex items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <!-- input -->

                                <input type="text" class="flex-1 p-2 text-sm bg-gray-50 focus:outline-none"
                                    name="detail"
                                    value="{{ trim($student->namelevel_full ?? '') . trim($student->detail ?? '') }}"
                                    readonly>



                            </div>
                        </div>

                    </div>




                    <div class="flex items-center space-x-4 mb-2">
                        <!-- Label ด้านหน้า -->
                        <label for="group_name" class="w-1/4 text-right text-sm font-medium text-gray-700">
                            @lang('form.thesis_name1_4')
                        </label>
                        <!-- ช่องกรอกด้านขวา -->
                        <div class="w-3/4">
                            <div class="flex border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <!-- textarea -->
                                <textarea id="thesis_title_en" name="thesis_title_en2" rows="2"
                                    class="w-full p-3 text-sm bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-green-200 resize-none text-gray-900">{{ old('thesis_title_en2', trim($student->thesis_title_en2 ?? '')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 mb-2">
                        <!-- Label ด้านหน้า -->
                        <label for="group_name" class="w-1/4 text-right text-sm font-medium text-gray-700">
                            @lang('form.thesis_name1_5')
                        </label>
                        <!-- ช่องกรอกด้านขวา -->
                        <div class="w-3/4">
                            <div class="flex border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <!-- textarea -->
                                <textarea id="thesis_title_th" name="thesis_title_th2" rows="2"
                                    class="w-full p-3 text-sm bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-green-200 resize-none text-gray-900">{{ old('thesis_title_th2', trim($student->thesis_title_th2 ?? '')) }}</textarea>
                            </div>
                        </div>
                    </div>




                    <div class="flex items-center space-x-4 mb-2">
                        <!-- Label ซ้าย -->
                        <label class="w-1/4 text-right text-sm font-medium text-gray-700">
                            @lang('form.thesis_name2_2')
                        </label>

                        <!-- กล่องขวา: input 2 ช่อง -->
                        <div class="w-3/4 flex space-x-2 items-center">
                            <!-- ช่องที่ 1 -->
                            <div class="w-1/2">
                                <div class="flex items-center  rounded-md shadow-sm overflow-hidden bg-gray-50">

                                    <input type="text" name="committee_meeting_round" class="form-control"
                                        value="{{ $student->committee_meeting_round ?? '' }}">


                                </div>
                            </div>

                            <!-- ช่องที่ 2 + ป้ายท้าย -->
                            <div class="w-1/2">
                                <div
                                    class="flex justify-between items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50 px-2">
                                    <!-- input date -->
                                    <div class="flex items-center flex-1">
                                        <input type="date" name="committee_meeting_date"
                                            value="{{ old('committee_meeting_date', $student->committee_meeting_date ?? '') }}"
                                            class="w-full p-2 text-sm bg-gray-50 focus:outline-none">
                                    </div>
                                    <!-- (ถ้ามีป้ายท้ายค่อยใส่) -->
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="flex items-center space-x-4 mb-2">
                        <!-- Label ด้านหน้า -->
                        <label for="group_name" class="w-1/4 text-right text-sm font-medium text-gray-700">
                            @lang('form.thesis_name2_3')
                        </label>
                        <!-- ช่องกรอกด้านขวา -->
                        <div class="w-1/4">
                            <div
                                class="flex items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <!-- input -->
                                <input type="date" name="approval_date"
                                    value="{{ old('approval_date', $student->approval_date ?? '') }}"
                                    class="w-full p-2 text-sm bg-gray-50 focus:outline-none">
                            </div>
                        </div>
                    </div>



                    <br><br>
                    <hr>
                    <div class="flex items-center space-x-4 mt-8">
                        <!-- ช่องซ้าย (เว้นที่ให้ตรงกับ label 1/4) -->
                        <div class="w-1/4"></div>

                        <!-- ช่องขวา (ที่วางปุ่ม 3/4) -->
                        <div class="w-3/4 flex space-x-2">
                            <button type="submit"
                                class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                                @lang('form.บันทึก')
                            </button>

                            <!-- ปุ่มรีเซ็ต -->
                            <button type="reset" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                               @lang('form.รีเซ็ต')
                            </button>

                            @php
                                $subject = "อัปเดตข้อมูลการเสนอขออนุมัติเค้าโครงวิทยานิพนธ์/การค้นคว้าอิสระ";
                                $fullName = trim(preg_replace('/\s+/', ' ', "{$student->pname} {$student->name} {$student->lname}")); // ✅ รวมชื่อให้เหลือช่องว่างเดียว

                                $body = " {$fullName}\n\n รหัสนักศึกษา {$student->id_no}"
                                    . " ได้มีการอัปเดทข้อมูลการเสนอขออนุมัติเค้าโครงวิทยานิพนธ์/การค้นคว้าอิสระ "
                                    . "กรุณาเข้าสู่ระบบ E-Graduate เพื่อดำเนินการตรวจสอบข้อมูลเพิ่มเติมได้ที่ลิงก์ด้านล่าง\n\n"
                                    . "https://egrad.vru.ac.th/section/thesis_name2/{$student->id_no}\n\n"
                                    . "---------------------------------------------\n\n";

                            @endphp



                            <a href="https://mail.google.com/mail/u/0/?fs=1
        &to=graduate@vru.ac.th
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