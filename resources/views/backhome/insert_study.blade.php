<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>ระบบจัดการข้อมูล</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <style>
        /* ฟอนต์เอง*/
        @font-face {
            font-family: 'FC Home Regular';
            src: url('{{ asset('fonts/FC-Home-Regular.otf') }}') format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        .fc-font {
            font-family: 'FC Home Regular', sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        input.form-control,
        select.form-select {
            border: 2px solid #28a745 !important;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen fc-font">


   @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ!',
                text: '{{ session('success') }}',
                confirmButtonText: 'ตกลง',
                timer: 3000
            });
        </script>
    @endif
    
    <!-- โครงหลักของหน้า: flex -->
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        @include('layouts.menuleft')
        @include('layouts.menutop')

        <div class="p-6">
            <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
                <h2 class="text-[22px] font-semibold">เพิ่มข้อมูลนักศึกษา</h2>
                <div class="flex justify-center items-center mt-8">

                </div>
                
                <hr>
                

                {{-- 1 --}}
                <form method="POST" action="{{ route('apply.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">@lang('form.degree') </label>
                            <select name="degree_num" class="form-select" required>
                                <option value="">@lang('form.select')</option>
                                <option value="ปริญญาโท / Master's Degree">ปริญญาโท / Master's Degree</option>
                                <option value="ปริญญาเอก / Ph.D./Doctoral Degree">ปริญญาเอก / Ph.D./Doctoral
                                    Degree
                                </option>
                                <option value="อื่นๆ / other">อื่นๆ / other</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('form.academic_year') </label>
                            <select name="academic_year" class="form-select" required>
                                @php
                                    $currentYear = now()->year + 543; // ปี พ.ศ.
                                @endphp

                                <option value="">@lang('form.select')</option>
                                <option value="1/{{ $currentYear }}">1/{{ $currentYear }}</option>
                                <option value="2/{{ $currentYear }}">2/{{ $currentYear }}</option>
                            </select>
                        </div>

                        {{-- 1รวม--}}
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label">@lang('form.faculty') </label>
                            <select name="fac_code" class="form-select" required>
                                <option value="" disabled selected hidden>@lang('form.select')</option>
                                <option value="">เลือก...</option>

                                <option
                                    value="ปริญญาโท(Master's Degree) หลักสูตรและการสอน (Curriculum and Instruction)">
                                    ปริญญาโท(Master's Degree) หลักสูตรและการสอน (Curriculum and Instruction)
                                </option>

                                <option
                                    value="ปริญญาโท(Master's Degree) สาขาวิชานวัตกรรมการจัดการสิ่งแวดล้อม (Innovation of Environmental Management)">
                                    ปริญญาโท(Master's Degree) สาขาวิชานวัตกรรมการจัดการสิ่งแวดล้อม (Innovation
                                    of
                                    Environmental
                                    Management)
                                </option>

                                <option value="ปริญญาโท(Master's Degree) การจัดการเทคโนโลยี (Technology Management)">
                                    ปริญญาโท(Master's Degree) การจัดการเทคโนโลยี (Technology Management)
                                </option>

                                <option
                                    value="ปริญญาโท(Master's Degree) การจัดการระบบสุขภาพ (Health System Management)">
                                    ปริญญาโท(Master's Degree) การจัดการระบบสุขภาพ (Health System Management)
                                </option>

                                <option
                                    value="ปริญญาโท(Master's Degree) นวัตกรรมการบริหารการศึกษา (Educational Administrative Innovation)">
                                    ปริญญาโท(Master's Degree) นวัตกรรมการบริหารการศึกษา (Educational
                                    Administrative
                                    Innovation)
                                </option>

                                <option value="ปริญญาโท(Master's Degree) รัฐประศาสนศาสตร์ (Public Administration)">
                                    ปริญญาโท(Master's Degree) รัฐประศาสนศาสตร์ (Public Administration)
                                </option>

                                <option
                                    value="ปริญญาโท(Master's Degree) นวัตกรรมการบริหารปกครองและการประกอบการเพื่อสังคม (Innovative Governance and Social Entrepreneurship)">
                                    ปริญญาโท(Master's Degree) นวัตกรรมการบริหารปกครองและการประกอบการเพื่อสังคม
                                    (Innovative
                                    Governance and Social Entrepreneurship)
                                </option>

                                <option
                                    value="ปริญญาโท(Master's Degree) หลักสูตรศิลปกรรมศาสตรมหาบัณฑิต สาขาวิชาทัศนศิลป์และการออกแบบ (Entrepreneurship and Business Innovative Design)">
                                    ปริญญาโท(Master's Degree) หลักสูตรศิลปกรรมศาสตรมหาบัณฑิต
                                    สาขาวิชาทัศนศิลป์และการออกแบบ
                                    (Entrepreneurship and Business Innovative Design)
                                </option>

                                <option
                                    value="ปริญญาโท(Master's Degree) หลักสูตรบริหารธุรกิจมหาบัณฑิต สาขาวิชาผู้ประกอบการและการออกแบบนวัตกรรมธุรกิจ">
                                    ปริญญาโท(Master's Degree) หลักสูตรบริหารธุรกิจมหาบัณฑิต
                                    สาขาวิชาผู้ประกอบการและการออกแบบนวัตกรรมธุรกิจ
                                </option>

                                <option
                                    value="ปริญญาโท(Master's Degree) หลักสูตรรัฐศาสตรมหาบัณฑิต สาขาวิชาการจัดการปกครอง">
                                    ปริญญาโท(Master's Degree) หลักสูตรรัฐศาสตรมหาบัณฑิต สาขาวิชาการจัดการปกครอง
                                </option>

                                <option
                                    value="ปริญญาโท(Master's Degree) หลักสูตรบริหารธุรกิจมหาบัณฑิต สาขาวิชาการจัดการธุรกิจ">
                                    ปริญญาโท(Master's Degree) หลักสูตรบริหารธุรกิจมหาบัณฑิต
                                    สาขาวิชาการจัดการธุรกิจ
                                </option>

                                <option value="ปริญญาเอก(Doctoral Degree) การบริหารธุรกิจ (Business Administration)">
                                    ปริญญาเอก(Doctoral Degree) การบริหารธุรกิจ (Business Administration)
                                </option>

                                <option value="ปริญญาเอก(Ph.D.) สิ่งแวดล้อมศึกษา (Environmental Studies)">
                                    ปริญญาเอก(Ph.D.) สิ่งแวดล้อมศึกษา (Environmental Studies)
                                </option>

                                <option
                                    value="ปริญญาเอก(Doctoral Degree) นวัตกรรมการบริหารการศึกษา (Educational Administrative)">
                                    ปริญญาเอก(Doctoral Degree) นวัตกรรมการบริหารการศึกษา (Educational
                                    Administrative)
                                </option>

                                <option value="ปริญญาเอก(Ph.D.) หลักสูตรและการสอน (Curriculum and Instruction)">
                                    ปริญญาเอก(Ph.D.) หลักสูตรและการสอน (Curriculum and Instruction)
                                </option>

                                <option
                                    value="ปริญญาเอก(Doctoral Degree) การจัดการระบบสุขภาพ (Health System Management)">
                                    ปริญญาเอก(Doctoral Degree) การจัดการระบบสุขภาพ (Health System Management)
                                </option>

                                <option
                                    value="ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชานวัตกรรมเพื่อการพัฒนาที่ยั่งยืน (Innovation of Environmental)">
                                    ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต
                                    สาขาวิชานวัตกรรมเพื่อการพัฒนาที่ยั่งยืน
                                    (Innovation of Environmental)
                                </option>

                                <option
                                    value="ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชาทัศนศิลป์และการออกแบบ (Entrepreneurship and Business Innovative Design)">
                                    ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชาทัศนศิลป์และการออกแบบ
                                    (Entrepreneurship
                                    and Business Innovative Design)
                                </option>

                                <option
                                    value="ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชานวัตกรรมการจัดการสิ่งแวดล้อม">
                                    ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต
                                    สาขาวิชานวัตกรรมการจัดการสิ่งแวดล้อม
                                </option>

                                <option
                                    value="ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชาผู้ประกอบการและการออกแบบนวัตกรรมธุรกิจ">
                                    ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต
                                    สาขาวิชาผู้ประกอบการและการออกแบบนวัตกรรมธุรกิจ
                                </option>

                            </select>

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
                            <input name="prefix_code" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">@lang('form.first_name') </label>
                            <input name="first_name" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">@lang('form.last_name') </label>
                            <input name="last_name" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">@lang('form.passport_number') </label>
                            <input name="citizen_id" type="text" class="form-control" required>
                        </div>
                    </div>





                    {{-- 3 จัด5ใน1เเถว --}}
                    <div class="row row-cols-1 row-cols-md-4 g-3 mb-3">
                        <div class="col">
                            <label class="form-label">@lang('form.nationality') </label>
                            <select name="nation_code" class="form-select" required>
                                <option value="">@lang('form.select')</option>
                                <option value="คนไทย (Thai people)">คนไทย (Thai people)</option>
                                <option value="ต่างชาติ (foreigner)">ต่างชาติ (foreigner)</option>
                            </select>
                        </div>

                        <div class="col">
                            <label class="form-label">@lang('form.gender') </label>
                            <select name="gender_code" class="form-select" required>
                                <option value="">@lang('form.select')</option>
                                <option value="001">ชาย (male)</option>
                                <option value="002">หญิง (female)</option>
                            </select>
                        </div>


                        <div class="col">
                            <label class="form-label">@lang('form.date_birth')</label>
                            <input type="date" id="date_birth" name="birthday" class="form-control">


                        </div>


                    </div>


                    {{-- 4 --}}
                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">

                        <div class="col-md-7">
                            <label class="form-label">@lang('form.address')</label>
                            <input name="current_home_subdistrict" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">@lang('form.postcode')</label>
                            <input name="current_home_zip_code" type="text" class="form-control" required>
                        </div>
                    </div>

                    {{-- 5 --}}

                    <div class="row row-cols-1 row-cols-md-3 g-3 mb-3">
                        <div class="col">
                            <label class="form-label">@lang('form.contact_number') </label>
                            <input name="mobile_phone_no" type="text" class="form-control" required>
                        </div>


                        <div class="col">
                            <label class="form-label">@lang('form.mail')</label>
                            <input name="email" type="text" class="form-control" required>
                        </div>

                    </div>

                    <h5 class="mt-4 text-base font-semibold">
                        @lang('form.description_4')
                        <small class="text-danger" style="font-size: 0.8rem;">
                            @lang('form.description_4_1')
                        </small>
                    </h5>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label">@lang('form.pass_n') </label>
                            <input name="passport_number" type="text" class="form-control">
                        </div>
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
                            <input name="visa_type" type="text" class="form-control">
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
                    <h5 class="mt-4">@lang('form.description_3')
                        <small class="text-danger" style="font-size: 0.8rem;">
                            (For international students: If unsure, please enter "Foreigner")
                        </small>
                    </h5>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label">@lang('form.school_name') </label>
                            <input name="old_university_name" type="text" class="form-control" required>
                        </div>

                    </div>

                    {{-- 7 --}}
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">@lang('form.level_school') </label>
                            <select name="entry_degree_code" class="form-select" required>
                                <option value="">@lang('form.select')</option>
                                <option value="ปริญญาตรี / Bachelor's Degree">ปริญญาตรี / Bachelor's Degree
                                </option>
                                <option value="ปริญญาโท / Master's Degree">ปริญญาโท / Master's Degree</option>
                                <option value="ปริญญาเอก / Ph.D./Doctoral Degree">ปริญญาเอก / Ph.D./Doctoral
                                    Degree
                                </option>
                                <option value="อื่นๆ / other">อื่นๆ / other</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">@lang('form.field_studyl') </label>
                            <input name="old_university_cur" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">@lang('form.gpax') </label>
                            <input name="entry_gpax" type="text" class="form-control" required>
                        </div>
                    </div>

                    {{-- 8 --}}
                    <div class="mt-4">
                        <h6 class="fw-bold">@lang('form.required_documents')</h6>
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
                            <input type="file" name="document_pdf" class="form-control" accept="application/pdf">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">@lang('form.news') </label>
                            <select name="news" class="form-select" required>
                                <option>@lang('form.select')</option>
                                <option value="ไม่ระบุ (Not specific)">ไม่ระบุ (Not specific)</option>
                                <option value="02.เว็บไซต์ (Website)">02.เว็บไซต์ (Website)</option>
                                <option value="03.facebook">03.facebook</option>
                                <option value="04.ป้ายโฆษณา (Billboard)">04.ป้ายโฆษณา (Billboard)</option>
                                <option value="05.เพื่อน (Friends)">05.เพื่อน (Friends)</option>
                                <option value="06.ผู้ปกครอง/ญาติ/คนรู้จัก">06.ผู้ปกครอง/ญาติ/คนรู้จัก</option>
                                <option value="01.แนะแนว/กิจกรรม รร./ตลาดนัดหลักสูตร">01.แนะแนว/กิจกรรม
                                    รร./ตลาดนัดหลักสูตร
                                </option>
                                <option value="07.Youtube/Clip VDO">07.Youtube/Clip VDO</option>
                                <option value="08.Open chat">08.Open chat</option>
                                <option value="09.Instagram">09.Instagram</option>
                                <option value="10.Tiktok">10.Tiktok</option>
                                <option value="11.ศิษย์เก่า/ศิษย์ปัจจุบัน">11.ศิษย์เก่า/ศิษย์ปัจจุบัน</option>
                                <option value="12.ใบปลิว/แผ่นพับ">12.ใบปลิว/แผ่นพับ</option>
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