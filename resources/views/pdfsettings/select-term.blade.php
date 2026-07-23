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

        .settings-card .term-btn {
            min-width: 160px;
        }
    </style>

    <div class="container-fluid mt-4">
        <div class="settings-card">
            <h4 class="mb-1">ตั้งค่าข้อความหัวบัตรประจำตัวผู้สมัคร</h4>
            <p class="text-muted mb-4">
                {{ $degreeLabel }} &middot; ปีการศึกษา {{ $year }}
            </p>

            <p class="mb-3">เลือกภาคการศึกษาที่ต้องการตั้งค่า</p>

            <div class="d-flex gap-3">
                <a href="{{ route('pdfsettings.edit', ['degree' => $degree, 'term' => 1]) }}"
                    class="btn btn-success term-btn">
                    ภาคเรียนที่ 1/{{ $year }}
                </a>
                <a href="{{ route('pdfsettings.edit', ['degree' => $degree, 'term' => 2]) }}"
                    class="btn btn-success term-btn">
                    ภาคเรียนที่ 2/{{ $year }}
                </a>
            </div>
        </div>
    </div>
@endsection
