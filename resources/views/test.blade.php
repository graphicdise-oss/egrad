@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('test.store') }}">
    @csrf
    <label>คำนำหน้า:</label>
    <input type="text" name="prefix" required><br><br>

    <label>ชื่อ:</label>
    <input type="text" name="name_na" required><br><br>

    <label>นามสกุล:</label>
    <input type="text" name="surname_su" required><br><br>

    <label>เลขบัตร/พาสปอร์ต:</label>
    <input type="text" name="id_no" required><br><br>

    <button type="submit">บันทึก</button>
</form>
