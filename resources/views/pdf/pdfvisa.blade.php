<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="noindex, nofollow">
    <meta charset="UTF-8">
    <title>Visa Extension Form</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            src: url('{{ public_path('fonts/THSarabunNew.ttf') }}') format('truetype');
        }

        body {
            font-family: 'THSarabunNew';
            font-size: 13px;
        }
    </style>

    <style>
        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path("fonts/THSarabunNew.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: bold;
            font-weight: bold;
            src: url('{{ storage_path("fonts/THSarabunNew-Bold.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: italic;
            font-weight: normal;
            src: url('{{ storage_path("fonts/THSarabunNew-Italic.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: italic;
            font-weight: bold;
            src: url('{{ storage_path("fonts/THSarabunNew-BoldItalic.ttf") }}') format('truetype');
        }

        body {
            font-family: 'sarabun', sans-serif;
            font-size: 16pt;
            line-height: 1;
            margin: 40px;
        }

        h2,

        h4 {
            text-align: center;
            margin: 5px 0;
            /* ✅ ลดช่องว่างหัวข้อ */
        }

        p {
            margin: 2px 0;
            /* ✅ ลดช่องว่างแต่ละบรรทัด */
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 30px;
            width: 70px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        td {
            padding: 2px 4px;
            /* ✅ ลด padding */
            vertical-align: top;
        }

        .label {
            width: 150px;
            font-weight: bold;
        }

        .logo {
            position: absolute;
            top: 20px;
            /* ระยะจากด้านบน */
            left: 40px;
            /* ระยะจากด้านซ้าย */
            width: 70px;
            /* ขนาดโลโก้ */
            height: auto;
        }
    </style>
    <style>
        h1,
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 6px;
        }

        .section-title {
            background-color: #f2f2f2;
            font-weight: bold;
            padding: 5px;
            margin-top: 15px;
        }

        /* CSS สำหรับจัดวางวันที่ให้อยู่มุมขวาบน */
        /* เดิม: top: 40px; */

        .date-absolute {
            position: absolute;
            right: 40px;
            top: 0px;
            /* <<-- ลองเปลี่ยนเป็น 20px หรือ 15px */
            font-size: 16pt;
        }

        /* ส่วนที่เหลือของ CSS ยังคงเดิม */
        .date-slot {
            display: inline-block;
            border-bottom: 1px solid black;
            text-align: center;
        }

        .date-slot.short {
            width: 25px;
        }

        .date-slot.long {
            width: 50px;
        }
    </style>
</head>

<body>
    <div class="date-absolute">
        Date <span class="date-slot short">&nbsp;</span> / <span class="date-slot short">&nbsp;</span> / <span
            class="date-slot long">&nbsp;</span>
    </div>

    <h2 style="text-decoration: underline; text-underline-offset: 0px;">
        Visa Application Form
    </h2>



    <h3 style="display:inline-block; text-decoration:underline; text-underline-offset:0px;
           margin:0; padding:0; line-height:1; font-weight:bold;
            vertical-align:bottom; position:relative; top:1px;">
        1. Personal Information
    </h3>

    <table style="width:100%; border-collapse:collapse; margin-top:-10px;">
        {{-- แถว 1: Name --}}
        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:0; vertical-align:middle; white-space:nowrap;">
                <div style="display:flex; align-items:center; gap:5px;">
                    <b style="min-width:70px;">Name:</b>
                    <span>(</span>

                    @php
                        $prefixVisaRaw = $student->prefix_visa ?? '';
                        $prefixVisa = strtolower(preg_replace('/\s+/u', '', $prefixVisaRaw));
                    @endphp

                    <span
                        style="display:inline-block; {{ $prefixVisa === 'mr' ? '' : 'text-decoration:line-through;' }}">Mr.</span>
                    <span
                        style="display:inline-block; {{ $prefixVisa === 'ms' ? '' : 'text-decoration:line-through;' }}">Ms.</span>
                    <span
                        style="display:inline-block; {{ $prefixVisa === 'mrs' ? '' : 'text-decoration:line-through;' }}">Mrs.</span>
                    <span>)</span>

                    <span style="display:inline-block; border-bottom:1px solid #000; width:195px; padding:0 3px;">
                        {{ $student->name ?? '' }}
                    </span>

                    <b style="margin-left:15px;">Surname:</b>
                    <span style="display:inline-block; border-bottom:1px solid #000; width:180px; padding:0 3px;">
                        {{ $student->lname ?? '' }}
                    </span>
                </div>
            </td>
        </tr>



        {{-- แถว 2: Date of Birth --}}
        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:0; margin:0; vertical-align:middle; white-space:nowrap;">
                <div style="display:flex; align-items:center; gap:5px;">
                    <b style="min-width:70px;">Date of Birth:</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:110px; padding:0 3px; text-align:center;">
                        {{ $student->birth_visa ?? '' }}
                    </span>

                    <b style="margin-left:0px;">Place of Birth:</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:110px; padding:0 3px; text-align:center;">
                        {{ $student->p_f_b ?? '' }}
                    </span>

                    <b style="margin-left:0px;">Gender:</b>
                    @php
                        $gender = strtolower(trim($student->gender_visa ?? ''));
                    @endphp

                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                     text-align:center; line-height:11px; margin-left:5px;">
                        @if($gender === 'male' || $gender === 'm') ✓ @endif
                    </span>
                    <span style="margin-right:0px;">Male</span>

                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                     text-align:center; line-height:11px;">
                        @if($gender === 'female' || $gender === 'f') ✓ @endif
                    </span>
                    <span>Female</span>
                </div>
            </td>
        </tr>

        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:0; margin:0; vertical-align:middle; white-space:nowrap;">
                <div style="display:flex; align-items:center; gap:5px;">
                    <b style="min-width:70px;">Nationality:</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:200px; padding:0 3px; text-align:center;">
                        {{ $student->nat_visa ?? '' }}
                    </span>

                    <b style="margin-left:0px;">Passport Number:</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:198px; padding:0 3px; text-align:center;">
                        {{ $student->idcard ?? '' }}
                    </span>


                </div>
            </td>

        </tr>
        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:0; margin:0; vertical-align:middle; white-space:nowrap;">
                <div style="display:flex; align-items:center; gap:5px;">
                    <b style="min-width:70px;">Date of Issue:</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:200px; padding:0 3px; text-align:center;">
                        {{ $student->passport_start_date ?? '' }}
                    </span>

                    <b style="margin-left:0px;">Date of Expiry:</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:205px; padding:0 3px; text-align:center;">
                        {{ $student->passport_end_date ?? '' }}
                    </span>
                </div>
            </td>
        </tr>

        </tr>
        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:0; margin:0; vertical-align:middle; white-space:nowrap;">
                <div style="display:flex; align-items:center; gap:5px;">
                    <b style="min-width:70px;">Issuing Authority:</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:165px; padding:0 3px; text-align:center;">
                        {{ $student->is_au ?? '' }}
                    </span>

                    <b style="margin-left:0px;">Phone Number (Thai):</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:163px; padding:0 3px; text-align:center;">
                        {{ $student->phone_visa ?? '' }}
                    </span>
                </div>
            </td>
        </tr>


        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:0; margin:0; vertical-align:middle; white-space:nowrap;">
                <div style="display:flex; align-items:center; gap:5px;">
                    <b style="min-width:70px;">Degree:</b>


                    @php
                        $degree = strtolower(trim($student->degree_visa ?? ''));
                    @endphp

                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                     text-align:center; line-height:11px; margin-left:5px;">
                        @if($degree === 'bachelor' || $degree === 'bachelor') ✓ @endif
                    </span>
                    <span style="margin-right:0px;">Bachelor's Degree</span>

                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                     text-align:center; line-height:11px;">
                        @if($degree === 'master' || $degree === 'master') ✓ @endif
                    </span>
                    <span>Master's Degree</span>

                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                     text-align:center; line-height:11px;">
                        @if($degree === 'doctor' || $degree === 'doctor') ✓ @endif
                    </span>
                    <span>Doctoral Degree</span>
                </div>

            </td>
        </tr>

        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:0; margin:0; vertical-align:middle; white-space:nowrap;">
                <div style="display:flex; align-items:center; gap:5px;">
                    <b style="min-width:70px;">Faculty:</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:180px; padding:0 3px; text-align:center;">
                        {{ $student->date_arr ?? '' }}
                    </span>

                    <b style="margin-left:0px;">Field of Study (Major):</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:210px; padding:0 3px; text-align:center;">
                        {{ $student->majo_visa ?? '' }}
                    </span>
                </div>
            </td>
        </tr>



        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:0; margin:0; vertical-align:middle; white-space:nowrap;">
                <div style="display:flex; align-items:center; gap:5px;">
                    <b style="min-width:70px;">Date of Arrival:</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:180px; padding:0 3px; text-align:center;">
                        {{ $student->date_arr ?? '' }}
                    </span>

                    <b style="margin-left:0px;">Date of Departure:</b>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:186px; padding:0 3px; text-align:center;">
                        {{ $student->majo_visa ?? '' }}
                    </span>
                </div>
            </td>
        </tr>

        {{-- หัวข้อ Purpose of Visit --}}
        <tr>
            <td colspan="2" style="border:none; padding:0; margin:0;">
                <h3 style="text-decoration:underline; text-underline-offset:0px;
               margin:0; padding:0;  font-weight:bold;">
                    2. Purpose of Visit
                </h3>
            </td>
        </tr>

        {{-- แถวของ checkbox --}}
        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:2px 0; margin:0; vertical-align:middle; white-space:nowrap;">
                <div style="display:flex; align-items:center; gap:5px; line-height:1.2;">
                    @php
                        $purpose = strtolower(trim($student->visa_purpose ?? ''));
                      @endphp

                    {{-- ช่อง 1 --}}
                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                   text-align:center; line-height:11px; margin-left:5px;">
                        @if($purpose === '1') &#10003; @endif
                    </span>
                    <span style="margin-right:25px;">Visa 1 Year</span>

                    {{-- ช่อง 2 --}}
                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                   text-align:center; line-height:11px;">
                        @if($purpose === '2') &#10003; @endif
                    </span>
                    <span style="margin-right:25px;">Change type of visa</span>

                    {{-- ช่อง 3 --}}
                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                   text-align:center; line-height:11px;">
                        @if($purpose === '3') &#10003; @endif
                    </span>
                    <span>Other:</span>
                    <span style="display:inline-block; border-bottom:1px solid #000; width:240px; padding:0 3px;">
                        {{ $student->visa_other_text ?? '' }}
                    </span>
                </div>
            </td>
        </tr>

        <h3 style="text-decoration: underline; text-underline-offset: 0px;">
            3. Type of Visa
        </h3>

        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:0; margin:0; vertical-align:middle; white-space:nowrap;">
                <div style="display:flex; align-items:center; gap:5px;">

                    @php
                        $type = strtolower(trim($student->visa_type ?? ''));
                    @endphp

                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                     text-align:center; line-height:11px; margin-left:5px;">
                        @if($type === '1' || $type === '1') ✓ @endif
                    </span>
                    <span style="margin-right:30px;">Visa 1 Year</span>

                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                     text-align:center; line-height:11px;">
                        @if($type === '2' || $type === '2') ✓ @endif
                    </span>
                    <span style="margin-right:30px;">Change type of visa</span>

                    <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                     text-align:center; line-height:11px;">
                        @if($type === '3' || $type === '3') ✓ @endif
                    </span>
                    <span>Other:</span>
                    <span
                        style="display:inline-block; border-bottom:1px solid #000; width:242px; padding:0 3px; text-align:center;">
                        {{ $student->visa_type_text ?? '' }}
                    </span>
                </div>
            </td>
        </tr>



        <tr style="border:none;">
            <td colspan="2" style="border:none; padding:0; margin:0; vertical-align:middle; white-space:nowrap;">
                <h3
                    style="display:inline; text-decoration:underline; text-underline-offset:0px; margin:0;  font-weight:bold;">
                    4. Documents Required
                </h3>
                <span style="font-size:14px; font-weight:normal;">
                    (Please mark / in the section where you have prepared the documents for visa extension.)
                </span>
            </td>
        </tr>

        <table style="width:100%; border-collapse:collapse; margin-top:5px;">
            @php
                // ข้อมูลเอกสารที่ต้องใช้
                $docs = [
                    'Original passport' => $student->original_passport ?? null,
                    'Tuition fee receipt (latest tuition fee)' => $student->tuition_fee ?? null,
                    'Academic Transcript' => $student->academic_transcrip ?? null,
                    'E-visa (for students applying for the visa for the first time).' => $student->e_visa ?? null,
                    '1 Passport-sized Photo (2 inches)' => $student->passport_sized ?? null,
                ];
            @endphp

            @foreach($docs as $label => $value)
                <tr style="border:none;">
                    <td style="border:none; padding:1px 0; vertical-align:middle;">
                        {{-- กล่องเช็ค --}}
                        <span style="display:inline-block; width:13px; height:13px; border:1px solid #000;
                                                                 text-align:center; line-height:11px; margin-right:6px;">
                            @if($value == 1 || strtolower($value) == 'yes') ✓ @endif
                        </span>
                        {{-- ข้อความ --}}
                        <span style="font-size:16px; vertical-align:middle;">
                            {{ $label }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </table>

        {{-- กล่องข้อความ --}}

        <div style="border:1px solid #000;
            padding:8px 10px;
            margin-top:8px;
            width:160mm;  /* หรือ 700px */
            font-size:14px;
            line-height:1.3;
            text-align:justify;">

            To get an <b>Academic Transcript</b>, please contact
            <b>International Relations Office</b>, 2nd Floor, 100th Building.
            You are required to fill out the form and submit it to the Finance Department.
            Then pay the following fees:

            1. Bachelor's: 100 THB per document
            2. Master's: 200 THB per document
            3. Doctoral: 500 THB per document.

            Afterward, send it to the Registration Office to await the documents and<br>
            <span style="color:red; font-weight:bold;">
                attach all the required documents for visa extension along with this form,
                then submit it to the International Relations Office.
            </span>
        </div>
        <span style="color:red; font-weight:bold;  font-size:23px;">
            !! All the documents must be complete before you can apply for a visa extension.!!
        </span>

    </table>





</body>

</html>