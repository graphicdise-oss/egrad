@extends('layouts.appapply')

@section('content')
    <div class="container mt-4">
        

        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'อัปเดตสำเร็จ!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'ตกลง',
                    timer: 3000
                });
            </script>
        @endif

        <form method="POST" action="{{ route('apply.update', $record->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h2 class="text-xl font-bold mb-4">แก้ไขข้อมูลนักศึกษา</h2>
                                    <h2 class="mb-4">
                                        @lang('form.description_1')
                                        <small class="text-danger" style="font-size: 0.8rem;">
                                            (For international students: If unsure, please enter "Foreigner")
                                        </small>
                                    </h2>

                                    {{-- 1 --}}
                                    
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label">@lang('form.degree') </label>

                                                <select name="degree_num" class="form-select" required>
                                                    @php
                                                        $degree_num = [
                                                            "ปริญญาตรี / Bachelor's Degree",
                                                            "ปริญญาโท / Master's Degree",
                                                            "ปริญญาเอก / Ph.D./Doctoral Degree",
                                                            "อื่นๆ / other"
                                                        ];
                                                    @endphp


                                                    @foreach ($degree_num as $level)
                                                        <option value="{{ $level }}" {{ $record->degree_num == $level ? 'selected' : '' }}>
                                                            {{ $level }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">@lang('form.academic_year') </label>
                                             <input type="text" name="academic_year"
                                                 value="{{ $record->academic_year }}"
                                                 class="form-control"
                                                style="border: 2px solid #ff77d0;" required>

                                            </div>
                                        </div>
                                        {{-- 1รวม--}}

                                        <div class="row mb-3">
                                            <div class="col-md-8">
                                                <label class="form-label">@lang('form.faculty') </label>
                                                <select name="fac_code" class="form-select" required>
                                                    @php
                                                        $faculties = [
                                                            "ปริญญาโท(Master's Degree) หลักสูตรและการสอน (Curriculum and Instruction)",
                                                            "ปริญญาโท(Master's Degree) สาขาวิชานวัตกรรมการจัดการสิ่งแวดล้อม (Innovation of Environmental Management)",
                                                            "ปริญญาโท(Master's Degree) การจัดการเทคโนโลยี (Technology Management)",
                                                            "ปริญญาโท(Master's Degree) การจัดการระบบสุขภาพ (Health System Management)",
                                                            "ปริญญาโท(Master's Degree) นวัตกรรมการบริหารการศึกษา (Educational Administrative Innovation)",
                                                            "ปริญญาโท(Master's Degree) รัฐประศาสนศาสตร์ (Public Administration)",
                                                            "ปริญญาโท(Master's Degree) นวัตกรรมการบริหารปกครองและการประกอบการเพื่อสังคม (Innovative Governance and Social Entrepreneurship)",
                                                            "ปริญญาโท(Master's Degree) หลักสูตรศิลปกรรมศาสตรมหาบัณฑิต สาขาวิชาทัศนศิลป์และการออกแบบ (Entrepreneurship and Business Innovative Design)",
                                                            "ปริญญาโท(Master's Degree) หลักสูตรบริหารธุรกิจมหาบัณฑิต สาขาวิชาผู้ประกอบการและการออกแบบนวัตกรรมธุรกิจ",
                                                            "ปริญญาโท(Master's Degree) หลักสูตรรัฐศาสตรมหาบัณฑิต สาขาวิชาการจัดการปกครอง",
                                                            "ปริญญาโท(Master's Degree) หลักสูตรบริหารธุรกิจมหาบัณฑิต สาขาวิชาการจัดการธุรกิจ",

                                                            "ปริญญาเอก(Doctoral Degree) การบริหารธุรกิจ (Business Administration)",
                                                            "ปริญญาเอก(Ph.D.) สิ่งแวดล้อมศึกษา (Environmental Studies)",
                                                            "ปริญญาเอก(Doctoral Degree) นวัตกรรมการบริหารการศึกษา (Educational Administrative)",
                                                            "ปริญญาเอก(Ph.D.) หลักสูตรและการสอน (Curriculum and Instruction)",
                                                            "ปริญญาเอก(Doctoral Degree) การจัดการระบบสุขภาพ (Health System Management)",
                                                            "ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชานวัตกรรมเพื่อการพัฒนาที่ยั่งยืน (Innovation of Environmental)",
                                                            "ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชาทัศนศิลป์และการออกแบบ (Entrepreneurship and Business Innovative Design)",
                                                            "ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชานวัตกรรมการจัดการสิ่งแวดล้อม",
                                                            "ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชาผู้ประกอบการและการออกแบบนวัตกรรมธุรกิจ"



                                                        ];
                                                    @endphp

                                                    @foreach ($faculties as $fac_code)
                                                        <option value="{{ $fac_code }}" {{ $record->fac_code == $fac_code ? 'selected' : '' }}>
                                                            {{ $fac_code }}
                                                        </option>
                                                    @endforeach
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
                                                <label class="form-label">@lang('form.prefix')</label>
                                                <input name="prefix_code" type="text" value="{{ $record->prefix_code }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">@lang('form.first_name')</label>
                                                <input name="first_name" type="text" value="{{ $record->first_name }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">@lang('form.last_name')</label>
                                                <input name="last_name" type="text" value="{{ $record->last_name }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">@lang('form.passport_number')</label>
                                                <input name="citizen_id" type="text" value="{{ $record->citizen_id }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>
                                        </div>



                                        {{-- 3 จัด5ใน1เเถว --}}
                                        <div class="row row-cols-1 row-cols-md-5 g-3 mb-3">
                                            <div class="col">
                                                <label class="form-label">@lang('form.nationality') </label>
                                                <select name="nation_code" class="form-select" required>
                                                    <option value="คนไทย (Thai people)" {{ $record->nation_code == "คนไทย (Thai people)" ? 'selected' : '' }}>
                                                        คนไทย (Thai people)
                                                    </option>
                                                    <option value="ต่างชาติ (foreigner)" {{ $record->nation_code == "ต่างชาติ (foreigner)" ? 'selected' : '' }}>
                                                        ต่างชาติ (foreigner)
                                                    </option>
                                                </select>

                                            </div>

                                            <div class="col">
                                                <label class="form-label">@lang('form.gender') </label>
                                                <select name="gender_code" class="form-select" required>

                                                    <option value="001" {{ $record->gender_code == "001" ? 'selected' : '' }}>ชาย
                                                        (male)</option>
                                                    <option value="002" {{ $record->gender_code == "002" ? 'selected' : '' }}>หญิง
                                                        (female)</option>
                                                </select>
                                            </div>

                                            <div class="col">  
                                                <label class="form-label">@lang('form.date_birth')</label>
                                                <input name="birthday" type="text" value="{{ $record->birthday }}"
                                                class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>


                                        </div>





                                        {{-- 4 --}}
                                        <div class="row row-cols-1 row-cols-md-5 g-3 mb-3">
                                            <div class="col">
                                                <label class="form-label">@lang('form.address') </label>
                                                <input name="current_home_subdistrict" type="text" class="form-control" required
                                                    value="{{ old('address', $record->current_home_subdistrict) }}">
                                            </div>





                                            <div class="col">
                                                <label class="form-label">@lang('form.postcode')</label>
                                                <input name="current_home_zip_code" type="text" class="form-control" required
                                                    value="{{ old('postcode', $record->current_home_zip_code) }}">
                                            </div>
                                        </div>


                                        {{-- 5 --}}

                                        <div class="row row-cols-1 row-cols-md-4 g-3 mb-3">
                                            <div class="col">
                                                <label class="form-label">@lang('form.contact_number') </label>
                                                <input name="mobile_phone_no" type="text" class="form-control" required
                                                    value="{{ old('contact_number', $record->mobile_phone_no) }}">
                                            </div>



                                            <div class="col">
                                                <label class="form-label">@lang('form.mail') </label>
                                                <input name="email" type="email" class="form-control" required
                                                    value="{{ old('mail', $record->email) }}">
                                            </div>
                                        </div>



                                        <h5 class="mt-2 text-base font-semibold">
                                            @lang('form.description_4')
                                            <small class="text-danger" style="font-size: 0.8rem;">
                                                @lang('form.description_4_1')
                                            </small>
                                        </h5>
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label class="form-label">@lang('form.pass_n')</label>
                                                <input name="passport_number" type="text"
                                                    value="{{ $record->passport_number }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">@lang('form.pass_s_d')</label>
                                                <input name="passport_start_date" type="text"
                                                    value="{{ $record->passport_start_date }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">@lang('form.pass_e_d')</label>
                                                <input name="passport_end_date" type="text"
                                                    value="{{ $record->passport_end_date }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>

                                            
                                        </div>





                                      <div class="row mb-3">
                                        <div class="col-md-3">
                                                <label class="form-label">@lang('form.visa1')</label>
                                                <input name="visa_no" type="text"
                                                    value="{{ $record->visa_no }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">@lang('form.visa2')</label>
                                                <input name="visa_type" type="text"
                                                    value="{{ $record->visa_type }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">@lang('form.visa3')</label>
                                                <input name="visa_issue_date" type="date"
                                                    value="{{ $record->visa_issue_date }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">@lang('form.visa4')</label>
                                                <input name="visa_expire_date" type="date"
                                                    value="{{ $record->visa_expire_date }}"
                                                    class="form-control" style="border: 2px solid #ff77d0;">
                                            </div>
                                        </div>




                                        {{-- 6 --}}
                                        <h5 class="mt-4">@lang('form.description_3')
                                            <small class="text-danger" style="font-size: 0.8rem;">
                                                (For international students: If unsure, please enter "Foreigner")
                                            </small>
                                        </h5>
                                        <div class="row mb-3">
                                            <div class="col-md-9">
                                                <label class="form-label">@lang('form.school_name') </label>
                                                <input name="old_university_name" type="text" class="form-control" required
                                                    value="{{ old('old_university_name', $record->old_university_name) }}">
                                            </div>



                                        </div>

                                        {{-- 7 --}}
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label">@lang('form.level_school') </label>
                                                <select name="entry_degree_code" class="form-select" required>

                                                    <option value="ปริญญาตรี / Bachelor's Degree" {{ $record->entry_degree_code == "ปริญญาตรี / Bachelor's Degree" ? 'selected' : '' }}>
                                                        ปริญญาตรี / Bachelor's Degree
                                                    </option>
                                                    <option value="ปริญญาโท / Master's Degree" {{ $record->entry_degree_code == "ปริญญาโท / Master's Degree" ? 'selected' : '' }}>
                                                        ปริญญาโท / Master's Degree
                                                    </option>
                                                    <option value="ปริญญาเอก / Ph.D./Doctoral Degree" {{ $record->entry_degree_code == "ปริญญาเอก / Ph.D./Doctoral Degree" ? 'selected' : '' }}>
                                                        ปริญญาเอก / Ph.D./Doctoral Degree
                                                    </option>


                                                    <option value="อื่นๆ / other" {{ $record->entry_degree_code == "อื่นๆ / other" ? 'selected' : '' }}>
                                                        อื่นๆ / other
                                                    </option>
                                                </select>

                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">@lang('form.field_studyl') </label>
                                                <input name="old_university_cur" type="text" class="form-control" required
                                                    value="{{ old('old_university_cur', $record->old_university_cur) }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">@lang('form.gpax') </label>
                                                <input name="entry_gpax" type="text" class="form-control" required
                                                    value="{{ old('gpax', $record->entry_gpax) }}">
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
                                            @if (!empty($record->document_pdf))
                                                <div class="col-md-4 mb-2">
                                                    <a href="{{ asset('storage/documents/' . $record->document_pdf) }}"
                                                        target="_blank" class="btn btn-outline-secondary">
                                                        🔗 ดูไฟล์ PDF เดิม
                                                    </a>
                                                </div>
                                            @endif

                                        </div>



                                        <div class="form-check d-flex align-items-start mb-3">
                                            <input class="form-check-input mt-1 me-2" type="checkbox" id="consent_flag"
                                                name="consent_flag" required checked>
                                            <label class="form-check-label" for="consent">
                                                <span class="text-danger"></span>
                                                @lang('form.box')
                                            </label>
                                        </div>

                                        <div class="mt-4 w-full flex justify-end">
                                            <a href="{{ route('apply.index') }}"
                                                    class="text-white px-4 py-2 rounded me-2"
                                                    style="background-color: #ff77d0; border: 2px solid #ff77d0;">
                                                    ย้อนกลับ
                                            </a>

                                            <button type="submit"
                                                    class="text-white px-4 py-2 rounded"
                                                    style="background-color: #ff77d0; border: 2px solid #ff77d0;">
                                                    บันทึก
                                            </button>
                                        </div>

                                    </div>
                                        
            </form>
        </div>
@endsection