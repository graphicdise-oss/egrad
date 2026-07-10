<!DOCTYPE html>
<html>

<head>
    <title>E - Graduate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">



</head>

<body class="bg-gray-100 min-h-screen fc-font">


    <div class="flex min-h-screen">

        <!-- Sidebar -->
        @include('layouts.menuleft3')
        @include('layouts.menutop')


        <div class="p-8">
            <!-- กล่องใหม่ พื้นหลังขาว -->

            <div class="flex min-h-screen">
                <!-- ฝั่งซ้าย -->
                <div class="w-1/2 bg-white p-6 border-r">
                    <h2 class="text-lg font-semibold mb-4">การสอบวัดความรู้ภาษาอังกฤษ
                        <hr>
                    </h2>
                    <form method="POST"
                        action="{{ route('student.section.save', ['section' => 't_system3', 'id_no' => $student->id_no]) }}">
                        @csrf

                        <div class="flex items-center gap-2 mb-4">
                            <label for="status" class="text-sm  shrink-0">สถานะ</label>
                            <select name="comp_exam_status3" id="status" class="form-select">
                                <option value="">- กรุณาเลือกข้อมูล -</option>
                                <option value="Y" {{ ($student->comp_exam_status3 ?? '') === 'Y' ? 'selected' : '' }}>ผ่าน
                                </option>
                                <option value="N" {{ ($student->comp_exam_status3 ?? '') === 'N' ? 'selected' : '' }}>
                                    ไม่ผ่าน</option>
                            </select>

                        </div>
                        <hr>
                        <br>
                        <button type="submit" class="btn btn-success me-2">บันทึก</button>
                        <button type="reset" class="btn btn-primary">รีเซ็ต</button>
                    </form>
                </div>

                <!-- ฝั่งขวา -->
                <div class="w-1/2 bg-white p-6">
                    <h2 class="text-lg font-semibold flex items-center gap-2 mb-2">
                        <i class="fa-solid fa-calendar-days text-2xl"></i>
                        ปฏิทินวิชาการ
                    </h2>
                    <hr class="mb-4">

                    <!-- ปุ่มเปลี่ยนปี -->

                    <div class="flex flex-wrap gap-2 mb-4">
                        <button onclick="showYear('2564')" id="btn-2564"
                            class="px-4 py-2 rounded border bg-gray-200 hover:bg-gray-300 text-sm">
                            2564
                        </button>
                        <button onclick="showYear('2563')" id="btn-2563"
                            class="px-4 py-2 rounded border bg-gray-200 hover:bg-gray-300 text-sm">
                            2563
                        </button>
                        <button onclick="showYear('2562')" id="btn-2562"
                            class="px-4 py-2 rounded border bg-gray-200 hover:bg-gray-300 text-sm">
                            2562
                        </button>
                        <button onclick="showYear('2561')" id="btn-2561"
                            class="px-4 py-2 rounded border bg-gray-200 hover:bg-gray-300 text-sm">
                            2561
                        </button>
                        <button onclick="showYear('2560')" id="btn-2560"
                            class="px-4 py-2 rounded border bg-gray-200 hover:bg-gray-300 text-sm">
                            2560
                        </button>
                    </div>


                    <!-- กล่องข้อมูลแต่ละปี 2564-->
                    <div id="content-2564" class="year-content">
                        <h5 class="font-bold">[ภาคการศึกษาที่ 1/2564]</h5>

                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษาแบบเต็มเวลา (จันทร์-ศุกร์)
                                    ภาคการศึกษาที่ 1/2564
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษาแบบเต็มเวลา (เสาร์-อาทิตย์)
                                    ภาคการศึกษาที่ 1/2564
                                </a>
                            </li>
                        </ul>

                        <br>

                        <h5 class="font-bold">[ภาคการศึกษาที่ 2/2564]</h5>
                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษาแบบเต็มเวลา (จันทร์-ศุกร์)
                                    ภาคการศึกษาที่ 2/2564
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษาแบบเต็มเวลา (เสาร์-อาทิตย์)
                                    ภาคการศึกษาที่ 2/2564
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    ปฏิทินการเรียนการสอน ปีการศึกษา 2564 แบบเต็มเวลา (เสาร์-อาทิตย์)
                                </a>
                            </li>
                        </ul>

                        <br>

                        <h5 class="font-bold">[ภาคฤดูร้อน]</h5>
                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษาแบบเต็มเวลา (เสาร์-อาทิตย์)
                                    ภาคฤดูร้อน/2564
                                </a>
                            </li>
                        </ul>
                    </div>



                    <!-- กล่องข้อมูลแต่ละปี 2563-->
                    <div id="content-2563" class="year-content">
                        <h5 class="font-bold">[ภาคการศึกษาที่ 1/2563]</h5>

                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษาแบบเต็มเวลา (จันทร์-ศุกร์)
                                    ภาคการศึกษาที่ 1/2563
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษาแบบเต็มเวลา (เสาร์-อาทิตย์)
                                    (ฉบับแก้ไขครั้งที่ 1)
                                </a>
                            </li>
                        </ul>

                        <br>

                        <h5 class="font-bold">[ภาคการศึกษาที่ 2/2563]</h5>
                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษาแบบเต็มเวลา (จันทร์-ศุกร์)
                                    ภาคการศึกษาที่ 2/2563
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษาแบบเต็มเวลา (เสาร์-อาทิตย์)
                                    (ฉบับแก้ไขครั้งที่ 1)
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    ปฏิทินการเรียนการสอน ปีการศึกษา 2563 แบบเต็มเวลา (เสาร์-อาทิตย์)
                                    (ฉบับแก้ไขครั้งที่ 1)
                                </a>
                            </li>
                        </ul>

                        <br>

                        <h5 class="font-bold">[ภาคฤดูร้อน]</h5>
                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษาแบบเต็มเวลา (เสาร์-อาทิตย์)
                                    ภาคฤดูร้อน/2563
                                </a>
                            </li>
                        </ul>
                    </div>


                    <!-- กล่องข้อมูลแต่ละปี 2562-->
                    <div id="content-2562" class="year-content">
                        <h5 class="font-bold">[ภาคปกติ]</h5>

                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษา ภาคปกติ (จันทร์-ศุกร์)
                                    ภาคการศึกษาที่ 1-2562 (ฉบับแก้ไขครั้งที่ 1)
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษา ภาคปกติ (จันทร์-ศุกร์)
                                    ภาคการศึกษาที่ 2-2562 (ฉบับแก้ไขครั้งที่ 1)
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษา ภาคปกติ (จันทร์-ศุกร์)
                                    ภาคฤดูร้อน-2562 (ฉบับแก้ไขครั้งที่ 1)
                                </a>
                            </li>
                        </ul>

                        <br>

                        <h5 class="font-bold">[ภาคพิเศษ]</h5>
                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษา ภาคพิเศษ (เสาร์-อาทิตย์)
                                    ภาคการศึกษาที่ 1-2562
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษา ภาคพิเศษ (เสาร์-อาทิตย์)
                                    ภาคการศึกษาที่ 2-2562 (ฉบับแก้ไขครั้งที่ 1)
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษา ภาคพิเศษ (เสาร์-อาทิตย์)
                                    ภาคฤดูร้อน-2562 (ฉบับแก้ไขครั้งที่ 1)
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    ปฏิทินการเรียนการสอน ปีการศึกษา 2562
                                    ภาคพิเศษ (ฉบับแก้ไขครั้งที่ 1)
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- กล่องข้อมูลแต่ละปี 2560-->
                    <div id="content-2560" class="year-content">
                        <h5 class="font-bold">[ภาคปกติ]</h5>

                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียน ระดับบัณฑิตศึกษา
                                    ภาคปกติ ปีการศึกษา 2560
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียน ระดับบัณฑิตศึกษา
                                    ภาคปกติ ภาคการศึกษาที่ 3/2560
                                </a>
                            </li>
                        </ul>

                        <br>

                        <h5 class="font-bold">[ภาคพิเศษ]</h5>
                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    การเปลี่ยนกำหนดการหยุดกาเรียนการสอนนักศึกษา ระดับบัณฑิตศึกษา
                                    ภาคการศึกษาที่ 2-2560
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    ปฏิทินการเรียนการสอน กำหนดการลงทะเบียนเรียน ระดับบัณฑิตศึกษา
                                    ภาคพิเศษ ปีการศึกษา 2560
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- กล่องข้อมูลแต่ละปี 2561-->
                    <div id="content-2561" class="year-content">
                        <h5 class="font-bold">[ภาคปกติ]</h5>

                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียน ระดับบัณฑิตศึกษา ภาคปกติ ภาคการศึกษาที่ 1-2561
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษา ภาคปกติ (จันทร์-ศุกร์)
                                    ภาคฤดูร้อน/2561 (ฉบับแก้ไข ครั้งที่ 1)
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษา ภาคปกติ (จันทร์-ศุกร์)
                                    ภาคการศึกษาที่ 2-2561 (ฉบับแก้ไข ครั้งที่ 1)
                                </a>
                            </li>
                        </ul>

                        <br>

                        <h5 class="font-bold">[ภาคพิเศษ]</h5>
                        <ul class="list-none ps-0">
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-monday-friday.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    ปฏิทินการเรียนการสอน ปีการศึกษา 2561 ภาคพิเศษ (ฉบับแก้ไข ครั้งที่ 2)
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    ปฏิทินการเรียนการสอน ปีการศึกษา 2561 ภาคพิเศษ (ฉบับแก้ไข ครั้งที่ 1)
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียน ระดับบัณฑิตศึกษาภาคพิเศษ ปีการศึกษา 1/2561
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษา ภาคพิเศษ (เสาร์-อาทิตย์)
                                    ภาคการศึกษาที่ 2-2561 (ฉบับแก้ไข ครั้งที่ 2)
                                </a>
                            </li>
                            <li class="mb-2 flex items-start space-x-2">
                                <i class="fa-solid fa-calendar text-gray-600 mt-1"></i>
                                <a href="/docs/fulltime-sat-sun.pdf" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    กำหนดการลงทะเบียนเรียนนักศึกษาระดับบัณฑิตศึกษา ภาคพิเศษ (เสาร์-อาทิตย์)
                                    ภาคการศึกษาที่ 2-2561 (ฉบับแก้ไข ครั้งที่ 1)
                                </a>
                            </li>
                        </ul>

                    </div>

                    <!-- เพิ่ม content สำหรับ 2561, 2560 ได้ตามต้องการ -->
                </div>


                <script>
                    function showYear(year) {
                        const years = ['2564', '2563', '2562', '2561', '2560'];
                        years.forEach(y => {
                            const content = document.getElementById('content-' + y);
                            const btn = document.getElementById('btn-' + y);
                            if (content) {
                                content.classList.add('hidden');
                                content.classList.remove('fade-in'); // เคลียร์ก่อนเผื่อเคยใส่ไว้
                            }
                            if (btn) {
                                btn.classList.remove('bg-gray-700', 'text-white');
                                btn.classList.add('bg-gray-200');
                            }
                        });

                        const activeContent = document.getElementById('content-' + year);
                        const activeBtn = document.getElementById('btn-' + year);
                        if (activeContent) {
                            activeContent.classList.remove('hidden');
                            void activeContent.offsetWidth; // รีเซ็ต animation
                            activeContent.classList.add('fade-in');
                        }
                        if (activeBtn) {
                            activeBtn.classList.remove('bg-gray-200');
                            activeBtn.classList.add('bg-gray-700', 'text-white');
                        }
                    }

                    document.addEventListener('DOMContentLoaded', function () {
                        showYear('2564');
                    });
                </script>

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