@extends('layouts.app')

@section('content')

    <style>
        .page-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 18px 22px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.06);
            margin-bottom: 16px;
        }

        .page-card .form-select,
        .page-card .form-control,
        .page-card .btn {
            font-size: 16px;
        }

        .result-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 18px 22px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.06);
        }

        .result-card .label {
            font-weight: 700;
            color: #1e7e34;
        }
    </style>

    <div class="container-fluid mt-4">
        <div class="page-card">
            <h5 class="mb-3">พิมพ์ใบค่าธรรมเนียม &middot; {{ $scopeLabel }}</h5>

            <form method="GET" action="{{ route('feeslip.search', $scope) }}" class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="cardid" class="form-control" placeholder="กรอกเลขบัตรประชาชน"
                        value="{{ $cardid }}" autofocus>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success w-100" type="submit">ค้นหา</button>
                </div>
            </form>
        </div>

        @if($searched)
            <div class="result-card">
                @if($student)
                    <table class="table table-borderless mb-3">
                        <tr>
                            <td class="label" width="180">รหัสประจำตัวผู้สมัคร</td>
                            <td>{{ $student->name_id }}</td>
                        </tr>
                        <tr>
                            <td class="label">ชื่อ-นามสกุล</td>
                            <td>{{ trim($student->prefix) }}{{ trim($student->name_na) }}
                                {{ trim($student->surname_su) }}</td>
                        </tr>
                        <tr>
                            <td class="label">เลขบัตรประชาชน</td>
                            <td>{{ trim($student->cardid2) }}</td>
                        </tr>
                        <tr>
                            <td class="label">สาขาที่เลือก</td>
                            <td>{{ $majorName }}</td>
                        </tr>
                        <tr>
                            <td class="label">ภาค/ปีการศึกษา</td>
                            <td>{{ trim($student->year_nameid) }}/{{ $student->year_register }}</td>
                        </tr>
                    </table>

                    <a href="{{ route('pdfcard.show', $student->name_id) }}" target="_blank"
                        class="btn btn-success">
                        พิมพ์ใบค่าธรรมเนียม
                    </a>
                @else
                    <p class="text-muted mb-0">ไม่พบข้อมูลผู้สมัครตามเลขบัตรประชาชนนี้ (หรือใบสมัครถูกยกเลิกแล้ว)</p>
                @endif
            </div>
        @endif
    </div>
@endsection
