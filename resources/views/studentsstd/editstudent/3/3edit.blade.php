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
        @include('layoutsstd.menuleft3')
        @include('layoutsstd.menutop')


        <div class="p-8">
            <!-- กล่องใหม่ พื้นหลังขาว -->
            <!-- กล่องกลางจอ -->

            <div class="bg-white p-6 shadow-md w-3/4 border">



                <form method="POST"
                    action="{{ route('studentstd.section.save', ['section' => '3', 'id_no' => $student->id_no ?? $id_no]) }}">

                    @csrf


                    <!-- แถวที่ 1 -->
                    <h2 class="text-lg font-semibold">ประวัตินักศึกษา</h2>
                    <div class="d-flex mb-3">
                        <!-- ชื่อ -->

                        <!-- ชื่อ -->
                        <div class="me-3 d-flex align-items-center" style="flex:1;">
                            <label for="first_name" class="me-2 mb-0">ชื่อ:</label>
                            <input type="text" id="first_name" name="name" class="form-control"
                                value="{{ $student->name ?? '' }}">
                        </div>

                        <!-- นามสกุล -->
                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="last_name" class="me-2 mb-0">นามสกุล:</label>
                            <input type="text" id="last_name" name="last_name" class="form-control"
                                value="{{ $student->lname ?? '' }}">
                        </div>
                    </div>



                    <!-- แถวที่ 2 -->
                    <div class="row mb-3 align-items-center">
                        <!-- Date of Birth -->
                        <div class="col-md-4 d-flex align-items-center">
                            <label for="dob" class="me-2 mb-0">วันเดือนปีเกิด</label>
                            <input type="date" id="dob" name="dob" class="form-control form-control-sm" style="flex:1;"
                                value="{{ $student->birth ?? '' }}">
                        </div>

                        <!-- Nationality -->
                        <div class="col-md-4 d-flex align-items-center">
                            <label for="nationality" class="me-2 mb-0">สัญชาติ</label>
                            <select id="nationality" name="nationality" class="form-select form-select-sm"
                                style="flex:1;">
                                <option value="">-- เลือกสัญชาติ --</option>
                                <option value="ไทย" {{ ($student->nationality ?? '') == 'ไทย' ? 'selected' : '' }}>ไทย
                                </option>
                                <option value="ต่างชาติ" {{ ($student->nationality ?? '') == 'ต่างชาติ' ? 'selected' : '' }}>ต่างชาติ</option>
                            </select>
                        </div>




                        <!-- Gender -->
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="me-2 mb-0">Gender:</label>
                            <div class="form-check me-2">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
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
                            <input type="text" id="first_name" name="first_name" class="form-control" style="flex:1;"
                                value="{{ $student->first_name ?? '' }}">
                        </div>

                        <!-- Passport Number -->
                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="last_name" class="me-2 mb-0">
                                Passport Number:
                            </label>
                            <input type="text" id="last_name" name="last_name" class="form-control" style="flex:1;"
                                value="{{ $student->last_name ?? '' }}">
                        </div>
                    </div>

                    <!-- แถวที่ 4 -->
                    <div class="d-flex mb-3 mt-3">
                        <!-- Nationality -->
                        <div class="me-3 d-flex align-items-center" style="flex:1;">
                            <label class="me-2 mb-0">
                                Date of Issue:
                            </label>
                            <input type="text" id="first_name" name="first_name" class="form-control" style="flex:1;"
                                value="{{ $student->first_name ?? '' }}">
                        </div>

                        <!-- Passport Number -->
                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="last_name" class="me-2 mb-0">
                                Date of Expiry:
                            </label>
                            <input type="text" id="last_name" name="last_name" class="form-control" style="flex:1;"
                                value="{{ $student->last_name ?? '' }}">
                        </div>
                    </div>


                    <!-- แถวที่ 5 -->
                    <div class="d-flex mb-3 mt-3">
                        <!-- Nationality -->
                        <div class="me-3 d-flex align-items-center" style="flex:1;">
                            <label class="me-2 mb-0">
                                Issuing Authority
                            </label>
                            <input type="text" id="first_name" name="first_name" class="form-control" style="flex:1;"
                                value="{{ $student->first_name ?? '' }}">
                        </div>

                        <!-- Passport Number -->
                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="last_name" class="me-2 mb-0">
                                Phone Number (thai):
                            </label>
                            <input type="text" id="last_name" name="last_name" class="form-control" style="flex:1;"
                                value="{{ $student->last_name ?? '' }}">
                        </div>
                    </div>

                    <div class="d-flex flex-wrap align-items-center mb-3">
                        <label class="me-2 mb-0">
                            Degree:
                        </label>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="degree" id="bachelor" value="Bachelor">
                            <label class="form-check-label" for="bachelor">Bachelor's Degree</label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="degree" id="master" value="Master">
                            <label class="form-check-label" for="master">Master's Degree</label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="degree" id="doctor" value="Doctor">
                            <label class="form-check-label" for="doctor">Doctoral Degree</label>
                        </div>
                    </div>

                    <div class="d-flex mb-3 mt-3">
                        <!-- Nationality -->
                        <div class="me-3 d-flex align-items-center" style="flex:1;">
                            <label class="me-2 mb-0">
                                Date of Arrival:
                            </label>
                            <input type="text" id="first_name" name="first_name" class="form-control" style="flex:1;"
                                value="{{ $student->first_name ?? '' }}">
                        </div>

                        <!-- Passport Number -->
                        <div class="d-flex align-items-center" style="flex:1;">
                            <label for="last_name" class="me-2 mb-0">
                                Field of Study (Major):
                            </label>
                            <input type="text" id="last_name" name="last_name" class="form-control" style="flex:1;"
                                value="{{ $student->last_name ?? '' }}">
                        </div>
                    </div>

                    <h2 class="text-lg font-semibold">2. Purpose of Visit</h2>

                    <div class="d-flex flex-wrap align-items-center mb-3">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="visa_Purpose" id="visa_1_year"
                                value="Visa 1 Year">
                            <label class="form-check-label" for="visa_1_year">Visa 1 Year</label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="visa_Purpose" id="visa_change"
                                value="Change type of visa">
                            <label class="form-check-label" for="visa_change">Change type of visa</label>
                        </div>

                        <div class="form-check d-flex align-items-center me-3">
                            <input class="form-check-input me-2" type="radio" name="visa_Purpose" id="visa_other"
                                value="Other">
                            <label class="form-check-label me-2" for="Visit_other">Other</label>
                            <input type="text" class="form-control form-control-sm" name="visa_other_text"
                                style="max-width:200px;">
                        </div>
                    </div>


                    <h2 class="text-lg font-semibold">3. Type of Visa</h2>
                    <div class="d-flex flex-wrap align-items-center mb-3">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="visa_type" id="Education"
                                value="Visa 1 Year">
                            <label class="form-check-label" for="Education">Education</label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="visa_type" id="Tourism"
                                value="Change type of visa">
                            <label class="form-check-label" for="Tourism">Tourism</label>
                        </div>

                        <div class="form-check d-flex align-items-center me-3">
                            <input class="form-check-input me-2" type="radio" name="visa_type" id="Other" value="Other">
                            <label class="form-check-label me-2" for="type_Other">Other</label>
                            <input type="text" class="form-control form-control-sm" name="visa_other_text"
                                style="max-width:200px;">
                        </div>
                    </div>

                    <h2 class="text-lg font-semibold">
                        4. Documents Required (Please mark ✓ in the section where you have prepared the documents for
                        visa extension.)
                    </h2>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="checkbox" name="original_passport" id="original_passport"
                            value="Original passport">
                        <label class="form-check-label" for="original_passport">Original passport</label>
                    </div>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="checkbox" name="tuition_fee" id="tuition_fee"
                            value="Tuition fee receipt">
                        <label class="form-check-label" for="tuition_fee">Tuition fee receipt (latest tuition
                            fee)</label>
                    </div>


                    <div class="form-check me-3">
                        <input class="form-check-input" type="checkbox" name="academic_transcrip"
                            id="academic_transcrip" value="Academic Transcript">
                        <label class="form-check-label" for="academic_transcrip">Academic Transcript</label>
                    </div>


                    <div class="form-check me-3">
                        <input class="form-check-input" type="checkbox" name="E_visa" id="E_visa"
                            value="E-visa (for students applying for the visa for the first time).">
                        <label class="form-check-label" for="E_visa">E-visa (for students applying for the visa for the
                            first time).</label>
                    </div>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="checkbox" name="passport_sized" id="passport_sized"
                            value="1 Passport-sized Photo (2 inches)">
                        <label class="form-check-label" for="passport_sized">1 Passport-sized Photo (2 inches)
                        </label>
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

                    <p style="font-size: 20px; text-decoration: underline; font-weight: bold; ">
                        !! All the documents must be complete before you can apply for a visa extension. !!
                    </p>


            </div>
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