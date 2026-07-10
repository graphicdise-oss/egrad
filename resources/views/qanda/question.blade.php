<!DOCTYPE html>
<html lang="th">

<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <base href="{{ url('/') }}/">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ตั้งคำถาม</title>
    <style>
        /* ฟอนต์เอง*/
        @font-face {
            font-family: 'FC Home';
            src: url({{ asset('fonts/FC-Home-Regular.otf') }}) format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'FC Home', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('images/q_a/b_g_qa.png') }}');
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FF92BE;
            /* ✅ สีชมพู - ในกรอบ */
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);

            /* ✅ เพิ่มขนาดตัวอักษร */
            font-size: 24px;
        }


        /* Fade-Up Animation */
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1s ease-out forwards;
        }





        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }



        }
    </style>
</head>

<body class="fc-font">

    @include('layouts.social_icons')

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#f464a3',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#f464a3',
            });
        </script>
    @endif





    <div class="container">

        <!-- ปุ่มเข้าสู่ระบบ ด้านขวาบน -->

        <div class="fade-up" style="
    display: flex;
    justify-content: flex-end;
    gap: 12px;  /* ✅ ระยะห่างระหว่างปุ่ม */
    margin-bottom: 20px;
">

            <a href="{{ route('lang.switch', 'th') }}">
                <img src="{{ asset('images/th.jpg') }}" width="35" alt="TH"
                    class="rounded shadow-sm hover:scale-110 transition">
            </a>
            <a href="{{ route('lang.switch', 'en') }}">
                <img src="{{ asset('images/en.jpg') }}" width="35" alt="EN"
                    class="rounded shadow-sm hover:scale-110 transition">
            </a>
            <a href="{{ route('lang.switch', 'zh') }}">
                <img src="{{ asset('images/zh.jpg') }}" width="35" alt="ZH"
                    class="rounded shadow-sm hover:scale-110 transition">
            </a>

            <a href="/qanda/answer" style="
        background-color: #f464a3;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 24px;
        text-decoration: none;
        font-weight: bold;
    ">
                @lang('form.หน้าหลัก')
            </a>

            <a href="{{ route('qanda.login.form') }}" style="
        background-color: #f464a3;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 24px;
        text-decoration: none;
        font-weight: bold;
    ">
                @lang('form.เข้าสู่ระบบ')
            </a>

        </div>


        <br><br>
        <!-- รูป text_2 อยู่กึ่งกลาง -->

        <div class="fade-up" style="text-align: center; margin-bottom: 16px;">
            <img src="{{ asset('images/q_a/img_1.png') }}" alt="ข้อความหัว" style="width: 30%;  height: auto;">
        </div>



        <form method="POST" action="{{ route('q_a.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- กล่องปุ่มตั้งคำถาม (เฟดขึ้น + จัดกลาง) -->
            <div class="fade-up"
                style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: 0 auto 20px auto;">

                <!-- ช่องฝั่งซ้าย -->
                <div style="background-color: white; border-radius: 12px; padding: 24px 0; font-weight: bold;
        white-space: normal; text-align: center; width: 100%; min-width: 110px;
        box-shadow: 0 0 0 1px #ddd; color: #f464a3; font-size: 40px; line-height: 1.6;">
                    @lang('form.ตั้งคำถาม')
                </div>
            </div>




            <!-- แถว: ชื่อ -->
            <div class="fade-up"
                style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: auto;">
                <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
    white-space: nowrap; text-align: center; width: 10%; min-width: 110px;
    box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                    @lang('form.หัวข้อ')
                </div>


                <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
    display: flex; align-items: center; box-shadow: 0 0 0 1px #ddd;">
                    <input type="text" name="heading" required
                        style="border: none; outline: none; width: 100%; font-size: 16px; background: none; color: #f464a3;">
                </div>
            </div>

            <div class="fade-up"
                style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
            </div>

            <!-- แถว: ประเภท -->

            <div class="fade-up"
                style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: 20px auto 0;">
                <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
    white-space: nowrap; text-align: center; width: 10%; min-width: 110px;
    box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                     @lang('form.ประเภท')
                </div>

                <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
                display: flex; align-items: center; box-shadow: 0 0 0 1px #ddd;">
                    <select name="type" required
                        style="border: none; outline: none; width: 100%;  background: none; color: #f464a3;">
                        <option value="" disabled selected>@lang('form.เลือกประเภท')</option>
                        <option value="สอบถามข้อมูล">@lang('form.สอบถามข้อมูล')</option>
                        <option value="ร้องเรียน">@lang('form.ร้องเรียน')</option>
                        <option value="แนะนำติชม">@lang('form.เเนะนำติชม')</option>
                    </select>
                </div>
            </div>


            <div class="fade-up"
                style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
            </div>

            <!-- แถว: 3 -->
            <div class="fade-up"
                style="display: flex; align-items: flex-start; gap: 2%; width: 100%; max-width: 700px; margin: auto;">

                <!-- กล่องข้อความ "รายละเอียด" -->
                <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
        white-space: nowrap; text-align: center; width: 10%;   min-width: 110px;
        box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                    @lang('form.รายละเอียด')
                </div>

                <!-- กล่อง textarea -->
                <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
        display: flex; box-shadow: 0 0 0 1px #ddd;">

                    <textarea rows="3" name="details" required
                        style="border: none; outline: none; width: 100%; font-size: 16px; background: none; resize: vertical; color: #f464a3;"></textarea>
                </div>
            </div>

            <div class="fade-up"
                style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
            </div>

            <div class="fade-up"
                style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: auto;">
                <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
    white-space: nowrap; text-align: center; width: 10%; min-width: 110px;
    box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                    @lang('form.email')
                </div>
                <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
                display: flex; align-items: center; box-shadow: 0 0 0 1px #ddd;">
                    <input type="email" name="mail" required
                        style="border: none; outline: none; width: 100%; font-size: 16px; background: none; color: #f464a3; ">
                </div>
            </div>

            <div class="fade-up"
                style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
            </div>

            <div class="fade-up"
                style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: auto;">
                <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
white-space: nowrap; text-align: center; width: 10%; min-width: 110px;
box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                     @lang('form.ไฟล์เเนบ')
                </div>

                <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
display: flex; align-items: center; box-shadow: 0 0 0 1px #ddd;">

                    <div style="display: flex; align-items: center;">
                        <label for="image"
                            style="background-color: #ffe4ef; color: #f464a3; padding: 8px 16px; border-radius: 8px; font-weight: bold; cursor: pointer;">
                            @lang('form.เลือกไฟล์')
                        </label>

                        <!-- เปลี่ยน accept ให้รองรับรูปและ PDF -->
                        <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.pdf" style="display: none;"
                            onchange="showFileName(this)">

                        <span id="file-name"
                            style="margin-left: 15px; font-size: 14px; color: #555;">@lang('form.ยังไม่ได้เลือกไฟล์')</span>
                    </div>

                </div>
            </div>

            <script>
                function showFileName(input) {
                    const fileName = input.files[0] ? input.files[0].name : 'ยังไม่ได้เลือกไฟล์';
                    document.getElementById('file-name').innerText = fileName;
                }
            </script>




            <div class="fade-up"
                style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
            </div>


            <div class="fade-up"
                style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: auto;">
                <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
    white-space: nowrap; text-align: center; width: 10%; min-width: 110px;
    box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                    @lang('form.ลงชื่อ')
                </div>
                <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
                display: flex; align-items: center; box-shadow: 0 0 0 1px #ddd;">
                    <input type="text" name="name" required
                        style="border: none; outline: none; width: 100%; font-size: 16px; background: none; color: #f464a3; ">
                </div>
            </div>

            <div class="fade-up"
                style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
            </div>

            <!-- ปุ่มยืนยัน และ ล้างข้อมูล -->
            <div class="fade-up" style="text-align: center; margin-top: 30px;">
                <button type="submit" style=" 
    font-family: 'FC Home', sans-serif;
    background-color: #f464a3;
    color: white;
    border: none;
    padding: 10px 24px;
    font-size: 24px;
    border-radius: 12px;
    cursor: pointer;
    margin-right: 16px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    display: inline-block;
">
                    @lang('form.ยืนยัน')
                </button>


                <button type="reset" style="
    font-family: 'FC Home', sans-serif;
        background-color: white;
        color: #f464a3;
        border: 2px solid #f464a3;
        padding: 10px 24px;
        font-size: 24px;
        border-radius: 12px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    ">
                    @lang('form.ล้างข้อมูล')
                </button>
            </div>
        </form>
        <br><br>
        <div class="fade-up" style="text-align: center; margin-bottom: 16px;">
            <img src="{{ asset('images/q_a/img_2.png') }}" alt="ข้อความหัว" style="width: 95%;  height: auto;">
        </div>

</body>

</html>