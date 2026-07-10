<!DOCTYPE html>
<html>

<head>
    <title>E - Graduate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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

                <h2 class="text-lg font-semibold mb-4 text-center">
                    Visa Application Form
                    <hr>
                </h2>

                <form method="POST"
                    action="{{ route('student.section.save', ['section' => 'visaform', 'id_no' => $student->id_no])  }}"
                    method="POST" enctype="multipart/form-data">

                    @csrf


                    <!-- แถวที่ 1 -->
                    <h2 class="text-lg font-semibold">1. Personal Infomation</h2>
                    <div class="d-flex mb-3">
                        <div class="me-3 d-flex align-items-center" style="flex:1;">
                            <label class="me-2 mb-0">Name:</label>

                            <div class="d-flex me-3">
                                @php
                                    // ❌ เดิม: $pname = trim(strtolower($student->pname ?? ''));
                                    // ✅ แก้ไข: ใช้คอลัมน์ที่เก็บข้อมูลจริง ๆ คือ prefix_visa
                                    $prefixVisa = trim(strtolower($student->prefix_visa ?? ''));
                                @endphp

                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="prefix_visa" id="mr" value="Mr"
                                        {{ ($prefixVisa === 'mr') ? 'checked' : '' }}> <label class="form-check-label"
                                        for="mr">Mr</label>
                                </div>

                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="prefix_visa" id="ms" value="Ms"
                                        {{ ($prefixVisa === 'ms') ? 'checked' : '' }}> <label class="form-check-label"
                                        for="ms">Ms</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="prefix_visa" id="mrs" value="Mrs"
                                        {{ ($prefixVisa === 'mrs') ? 'checked' : '' }}> <label class="form-check-label"
                                        for="mrs">Mrs</label>
                                </div>
                            </div>

                           
                            <input type="text" id="first_name" name="name" class="form-control"
                                value="{{ $student->name ?? '' }}">
                        </div>

                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="last_name" class="me-2 mb-0">Surname:</label>
                            <input type="text" id="last_name" name="last_name" class="form-control"
                                value="{{ $student->lname ?? '' }}">
                        </div>
                    </div>


                    <!-- แถวที่ 2 -->
                    <div class="row mb-3 align-items-center">
                        <!-- Date of Birth -->
                        <div class="col-md-4 d-flex align-items-center">
                            <label for="dob" class="me-2 mb-0">
                                Date of Birth:
                            </label>
                            <input type="date" id="dob" name="birth_visa" class="form-control form-control-sm"
                                style="flex:1;" value="{{ $student->birth_visa ?? '' }}">
                        </div>

                        <!-- Place of Birth -->
                        <div class="col-md-4 d-flex align-items-center">
                            <label for="pob" class="me-2 mb-0">
                                Place of Birth:
                            </label>
                            <input type="text" id="pob" name="p_f_b" class="form-control form-control-sm"
                                style="flex:1;" value="{{ $student->p_f_b ?? '' }}">
                        </div>

                        <!-- Gender -->
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="me-2 mb-0">Gender:</label>
                               @php
                                    // ❌ เดิม: $pname = trim(strtolower($student->pname ?? ''));
                                    // ✅ แก้ไข: ใช้คอลัมน์ที่เก็บข้อมูลจริง ๆ คือ gender_visa
                                    $gender_Visa = trim(strtolower($student->gender_visa ?? ''));
                                @endphp
                            <div class="form-check me-2">
                                 <input class="form-check-input" type="radio" name="gender_visa" id="mr" value="male"
                                        {{ ($gender_Visa === 'male') ? 'checked' : '' }}> 
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                 <input class="form-check-input" type="radio" name="gender_visa" id="female" value="female"
                                        {{ ($gender_Visa === 'female') ? 'checked' : '' }}> 
                           
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>


                    <!-- แถวที่ 3 -->
                    <div class="d-flex mb-3 mt-3">
                        <!-- Nationality -->
                        <div class="me-3 d-flex align-items-center" style="flex:1;">
                            <label class="me-2 mb-0">
                                Nationality:
                            </label>
                            <input type="text" id="nat_visa" name="nat_visa" class="form-control" style="flex:1;"
                                value="{{ $student->nat_visa ?? '' }}">
                        </div>

                        <!-- Passport Number -->
                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="cardid2" class="me-2 mb-0">
                                Passport Number:
                            </label>

                            <input type="text" id="cardid2" name="cardid2" class="form-control" style="flex:1;"
                                value="{{ $student->cardid2 ?? '' }}">
                        </div>
                    </div>

                    <!-- แถวที่ 4 -->
                    <div class="d-flex mb-3 mt-3">
                        <!-- Nationality -->
                        <div class="me-3 d-flex align-items-center" style="flex:1;">
                            <label class="me-2 mb-0">
                                Date of Issue:
                            </label>
                            <input type="text" id="passport_start_date" name="passport_start_date" class="form-control"
                                style="flex:1;" value="{{ $student->passport_start_date ?? '' }}">
                        </div>

                        <!-- Passport Number -->
                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="passport_end_date" class="me-2 mb-0">
                                Date of Expiry:
                            </label>
                            <input type="text" id="passport_end_date" name="passport_end_date" class="form-control"
                                style="flex:1;" value="{{ $student->passport_end_date ?? '' }}">
                        </div>
                    </div>


                    <!-- แถวที่ 5 -->
                    <div class="d-flex mb-3 mt-3">
                        <!-- Nationality -->
                        <div class="me-3 d-flex align-items-center" style="flex:1;">
                            <label class="me-2 mb-0">
                                Issuing Authority
                            </label>
                            <input type="text" id="is_au" name="is_au" class="form-control" style="flex:1;"
                                value="{{ $student->is_au ?? '' }}">
                        </div>

                        <!-- Passport Number -->
                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="phone_visa" class="me-2 mb-0">
                                Phone Number (thai):
                            </label>
                            <input type="text" id="last_name" name="phone_visa" class="form-control" style="flex:1;"
                                value="{{ $student->phone_visa ?? '' }}">
                        </div>
                    </div>

                    <div class="d-flex flex-wrap align-items-center mb-3">
                        <label class="me-2 mb-0">
                            Degree:
                        </label>
                                @php
                                    // ❌ เดิม: $pname = trim(strtolower($student->pname ?? ''));
                                    // ✅ แก้ไข: ใช้คอลัมน์ที่เก็บข้อมูลจริง ๆ คือ gender_visa
                                    $degree_Visa = trim(strtolower($student->degree_visa ?? ''));
                                @endphp
                        <div class="form-check me-3">
                             <input class="form-check-input" type="radio" name="degree_visa" id="mr" value="bachelor"
                                        {{ ($degree_Visa === 'bachelor') ? 'checked' : '' }}> 
                            <label class="form-check-label" for="bachelor">Bachelor's Degree</label>
                        </div>

                        <div class="form-check me-3">
                             <input class="form-check-input" type="radio" name="degree_visa" id="mr" value="master"
                                        {{ ($degree_Visa === 'master') ? 'checked' : '' }}> 
                         
                            <label class="form-check-label" for="master">Master's Degree</label>
                        </div>

                        <div class="form-check me-3">
                                 <input class="form-check-input" type="radio" name="degree_visa" id="mr" value="doctor"
                                        {{ ($degree_Visa === 'doctor') ? 'checked' : '' }}> 
                            
                            <label class="form-check-label" for="doctor">Doctoral Degree</label>
                        </div>
                    </div>

    <div class="d-flex mb-3 mt-3">
                        <!-- Nationality -->
                        <div class="me-3 d-flex align-items-center" style="flex:1;">
                            <label class="me-2 mb-0">
                                Faculty:
                            </label>
                            <input type="text" id="date_arr" name="date_arr" class="form-control" style="flex:1;"
                                value="{{ $student->visa_fac ?? '' }}">
                        </div>

                        <!-- Passport Number -->
                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="majo_visa" class="me-2 mb-0">
                                Field of Study (Major):
                            </label>
                            <input type="text" id="majo_visa" name="majo_visa" class="form-control" style="flex:1;"
                                value="{{ $student->majo_visa ?? '' }}">
                        </div>
                    </div>

                    <div class="d-flex mb-3 mt-3">
                        <!-- Nationality -->
                        <div class="me-3 d-flex align-items-center" style="flex:1;">
                            <label class="me-2 mb-0">
                                Date of Arrival:
                            </label>
                            <input type="text" id="date_arr" name="date_arr" class="form-control" style="flex:1;"
                                value="{{ $student->date_arr ?? '' }}">
                        </div>

                        <!-- Passport Number -->
                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="majo_visa" class="me-2 mb-0">
                                Date of Departure:
                            </label>
                            <input type="text" id="majo_visa" name="majo_visa" class="form-control" style="flex:1;"
                                value="{{ $student->date_dep ?? '' }}">
                        </div>
                    </div>

                    <h2 class="text-lg font-semibold">2. Purpose of Visit</h2>

                    <div class="d-flex flex-wrap align-items-center mb-3">
                         @php
                                    // ❌ เดิม: $pname = trim(strtolower($student->pname ?? ''));
                                    // ✅ แก้ไข: ใช้คอลัมน์ที่เก็บข้อมูลจริง ๆ คือ gender_visa
                                    $visa_Purpose = trim(strtolower($student->visa_purpose ?? ''));
                                @endphp
                        <div class="form-check me-3">
                             <input class="form-check-input" type="radio" name="visa_purpose" id="mr" value="1"
                                        {{ ($degree_Visa === '1') ? 'checked' : '' }}> 
                           
                            <label class="form-check-label" for="visa_1_year">Visa 1 Year</label>
                        </div>

                        <div class="form-check me-3">
                           <input class="form-check-input" type="radio" name="visa_purpose" id="mr" value="2"
                                        {{ ($degree_Visa === '2') ? 'checked' : '' }}> 
                            <label class="form-check-label" for="visa_change">Change type of visa</label>
                        </div>

                        <div class="form-check me-3">
                           <input class="form-check-input" type="radio" name="visa_purpose" id="mr" value="3"
                                        {{ ($degree_Visa === '3') ? 'checked' : '' }}> 

                            <label class="3" for="visa_change">Other</label>
                        </div>

                        <input type="text" id="visa_other_text" name="visa_other_text"
                            class="form-control form-control-sm" style="max-width:200px;"
                            value="{{ $student->visa_other_text ?? '' }}">

                    </div>



                    <h2 class="text-lg font-semibold">3. Type of Visa</h2>
                    <div class="d-flex flex-wrap align-items-center mb-3">
                        <div class="form-check me-3">
                              @php
                                    // ❌ เดิม: $pname = trim(strtolower($student->pname ?? ''));
                                    // ✅ แก้ไข: ใช้คอลัมน์ที่เก็บข้อมูลจริง ๆ คือ gender_visa
                                    $visa_Type = trim(strtolower($student->visa_type?? ''));
                                @endphp
                                 <input class="form-check-input" type="radio" name="visa_type" id="mr" value="1"
                                        {{ ($degree_Visa === '1') ? 'checked' : '' }}> 
                            
                            <label class="form-check-label" for="Education">Education</label>
                        </div>

                        <div class="form-check me-3">
                           <input class="form-check-input" type="radio" name="visa_type" id="mr" value="2"
                                        {{ ($degree_Visa === '2') ? 'checked' : '' }}> 
                            <label class="2" for="Tourism">Tourism</label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="visa_type" id="mr" value="3"
                                        {{ ($degree_Visa === '3') ? 'checked' : '' }}> 
                            <label class="3" for="visa_change">Other</label>
                        </div>
                        <input type="text" id="visa_type_text" name="visa_type_text"
                            class="form-control form-control-sm" style="max-width:200px;"
                            value="{{ $student->visa_type_text ?? '' }}">

                    </div>


                    <h2 class="text-lg font-semibold">
                        4. Documents Required (Please mark ✓ in the section where you have prepared the documents for
                        visa extension.)
                    </h2>

                    <div class="mb-3 d-flex align-items-center">
                        <!-- Input อัปโหลดไฟล์ -->
                        <input type="file" class="form-control form-control-sm me-2" name="original_passport"
                            id="original_passport" accept=".pdf,.jpg,.png" style="max-width: 200px;">

                        <!-- Label -->
                        <label for="original_passport" class="form-label mb-0 me-2">
                            Original passport
                        </label>

                        <!-- ถ้ามีไฟล์เก่าให้โชว์ลิงก์ -->
                        @if(!empty($student->original_passport))
                            <a href="{{ asset('storage/documents/' . $student->original_passport) }}" target="_blank"
                                class="text-sm text-blue-600 me-2">
                                (ดูไฟล์เก่า)
                            </a>
                        @endif
                    </div>

                    <div class="mb-3 d-flex align-items-center">
                        <!-- Input อัปโหลดไฟล์ -->
                        <input type="file" class="form-control form-control-sm me-2" name="tuition_fee" id="tuition_fee"
                            accept=".pdf,.jpg,.png" style="max-width: 200px;">

                        <!-- Label -->
                        <label for="tuition_fee" class="form-label mb-0 me-2">
                            Tuition fee receipt (latest tuition fee)
                        </label>

                        <!-- ถ้ามีไฟล์เก่าให้โชว์ลิงก์ -->
                        @if(!empty($student->tuition_fee))
                            <a href="{{ asset('storage/documents/' . $student->tuition_fee) }}" target="_blank"
                                class="text-sm text-blue-600 me-2">
                                (ดูไฟล์เก่า)
                            </a>
                        @endif
                    </div>


                    <div class="mb-3 d-flex align-items-center">
                        <!-- Input อัปโหลดไฟล์ -->
                        <input type="file" class="form-control form-control-sm me-2" name="tacademic_transcrip"
                            id="academic_transcrip" accept=".pdf,.jpg,.png" style="max-width: 200px;">

                        <!-- Label -->
                        <label for="academic_transcrip" class="form-label mb-0 me-2">
                            Academic Transcript
                        </label>

                        <!-- ถ้ามีไฟล์เก่าให้โชว์ลิงก์ -->
                        @if(!empty($student->academic_transcrip))
                            <a href="{{ asset('storage/documents/' . $student->academic_transcrip) }}" target="_blank"
                                class="text-sm text-blue-600 me-2">
                                (ดูไฟล์เก่า)
                            </a>
                        @endif
                    </div>


                    <div class="mb-3 d-flex align-items-center">
                        <!-- Input อัปโหลดไฟล์ -->
                        <input type="file" class="form-control form-control-sm me-2" name="e_visa" id="e_visa"
                            accept=".pdf,.jpg,.png" style="max-width: 200px;">

                        <!-- Label -->
                        <label for="e_visa" class="form-label mb-0 me-2">
                            E-visa (for students applying for the visa for the first time).
                        </label>

                        <!-- ถ้ามีไฟล์เก่าให้โชว์ลิงก์ -->
                        @if(!empty($student->e_visa))
                            <a href="{{ asset('storage/documents/' . $student->e_visa) }}" target="_blank"
                                class="text-sm text-blue-600 me-2">
                                (ดูไฟล์เก่า)
                            </a>
                        @endif
                    </div>



                    <div class="mb-3 d-flex align-items-center">
                        <!-- Input อัปโหลดไฟล์ -->
                        <input type="file" class="form-control form-control-sm me-2" name="passport_sized"
                            id="passport_sized" accept=".pdf,.jpg,.png" style="max-width: 200px;">

                        <!-- Label -->
                        <label for="passport_sized" class="form-label mb-0 me-2">
                            1 Passport-sized Photo (2 inches)
                        </label>

                        <!-- ถ้ามีไฟล์เก่าให้โชว์ลิงก์ -->
                        @if(!empty($student->passport_sized))
                            <a href="{{ asset('storage/documents/' . $student->passport_sized) }}" target="_blank"
                                class="text-sm text-blue-600 me-2">
                                (ดูไฟล์เก่า)
                            </a>
                        @endif
                    </div>






                    <div style="border:1px solid #000; padding:15px; margin-bottom:15px; border-radius:6px;">
                        To get an Academic Transcript, please contact International Relations Office, 2nd Floor, 100th
                        Building.
                        You are required to fill out the form and submit it to the Finance Department. Then pay the
                        Following fees:
                        1. Bachelor's: 100 THB per document
                        2. Master's: 200 THB per document
                        3. Doctoral: 500 THB per document

                        Afterward, send it to the Registration Office to await the documents and attach all the required
                        documents
                        for visa extension along with this form, then submit it to the International Relations Office
                    </div>

                    <p style="font-size: 20px; text-decoration: underline; font-weight: bold; color: red;">
                        !! All the documents must be complete before you can apply for a visa extension. !!
                    </p>



                    <div class="w-3/4 flex space-x-2">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                            บันทึก
                        </button>
                        <button type="reset" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            รีเซ็ต
                        </button>
                        <a href="{{ route('students.pdfvisa', $student->id_no) }}" target="_blank"
                            class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                            ดู PDF Visa
                        </a>
                    </div>




                </form>

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

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#visa_expire_date", {
        dateFormat: "Y-m-d",
        defaultDate: "{{ $student->visa_expire_date ?? '' }}"
    });
</script>