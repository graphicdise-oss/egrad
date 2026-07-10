<!DOCTYPE html>
<html>

<head>
    <title>Student Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* (ฟอนต์เดิมของคุณ) */
        @font-face {
            font-family: 'THSarabunNew';
            src: url('{{ asset('fonts/THSarabunNew.ttf') }}') format('truetype');
            font-weight: 400;
        }

        @font-face {
            font-family: 'THSarabunNew';
            src: url('{{ asset('fonts/THSarabunNew-Bold.ttf') }}') format('truetype');
            font-weight: 700;
        }

        body,
        html {
            font-family: 'THSarabunNew', sans-serif;
            font-size: 18px;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="flex min-h-screen">
        @include('layouts.menuleft')
        @include('layouts.menutop')

        <div class="p-8 w-full">
            <div class="fade-up bg-white rounded-2xl p-6 mt-0 shadow-lg">

                {{-- หัวข้อ --}}
                <div class="mb-6 flex items-center gap-3">
                    <div class="p-3 bg-pink-100 rounded-full text-[#E84A8B]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2" />
                            <path
                                d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                            <path d="M8 18h1" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800">@lang('form.จัดการข้อความแจ้งเตือนนักศึกษา')</h1>
                </div>

                {{-- ฟอร์ม --}}
                <div class="bg-white rounded-lg overflow-hidden border border-gray-100">

                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 m-4">
                            <p class="font-bold">สำเร็จ!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('warn.update') }}" method="POST" class="p-6 space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- 1. ข้อความเรื่องการชำระเงิน --}}
                            <div>
                                <label for="warn_money" class="block text-xl font-bold text-[#E84A8B] mb-2">
                                    💰 @lang('form.แจ้งเตือนเรื่องการชำระเงิน')
                                </label>
                                <textarea id="warn_money" name="warn_money" rows="4"
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84A8B] focus:ring focus:ring-pink-200 p-3 border text-lg"
                                    placeholder="เช่น กรุณาชำระเงินภายในวันที่ 30 ม.ค. 2568">{{ isset($notification->warn_money) ? $notification->warn_money : '' }}</textarea>
                            </div>

                            {{-- 2. ข้อความเรื่องการลงทะเบียน --}}
                            <div>
                                <label for="warn_reg" class="block text-xl font-bold text-[#E84A8B] mb-2">
                                    📝 @lang('form.แจ้งเตือนเรื่องการลงทะเบียน')
                                </label>
                                <textarea id="warn_reg" name="warn_reg" rows="4"
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#E84A8B] focus:ring focus:ring-pink-200 p-3 border text-lg"
                                    placeholder="เช่น เปิดระบบลงทะเบียนวันที่ 1 ก.พ. เป็นต้นไป">{{ isset($notification->warn_reg) ? $notification->warn_reg : '' }}</textarea>
                            </div>

                        </div>

                        {{-- ปุ่มบันทึก --}}
                        <div class="pt-6 border-t border-gray-100 flex justify-end">
                            <button type="submit"
                                class="bg-[#E84A8B] hover:bg-[#d63d7d] text-white font-bold py-2 px-6 rounded shadow-md transition duration-150 flex items-center gap-2 text-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                    <polyline points="17 21 17 13 7 13 7 21" />
                                    <polyline points="7 3 7 8 15 8" />
                                </svg>
                                @lang('form.บันทึกข้อความ')
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>