<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>ระบบจัดการข้อมูล</title>
    <script src="https://cdn.tailwindcss.com"></script>

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
    </style>
</head>

<body class="bg-gray-100 min-h-screen fc-font">


    <!-- โครงหลักของหน้า: flex -->
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        @include('layouts.menuleft')
        @include('layouts.menutop')


        <div class="p-8">
            <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
                <h2 class="text-[22px] font-semibold">เพิ่มข้อมูลอาจารย์</h2>
                <br>
                <hr>
                <br>
                <form>
                    <!-- 1 -->
                    <div class="flex space-x-4 mb-4">
                        <!-- ช่องกรอกประเภทข้อมูล -->
                        <div class="w-1/2">
                            <div
                                class="flex items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <div class="flex items-center justify-center px-3 border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                    </svg>
                                </div>
                                <input type="text" class="flex-1 p-2 text-sm bg-gray-50 focus:outline-none" name=""
                                    placeholder="ชื่อ">
                            </div>
                        </div>

                        <!-- 2 -->
                        <div class="w-1/2">
                            <div
                                class="flex items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <div class="flex items-center justify-center px-3 border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                    </svg>

                                </div>
                                <input type="text" class="flex-1 p-2 text-sm bg-gray-50 focus:outline-none" name=""
                                    placeholder="นาสกุล">
                            </div>
                        </div>
                    </div>


                    <div class="flex space-x-4 mb-4">
                        <!-- 3 -->
                        <div class="w-1/2">
                            <div
                                class="flex items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <div class="flex items-center justify-center px-3 border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                </div>
                                <input type="text" class="flex-1 p-2 text-sm bg-gray-50 focus:outline-none" name=""
                                    placeholder="อีเมล">
                            </div>
                        </div>

                        <!-- 4 -->
                        <div class="w-1/2">
                            <div
                                class="flex items-center border border-gray-500 rounded-md shadow-sm overflow-hidden bg-gray-50">
                                <div class="flex items-center justify-center px-3 border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                    </svg>
                                </div>
                                <input type="text" class="flex-1 p-2 text-sm bg-gray-50 focus:outline-none" name=""
                                    placeholder="โทรศัพท์">
                            </div>
                        </div>
                    </div>



                    <!-- หัวข้อ -->
                    <p class="text-[18px] mb-2 underline underline-offset-2 decoration-gray-700">
                        ประวัติการศึกษา
                    </p>

                    <!-- แถว: ระดับ + ปริญญาใบที่ 1 -->
                    <!-- กลุ่มทั้งหมด -->
                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label ซ้าย -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ระดับปริญญาตรี
                        </label>

                        <!-- ช่องกรอกขวา -->
                        <div class="w-2/3 space-y-3">
                            <!-- แถวช่องกรอก 2 ช่อง (1/3 และ 2/3) -->
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text"
                                    class="col-span-1 p-2 text-sm border border-gray-500 rounded-md bg-gray-200 text-gray-800"
                                    name="" placeholder="ปริญญาตรีใบที่1" disabled>

                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="ชื่อปริญญาตรี (สาขาวิชา)">
                            </div>

                            <!-- แถวช่องกรอก 2 ช่อง (2/3 และ 1/3) -->
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="สถาบันการศึกษา">

                                <input type="text" class="col-span-1 p-2 text-sm border border-gray-500 rounded-md"
                                    placeholder="ปีที่จบ">
                            </div>
                        </div>
                    </div>


                    <!-- แถว: ระดับ + ปริญญาใบที่ 2 -->
                    <!-- กลุ่มทั้งหมด -->
                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label ซ้าย -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ระดับปริญญาตรี
                        </label>
                        <!-- ช่องกรอกขวา -->
                        <div class="w-2/3 space-y-3">
                            <!-- แถวช่องกรอก 2 ช่อง (1/3 และ 2/3) -->
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text"
                                    class="col-span-1 p-2 text-sm border border-gray-500 rounded-md bg-gray-200 text-gray-800"
                                    name="" placeholder="ปริญญาตรีใบที่1" disabled>
                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="ชื่อปริญญาตรี (สาขาวิชา)">
                            </div>
                            <!-- แถวช่องกรอก 2 ช่อง (2/3 และ 1/3) -->
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="สถาบันการศึกษา">
                                <input type="text" class="col-span-1 p-2 text-sm border border-gray-500 rounded-md"
                                    placeholder="ปีที่จบ">
                            </div>
                        </div>
                    </div>

                    <!-- แถว: ระดับ + ปริญญาใบที่ 3 -->

                    <div class="flex items-start space-x-4 mb-4">
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ระดับปริญญาตรี
                        </label>
                        <div class="w-2/3 space-y-3">
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text"
                                    class="col-span-1 p-2 text-sm border border-gray-500 rounded-md bg-gray-200 text-gray-800"
                                    name="" placeholder="ปริญญาตรีใบที่1" disabled>

                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="ชื่อปริญญาตรี (สาขาวิชา)">
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="สถาบันการศึกษา">

                                <input type="text" class="col-span-1 p-2 text-sm border border-gray-500 rounded-md"
                                    placeholder="ปีที่จบ">
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="flex items-start space-x-4 mb-4">
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ระดับปริญญาโท
                        </label>
                        <div class="w-2/3 space-y-3">
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text"
                                    class="col-span-1 p-2 text-sm border border-gray-500 rounded-md bg-gray-200 text-gray-800"
                                    name="" placeholder="ปริญญาโทที่1" disabled>

                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="ชื่อปริญญาโท (สาขาวิชา)">
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="สถาบันการศึกษา">

                                <input type="text" class="col-span-1 p-2 text-sm border border-gray-500 rounded-md"
                                    placeholder="ปีที่จบ">
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4 mb-4">
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ระดับปริญญาโท
                        </label>
                        <div class="w-2/3 space-y-3">
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text"
                                    class="col-span-1 p-2 text-sm border border-gray-500 rounded-md bg-gray-200 text-gray-800"
                                    name="" placeholder="ปริญญาโทที่1" disabled>

                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="ชื่อปริญญาโท (สาขาวิชา)">
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="สถาบันการศึกษา">

                                <input type="text" class="col-span-1 p-2 text-sm border border-gray-500 rounded-md"
                                    placeholder="ปีที่จบ">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-4">
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ระดับปริญญาโท
                        </label>
                        <div class="w-2/3 space-y-3">
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text"
                                    class="col-span-1 p-2 text-sm border border-gray-500 rounded-md bg-gray-200 text-gray-800"
                                    name="" placeholder="ปริญญาโทที่1" disabled>

                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="ชื่อปริญญาโท (สาขาวิชา)">
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="สถาบันการศึกษา">

                                <input type="text" class="col-span-1 p-2 text-sm border border-gray-500 rounded-md"
                                    placeholder="ปีที่จบ">
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="flex items-start space-x-4 mb-4">
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ระดับปริญญาเอก
                        </label>
                        <div class="w-2/3 space-y-3">
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text"
                                    class="col-span-1 p-2 text-sm border border-gray-500 rounded-md bg-gray-200 text-gray-800"
                                    name="" placeholder="ปริญญาเอกที่1" disabled>

                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="ชื่อปริญญาเอก (สาขาวิชา)">
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="สถาบันการศึกษา">

                                <input type="text" class="col-span-1 p-2 text-sm border border-gray-500 rounded-md"
                                    placeholder="ปีที่จบ">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-4">
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ระดับปริญญาเอก
                        </label>
                        <div class="w-2/3 space-y-3">
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text"
                                    class="col-span-1 p-2 text-sm border border-gray-500 rounded-md bg-gray-200 text-gray-800"
                                    name="" placeholder="ปริญญาเอกที่1" disabled>

                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="ชื่อปริญญาเอก (สาขาวิชา)">
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="สถาบันการศึกษา">

                                <input type="text" class="col-span-1 p-2 text-sm border border-gray-500 rounded-md"
                                    placeholder="ปีที่จบ">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-4">
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ระดับปริญญาเอก
                        </label>
                        <div class="w-2/3 space-y-3">
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text"
                                    class="col-span-1 p-2 text-sm border border-gray-500 rounded-md bg-gray-200 text-gray-800"
                                    name="" placeholder="ปริญญาเอกที่1" disabled>

                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="ชื่อปริญญาเอก (สาขาวิชา)">
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <input type="text" class="col-span-2 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="สถาบันการศึกษา">

                                <input type="text" class="col-span-1 p-2 text-sm border border-gray-500 rounded-md"
                                    name="" placeholder="ปีที่จบ">
                            </div>
                        </div>
                    </div>

                    <br>

                    <p class="text-[18px] mb-2 underline">ผลงานทางวิชาการ</p>

                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            หนังสือ ตำรา งานแปล
                        </label>

                        <!-- ช่องกรอก -->
                        <div class="w-2/3">
                            <textarea rows="2"
                                class="w-full p-2 text-sm border border-gray-500 rounded-md focus:outline-none" name=""
                                placeholder="กรอกชื่อหนังสือ ตำรา งานเเปล ที่เคยทำ (พิมพ์แยกบรรทัดได้)"></textarea>

                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            งานวิจัย
                        </label>

                        <!-- ช่องกรอก -->
                        <div class="w-2/3">
                            <textarea rows="2"
                                class="w-full p-2 text-sm border border-gray-500 rounded-md focus:outline-none" name=""
                                placeholder="กรอกชื่องานวิจัยหรือลิงก์งานวิจัย (พิมพ์แยกบรรทัดได้)"></textarea>

                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            บทความวิจัย
                        </label>

                        <!-- ช่องกรอก -->
                        <div class="w-2/3">
                            <textarea rows="2"
                                class="w-full p-2 text-sm border border-gray-500 rounded-md focus:outline-none" name=""
                                placeholder="กรอกบทความวิจัย (เขียนในรูปแบบอ้างอิง)"></textarea>

                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            บทความวิชาการ
                        </label>

                        <!-- ช่องกรอก -->
                        <div class="w-2/3">
                            <textarea rows="2"
                                class="w-full p-2 text-sm border border-gray-500 rounded-md focus:outline-none" name=""
                                placeholder="กรอกบทความวิชาการ (เขียนในรูปแบบอ้างอิง)"></textarea>

                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ประสบการณ์ในการสอน
                        </label>

                        <!-- ช่องกรอก -->
                        <div class="w-2/3">
                            <textarea rows="1"
                                class="w-full p-2 text-sm border border-gray-500 rounded-md focus:outline-none" name=""
                                placeholder="กรอกประสบการณ์ในการสอน (กี่ปี)"></textarea>

                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            ภาระงานสอน เขียนเป็นข้อๆ (1)<br>(2)<br>(3)<br>(4)<br>(5)
                        </label>

                        <!-- ช่องกรอก -->
                        <div class="w-2/3">
                            <textarea rows="5"
                                class="w-full p-2 text-sm border border-gray-500 rounded-md focus:outline-none"
                                name=""></textarea>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            เลขบัตรประชาชน (Username)*
                        </label>

                        <!-- ช่องกรอก -->
                        <div class="w-2/3">
                            <textarea rows="1"
                                class="w-full p-2 text-sm border border-gray-500 rounded-md focus:outline-none" name=""
                                placeholder="กรอกเลขบัตรประชาชน"></textarea>

                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            สังกัด/คณะ*
                        </label>

                        <!-- ช่องกรอก -->
                        <div class="w-2/3">
                            <select name="faculty"
                                class="w-full p-2 text-sm border border-gray-500 rounded-md bg-gray-50 focus:outline-none focus:ring focus:ring-green-200">
                                <option selected disabled>- กรุณากรอกข้อมูล -</option>
                                <option>ครุศาสตร์</option>
                                <option>วิทยาศาสตร์และเทคโนโลยี</option>
                                <option>เทคโนโลยีอุตสาหกรรม</option>
                                <option>เทคโนโลยีการเกษตร</option>
                                <option>มนุษยศาสตร์และสังคมศาสตร์</option>
                                <option>สาธารณสุขศาสตร์</option>
                                <option>วิทยาลัยนวัตกรรมการจัดการ</option>
                                <option>บัณฑิตวิทยาลัย</option>
                            </select>
                        </div>
                    </div>


                    <div class="flex items-start space-x-4 mb-4">
                        <!-- Label -->
                        <label class="w-1/3 text-right text-sm font-medium text-gray-700 pt-2">
                            สาขาวิชา*
                        </label>

                        <!-- Dropdown -->
                        <div class="w-2/3">
                            <select name="major"
                                class="w-full p-2 text-sm border border-gray-500 rounded-md bg-gray-50 focus:outline-none focus:ring focus:ring-green-200">
                                <option selected disabled>- กรุณากรอกข้อมูล -</option>
                                <option>หลักสูตรและการสอน</option>
                                <option>การบริหารการศึกษา</option>
                                <option>บริหารการบริหารการศึกษา</option>
                                <option>บริหารธุรกิจ (MBA)</option>
                                <option>การบริหารธุรกิจ (DBA)</option>
                                <option>รัฐประศาสนศาสตร์</option>
                                <option>นวัตกรรมการจัดการสิ่งแวดล้อม</option>
                                <option>เทคโนโลยีการจัดการเกษตร</option>
                                <option>การจัดการเทคโนโลยี</option>
                                <option>การจัดการระบบสุขภาพ</option>
                                <option>วิทยาศาสตร์ศึกษา</option>
                                <option>วิทยาศาสตร์และนวัตกรรมเพื่อการพัฒนา</option>
                                <option>สิ่งแวดล้อมศึกษา</option>
                                <option>นวัตกรรมการบริหารปกครองและการประกอบการเพื่อสังคม</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="flex items-center space-x-4 mb-4">

                        <!-- ✅ ปุ่มอยู่ช่องขวา -->

                        <div class="w-2/6"></div>
                        <button
                            class="w-32 w-1/6 flex items-center space-x-1 px-4 py-2 bg-green-200 hover:bg-green-300 text-green-900 rounded shadow border border-green-600 text-green-700 hover:bg-green-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <span>ยืนยัน</span>
                        </button>

                        <button
                            class="w-32 w-1/6 flex items-center space-x-1 px-4 py-2 bg-white border hover:bg-gray-100 text-gray-800 rounded shadow border border-gray-400 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            <span>ล้างข้อมูล</span>
                        </button>
                    </div><br><br><br>
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