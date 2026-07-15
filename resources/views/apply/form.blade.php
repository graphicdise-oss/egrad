<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>สมัครเรียน</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</head>

<style>
    @font-face {
        font-family: 'THSarabunNew';
        src: url('{{ asset('fonts/THSarabunNew.ttf') }}') format('truetype');
        font-weight: 400;
    }

    @font-face {
        font-family: 'THSarabunNew';
        src: url('{{ asset('fonts/THSarabunNew-Bold.ttf') }}') format('truetype');
        font-weight: 700;
    }

    body {
        font-family: 'THSarabunNew', sans-serif;
    }

    .bold {
        font-weight: 700;
    }
</style>

<style>
    body {
        font-family: 'TH Sarabun New', sans-serif;
        font-size: 24px;
        /* ✅ ขนาดทั่วไป เช่น 18–20px */
    }

    label,
    select,
    input,
    button {
        font-size: 24px !important;
    }
</style>


<style>
    input.form-control,
    select.form-select {
        border: 2px solid #fa2eb2ff !important;
    }
</style>


<body class="bg-gray-100 min-h-screen fc-font">
    <!-- ส่วน Header VRU อยู่บนสุด -->
    <nav class="navbar border-bottom" style="background-color: #ff77d0;">

        <div class="container d-flex justify-content-between align-items-center">
            <!-- โลโก้ -->
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/apply/logoapply.jpg') }}" alt="VRU Logo"
                    style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid white;" />


            </div>

            <div class="d-flex flex-column align-items-center text-end">
                <div class="d-flex align-items-center">
                    <a href="https://oldent.vru.ac.th/Webregister/pages/login_Admin.php"
                        class="nav-link text-dark fw-bold">@lang('form.login')</a>
                    <span class="text-dark mx-2 fw-bold">|</span>
                    <a href="https://oldent.vru.ac.th/Webregister/pages/login_Admin.php"
                        class="nav-link text-dark fw-bold">@lang('form.logout')</a>
                </div>


                {{-- แถบเปลี่ยนภาษา (อยู่กึ่งกลางใต้เมนู) --}}
                <div class="mt-1 flex items-center justify-center space-x-2">
                    <a href="{{ route('lang.switch', 'th') }}">
                        <img src="{{ asset('images/th.jpg') }}" width="25" alt="TH"
                            class="rounded shadow-sm hover:scale-110 transition">
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}">
                        <img src="{{ asset('images/en.jpg') }}" width="25" alt="EN"
                            class="rounded shadow-sm hover:scale-110 transition">
                    </a>
                    <a href="{{ route('lang.switch', 'zh') }}">
                        <img src="{{ asset('images/zh.jpg') }}" width="25" alt="ZH"
                            class="rounded shadow-sm hover:scale-110 transition">
                    </a>
                </div>

            </div>
        </div>
    </nav>


    {{-- แจ้งเตือน success --}}
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ!',
                text: {{ Illuminate\Support\Js::from(session('success')) }},
                confirmButtonText: 'ตกลง',
                timer: 3000
            });
        </script>
    @endif

    {{-- แจ้งเตือน error เช่น ข้อมูลซ้ำ --}}
    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด!',
                text: {{ Illuminate\Support\Js::from(session('error')) }},
                confirmButtonText: 'ตกลง'
            });
        </script>
    @endif

    <div class="container mt-4">
        <h2 class="mt-4" style="font-size: 34px; font-weight: bold;">
            @lang('form.description_1')
            <small class="text-danger" style="font-size: 18px;">
                @lang('form.foreigner1')
            </small>
        </h2>


        {{-- 1 --}}
        <form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col">
                    <label>@lang('form.ระดับปริญญา')</label>
                    <select id="master_status_id" name="master_status_id" class="form-select"
                        onchange="updateCourses()">
                        <option value="">@lang('form.select')</option>
                        @if($formType === 'teacher')
                            <option value="4">@lang('form.ประกาศนียบัตรบัณฑิต')</option>
                        @else
                            <option value="2">@lang('form.ปริญญาโท')</option>
                            <option value="3">@lang('form.ปริญญาเอก')</option>
                        @endif
                    </select>
                </div>

                <div class="col">
                    <label>@lang('form.ภาคเรียน/ปี')</label>
                    <select id="term" name="year_nameid" class="form-select" onchange="updateYearRegister(this)">
                        <option value="">@lang('form.select')</option>
                        @if($formType === 'teacher')
                            <option value="3" data-year="2569">2569</option>
                        @else
                            <option value="1" data-year="2569">1/2569</option>
                            <option value="2" data-year="2569">2/2569</option>
                        @endif
                    </select>
                    <input type="hidden" name="year_register" id="year_register">
                </div>

                <script>
                    function updateYearRegister(select) {
                        const year = select.options[select.selectedIndex].getAttribute('data-year');
                        document.getElementById('year_register').value = year || '';
                    }
                </script>

                <div class="col">
                    <label>@lang('form.หลักสูตร')</label>
                    <select id="course" name="branch_one" class="form-select">
                        <option value="">@lang('form.select')</option>
                    </select>
                </div>
            </div>

            <script>
                // จัดกลุ่มข้อมูลตาม value ของระดับปริญญา (2=โท, 3=เอก, 4=ป.บัณฑิต)
                const courseData = {
                    @if($formType === 'teacher')
                        // --- ประกาศนียบัตรบัณฑิต (Value 4) ---
                        "4": [
                            { id: "72001", degree: "ประกาศนียบัตรบัณฑิต", name: "หลักสูตรประกาศนียบัตรบัณฑิต สาขาวิชาชีพครู" }
                        ]
                    @else
                        // --- ปริญญาโท (Value 2) ---
                        "2": [
                            { id: "70006", degree: "ปริญญาโท", name: "การจัดการเทคโนโลยี (Technology Management)" },
                            { id: "70007", degree: "ปริญญาโท", name: "การจัดการระบบสุขภาพ (Health System Management)" },
                            { id: "70005", degree: "ปริญญาโท", name: "นวัตกรรมการจัดการสิ่งแวดล้อม (Innovation of Environmental Management)" },
                            { id: "70009", degree: "ปริญญาโท", name: "รัฐประศาสนศาสตร์ (Public Administration)" },
                            { id: "70010", degree: "ปริญญาโท", name: "นวัตกรรมการบริหารปกครอง และการประกอบการเพื่อสังคม" },
                            { id: "70014", degree: "ปริญญาโท", name: "การจัดการปกครอง (Governance)" },
                            { id: "70011", degree: "ปริญญาโท", name: "ทัศนศิลป์และการออกแบบ (Visual Arts and Design)" },
                            { id: "70015", degree: "ปริญญาโท", name: "การจัดการธุรกิจ (Business Management)" },
                            { id: "70001", degree: "ปริญญาโท", name: "หลักสูตรและการสอน (Curriculum and Instruction)" },
                            { id: "70008", degree: "ปริญญาโท", name: "นวัตกรรมการบริหารการศึกษา (Educational Administrative Innovation)" },
                            { id: "70016", degree: "ปริญญาโท", name: "วิทยาศาสตร์การกีฬา" },
                        ],

                        // --- ปริญญาเอก (Value 3) แยกออกมาให้ชัดเจน ---
                        "3": [
                            { id: "71005", degree: "ปริญญาเอก", name: "หลักสูตรและการสอน (Curriculum and Instruction)" },
                            { id: "71004", degree: "ปริญญาเอก", name: "นวัตกรรมการบริหารการศึกษา (Educational Administrative Innovation)" },
                            { id: "71006", degree: "ปริญญาเอก", name: "การจัดการระบบสุขภาพ (Health System Management)" },
                            { id: "71003", degree: "ปริญญาเอก", name: "สิ่งแวดล้อมศึกษา (Environmental Studies)" },
                            { id: "71009", degree: "ปริญญาเอก", name: "นวัตกรรมการจัดการสิ่งแวดล้อม (Innovation of Environmental Management)" },
                            { id: "71007", degree: "ปริญญาเอก", name: "นวัตกรรมเพื่อการพัฒนาที่ยั่งยืน (Innovation for Sustainable Development)" },
                            { id: "71008", degree: "ปริญญาเอก", name: "ทัศนศิลป์และการออกแบบ (Visual Arts and Design)" },
                            { id: "71001", degree: "ปริญญาเอก", name: "การบริหารธุรกิจ (Business Administration)" },
                            { id: "71011", degree: "ปริญญาเอก", name: "การจัดการธุรกิจ (Business Management)" },
                            { id: "71012", degree: "ปริญญาเอก", name: "วิทยาศาสตร์การกีฬา" },
                        ]
                    @endif
                };

                function updateCourses() {
                    // รับค่าระดับปริญญาที่เลือก
                    const degreeSelect = document.getElementById("master_status_id");
                    const degreeValue = degreeSelect.value;

                    // รับ element ของ dropdown หลักสูตร
                    const courseSelect = document.getElementById("course");

                    // เคลียร์ค่าเก่าทิ้งก่อน
                    courseSelect.innerHTML = '<option value="">@lang("form.select")</option>';

                    // ตรวจสอบว่ามีการเลือกค่า และมีข้อมูลใน courseData หรือไม่
                    if (degreeValue && courseData[degreeValue]) {
                        const courses = courseData[degreeValue];

                        // วนลูปสร้าง option ใหม่
                        courses.forEach(c => {
                            const opt = document.createElement("option");
                            opt.value = c.id;
                            opt.textContent = c.name;
                            courseSelect.appendChild(opt);
                        });
                    }
                }
            </script>
            {{-- 2 --}}
            <h2 class="mt-4" style="font-size: 34px; font-weight: bold;">
                @lang('form.description_2')
                <small class="text-danger" style="font-size: 18px;">
                    @lang('form.foreigner1')
                </small>
            </h2>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label">@lang('form.prefix') </label>
                    <input name="prefix" type="text" class="form-control" maxlength="10" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">@lang('form.first_name') </label>
                    <input name="name_na" type="text" class="form-control" maxlength="100" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">@lang('form.last_name') </label>
                    <input name="surname_su" type="text" class="form-control" maxlength="100" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">@lang('form.passport_number') </label>
                    {{-- แก้ตรงนี้ --}}
                    <input name="cardid2" type="text" class="form-control" maxlength="20" value="{{ old('cardid2') }}"
                        required>
                </div>
            </div>





            {{-- 3 จัด5ใน1เเถว --}}
            <div class="row row-cols-1 row-cols-md-4 g-3 mb-3">
                <div class="col">
                    <label class="form-label">@lang('form.nationality') </label>
                    <select name="chart" class="form-select" required>
                        <option value="">@lang('form.select')</option>
                        <option value="1">คนไทย (Thai people)</option>
                        <option value="2">ต่างชาติ (foreigner)</option>
                    </select>
                </div>

                <div class="col">
                    <label class="form-label">@lang('form.gender') </label>
                    <select name="sex_status" class="form-select" required>
                        <option value="">@lang('form.select')</option>
                        <option value="1">ชาย (male)</option>
                        <option value="2">หญิง (female)</option>
                    </select>
                </div>



                <div class="col">
                    <label class="form-label">@lang('form.date_birth')</label>

                    <input name="birthday" type="date" class="form-control">
                </div>




            </div>

            {{-- 4 --}}
            <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">

                <div class="col-md-7">
                    <label class="form-label">@lang('form.address')</label>
                    <input name="address" type="text" class="form-control" maxlength="100" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">@lang('form.postcode')</label>
                    <input name="postcard" type="text" class="form-control" maxlength="20" required>
                </div>
            </div>

            {{-- 5 --}}

            <div class="row row-cols-1 row-cols-md-3 g-3 mb-3">
                <div class="col">
                    <label class="form-label">@lang('form.contact_number') </label>
                    <input name="telephone" type="text" class="form-control" maxlength="10" pattern="[0-9]{10}"
                        title="กรุณากรอกเบอร์โทรศัพท์ 10 หลัก (ตัวเลขเท่านั้น)">
                </div>


                <div class="col">
                    <label class="form-label">@lang('form.mail')</label>
                    <input name="facedbook" type="text" class="form-control" maxlength="100" required>
                </div>

                <div class="col">
                    <label class="form-label">@lang('form.line')</label>
                    <input name="email" type="text" class="form-control" maxlength="100">
                </div>

            </div>

            <h2 class="mt-4" style="font-size: 34px; font-weight: bold;">
                @lang('form.description_4')
                <small class="text-danger" style="font-size: 18px;">
                    @lang('form.description_4_1')
                </small>
            </h2>


            <div class="row mb-3">

                <div class="col-md-3">
                    <label class="form-label">@lang('form.pass_s_d') </label>
                    <input name="passport_start_date" type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">@lang('form.pass_e_d') </label>
                    <input name="passport_end_date" type="date" class="form-control">
                </div>
            </div>

            {{-- วีซ่า --}}


            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label">@lang('form.visa1') </label>
                    <input name="visa_no" type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">@lang('form.visa2') </label>
                    <input name="visa_type" type="text" class="form-control" maxlength="100">
                </div>
                <div class="col-md-3">
                    <label class="form-label">@lang('form.visa3') </label>
                    <input name="visa_issue_date" type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">@lang('form.visa4') </label>
                    <input name="visa_expire_date" type="date" class="form-control">
                </div>
            </div>



            {{-- 6 --}}
            <h2 class="mt-4" style="font-size: 34px; font-weight: bold;">
                @lang('form.description_3')
                <small class="text-danger" style="font-size: 18px;">
                    @lang('form.foreigner1')
                </small>
            </h2>

            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">@lang('form.school_name') </label>
                    <input name="place_sch" type="text" class="form-control" required>
                </div>

            </div>

            {{-- 7 --}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">@lang('form.level_school') </label>
                    <select name="educationan_sch" class="form-select" required>
                        <option value="">@lang('form.select')</option>
                        <option value="ปริญญาตรี">ปริญญาตรี / Bachelor's Degree</option>
                        <option value="ปริญญาโท">ปริญญาโท / Master's Degree</option>
                        <option value="ปริญญาเอก">ปริญญาเอก / Ph.D./Doctoral Degree</option>
                        <option value="อื่นๆ / other">อื่นๆ / other</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">@lang('form.field_studyl') </label>
                    <input name="branch_sch" type="text" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">@lang('form.gpax') </label>
                    <input name="grade_sch" type="text" class="form-control" maxlength="5" pattern="^[0-9]*\.?[0-9]*$"
                        title="กรุณากรอกเฉพาะตัวเลขหรือทศนิยม เช่น 3.25">

                </div>
            </div>

            {{-- 8 --}}
            <div class="mt-4">
                <h2 class="fw-bold">@lang('form.required_documents')</h2>
                <p class="mb-0">@lang('form.doc_1')</p>
                <p class="mb-0">@lang('form.doc_2')</p>
                <p class="mb-0">@lang('form.doc_3')</p>
                <p class="mb-0">@lang('form.doc_4')</p>
                <p class="mb-0">@lang('form.doc_5')</p>
                <p class="mb-0">@lang('form.doc_6')</p>
                <p class="mb-0">@lang('form.doc_7')</p>
                <p class="text-danger fw-bold">@lang('form.doc_pdf')</p>
            </div>


            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="file" name="file_uplond" class="form-control" accept="application/pdf"
                        onchange="checkFileSize(this)">

                    {{-- แจ้งเตือนจาก Laravel (กรณีผ่าน server มา) --}}
                    @error('file_uplond')
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด!',
                                text: '{{ $message }}',
                                confirmButtonText: 'ตกลง'
                            });
                        </script>
                    @enderror
                </div>
            </div>

            {{-- เช็คขนาดไฟล์ก่อน submit --}}
            <script>
                function checkFileSize(input) {
                    const maxSize = 20 * 1024 * 1024; // 20MB
                    if (input.files[0] && input.files[0].size > maxSize) {
                        Swal.fire({
                            icon: 'error',
                            title: 'ไฟล์ใหญ่เกินไป!',
                            text: 'ไฟล์ PDF ต้องมีขนาดไม่เกิน 20 MB กรุณาเลือกไฟล์ใหม่',
                            confirmButtonText: 'ตกลง'
                        });
                        input.value = ''; // ล้างไฟล์ที่เลือก
                    }
                }
            </script>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">@lang('form.news') </label>
                    <select name="std_new" class="form-select" required>
                        <option>@lang('form.select')</option>
                        <option value="0">ไม่ระบุ (Not specific)</option>
                        <option value="1">02.เว็บไซต์ (Website)</option>
                        <option value="2">03.facebook</option>
                        <option value="3">04.ป้ายโฆษณา (Billboard)</option>
                        <option value="4">05.เพื่อน (Friends)</option>
                        <option value="5">06.ผู้ปกครอง/ญาติ/คนรู้จัก</option>
                        <option value="6">01.แนะแนว/กิจกรรม รร./ตลาดนัดหลักสูตร
                        </option>
                        <option value="7">07.Youtube/Clip VDO</option>
                        <option value="8">08.Open chat</option>
                        <option value="9">09.Instagram</option>
                        <option value="10">10.Tiktok</option>
                        <option value="11">11.ศิษย์เก่า/ศิษย์ปัจจุบัน</option>
                        <option value="13">12.ใบปลิว/แผ่นพับ</option>
                    </select>
                </div>
            </div>

            <div class="form-check d-flex align-items-start mb-3">
                <input class="form-check-input mt-1 me-2" type="checkbox" id="consent" required>
                <label class="form-check-label" for="consent">
                    <span class="text-danger" required></span>
                    @lang('form.box')
                </label>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>