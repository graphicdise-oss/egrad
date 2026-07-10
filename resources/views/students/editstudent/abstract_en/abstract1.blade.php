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

                <h2 class="text-lg font-semibold mb-4">@lang('form.abstract1_1')
                    <hr>
                </h2>

                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('student.section.save', ['section' => 'thesis_re2', 'id_no' => $student->id_no]) }}">
                    @csrf

  <div class="max-w-3xl mx-auto space-y-6 text-[15px]">

    <!-- 🔹 มรว.บ.10 -->
    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
        <div class="flex justify-between items-center mb-2">
            <h3 class="font-semibold text-gray-800">
                📘 @lang('form.mwrb10')
            </h3>
            <a href="{{ asset('pdfs/m_w_r_b/form_10.pdf') }}" target="_blank"
                class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium">
                ดาวน์โหลด
            </a>
        </div>
        <p class="text-gray-600 text-sm mb-3">
            @lang('form.thesis_re2_3admin')<br>
            <span class="text-pink-600">*</span>
             @lang('form.thesis_re2_7')
 @lang('form.thesis_re2_word')


        </p>

        @if (!empty($student->abstractword1))
            <a href="{{ asset('storage/documents/' . $student->abstractword1) }}" target="_blank"
                class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded text-sm font-medium">
                📄 เปิดเอกสาร 
            </a>
        @else
            <span class="inline-flex items-center bg-gray-300 text-gray-700 px-3 py-1.5 rounded text-sm">
                ยังไม่มีไฟล์
            </span>
        @endif
    </div>

    <!-- 🔹 ไฟล์ตรวจโดยอาจารย์ -->
    <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
        <h4 class="font-medium text-gray-800 mb-2">
            @lang('form.thesis_re2_4')
        </h4>
        <div class="flex items-center flex-wrap gap-3">
            <label
                class="inline-flex items-center bg-green-100 hover:bg-green-200 text-green-700 px-3 py-1.5 rounded-full text-sm font-medium cursor-pointer">
                ⬆️ อัปโหลด
                <input type="file" name="abstractword2" accept=".doc,.docx" class="hidden"
                    onchange="showFileName(this, 'fileName2')">
            </label>
            @if (!empty($student->abstractword2))
                <a href="{{ asset('storage/documents/' . $student->abstractword2) }}" target="_blank"
                    class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded text-sm font-medium">
                    📄 เปิดเอกสาร
                </a>
            @else
                <span class="inline-flex items-center bg-gray-300 text-gray-700 px-3 py-1.5 rounded text-sm">
                    ยังไม่มีไฟล์
                </span>
            @endif
            <span id="fileName2" class="text-xs text-gray-500"></span>
        </div>
    </div>

    <!-- 🔹 มรว.บ.10/1 -->
    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
        <div class="flex justify-between items-center mb-2">
            <h3 class="font-semibold text-gray-800">
                📗 @lang('form.mwrb10-1')
            </h3>
            <a href="{{ asset('pdfs/m_w_r_b/form_10-1.pdf') }}" target="_blank"
                class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded text-sm font-medium">
                ดาวน์โหลด
            </a>
        </div>
        <p class="text-gray-600 text-sm mb-3">
            @lang('form.thesis_re2_6')<br>
                <span class="text-pink-600">*</span>
             @lang('form.thesis_re2_7')
 @lang('form.thesis_re2_word')
            
        </p>

        @if (!empty($student->abstractword3))
            <a href="{{ asset('storage/documents/' . $student->abstractword3) }}" target="_blank"
                class="inline-flex items-center bg-purple-500 hover:bg-purple-600 text-white px-3 py-1.5 rounded text-sm font-medium">
                📄 เปิดเอกสาร Abstract หลังแก้ไข
            </a>
        @else
            <span class="inline-flex items-center bg-gray-300 text-gray-700 px-3 py-1.5 rounded text-sm">
                ยังไม่มีไฟล์
            </span>
        @endif
    </div>

</div>

<script>
    function showFileName(input, labelId) {
        const label = document.getElementById(labelId);
        label.textContent = input.files.length > 0 ? "📄 " + input.files[0].name : "";
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
                                บันทึก
                            </button>
                            <button type="reset" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                รีเซ็ต
                            </button>
                                   @php
    $subject = "อัปเดทข้อมูลระบบการตรวจบทคัดย่อภาษาอังกฤษ (Abstract) (ศูนย์ภาษา)ติ";
    $fullName = trim(preg_replace('/\s+/', ' ', "{$student->pname} {$student->name} {$student->lname}")); // ✅ รวมชื่อให้เหลือช่องว่างเดียว

    $body = "เรียนคุณ {$fullName}\n\n"
          . "ได้มีการอัปเดทข้อมูลระบบการตรวจบทคัดย่อภาษาอังกฤษ (Abstract) (ศูนย์ภาษา)"
          . "กรุณาเข้าสู่ระบบ E-Graduate เพื่อดำเนินการตรวจสอบข้อมูลเพิ่มเติมได้ที่ลิงก์ด้านล่าง\n\n"
          . "https://egrad.vru.ac.th/gradstd/login\n\n" 
          . "---------------------------------------------\n\n"
. "Dear {$fullName}\n\n"
. "The information regarding the English Abstract Checking System (Language Center) has been updated."
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

        <!-- 🧠 เพิ่มตรงนี้ไว้ใน <script> -->
        <script>
            const langText = {
                th: {
                    header: "ขอรับรองจริยธรรมวิจัยในมนุษย์",
                    upload1: "1. อัปโหลดไฟล์บทคัดย่อ (Abstract)",
                    upload2: "2. ผลการตรวจ อัปโหลดไฟล์บทคัดย่อ (Abstract)",
                    upload3: "3. อัปโหลดบทคัดย่อที่ปรับแก้ไขจากผู้เชี่ยวชาญที่ศูนย์ภาษา",
                    student: "นักศึกษา",
                    teacher: "อาจารย์",
                    note: "(หมายเหตุ: ไฟล์ Word)",
                    save: "บันทึก",
                    reset: "รีเซ็ต"
                },
                en: {
                    header: "Research Ethics Approval",
                    upload1: "1. Upload Abstract File",
                    upload2: "2. Advisor’s Abstract Review Upload",
                    upload3: "3. Upload Corrected Abstract (from Language Center)",
                    student: "Student",
                    teacher: "Advisor",
                    note: "(Note: Word file)",
                    save: "Save",
                    reset: "Reset"
                },
                zh: {
                    header: "研究伦理审批",
                    upload1: "1. 上传摘要文件",
                    upload2: "2. 导师上传摘要评审文件",
                    upload3: "3. 上传语言中心修改后的摘要文件",
                    student: "学生",
                    teacher: "导师",
                    note: "(备注：Word 文件)",
                    save: "保存",
                    reset: "重置"
                }
            };

            function changeLang(lang) {
                // เปลี่ยนข้อความในหน้า
                document.getElementById("header-title").innerText = langText[lang].header;
                document.getElementById("label1").innerHTML = `${langText[lang].upload1}<br><span class='text-pink-600'>*</span> ${langText[lang].student}<br><span class='text-xs text-gray-500'>${langText[lang].note}</span>`;
                document.getElementById("label2").innerHTML = `${langText[lang].upload2}<br><span class='text-pink-600'>*</span> ${langText[lang].teacher}`;
                document.getElementById("label3").innerHTML = `${langText[lang].upload3}<br><span class='text-pink-600'>*</span> ${langText[lang].student}<br><span class='text-xs text-gray-500'>${langText[lang].note}</span>`;
                document.getElementById("saveBtn").innerText = langText[lang].save;
                document.getElementById("resetBtn").innerText = langText[lang].reset;
            }
        </script>

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