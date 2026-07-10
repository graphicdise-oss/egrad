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

                <h2 class="text-lg font-semibold mb-4">เเจ้งเตือนVISA
                    <hr>
                </h2>

                   <form method="POST"
                        action="{{ route('studentstd.section.save', ['section' => 'visa', 'id_no' => $student->name_id]) }}">
                        @csrf
                
                   
                    <!-- แถวที่ 1 -->
                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label class="form-label">ชื่อ</label>
                            <input type="text" name="first_name" class="form-control"
                                value="{{ $student->first_name ?? '' }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" name="last_name" class="form-control"
                                value="{{ $student->last_name ?? '' }}">
                        </div>
                    </div>

                    <!-- แถวที่ 2 -->
                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label class="form-label">หมายเลขVISA</label>
                            <input type="text" name="visa_no" class="form-control"
                                value="{{ $student->visa_no ?? '' }}">
                        </div>

                         @php
                                        $visa_exp_date = $student->visa_expire_date ?? null;
                                        $text_color = '#000000'; // default ดำ

                                        if ($visa_exp_date) {
                                            $expiryDate = \Carbon\Carbon::parse($visa_exp_date);
                                            $now = \Carbon\Carbon::now();

                                            // คำนวณวันจากวันนี้ไปวันหมดอายุ
                                            $daysLeft = $now->diffInDays($expiryDate, false);

                                            if ($daysLeft <= 45 && $daysLeft >= 0) {
                                                $text_color = '#fff700ff'; // แดง (ใกล้หมดอายุ <= 45 วัน)
                                            } elseif ($daysLeft < 0) {
                                                $text_color = '#d91414ff'; // เเดง (หมดอายุไปแล้ว)
                                            } else {
                                                $text_color = '#11ff49'; // เขียว (เหลือมากกว่า 45 วัน)
                                            }
                                        }
                                    @endphp

                        <div class="col-md-4">
                            <label class="form-label">วันหมดอายุ VISA</label>
                            <input type="text" id="visa_expire_date" name="visa_expire_date" class="form-control"
                                style="color: {{ $text_color }};" value="{{ $student->visa_expire_date ?? '' }}">
                        </div>



                        @php
                            $email = $student->email ?? 'example@email.com';
                            $subject = urlencode('แจ้งเตือน VISA ใกล้หมดอายุ');
                            $body = urlencode("เรียนคุณ {$student->name} {$student->lname}\n\nแจ้งเตือนว่า VISA ของคุณจะหมดอายุในวันที่ {$student->visa_expire_date}\n\nกรุณาดำเนินการต่ออายุโดยเร็ว\n\nขอบคุณครับ");
                        @endphp


                        <div class="row mb-3 mt-4">
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="d-flex gap-2 flex-wrap">
                                    <button type="submit" class="btn btn-success">💾 เเก้ไขข้อมูล</button>
                                    <button type="reset" class="btn btn-primary">🔄 รีเซ็ต</button>
                                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $email }}&su={{ $subject }}&body={{ $body }}"
                                        target="_blank" class="btn btn-danger">
                                        ⚠️ แจ้งเตือนผ่าน Gmail
                                    </a>
                                </div>
                            </div>
                        </div>



                    </div>
                </form>
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

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#visa_expire_date", {
        dateFormat: "Y-m-d",
        defaultDate: "{{ $student->visa_expire_date ?? '' }}"
    });
</script>