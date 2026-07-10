<div class="container">
    <h2 class="mb-3">รายการนักศึกษา</h2>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อ-สกุล</th>
                <th>Email</th>
                <th>การทำงาน</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name_id }}</td>
                    <td>{{ $student->name_na }} {{ $student->surname_su }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        {{-- ปุ่มดู Preview --}}
                        <a href="{{ route('students.preview', $student->name_id) }}" target="_blank">👁 Preview</a>
                        <a href="{{ route('students.pdf', $student->name_id) }}" target="_blank">⬇ PDF</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- pagination -->
    <div class="mt-3">
        {{ $students->links() }}
    </div>
</div>