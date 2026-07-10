<!DOCTYPE html>
<html lang="th">

<head>
    <base href="{{ url('/') }}/">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <title>คำถาม/คำตอบ</title>
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

    @include('layouts.social_icons')

    <div class="container">
        <br>
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

        <br>



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
                @lang('form.คำถามทั้งหมด')
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


            <form method="GET" action="{{ url('/qanda/tableanswer') }}" class="mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="input-icon-wrapper" style="position: relative;">
                            <!-- 🔍 SVG ไอคอน -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" width="20" height="20"
                                style="position: absolute; top: 50%; left: 12px; transform: translateY(-50%); opacity: 0.6; z-index: 2;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-5.2-5.2m0 0A7.5 7.5 0 1 0 5.2 5.2a7.5 7.5 0 0 0 10.6 10.6Z" />
                            </svg>

                            <!-- 🔽 Select Box -->
                            <select name="type" class="custom-select-qanda" onchange="this.form.submit()"
                                style="padding-left: 50px; height: 50px; border-radius: 8px; border: 1px solid #ccc; width: 100%; ">
                                <option value="">@lang('form.เลือกคำถาม')</option>
                                <option value="ร้องเรียน" {{ request('type') == 'ร้องเรียน' ? 'selected' : '' }}>
                                    @lang('form.ร้องเรียน')
                                </option>
                                <option value="แนะนำติชม" {{ request('type') == 'แนะนำติชม' ? 'selected' : '' }}>
                                    @lang('form.เเนะนำติชม')
                                </option>
                                <option value="สอบถามข้อมูล" {{ request('type') == 'สอบถามข้อมูล' ? 'selected' : '' }}>
                                    @lang('form.สอบถามข้อมูล')
                                </option>
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>




            <!-- กล่องแสดงรายการคำถาม -->
            <div class="fade-up"
                style="background-color: white; border-radius: 16px; padding: 24px; margin-top: 40px; max-width: 1100px; margin-left: auto; margin-right: auto; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);">


                @foreach ($qa as $item)
                    <div style="border-bottom: 1px solid #ccc; padding: 10px;">
                        <div style="font-size: 24px;">
                            <a href="{{ route('qanda.show', $item->id) }}" style="color: blue; font-weight: bold;">
                                คำถามที่ {{ $item->id }}: {{ $item->heading }}
                            </a>

                            |
                            ผู้ถาม: {{ $item->name }}
                            |
                            วันที่: {{ \Carbon\Carbon::parse($item->created_at)->format('j F Y') }}
                            |
                            เวลา: {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s') }}
                            |
                            <span style="color: {{ $item->status === 'ตอบแล้ว' ? 'green' : 'red' }}">
                                {{ $item->status ?? 'ยังไม่มีคำตอบ' }}
                            </span>

                            <span style="font-weight: bold;">{{ $item->type }}</span>
                        </div>
                    </div>
                @endforeach

                <!-- ✅ pagination อยู่หลัง foreach -->
                <div class="mt-4" style="text-align: center;">
                    {{ $qa->links('pagination::bootstrap-5') }}
                </div>

            </div>


            <br><br>
            <div class="fade-up" style="text-align: center; margin-bottom: 16px;">
                <img src="{{ asset('images/q_a/img_2.png') }}" alt="ข้อความหัว" style="width: 95%;  height: auto;">
            </div>

</body>

</html>