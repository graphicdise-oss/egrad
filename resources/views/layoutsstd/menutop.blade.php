<!-- Main Content ด้านขวา -->
 <meta name="robots" content="noindex, nofollow">
<div class="flex-1">
    <!-- ส่วนหัวทั้งหมด (ชื่อ + breadcrumb + ไอคอน) -->
    <div class="bg-white border-b border-gray-300 px-8 py-4">
        <div class="flex justify-between items-start flex-wrap gap-2">

            <!-- ซ้าย: หัวข้อ + breadcrumb -->
            <div>
            </div>

            <!-- ขวา: ชื่อผู้ใช้ + วันที่ + ไอคอน -->
            <div class="text-right text-sm text-gray-700">
                <div class="font-bold text-gray-900">
                  


                   <span class="font-normal text-gray-400">@lang('form.university')</span>
                </div>
                @php
                    \Carbon\Carbon::setLocale('th'); // เซตภาษาไทย
                    $now = \Carbon\Carbon::now()->addYears(543); // แปลง ค.ศ. ➜ พ.ศ.
                    $formattedDate = $now->translatedFormat('j F Y เวลา H:i');
                @endphp

               <div class="mt-1 flex justify-end items-center space-x-2">



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
                    
                    <!-- ปุ่มย้อนกลับ -->
                    <form action="{{ route('gradstd.logout') }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit" class="p-1 bg-white border rounded shadow hover:bg-gray-100"
                            title="ออกจากระบบ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-6 h-6 text-gray-600">
                                <path fill-rule="evenodd"
                                    d="M7.793 2.232a.75.75 0 0 1-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 0 1 0 10.75H10.75a.75.75 0 0 1 0-1.5h2.875a3.875 3.875 0 0 0 0-7.75H3.622l4.146 3.957a.75.75 0 0 1-1.036 1.085l-5.5-5.25a.75.75 0 0 1 0-1.085l5.5-5.25a.75.75 0 0 1 1.06.025Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>


                </div>

            </div>
        </div>
    </div>