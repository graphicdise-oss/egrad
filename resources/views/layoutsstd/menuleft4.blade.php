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

<aside class="w-[250px] bg-[#E84A8B] text-white min-h-screen">

    <div class="flex items-center gap-2 ps-0 pe-4 py-3 bg-[#E84A8B] text-white">
        <a href="/insert_study">
            <img src="/images/apply/logoba.png" class="w-[75px] h-[75px] object-contain" />
        </a>
        <h1 class="text-[22px] font-semibold leading-tight">E - Graduate</h1>
    </div>



    <div class="text-white text-sm font-semibold px-3 py-2">
        General
    </div>

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
            หน้าหลัก
        </span>
    </a>

    <div class="space-y-2">
        <a href="/edit_teacher"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-users-round-icon lucide-users-round">
                <path d="M18 21a8 8 0 0 0-16 0" />
                <circle cx="10" cy="8" r="5" />
                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
            </svg>
            <span class="text-lg">ข้อมูลอาจารย์</span>
        </a>

        <a href="/test-staff-list2"
            class="w-full bg-[#E84A8B] hover:bg-[#F06292] hover:brightness-110 hover:shadow-md transition duration-150 text-white py-2 px-3 flex items-center space-x-2 rounded-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-user-pen-icon lucide-user-pen">
                <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                <path
                    d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                <circle cx="10" cy="7" r="4" />
            </svg>
            <span class="text-[16px]">
                อาจารย์ที่ปรึกษา<br>วิทยานิพนธ์/การค้นคว้าอิสระ
            </span>
        </a>

        







        <!-- JavaScript ย้ายไปไว้ด้านล่าง layout หลักก็ได้ -->
</aside>