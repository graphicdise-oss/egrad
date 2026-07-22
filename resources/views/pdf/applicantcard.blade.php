<!DOCTYPE html>
<html lang="th">

<head>
    <meta name="robots" content="noindex, nofollow">
    <meta charset="UTF-8">
    <style>
        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path("fonts/THSarabunNew.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: bold;
            src: url('{{ storage_path("fonts/THSarabunNew-Bold.ttf") }}') format('truetype');
        }

        body {
            font-family: 'sarabun', sans-serif;
            font-size: 15pt;
            line-height: 1;
            margin: 12px 15px 15px;
        }

        h3 {
            text-align: center;
            margin: 2px 0;
        }

        p.center {
            text-align: center;
            margin: 2px 0;
        }

        p.code {
            text-align: right;
            margin: 0 0 6px;
        }

        .divider {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }

        table.info {
            width: 100%;
            border-collapse: collapse;
            font-size: 13.5pt;
        }

        table.info td {
            padding: 1px 6px;
            vertical-align: top;
            line-height: 1;
        }

        .label {
            font-weight: bold;
        }

        .announce p {
            margin: 1px 0;
            line-height: 1;
        }

        .affidavit {
            font-size: 12pt;
            margin-top: 16px;
        }
    </style>
</head>

<body>
    <p class="code"><span class="label">รหัสประจำตัวผู้สมัคร</span> {{ $student->name_id }}</p>
    <h3>บัตรประจำตัวผู้สมัคร</h3>
    <p class="center">มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์ จังหวัดปทุมธานี</p>
    <p class="center">{{ $degreeLabel }} &nbsp; ภาคการศึกษาที่ {{ $term }}/{{ $year }} (Semester {{ $term }} / Academic
        Year {{ $year - 543 }})</p>

    <div class="announce">
        <p>{{ $setting->exam_announce_text ?? '' }}</p>
        <p>{{ $setting->exam_date_text ?? '' }}</p>
        <p>{{ $setting->admit_announce_text ?? '' }}</p>
        <p>{{ $setting->semester_start_text ?? '' }}</p>
    </div>

    <div class="divider"></div>

    <table class="info">
        <tr>
            <td width="36%"><span class="label">ข้าพเจ้าชื่อ :</span> {{ trim($student->prefix) }}
                {{ trim($student->name_na) }}</td>
            <td width="26%"><span class="label">นามสกุล :</span> {{ trim($student->surname_su) }}</td>
            <td width="38%"><span class="label">รหัสบัตรประชาชน :</span> {{ trim($student->cardid2) }}</td>
        </tr>
        <tr>
            <td colspan="3"><span class="label">ที่อยู่ :</span> {{ trim($student->address) }}</td>
        </tr>
        <tr>
            <td width="34%"><span class="label">รหัสไปรษณีย์ :</span> {{ trim($student->postcard) }}</td>
            <td width="33%"><span class="label">โทรศัพท์ :</span> {{ trim($student->telephone) }}</td>
            <td width="33%"><span class="label">ไลน์ ID :</span> {{ trim($student->email) }}</td>
        </tr>
        <tr>
            <td colspan="3"><span class="label">วุฒิการศึกษาสูงสุดที่ใช้ในการสมัครสอบ :</span>
                {{ trim($student->educationan_sch) }} &nbsp;&nbsp;
                <span class="label">สาย/แขนง/สาขา :</span> {{ trim($student->branch_sch) }}</td>
        </tr>
        <tr>
            <td colspan="3"><span class="label">จากโรงเรียน/วิทยาลัย :</span> {{ trim($student->place_sch) }}</td>
        </tr>
        <tr>
            <td colspan="3"><span class="label">ระดับคะแนนเฉลี่ยสะสม Gpax :</span>
                {{ number_format($student->grade_sch, 2) }}</td>
        </tr>
        <tr>
            <td colspan="3"><span class="label">สาขาที่เลือก :</span> {{ trim($student->branch_one) }}
                {{ $majorName }}</td>
        </tr>
    </table>

    <p class="affidavit">
        **ข้าพเจ้ารับรองว่าข้อความข้างต้นนี้เป็นจริงทุกประการ หากตรวจสอบแล้วพบว่าข้าพเจ้าขาดคุณสมบัติอย่างใดอย่างหนึ่ง
        หรือฝ่าฝืนข้าพเจ้ายินดีให้ทางมหาวิทยาลัยตัดสิทธิ์ในการสมัครเข้าศึกษาประจำปีการศึกษา {{ $year }}
    </p>
</body>

</html>
