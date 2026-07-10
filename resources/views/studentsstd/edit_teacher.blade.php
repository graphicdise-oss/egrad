<!DOCTYPE html>
<html>

<head>
    <title>แก้ไขข้อมูลอาจารย์</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">แก้ไขข้อมูลอาจารย์</h2>

        <form method="POST" action="{{ route('staff.update', $staff->STAFF_ID) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">ชื่อ</label>
                <input type="text" name="FIRST_NAME_TH" value="{{ $staff->FIRST_NAME_TH }}"
                    class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">นามสกุล</label>
                <input type="text" name="LAST_NAME_TH" value="{{ $staff->LAST_NAME_TH }}"
                    class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">ตำแหน่ง</label>
                <input type="text" name="POSITION" value="{{ $staff->POSITION }}"
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block mb-1">อีเมล</label>
                <input type="email" name="EMAIL" value="{{ $staff->EMAIL }}"
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('staff.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">ยกเลิก</a>

                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">บันทึก</button>
            </div>
        </form>
    </div>
</body>

</html>
