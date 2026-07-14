@extends('layouts.app')

@section('content')

    <style>
        .table-custom {
            font-size: 0.85rem;
            /* ลดขนาดตัวอักษรลงเล็กน้อย */
            width: 100%;
            table-layout: fixed;
            /* บังคับความกว้างตามที่กำหนด */
            word-wrap: break-word;
        }

        .table-custom th,
        .table-custom td {
            padding: 8px 4px !important;
            /* ลด padding ซ้ายขวา */
            vertical-align: middle;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .text-left {
            text-align: left !important;
        }

        /* ป้องกันชื่อนามสกุลตัดบรรทัดแบบน่าเกลียด */
        .col-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <div class="container mt-4">
        <h2 class="mb-4">เอกสารแบบการสมัคร ปริญญาโท - ปริญญาเอก</h2>

        {{-- กำหนดข้อมูลหลักสูตรแบบ Hardcode (ใช้ MajorCode เป็น Key) --}}
        @php
            $hardcoded_majors = [
                // ปริญญาโท
                '70001' => '(ปริญญาโท) หลักสูตรและการสอน (Curriculum and Instruction)',
                '70006' => '(ปริญญาโท) การจัดการเทคโนโลยี (Technology Management)',
                '70007' => '(ปริญญาโท) การจัดการระบบสุขภาพ (Health System Management)',
                '70005' => '(ปริญญาโท) นวัตกรรมการจัดการสิ่งแวดล้อม (Innovation of Environmental Management)',
                '70009' => '(ปริญญาโท) รัฐประศาสนศาสตร์ (Public Administration)',
                '70014' => '(ปริญญาโท) การจัดการปกครอง (Governance)',
                '70015' => '(ปริญญาโท) การจัดการธุรกิจ (Business Management)',
                '70011' => '(ปริญญาโท) ทัศนศิลป์และการออกแบบ (Visual Arts and Design)',
                '70010' => '(ปริญญาโท) นวัตกรรมการบริหารปกครอง และการประกอบการเพื่อสังคม (Innovative Governance and Social Entrepreneurship)',
                '70008' => '(ปริญญาโท) นวัตกรรมการบริหารการศึกษา',
                '70016' => '(ปริญญาโท) วิทยาศาสตร์การกีฬา',


                // ปริญญาเอก
                '71005' => '(ปริญญาเอก) หลักสูตรและการสอน (Curriculum and Instruction)',
                '71004' => '(ปริญญาเอก) นวัตกรรมการบริหารการศึกษา (Educational Administrative Innovation)',
                '71006' => '(ปริญญาเอก) การจัดการระบบสุขภาพ (Health System Management)',
                '71003' => '(ปริญญาเอก) สิ่งแวดล้อมศึกษา (Environmental Studies)',
                '71009' => '(ปริญญาเอก) นวัตกรรมการจัดการสิ่งแวดล้อม (Innovation of Environmental Management)',
                '71007' => '(ปริญญาเอก) นวัตกรรมเพื่อการพัฒนาที่ยั่งยืน (Innovation for Sustainable Development)',
                '71008' => '(ปริญญาเอก) ทัศนศิลป์และการออกแบบ (Visual Arts and Design)',
                '71001' => '(ปริญญาเอก) การบริหารธุรกิจ (Business Administration)',
                '71011' => '(ปริญญาเอก) การจัดการธุรกิจ (Business Management)',
                '71012' => '(ปริญญาเอก) วิทยาศาสตร์การกีฬา',

                // หลักสูตรพิเศษ
                '72001' => 'สาขาวิชาชีพครู',
            ];
        @endphp

        {{-- ฟอร์มค้นหา --}}
        <form method="GET" action="{{ route('apply.docs.index') }}" class="mb-4 row g-3">
            {{-- เลือกหลักสูตร (ใช้ Hardcode Array) --}}
            <div class="col-md-4">
                <select name="degree" class="form-select">
                    <option value="">ทั้งหมด</option>
                    @foreach($hardcoded_majors as $code => $name)
                        <option value="{{ $code }}" {{ request('degree') == $code ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- เลือกปี/เทอม --}}
            <div class="col-md-3">
                <select name="term_year" class="form-select">
                    <option value="">เลือกภาคการศึกษา...</option>
                    <option value="1/2568" {{ request('term_year') == '1/2568' ? 'selected' : '' }}>ภาคการศึกษาที่ 1/2568
                    </option>
                    <option value="2/2568" {{ request('term_year') == '2/2568' ? 'selected' : '' }}>ภาคการศึกษาที่ 2/2568
                    </option>
                    <option value="1/2569" {{ request('term_year') == '1/2569' ? 'selected' : '' }}>ภาคการศึกษาที่ 1/2569
                    </option>
                    <option value="2/2569" {{ request('term_year') == '2/2569' ? 'selected' : '' }}>ภาคการศึกษาที่ 2/2569
                    </option>
                    <option value="2569" {{ request('term_year') == '2569' ? 'selected' : '' }}>ปีการศึกษา 2569</option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-success w-100" type="submit">ค้นหา</button>
            </div>
        </form>

        {{-- ตาราง --}}

        <style>
            .table-custom {
                font-size: 14px;
            }
        </style>

        <table class="table table-bordered table-sm table-custom">
            <thead class="table-light">
                <tr>
                    <th style="width: 35px;">ลำดับ</th>
                    <th style="width: 70px;">รหัสสมัคร</th>
                    <th style="width: 100px;">บัตรประชาชน</th>
                    <th style="width: 150px;">ชื่อ-นามสกุล</th>
                    <th style="width: 90px;">IDline</th>
                    <th style="width: 90px;">เบอร์โทร</th>
                    <th style="width: 120px;">โรงเรียน</th>
                    <th style="width: 70px;">ระดับ</th>
                    <th style="width: 65px;">ภาค/ปีการศึกษา</th>
                    <th style="width: 110px;">สาขาเรียน</th>
                    <th style="width: 45px;">เกรด</th>
                    <th style="width: 85px;">ค่าสมัคร</th>
                    <th style="width: 85px;">ค่าลงทะเบียน</th>
                    <th style="width: 100px;">สถานะ</th>
                    <th style="width: 70px;">เอกสาร</th>
                    <th style="width: 70px;">สมัคร</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $index => $s)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><small>{{ $s->name_id }}</small></td>
                        <td><small>{{ $s->cardid2 }}</small></td>
                        <td class="text-left" title="{{ trim($s->prefix) }}{{ trim($s->name_na) }} {{ trim($s->surname_su) }}">
                            {{ trim($s->prefix) }}{{ trim($s->name_na) }} {{ trim($s->surname_su) }}
                        </td>
                        <td class="text-left"><small>{{ $s->email }}</small></td>
                        <td><small>{{ $s->telephone }}</small></td>
                        <td class="text-left"><small>{{ $s->place_sch }}</small></td>
                        <td><small>{{ $s->educationan_sch }}</small></td>
                        <td>{{ trim($s->year_nameid) }}/{{ $s->year_register }}</td>
                        <td class="text-left"><small>{{ $s->branch_sch }}</small></td>
                        <td><strong>{{ number_format($s->grade_sch, 2) }}</strong></td>

                        <td>
                            @if($s->std_submit1 == 1)
                                <span class="badge bg-success">ชำระแล้ว</span>
                            @else
                                <span class="badge bg-danger">ยังไม่ชำระ</span>
                            @endif
                        </td>

                        <td>
                            @if($s->mt_confirmregister == 1)
                                <span class="text-success"><i class="fas fa-check-circle"></i> เรียบร้อย</span>
                            @else
                                <span class="text-muted small">ยังไม่ชำระ</span>
                            @endif
                        </td>

                        <td>
                            @if($s->mt_status_id == 6)
                                <span class="badge rounded-pill border border-primary text-primary">มีสิทธิ์สัมภาษณ์</span>
                            @elseif($s->mt_status_id == 9)
                                <span class="badge rounded-pill bg-primary">มีสิทธิ์เข้าศึกษา</span>
                            @else
                                <span class="text-secondary small">รอพิจารณา</span>
                            @endif
                        </td>

                        <td>
                            @if($s->file_uplond)
                                <a href="{{ asset('storage/documents/' . $s->file_uplond) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    เปิดไฟล์
                                </a>
                            @else
                                <span class="text-muted" style="font-size: 10px;">ไม่มีไฟล์</span>
                            @endif
                        <td><small>{{ $s->insert_datetime }}</small></td>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="15" class="text-center py-4 text-muted">ไม่พบข้อมูลนักเรียนในปีการศึกษานี้</td>
                    </tr>
                @endforelse


            </tbody>
        </table>
    </div>
@endsection