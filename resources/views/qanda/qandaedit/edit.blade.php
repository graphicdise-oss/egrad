<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>แก้ไขคำถาม</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 24px 0;

            background-color: white;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: center;
        }

        table th {
            background-color: #fcd3e1;
            color: #333;
        }

        .input-icon-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            width: 20px;
            height: 20px;
            opacity: 0.6;
            pointer-events: none;
        }

        .custom-select-qanda {
            width: 100%;
            max-width: 100%;
            padding: 10px 14px 10px 40px;
            /* ❗ซ้ายเว้นไว้ให้ไอคอน */

            border: 2px solid #f464a3;
            border-radius: 12px;
            background-color: #fff0f6;
            color: #333;
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg fill='gray' height='24' viewBox='0 0 24 24' width='24'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 18px;
        }

        .custom-select-qanda:focus {
            outline: none;
            border-color: #d63384;
            box-shadow: 0 0 0 3px rgba(255, 146, 190, 0.3);
        }
    </style>
</head>

<body class="fc-font">


    <div class="container">

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

            <a href="{{ url('/qanda/logout') }}" style="
        background-color: #dc3545;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 24px;
        text-decoration: none;
        font-weight: bold;
    ">
                ออกจากระบบ
            </a>

        </div>


        <br><br>
        <!-- รูป text_2 อยู่กึ่งกลาง -->
        <div class="fade-up" style="text-align: center; margin-bottom: 16px;">
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
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
">
            <div class="fade-up" style="text-align: center; margin-bottom: 16px;">
                <img src="{{ asset('images/q_a/img_1.png') }}" alt="ข้อความหัว" style="width: 30%;  height: auto;">
            </div>
            <form method="POST" action="{{ route('qanda.update', $record->id) }}">
                @csrf
                @method('PUT')


                <div class="fade-up"
                    style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: auto;">
                    <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
    white-space: nowrap; text-align: center; width: 10%; min-width: 100px;
    box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                        หัวข้อ
                    </div>
                    <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
                display: flex; align-items: center; box-shadow: 0 0 0 1px #ddd;">
                        <input type="text" name="heading" value="{{ $record->heading }}" placeholder="หัวข้อ"
                            style="border: none; outline: none; width: 100%; font-size: 16px; background: none; color: #f464a3; ">
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
        white-space: nowrap; text-align: center; width: 10%; min-width: 100px;
        box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                        รายละเอียด
                    </div>

                    <!-- กล่อง textarea -->
                    <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
        display: flex; box-shadow: 0 0 0 1px #ddd;">
                        <textarea rows="3" name="details" placeholder="รายละเอียด"
                            style="border: none; outline: none; width: 100%; font-size: 16px; background: none; resize: vertical; color: #f464a3;">{{ $record->details }}</textarea>
                    </div>
                </div>

                <div class="fade-up"
                    style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
                </div>

                <div class="fade-up"
                    style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: auto;">
                    <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
    white-space: nowrap; text-align: center; width: 10%; min-width: 100px;
    box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                        Email
                    </div>
                    <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
                display: flex; align-items: center; box-shadow: 0 0 0 1px #ddd;">
                        <input type="email" name="mail" value="{{ $record->mail }}" placeholder="อีเมล"
                            style="border: none; outline: none; width: 100%; font-size: 16px; background: none; color: #f464a3; ">
                    </div>
                </div>

                <div class="fade-up"
                    style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
                </div>


                <div class="fade-up"
                    style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: auto;">
                    <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
    white-space: nowrap; text-align: center; width: 10%; min-width: 100px;
    box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                        รูปภาพ
                    </div>
                    @if ($record->image)
                        <a href="{{ asset('storage/documents/' . $record->image) }}" target="_blank">
                            เปิดไฟล์แนบ
                        </a>
                    @else
                        <p>ยังไม่มีไฟล์แนบ</p>
                    @endif


                </div>

                <div class="fade-up"
                    style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
                </div>

                <div class="fade-up"
                    style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: auto;">
                    <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
    white-space: nowrap; text-align: center; width: 10%; min-width: 100px;
    box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                        ลงชื่อ
                    </div>
                    <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
                display: flex; align-items: center; box-shadow: 0 0 0 1px #ddd;">
                        <input type="text" name="name" value="{{ $record->name }}" placeholder="ชื่อผู้ถาม"
                            style="border: none; outline: none; width: 100%; font-size: 16px; background: none; color: #f464a3; ">
                    </div>
                </div>

                <div class="fade-up"
                    style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
                </div>

                <div class="fade-up"
                    style="display: flex; align-items: center; gap: 2%; width: 100%; max-width: 700px; margin: auto;">
                    <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
    white-space: nowrap; text-align: center; width: 10%; min-width: 100px;
    box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                        สถานะ
                    </div>
                    <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
                display: flex; align-items: center; box-shadow: 0 0 0 1px #ddd;">
                        <select name="status"
                            style="border: none; outline: none; width: 100%; font-size: 16px; background: none; color: #f464a3; ">
                            <option value="ตอบแล้ว" {{ $record->status == 'ตอบแล้ว' ? 'selected' : '' }}>
                                ตอบแล้ว
                            </option>
                        </select>

                    </div>
                </div>

                <div class="fade-up"
                    style="height: 4px; background-color: #f464a3; width: 100%; max-width: 700px; margin: 20px auto;">
                </div>


                <div class="fade-up"
                    style="display: flex; align-items: flex-start; gap: 2%; width: 100%; max-width: 700px; margin: auto;">

                    <!-- กล่องข้อความ "คำตอบ" -->
                    <div style="background-color: white; border-radius: 12px; padding: 10px 0; font-weight: bold;
        white-space: nowrap; text-align: center; width: 10%; min-width: 100px;
        box-shadow: 0 0 0 1px #ddd; color: #f464a3;">
                        คำตอบ
                    </div>

                    <!-- กล่อง textarea -->
                    <div style="background-color: white; border-radius: 12px; padding: 10px 12px; width: 83%;
        display: flex; box-shadow: 0 0 0 1px #ddd;">
                        <textarea rows="3" name="answer"
                            style="border: none; outline: none; width: 100%; font-size: 16px; background: none; resize: vertical; color: #f464a3;">{{ $record->answer }}</textarea>
                    </div>
                </div>


                <br><br>

                <div class="fade-up" style="text-align: center; margin-top: 30px;">
                    <!-- ปุ่มยืนยัน -->
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
                        ยืนยัน
                    </button>


                    <!-- ปุ่มย้อนกลับ -->
                    <a href="{{ url()->previous() }}" style="
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

                        ย้อนกลับ
                    </a>

                </div>


            </form>
        </div>
    </div>

</body>

</html>