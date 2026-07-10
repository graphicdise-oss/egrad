<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>บัณฑิตวิทยาลัยถาม/ตอบ</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">


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

        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-image: url('{{ asset('images/q_a/b_g_qa.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        .container {
            font-size: 24px;
            /* หรือจะเป็น 16px, 20px แล้วแต่ต้องการ */
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
            /* ลด padding ถ้าจอแคบ */
        }


        .menu-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            /* ✅ ทำให้กึ่งกลางแนวนอน */
            opacity: 0;
            transform: translateY(100px);
            animation: slideUp 1s ease-out forwards;
        }



        .menu-card {
            display: inline-block;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-10px);
        }

        .menu-card img {
            width: 100%;
            /* ยืดเต็ม .menu-card */
            max-width: 350px;
            /* ไม่เกิน 350px */
            height: auto;
            display: block;
            border: none;
            border-radius: 0;
            background: none;
            box-shadow: none;
        }


        .menu-slide-up {
            opacity: 0;
            transform: translateY(100px);
            animation: slideUp 1s ease-out forwards;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }



        .image-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            /* ✅ สำคัญ */
            gap: 10px;

        }

        .image-row img {
            width: 100%;
            max-width: 48%;
            height: auto;
        }
    </style>

    <script>
        function handleClick(menuNumber) {
            alert("อยู่ระหว่างการพัฒนา");
        }
    </script>

</head>

<body class="fc-font">

    @include('layouts.social_icons')


    <div class="container">
        <!-- หัวเว็บ -->


        <div class="menu-slide-up" style="
    width: 100%;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;  /* ✅ ระยะห่างระหว่างปุ่ม */
    padding: 10px 20px;
">




            <!-- ปุ่มภาษา (รูปธง) -->
            <img src="/images/th.jpg" width="30" style="cursor: pointer;" onclick="toggleLanguageth('')">
            <img src="/images/en.jpg" width="30" style="cursor: pointer;" onclick="toggleLanguageen('')">
            <img src="/images/zh.jpg" width="30" style="cursor: pointer;" onclick="toggleLanguagezh('')">

            <!-- ปุ่มเข้าสู่ระบบ -->
            <a href="{{ route('qanda.login.form') }}" id="loginButton"
                style="background-color: #f464a3; color: white; padding: 8px 16px; border-radius: 8px; font-size: 24px; text-decoration: none; font-weight: bold;">
                เข้าสู่ระบบ
            </a>



        </div>





        <div class="image-row menu-slide-up" style="display: flex; justify-content: space-between;">
            <img id="btn4" src="{{ asset('images/q_a/bg_left.png') }}" alt="Left"
                style="width: 48%; height: auto;  object-fit: contain;" />
            <img id="btn5" src="{{ asset('images/q_a/text_1.png') }}" alt="Right"
                style="width: 48%; height: auto; object-fit: contain;" />

        </div>

        <div class="image-row menu-slide-up"
            style="margin-top: -2px; width: 100%; height: 10px; background-color: white;"></div>

        <br><br>
        <!-- เมนู -->


        <div class="menu-container menu-slide-up">
            <div class="menu-card" onclick="window.location.href='/qanda/tableanswer'">
                <img id="btn1" src="{{ asset('images/q_a/q_a1.png') }}" alt="เมนู 1" />
            </div>
            <div class="menu-card" onclick="window.location.href='/qanda/question'">
                <img id="btn2" src="{{ asset('images/q_a/q_a2.png') }}" alt="เมนู 2" />
            </div>
            <div class="menu-card" onclick="window.location.href='/qanda/qanda_fa'">
                <img id="btn3" src="{{ asset('images/q_a/q_a3.png') }}" alt="เมนู 3" />
            </div>
        </div>

    </div>



    <br><br>

    <!-- ปุ่ม 3 ปุ่ม -->


    <!-- สคริปต์สลับภาษา -->
    <script>
        let isThai = true;

        function toggleLanguageth() {
            isThai = !isThai;

            document.getElementById('btn1').src = isThai
                ? '{{ asset('images/q_a/q_a1.png') }}'
                : '{{ asset('images/q_a/q_a1.png') }}';

            document.getElementById('btn2').src = isThai
                ? '{{ asset('images/q_a/q_a2.png') }}'
                : '{{ asset('images/q_a/q_a2.png') }}';

            document.getElementById('btn3').src = isThai
                ? '{{ asset('images/q_a/q_a3.png') }}'
                : '{{ asset('images/q_a/q_a3.png') }}';

            document.getElementById('btn4').src = isThai
                ? '{{ asset('images/q_a/bg_left.png') }}'
                : '{{ asset('images/q_a/bg_left.png') }}';

            document.getElementById('btn5').src = isThai
                ? '{{ asset('images/q_a/text_1.png') }}'
                : '{{ asset('images/q_a/text_1.png') }}';
        }
    </script>

    <script>
        let isEn = true;

        function toggleLanguageen() {
            isThai = !isEn;

            document.getElementById('btn1').src = isThai
                ? '{{ asset('images/q_a/q_a1.png') }}'
                : '{{ asset('images/q_a/q_a1en.png') }}';

            document.getElementById('btn2').src = isThai
                ? '{{ asset('images/q_a/q_a2.png') }}'
                : '{{ asset('images/q_a/q_a2en.png') }}';

            document.getElementById('btn3').src = isThai
                ? '{{ asset('images/q_a/q_a3.png') }}'
                : '{{ asset('images/q_a/q_a3en.png') }}';

            document.getElementById('btn4').src = isThai
                ? '{{ asset('images/q_a/bg_left.png') }}'
                : '{{ asset('images/q_a/bg_left.png') }}';

            document.getElementById('btn5').src = isThai
                ? '{{ asset('images/q_a/text_1.png') }}'
                : '{{ asset('images/q_a/text_1en.png') }}';
        }
    </script>

    <script>
        let iszh = true;

        function toggleLanguagezh() {
            isThai = !isEn;

            document.getElementById('btn1').src = isThai
                ? '{{ asset('images/q_a/q_a1.png') }}'
                : '{{ asset('images/q_a/q_a1zh.png') }}';

            document.getElementById('btn2').src = isThai
                ? '{{ asset('images/q_a/q_a2.png') }}'
                : '{{ asset('images/q_a/q_a2zh.png') }}';

            document.getElementById('btn3').src = isThai
                ? '{{ asset('images/q_a/q_a3.png') }}'
                : '{{ asset('images/q_a/q_a3zh.png') }}';

            document.getElementById('btn4').src = isThai
                ? '{{ asset('images/q_a/bg_left.png') }}'
                : '{{ asset('images/q_a/bg_left.png') }}';

            document.getElementById('btn5').src = isThai
                ? '{{ asset('images/q_a/text_1.png') }}'
                : '{{ asset('images/q_a/text_1zh.png') }}';
        }
    </script>

    <script>
        function toggleLanguageen() {
            document.getElementById('loginButton').innerText = 'Login';  // เปลี่ยนข้อความปุ่ม

            document.getElementById('btn1').src = '{{ asset('images/q_a/q_a1en.png') }}';
            document.getElementById('btn2').src = '{{ asset('images/q_a/q_a2en.png') }}';
            document.getElementById('btn3').src = '{{ asset('images/q_a/q_a3en.png') }}';

            document.getElementById('btn5').src = '{{ asset('images/q_a/text_1en.png') }}';
        }

        function toggleLanguageth() {
            document.getElementById('loginButton').innerText = 'เข้าสู่ระบบ';  // ภาษาไทย
            document.getElementById('btn1').src = '{{ asset('images/q_a/q_a1.png') }}';
            document.getElementById('btn2').src = '{{ asset('images/q_a/q_a2.png') }}';
            document.getElementById('btn3').src = '{{ asset('images/q_a/q_a3.png') }}';

            document.getElementById('btn5').src = '{{ asset('images/q_a/text_1.png') }}';
        }

        function toggleLanguagezh() {
            document.getElementById('loginButton').innerText = '登录';  // ภาษาจีน

            document.getElementById('btn1').src = '{{ asset('images/q_a/q_a1zh.png') }}';
            document.getElementById('btn2').src = '{{ asset('images/q_a/q_a2zh.png') }}';
            document.getElementById('btn3').src = '{{ asset('images/q_a/q_a3zh.png') }}';

            document.getElementById('btn5').src = '{{ asset('images/q_a/text_1zh.png') }}';
        }
    </script>

</body>

</html>