<!-- Sidebar -->
<aside class="w-[250px] bg-[#306317] text-white min-h-screen">

    <div class="flex items-center gap-2 ps-0 pe-4 py-3 bg-[#306317] text-white">
    <a href="/insert_study">
        <img src="/images/vru.png" class="w-[72px] h-[72px] object-contain" />
    </a>
    <h1 class="text-[28px] font-semibold leading-tight">E - Graduate</h1>
</div>


    <div class="text-white text-sm font-semibold px-3 py-2">
        General
    </div>

    <div class="space-y-2">
        <a href="/insert_study"
            class="w-full bg-[#306317] hover:bg-[#4e9525] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-database-icon lucide-database">
                <ellipse cx="12" cy="5" rx="9" ry="3" />
                <path d="M3 5V19A9 3 0 0 0 21 19V5" />
                <path d="M3 12A9 3 0 0 0 21 12" />
            </svg>
            <span class="text-lg">เพิ่มข้อมูลนักศึกษา</span>
        </a>

        <a href="/insert_teacher"
            class="w-full bg-[#306317] hover:bg-[#4e9525] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-database-icon lucide-database">
                <ellipse cx="12" cy="5" rx="9" ry="3" />
                <path d="M3 5V19A9 3 0 0 0 21 19V5" />
                <path d="M3 12A9 3 0 0 0 21 12" />
            </svg>
            <span class="text-lg">เพิ่มข้อมูลอาจารย์</span>
        </a>

        <a href="/insert_president"
            class="w-full bg-[#306317] hover:bg-[#4e9525] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-database-icon lucide-database">
                <ellipse cx="12" cy="5" rx="9" ry="3" />
                <path d="M3 5V19A9 3 0 0 0 21 19V5" />
                <path d="M3 12A9 3 0 0 0 21 12" />
            </svg>
            <span class="text-lg font-normal">เพิ่มข้อมูลประธานหลักสูตร</span>
        </a>

        <a href="/egardedit"
            class="w-full bg-[#306317] hover:bg-[#4e9525] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>

            <span class="text-lg">เเก้ไขข้อมูล / เพิ่มข้อมูล</span>
        </a>





        <!-- เมนูหลัก: Dashboard -->
        <button onclick="toggleSubMenu('dashboard')"
            class="w-full bg-[#306317] hover:bg-[#4e9525] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <span class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <span class="text-xl font-semibold">Dashboard</span>
            </span>
            <svg id="arrow-dashboard" class="h-4 w-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <ul id="dashboard" class="hidden mt-1">
            <li>
                <a href="#"
                    class="group flex items-center w-full bg-transparent hover:bg-[#d8ecd1] text-white hover:!text-green-800 p-2 rounded-none">
                    <!-- จุดนำหน้า -->
                    <span class="text-white group-hover:text-green-800 text-sm ml-2">●</span>
                    <!-- ข้อความขยับขวา -->
                    <span class="ml-4 text-lg font-medium">ชุดข้อมูลนักศึกษา</span>
                </a>
                <a href="#"
                    class="group flex items-center w-full bg-transparent hover:bg-[#d8ecd1] text-white hover:!text-green-800 p-2 rounded-none">
                    <!-- จุดนำหน้า -->
                    <span class="text-white group-hover:text-green-800 text-sm ml-2">●</span>
                    <!-- ข้อความขยับขวา -->
                    <span class="ml-4 text-lg font-medium">ชุดข้อมูลชุมชน</span>
                </a>
                <a href="#"
                    class="group flex items-center w-full bg-transparent hover:bg-[#d8ecd1] text-white hover:!text-green-800 p-2 rounded-none">
                    <!-- จุดนำหน้า -->
                    <span class="text-white group-hover:text-green-800 text-sm ml-2">●</span>
                    <!-- ข้อความขยับขวา -->
                    <span class="ml-4 text-lg font-medium">Job matching Performance</span>
                </a>
                <a href="#"
                    class="group flex items-center w-full bg-transparent hover:bg-[#d8ecd1] text-white hover:!text-green-800 p-2 rounded-none">
                    <!-- จุดนำหน้า -->
                    <span class="text-white group-hover:text-green-800 text-sm ml-2">●</span>
                    <!-- ข้อความขยับขวา -->
                    <span class="ml-4 text-lg font-medium">Student Portfolio</span>
                </a>
            </li>
        </ul>

    </div>





    <!-- JavaScript ย้ายไปไว้ด้านล่าง layout หลักก็ได้ -->
</aside>