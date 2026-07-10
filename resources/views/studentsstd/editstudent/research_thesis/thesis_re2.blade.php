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

            <div class="bg-white p-6 shadow-md w-3/4 border">

                <h2 class="text-lg font-semibold mb-4">@lang('form.thesis_re2_1')
                    <hr>
                </h2>

                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('student.section.save', ['section' => 'thesis_re2', 'id_no' => $student->id_no]) }}">
                    @csrf

                    <div class="flex items-start space-x-4 mb-6">
                        <!-- Label -->
                        <label class="w-1/4 text-right text-sm font-medium text-gray-700 mt-2">
                            @lang('form.thesis_re2_2')
                        </label>

                        <!-- ฝั่งขวา -->
                        <div class="w-3/4">
                            <!-- select -->
                            <select name="ethics_approval" class="w-full border border-gray-400 rounded p-2 text-sm">
                                <option value="">@lang('form.select')</option>
                                <option value="not_started" {{ ($student->ethics_approval ?? '') == 'not_started' ? 'selected' : '' }}>
                                    @lang('form.ใบรับรองจริยธรรมการวิจัยในมนุษย์')
                                </option>
                                <option value="in_progress" {{ ($student->ethics_approval ?? '') == 'in_progress' ? 'selected' : '' }}>
                                    @lang('form.ใบผ่านการอบรมจริยธรรมการวิจัยในมนุษย์')
                                </option>
                                <option value="not_progress" {{ ($student->ethics_approval ?? '') == 'not_progress' ? 'selected' : '' }}>
                                    @lang('form.ไม่ได้ใช้จริยธรรมวิจัยในมนุษย์')
                                </option>
                            </select>

                            <!-- ปุ่มอัปโหลด -->

                        </div>
                    </div>



                    <div class="flex items-center space-x-4 mb-6">
                        <!-- Label -->
                        <label class="w-1/4 text-right text-sm font-medium text-gray-700">
                            @lang('form.p_research1_3')
                        </label>

                        <div class="w-3/4 flex items-center space-x-3">
                            <!-- ปุ่มอัปโหลด -->
                            <label class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-purple-100 hover:bg-purple-200 
                   text-purple-700 font-medium text-sm rounded-full shadow-sm cursor-pointer transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                @lang('form.thesis_re2_upword')
                                <input type="file" name="thesis_repdf" accept=".doc,.docx,.pdf" class="hidden"
                                    onchange="showFileName(this, 'fileName3')">
                            </label>

                            <!-- ปุ่มเปิดเอกสาร -->
                            @if (!empty($student->thesis_repdf))
                                <a href="{{ asset('storage/documents/' . $student->thesis_repdf) }}" target="_blank"
                                    class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-purple-500 hover:bg-purple-600 
                                               text-white font-medium text-sm rounded-full shadow-sm transition duration-150">

                                    📄 @lang('form.เปิดเอกสาร')
                                </a>
                            @else
                                <span class="text-gray-500 text-sm">@lang('form.ยังไม่มีไฟล์')</span>
                            @endif
                        </div>
                    </div>

                    <!-- ชื่อไฟล์ -->
                    <span id="fileName3" class="text-xs text-gray-600 block mt-1"></span>







                    <script>
                        function showFileName(input, labelId) {
                            const label = document.getElementById(labelId);
                            if (input.files.length > 0) {
                                label.textContent = "📄 " + input.files[0].name;
                            } else {
                                label.textContent = "";
                            }
                        }
                    </script>




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
                                $subject = "อัปเดตข้อมูลใบผ่านการอบรม/ใบผ่านการรับรองจริยธรรมวิจัยในมุนษย์";
                                $fullName = trim(preg_replace('/\s+/', ' ', "{$student->pname} {$student->name} {$student->lname}")); // ✅ รวมชื่อให้เหลือช่องว่างเดียว

                                $body = " {$fullName}\n\n รหัสนักศึกษา {$student->id_no}"
                                    . " ได้มีการอัปเดทข้อมูลใบผ่านการอบรม/ใบผ่านการรับรองจริยธรรมวิจัยในมุนษย์ "
                                    . "กรุณาเข้าสู่ระบบ E-Graduate เพื่อดำเนินการตรวจสอบข้อมูลเพิ่มเติมได้ที่ลิงก์ด้านล่าง\n\n"
                                    . "https://egrad.vru.ac.th/section/thesis_re2/{$student->id_no}\n\n"
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
    </div>

    <!-- 🧠 เพิ่มตรงนี้ไว้ใน <script> -->


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