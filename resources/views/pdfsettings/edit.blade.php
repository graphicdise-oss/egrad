@extends('layouts.app')

@section('content')

    <style>
        .settings-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 24px 28px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.06);
            max-width: 700px;
        }

        .settings-card label {
            font-weight: 700;
            color: #1e7e34;
        }

        .settings-card .form-control {
            margin-bottom: 16px;
        }
    </style>

    <div class="container-fluid mt-4">
        <div class="settings-card">
            <h4 class="mb-1">ตั้งค่าข้อความหัวบัตรประจำตัวผู้สมัคร</h4>
            <p class="text-muted mb-4">
                {{ $degreeLabel }} &middot; ภาคการศึกษาที่ {{ $term }}/{{ $year }}
            </p>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST"
                action="{{ route('pdfsettings.update', ['degree' => $degree, 'term' => $term]) }}">
                @csrf
                @method('PUT')

                <label>ประกาศรายชื่อผู้มีสิทธิ์สอบคัดเลือก</label>
                <input type="text" name="exam_announce_text" class="form-control"
                    value="{{ old('exam_announce_text', $setting->exam_announce_text) }}"
                    placeholder="เช่น ประกาศรายชื่อผู้มีสิทธิ์สอบคัดเลือก วันที่ 18 พฤษภาคม 2569">

                <label>วันสอบคัดเลือก</label>
                <input type="text" name="exam_date_text" class="form-control"
                    value="{{ old('exam_date_text', $setting->exam_date_text) }}"
                    placeholder="เช่น สอบคัดเลือก วันที่ 23-24 พฤษภาคม 2569">

                <label>ประกาศรายชื่อผู้มีสิทธิ์เข้าศึกษา</label>
                <input type="text" name="admit_announce_text" class="form-control"
                    value="{{ old('admit_announce_text', $setting->admit_announce_text) }}"
                    placeholder="เช่น ประกาศรายชื่อผู้มีสิทธิ์เข้าศึกษาต่อวันที่ 27 พฤษภาคม 2569">

                <label>วันเปิดภาคการศึกษา</label>
                <input type="text" name="semester_start_text" class="form-control"
                    value="{{ old('semester_start_text', $setting->semester_start_text) }}"
                    placeholder="เช่น เปิดภาคการศึกษาวันที่ 22 มิ.ย.2569 ตรวจสอบทางเว็บไซต์ http://grad.vru.ac.th">

                <button type="submit" class="btn btn-success mt-2">บันทึก</button>
            </form>
        </div>
    </div>
@endsection
