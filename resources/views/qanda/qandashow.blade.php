<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>ดูรายละเอียดคำถาม</title>
</head>
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
        font-size: 24px;
        /* หรือจะเป็น 16px, 20px แล้วแต่ต้องการ */
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #FF92BE;
        /* ✅ สีชมพู - ในกรอบ */
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
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

<body class="fc-font">
    <div class="container">

        <!-- ปุ่มเข้าสู่ระบบ ด้านขวาบน -->
      

        <br>

        <div class="fade-up" style="
    display: flex;
    justify-content: flex-end;
    gap: 12px;  /* ✅ ระยะห่างระหว่างปุ่ม */
    margin-bottom: 20px;
">

            <a href="/qanda/answer" style="
        background-color: #f464a3;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 24px;
        text-decoration: none;
        font-weight: bold;
    ">
                หน้าหลัก
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
                เข้าสู่ระบบ
            </a>

        </div>


    
        <!-- รูป text_2 อยู่กึ่งกลาง -->
        <div class="fade-up" style="margin-bottom: 16px;">

            <div style="
        text-align: left;
        color: white;
        font-weight: bold;
        font-size: 56px;
        padding-left: 30px;
        margin-bottom: -30px;  /* ✅ ดันให้ข้อความชิดรูปมากขึ้น */
        line-height: 1.0;      /* ✅ ลดระยะบรรทัด */
    ">
                คำถามทั้งหมด
            </div>

            <div style="text-align: center;">
                <img src="{{ asset('images/q_a/text_2.png') }}" alt="ข้อความหัว" style="width: 95%; height: auto;">
            </div>

        </div>
        <!-- กล่องใหม่ พื้นหลังขาว -->
        <div class="fade-up" style="
    background-color: white;
    border-radius: 16px;
    padding: 24px;
    margin-top: 40px;
    max-width: 1100px;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
">
            @if($record->status === 'ตอบแล้ว')
                <h2 style="color: red; margin-bottom: 5px;">รายละเอียดคำถาม</h2>
                <hr style="margin-top: 5px;">
                <p><strong>หัวข้อ:</strong> {{ $record->heading }}</p>
                <p><strong>รายละเอียด:</strong> {{ $record->details }}</p>
                <p><strong>ผู้ถาม:</strong> {{ $record->name }} <strong>email:</strong> {{ $record->mail }}</p>
                <p><strong>เขียนเมื่อ:</strong>
                    {{ \Carbon\Carbon::parse($record->created_at)->format('j F Y เวลา H:i:s น.') }}</p>

                <h2 style="color: red; margin-bottom: 5px;">คำถาม</h2>
                <hr style="margin-top: 5px;">
                <p> {{ $record->answer }}</p>
            @else
                <div style="padding: 40px; font-size: 24px; color: #dc3545; text-align: center;">
                    ❗ คำถามนี้ยังไม่ได้รับการตอบ กรุณารอผู้ดูแลระบบ
                </div>
            @endif


            <br>
            <a href="{{ url()->previous() }}">ย้อนกลับ</a>
        </div>
        <br><br>
        <div class="fade-up" style="text-align: center; margin-bottom: 16px;">
            <img src="{{ asset('images/q_a/img_2.png') }}" alt="ข้อความหัว" style="width: 95%;  height: auto;">
        </div>
    </div>



</body>

</html>