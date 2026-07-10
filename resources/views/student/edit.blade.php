@extends('layouts.app')

@section('content')
<div class="container">
    <h3>แก้ไขข้อมูลนักศึกษา</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('students.update', $student->name_id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>ชื่อ</label>
            <input type="text" name="name_na" class="form-control"
                   value="{{ old('name_na', $student->name_na) }}">
        </div>

        <div class="mb-3">
            <label>นามสกุล</label>
            <input type="text" name="surname_su" class="form-control"
                   value="{{ old('surname_su', $student->surname_su) }}">
        </div>

        <div class="mb-3">
            <label>รหัสบัตรประชาชน</label>
            <input type="text" name="id_no" class="form-control"
                   value="{{ old('id_no', $student->id_no) }}">
        </div>

        <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>
</div>
@endsection
