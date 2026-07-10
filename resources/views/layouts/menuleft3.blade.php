<!-- Sidebar -->
<meta name="robots" content="noindex, nofollow">
<style>
    .fade-in {
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<style>
    /* ✅ ฟอนต์ TH Sarabun New (Regular) */
    @font-face {
        font-family: 'THSarabunNew';
        src: url('{{ asset('fonts/THSarabunNew.ttf') }}') format('truetype');
        font-weight: 400;
        font-style: normal;
    }

    /* ✅ ฟอนต์ TH Sarabun New (Bold) */
    @font-face {
        font-family: 'THSarabunNew';
        src: url('{{ asset('fonts/THSarabunNew-Bold.ttf') }}') format('truetype');
        font-weight: 700;
        font-style: normal;
    }

    /* ✅ ตั้งค่าให้ฟอนต์นี้เป็นฟอนต์หลักของทั้งหน้า */
    body,
    html {
        font-family: 'THSarabunNew', sans-serif;
        font-size: 18px;
        /* ฟอนต์นี้ค่อนข้างเล็ก ปรับให้ใหญ่ขึ้นนิด */
    }

    /* ✅ กำหนด class สำหรับตัวหนา */
    .bold {
        font-weight: 700;
    }
</style>


<aside class="w-[250px] bg-[#E84A8B] text-white min-h-screen">

    <div class="flex items-center gap-2 ps-0 pe-4 py-3 bg-[#E84A8B] text-white">
        <a href="/home">
            <img src="/images/apply/logoba.png" class="w-[75px] h-[75px] object-contain" />
        </a>
        <h1 class="text-[22px] font-semibold leading-tight">E - Graduate</h1>
    </div>


    <div class="text-white text-sm font-semibold px-3 py-2">
        General
    </div>

    <div class="space-y-2">
        <a href="/students"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-house-icon lucide-house">
                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                <path
                    d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
            </svg>
            <span class="text-[16px]">
               @lang('form.grad1')
            </span>
        </a>

        <a href="https://reg1.vru.ac.th/default.aspx"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-pencil-line-icon lucide-pencil-line">
                <path d="M12 20h9" />
                <path
                    d="M16.376 3.622a1 1 0 0 1 3.002 3.002L7.368 18.635a2 2 0 0 1-.855.506l-2.872.838a.5.5 0 0 1-.62-.62l.838-2.872a2 2 0 0 1 .506-.854z" />
                <path d="m15 5 3 3" />
            </svg>
            <span class="text-[16px]">
                @lang('form.grad2')
            </span>
        </a>



        <!-- เมนูหลัก: Dashboard -->
        <button onclick="toggleSubMenu('dashboard1')"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex justify-between items-start rounded-none">
            <span class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-circle-dollar-sign-icon lucide-circle-dollar-sign">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                    <path d="M12 18V6" />
                </svg>
                <span class="text-[16px]">
                    @lang('form.gradmoney')
                </span>
            </span>
            <svg id="arrow-dashboard1" class="h-4 w-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <ul id="dashboard1" class="hidden mt-1">
            <li>

                @php
                    $id_no = request()->segment(3); // ดึง id จาก URL
                @endphp

                <a href="{{ route('student.section.show', ['section' => 'money1', 'id_no' => optional($student)->id_no ?? request()->segment(3)]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150 hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span class="ml-4 text-[14px] group-hover:text-[#E84A8B]">@lang('form.gradmoney1')</span>
                </a>

                <a href="{{ route('student.section.show', ['section' => 'money2', 'id_no' => optional($student)->id_no ?? request()->segment(3)]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150 hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span class="ml-4 text-[14px] group-hover:text-[#E84A8B]">@lang('form.gradmoney2')</span>
                </a>



            </li>
        </ul>


        <!-- เมนูหลัก: Dashboard -->
        <button onclick="toggleSubMenu('dashboard2')"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex justify-between items-start rounded-none">
            <span class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-notebook-pen-icon lucide-notebook-pen">
                    <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                    <path d="M2 6h4" />
                    <path d="M2 10h4" />
                    <path d="M2 14h4" />
                    <path d="M2 18h4" />
                    <path
                        d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                </svg>
                <span class="text-[16px]">
                    @lang('form.grad3')
                </span>
            </span>
            <!-- ขวา: ลูกศร -->
            <svg id="arrow-dashboard2" class="h-4 w-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <ul id="dashboard2" class="hidden mt-1">

            <li>
                @php
                    // ถ้ามี student ใช้ student->id_no, ถ้าไม่มีก็ดึงจาก URL segment
                    $id_no = optional($student)->id_no ?? request()->segment(3);
                @endphp
                <a href="{{ route('student.section.show', ['section' => 't_system1', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]"> @lang('form.grad3_1')</span>
                </a>
                <a href="{{ route('student.section.show', ['section' => 't_system2', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]"> @lang('form.grad3_2')</span>
                </a>
                <a href="{{ route('student.section.show', ['section' => 't_system3', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span
                        class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]"> @lang('form.grad3_3')</span>
                </a>



            </li>
        </ul>



        <!-- เมนูหลัก: Dashboard -->
        <button onclick="toggleSubMenu('dashboard3')"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex justify-between items-start rounded-none">

            <!-- ซ้าย: ไอคอน + ข้อความ -->
            <span class="flex items-center space-x-2 text-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-laptop-icon lucide-laptop">
                    <path
                        d="M18 5a2 2 0 0 1 2 2v8.526a2 2 0 0 0 .212.897l1.068 2.127a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45l1.068-2.127A2 2 0 0 0 4 15.526V7a2 2 0 0 1 2-2z" />
                    <path d="M20.054 15.987H3.946" />
                </svg>

                <span class="text-[16px] leading-tight">
                     @lang('form.grad4')
                </span>
            </span>

            <!-- ขวา: ลูกศร -->
            <svg id="arrow-dashboard3" class="h-4 w-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <ul id="dashboard3" class="hidden mt-1">
            <li>
                <a href="{{ route('student.section.show', ['section' => 'thesis_name1', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span
                        class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad4_1')</span>
                </a>

                 <a href="{{ route('student.section.show', ['section' => 'thesis_name3', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150 hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span class="ml-4 text-[14px] group-hover:text-[#E84A8B]">@lang('form.grad4_2')</span>
                </a>


                <a href="{{ route('student.section.show', ['section' => 'thesis_name2', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span
                        class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad4_3')</span>
                </a>

            </li>
        </ul>

        <!-- เมนูหลัก: Dashboard -->
        <button onclick="toggleSubMenu('dashboard4')"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex justify-between items-start rounded-none">

            <!-- ซ้าย: ไอคอน + ข้อความ -->
            <span class="flex items-center space-x-2 text-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-book-text-icon lucide-book-text">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                    <path d="M8 11h8" />
                    <path d="M8 7h6" />
                </svg>
                <span class="text-[16px] leading-tight">
                   @lang('form.grad5')
                </span>
            </span>

            <!-- ขวา: ลูกศร -->
            <svg id="arrow-dashboard4" class="h-4 w-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <ul id="dashboard4" class="hidden mt-1">
            <li>
                <a href="{{ route('student.section.show', ['section' => 'thesis_re1', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span
                        class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad5_1')</span>
                </a>
                <a href="{{ route('student.section.show', ['section' => 'thesis_re2', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span
                        class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad5_2')</span>
                </a>
                <a href="{{ route('student.section.show', ['section' => 'thesis_re3', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad5_3')</span>
                </a>
                <a href="{{ route('student.section.show', ['section' => 'thesis_re4', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad5_4')</span>
                </a>


                  <a href="{{ route('student.section.show', ['section' => 'thesis_re5', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span
                        class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad5_5')</span>
                </a>


                <a href="{{ route('student.section.show', ['section' => 'thesis_re6', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span
                        class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad5_6')</span>
                </a>

            </li>
        </ul>



        <a href="{{ route('student.section.show', ['section' => 'sys_tr1', 'id_no' => $id_no]) }}"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-scroll-text-icon lucide-scroll-text">
                <path d="M15 12h-5" />
                <path d="M15 8h-5" />
                <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                <path
                    d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3" />
            </svg>
            <span class="text-[16px]">
                @lang('form.grad6')
            </span>
        </a>



        <!-- เมนูหลัก: Dashboard -->
        <a href="{{ route('student.section.show', ['section' => 'p_research1', 'id_no' => $id_no]) }}"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-cloud-upload-icon lucide-cloud-upload">
                <path d="M12 13v8" />
                <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                <path d="m8 17 4-4 4 4" />
            </svg>
            <span class="text-[16px]">
               @lang('form.grad7')
            </span>
        </a>


        <!-- เมนูหลัก: Dashboard -->
        <button onclick="toggleSubMenu('dashboard5')"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex justify-between items-start rounded-none">

            <!-- ซ้าย: ไอคอน + ข้อความ -->
            <span class="flex items-center space-x-2 text-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-book-marked-icon lucide-book-marked">
                    <path d="M10 2v8l3-3 3 3V2" />
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                </svg>
                <span class="text-[16px] leading-tight">
                    @lang('form.grad8')
                </span>
            </span>

            <!-- ขวา: ลูกศร -->
            <svg id="arrow-dashboard5" class="h-4 w-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <ul id="dashboard5" class="hidden mt-1">
            <li>
                <a href="{{ route('student.section.show', ['section' => 'sys_fi1', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad8_1')</span>
                </a>

                <a href="{{ route('student.section.show', ['section' => 'sys_fi2', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span
                        class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad8_2')</span>
                </a>

                  <a href="{{ route('student.section.show', ['section' => 'abstract1', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span
                        class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad8_3')</span>
                </a>


             
                <a href="{{ route('student.section.show', ['section' => 'sys_fi3', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad8_4')</span>
                </a>

                <a href="{{ route('student.section.show', ['section' => 'sys_fi4', 'id_no' => $id_no]) }}"
                    class="group text-white flex items-center w-full p-2 transition duration-150  hover:bg-[#d8ecd1]">
                    <span class="ml-2 group-hover:text-[#E84A8B]">●</span>
                    <span
                        class="ml-4 text-[14px] group-hover:text-[#E84A8B] text-[14px]">@lang('form.grad8_5')</span>
                </a>
        </ul>




        <a href="{{ route('student.section.show', ['section' => 'visaform', 'id_no' => $id_no]) }}"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-clipboard-pen-line-icon lucide-clipboard-pen-line">
                <rect width="8" height="4" x="8" y="2" rx="1" />
                <path d="M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-.5" />
                <path d="M16 4h2a2 2 0 0 1 1.73 1" />
                <path d="M8 18h1" />
                <path
                    d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
            </svg>
            <span class="text-[16px]">
                VISA FORM
            </span>
        </a>

        <a href="{{ route('students.pdf', $student->id_no) }}" target="_blank"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-clipboard-pen-line-icon lucide-clipboard-pen-line">
                <rect width="8" height="4" x="8" y="2" rx="1" />
                <path d="M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-.5" />
                <path d="M16 4h2a2 2 0 0 1 1.73 1" />
                <path d="M8 18h1" />
                <path
                    d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
            </svg>
            <span class="text-[16px]">
                @lang('form.grad9')
            </span>
        </a>








        <!-- JavaScript ย้ายไปไว้ด้านล่าง layout หลักก็ได้ -->
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</aside>