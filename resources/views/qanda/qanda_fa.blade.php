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
                @lang('form.คำถามที่พบบ่อย')
            </div>

            <div style="text-align: center;">
                <img src="{{ asset('images/q_a/text_2.png') }}" alt="ข้อความหัว" style="width: 95%; height: auto;">
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
                <h2 style="color: red; margin-bottom: 5px;"> @lang('form.รายละเอียดคำถาม')</h2>
                <hr style="margin-top: 5px;">

                <div style="margin-top: 15px; font-size: 18px;  padding-left: 30px;">
                    <!-- 1 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color:#f464a3;">คำถาม :</strong>
                        ต้องการดูรายละเอียดปฏิทินการศึกษา กำหนดการลงทะเบียนระดับบัณฑิตศึกษา สามารถดูได้ช่องทางใดบ้าง?
                    </p>
                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color:#f464a3;">คำตอบ :</strong>
                        นักศึกษาสามารถดูรายละเอียดปฏิทินการศึกษา กำหนดการลงทะเบียนระดับบัณฑิตศึกษา และดาวน์โหลดเอกสาร
                        ได้ที่เว็บไซต์บัณฑิตวิทยาลัย
                        <br>
                        <a href="http://grad.vru.ac.th" target="_blank" style="color:#4A90E2; text-decoration: none;">
                            http://grad.vru.ac.th
                        </a>

                        โดยคลิกที่หัวข้อ
                        <a href="http://grad.vru.ac.th" target="_blank" style="color:#4A90E2; text-decoration: none;">
                            “เกี่ยวกับนักศึกษา”
                        </a>
                        จากนั้นเลือกหัวข้อ
                        <span style="color:#4A90E2;">“ปฏิทินวิชาการ”</span>
                    </p>
                    <hr style="margin: 10px 0;">

                    <!-- 2 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        สามารถดาวน์โหลดแบบฟอร์มสำหรับนักศึกษาระดับบัณฑิตศึกษาได้ช่องทางใดบ้าง?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        นักศึกษาสามารถดาวน์โหลดแบบฟอร์ม ได้ที่เว็บไซต์บัณฑิตวิทยาลัย
                        <a href="http://grad.vru.ac.th" target="_blank" style="color: #4A90E2; text-decoration: none;">
                            <br>http://grad.vru.ac.thโดยคลิกที่หัวข้อ “เกี่ยวกับนักศึกษา” จากนั้นเลือกหัวข้อ
                            “แบบฟอร์มบัณฑิตศึกษา”
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">


                    <!-- 3 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        สามารถดาวน์โหลดแบบฟอร์มสำหรับนักศึกษาระดับบัณฑิตศึกษาได้ช่องทางใดบ้าง?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a href="http://grad.vru.ac.th" target="_blank" style="color: #4A90E2; text-decoration: none;">
                            เว็บไซต์บัณฑิตวิทยาลัย http://grad.vru.ac.th __
                        </a>
                        <a href="http://grad.vru.ac.th" target="_blank" style="color: #4A90E2; text-decoration: none;">
                            เว็บไซต์มหาวิทยาลัย http://ent.vru.ac.th
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">


                    <!-- 4 -->

                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        กรณีนักศึกษาไม่ได้ชำระค่าลงทะเบียนตามระยะเวลาที่กำหนดเกินหนึ่งภาคการศึกษาต้องดำเนินการอย่างไร ?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        นักศึกษาสามารถยื่นคำร้องของคือสภาพการเป็นนักศึกษา โดยสามารถดาวน์โหลดเอกสารคำร้องได้ที่
                        <a href="https://shorturl.asia/FIyRz" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            https://shorturl.asia/FIyRz
                        </a><br>
                        <a>
                            พร้อมทั้งกรอกข้อมูลในเอกสารให้ครบถ้วน
                            โดยผ่านการเห็นชอบจากประธานหลักสูตรแล้วนำส่งเอกสารคำร้องที่บัณฑิตวิทยาลัยเพื่อดำเนินการตามขั้นตอนต่อไป
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">

                    </p>



                    <!-- 5 -->

                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        สามารถศึกษาคู่มือการใช้งาระบบไอทีสิส สำหรับนักศึกษาระดับบัณฑิตศึกษา ได้อย่างไร?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        นักศึกษาสามารถดาวน์โหลดคู่มือการใช้งาระบบไอทีสิส สำหรับนักศึกษาระดับบัณฑิตศึกษา
                        ได้ที่หน้าเว็บไซต์บัณฑิตวิทยาลัย หัวข้อ iThesis
                        คู่มือการใช้งาระบบไอทีสิส สำหรับนักศึกษาระดับบัณฑิตศึกษา หรือ
                        <a href="http://grad.vru.ac.th/about_graduate/ga_ithesis.php" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            http://grad.vru.ac.th/about_graduate/ga_ithesis.php
                        </a>

                    </p>
                    <hr style="margin: 10px 0;">


                    <!-- 6 -->

                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        สามารถศึกษาศัพท์สถิติศาสตร์ที่พบบ่อยในการเขียนวิทยานิพนธ์ ได้อย่างไร?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a href="https://grad.vru.ac.th/about_graduate/ga_ithesis.php" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            นักศึกษาสามารถดาวน์โหลดคู่มือการพิมพ์วิทยานิพนธ์ การค้นคว้าอิสระ พ.ศ. 2566
                            ได้ที่หน้าเว็บไซต์บัณฑิตวิทยาลัย หัวข้อ เกี่ยวกับนักศึกษา
                            รูปแบบวิทยานิพนธ์/การค้นคว้าอิสระ/การเขียนบทความ
                        </a>
                        <br>
                        <a>
                            ศัพท์สถิติศาสตร์ที่พบบ่อยในการเขียนวิทยานิพนธ์ หรือ
                        </a>
                        <a href="https://grad.vru.ac.th/researchzone/research_platfrom.php" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            http://grad.vru.ac.th/researchzone/research_platfrom.php เพื่อดำเนินการตามขั้นตอนต่อไป
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">
                    </p>

                    <!-- 7 -->

                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        สามารถศึกษารูปแบบการพิมพ์วิทยานิพนธ์/การค้นคว้าอิสระ ได้อย่างไร?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            นักศึกษาสามารถดาวน์โหลดคู่มือการพิมพ์วิทยานิพนธ์ การค้นคว้าอิสระ พ.ศ. 2566
                            ได้ที่หน้าเว็บไซต์บัณฑิตวิทยาลัย หัวข้อ เกี่ยวกับนักศึกษา
                            รูปแบบวิทยานิพนธ์/การค้นคว้าอิสระ/การเขียนบทความ
                        </a>
                        <br>
                        <a>
                            คู่มือการพิมพ์วิทยานิพนธ์ การค้นคว้าอิสระ พ.ศ.2566 หรือ
                        </a>
                        <a href="https://grad.vru.ac.th/researchzone/research_platfrom.php" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            http://grad.vru.ac.th/researchzone/research_platfrom.php เพื่อดำเนินการตามขั้นตอนต่อไป
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">
                    </p>

                    <!-- 8 -->

                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        สามารถดาวน์โหลด Template วิทยานิพนธ์/การค้นคว้าอิสระ ได้อย่างไร?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            นักศึกษาสามารถดาวน์โหลด Template วิทยานิพนธ์/การค้นคว้าอิสระ
                            ได้ที่หน้าเว็บไซต์บัณฑิตวิทยาลัย หัวข้อ เกี่ยวกับนักศึกษา
                            <br>รูปแบบวิทยานิพนธ์/การค้นคว้าอิสระ/การเขียนบทความ
                        </a>
                        <br>
                        <a>
                            เลือกหัวข้อตามแผนการเรียน วิทยานิพนธ์ หรือการค้นคว้าอิสระ เลื่อนลงมาเพื่อเลือกดาวน์โหลด
                            Template
                        </a>
                        <a href="https://grad.vru.ac.th/researchzone/research_platfrom.php" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            <br>http://grad.vru.ac.th/researchzone/research_platfrom.php เพื่อดำเนินการตามขั้นตอนต่อไป
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">
                    </p>


                    <!-- 9 -->

                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        กรณีนักศึกษาไม่ได้ชำระค่าลงทะเบียนตามระยะเวลาที่กำหนดเกินหนึ่งภาคการศึกษาต้องดำเนินการอย่างไร?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            นักศึกษาสามารถยื่นคำร้องของคือสภาพการเป็นนักศึกษา โดยสามารถดาวน์โหลดเอกสารคำร้องได้ที่

                        </a>

                        <a href="https://shorturl.asia/FIyRz" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            https://shorturl.asia/FIyRz
                        </a>
                        <a>
                            พร้อมทั้งกรอกข้อมูลในเอกสารให้ครบถ้วนโดยผ่านการเห็นชอบจากประธานหลักสูตรแล้วนำส่งเอกสารคำร้องที่บัณฑิตวิทยาลัย
                            เพื่อดำเนินการตามขั้นตอนต่อไป
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">


                    <!-- 10 -->

                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        นักศึกษาสามารถยืมหนังสือในห้องแหล่งเรียนรู้ได้อย่างไร?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            นำหนังสือที่ต้องการยืมมาลงทะเบียนที่เคาท์เตอร์ หน้าห้องบัณฑิตวิทยาลัย

                        </a>
                    </p>
                    <hr style="margin: 10px 0;">

                    <!-- 11 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        นักศึกษาต้องการยืมโน๊ตบุ๊ค สามารถติดต่อขอยืมได้ที่ไหน?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            บัณฑิตวิทยาลัย ติดต่อ เจ้าหน้าที่งานการเงินของบัณฑิตวิทยาลัย

                        </a>
                    </p>
                    <hr style="margin: 10px 0;">

                    <!-- 12 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        ทำไมถึงดูเกรดไม่ได้ แต่เพื่อนในห้องดูเกรดได้?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            นักศึกษาต้องประเมินผู้สอนก่อนนะคะ ถึงจะสามารถมองเห็นเกรด

                        </a>
                    </p>
                    <hr style="margin: 10px 0;">

                    <!-- 13 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        นักศึกษาต้องลงทะเบียนหรือจองรายวิชาได้ตรงไหน?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            นักศึกษาสามารถลงทะเบียนและจองรายวิชา ได้ที่
                        </a>
                        <a href="https://shorturl.asia/FIyRz" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            http://reg1.vru.ac.th
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">


                    <!-- 14 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        ระเบียบกับประกาศของบัณฑิตวิทยาลัย สามารถเข้าไปค้นหาได้จากไหน?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            เว็บไซต์บัณฑิตวิทยาลัย หัวข้อ ระเบียบ ข้อบังคับ ประกาศ

                        </a>
                    </p>
                    <hr style="margin: 10px 0;">



                    <!-- 15 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        ห้องประชุม 409 ว่างหรือไม่?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            ท่านสามารถเข้าไปเช็คห้องว่างได้ในระบบ V Rooms

                        </a>
                    </p>
                    <hr style="margin: 10px 0;">

                    <!-- 16 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        นักศึกษาใช้ wifi ไม่ได้ ต้องทำอย่างไรบ้าง?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            โดยปกติ นักศึกษาสามารถเข้าใช้ wifi ของมหาวิทยาลัยได้ โดยใช้ รหัสนักศึกษาเป็นทั้ง username
                            และ password กรณีไม่สามารถใช้ได้ สามารถติดต่อบัณฑิตวิทยาลัย โดยกรอกข้อมูลในแบบฟอร์มนี้


                        </a>
                        <a href="https://shorturl.asia/0KT38" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            https://shorturl.asia/0KT38
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">

                    <!-- 17 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        นักศึกษาจะเข้าใช้งานอีเมล์มหาวิทยาลัย @vru.ac.th ได้อย่างไร?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            นักศึกษาสามารถใช้วัน เดือน และปีเกิด เป็นรหัสผ่านอีเมล์ของมหาวิทยาลัย เช่น
                            นักศึกษาเกิดวันที่ 5 มกราคม 2538
                            รหัสคือ 05012538<br>กรณีไม่สามารถเข้าใช้งานได้ สามารถติดต่อขอความช่วยเหลือโดย
                            กรอกข้อมูลในแบบฟอร์มนี้

                        </a>
                        <a href="https://shorturl.asia/ug6XD" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            https://shorturl.asia/ug6XD
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">

                    <!-- 18 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        นักศึกษาต้องการรักษาสถานภาพการเป็นนักศึกษาต้องดำเนินการอย่างไรบ้าง?
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            นักศึกษาสามารถดาวน์โหลดเอกสารคำร้องขอรักษาสถานภาพการเป็นนักศึกษา (มรว.บ.15) ได้ที่
                        </a>
                        <a href="https://shorturl.asia/LlvgV" target="_blank"
                            style="color: #4A90E2; text-decoration: none;">
                            https://shorturl.asia/LlvgV
                        </a><br>
                        <a>
                            พร้อมทั้งกรอกข้อมูลในเอกสารให้ครบถ้วนโดยผ่านการเห็นชอบจากอาจารย์ที่ปรึกษาแล้วนำส่งเอกสารคำร้องที่บัณฑิตวิทยาลัย
                            เพื่อดำเนินการตามขั้นตอนต่อไป
                        </a>
                    </p>
                    <hr style="margin: 10px 0;">

                    <!-- 19 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        ระดับปริญญาโท สาขานวัตกรรมการบริหารการศึกษา ขอใบประกอบวิชาชีพบริหารการศึกษาได้ไหม
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            สามารถยื่นขอใบประกอบวิชาชีพได้ที่คุรุสภา

                        </a>
                    </p>
                    <hr style="margin: 10px 0;">



                    <!-- 20 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        สาขานวัตกรรมการบริหารการศึกษามีเรียนรอบเสาร์-อาทิตย์ไหม
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            สำหรับสาขานวัตกรรมการบริหารการศึกษา ปัจจุบันมีเปิดการเรียนการสอนเฉพาะเสาร์-อาทิตย์

                        </a>
                    </p>
                    <hr style="margin: 10px 0;">

                    <!-- 21 -->
                    <p style="margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำถาม :</strong>
                        บัณฑิตวิทยาลัยเปิดทำการวันไหนบ้าง
                    </p>

                    <p style="margin-top: 0; margin-bottom: 5px;">
                        <strong style="color: #f464a3;">คำตอบ :</strong>
                        <a>
                            บัณฑิตวิทยาลัยเปิดทำการทุกวัน ไม่เว้นวันเสาร์-อาทิตย์ ตั้งแต่เวลา 08.30-16.30 น.
                            (การปิดทำการในวันหยุดนักขัตฤกษ์ จะมีประกาศแจ้งให้ทราบ)

                        </a>
                    </p>
                    <hr style="margin: 10px 0;">





                </div>
            </div>




        </div>
        <br><br>
        <div class="fade-up" style="text-align: center; margin-bottom: 16px;">
            <img src="{{ asset('images/q_a/img_3.png') }}" alt="ข้อความหัว" style="width: 95%;  height: auto;">
        </div>
    </div>



</body>

</html>