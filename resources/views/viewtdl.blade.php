@extends('layouts.app')

@section('content')

    <style>
        .table-custom {
            font-size: 16px;
            width: 100%;
            table-layout: fixed;
            /* บังคับความกว้างตามที่กำหนด */
            word-wrap: break-word;
        }

        /* ✅ บังคับตัวอักษรในตารางให้เท่ากันหมด 16px (badge/small/strong เดิมเล็ก/ใหญ่ไม่เท่ากัน) */
        .table-custom small,
        .table-custom strong,
        .table-custom .badge {
            font-size: 16px !important;
        }

        .table-custom th,
        .table-custom td {
            padding: 6px 3px !important;
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

        /* ✅ ปรับความสวยงามของหน้านี้ (ดีไซน์เท่านั้น ไม่แตะฟิลด์/query เดิม) */
        .page-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 14px 18px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.06);
            margin-bottom: 16px;
        }

        /* ลดขนาดตัวอักษร/กรอบของฟอร์มค้นหา (เดิมโตตามฟอนต์ TH Sarabun ของ body) */
        .page-card .form-select,
        .page-card .btn {
            font-size: 16px;
            padding: 0.35rem 0.7rem;
            border-radius: 8px;
        }

        .page-card form.row {
            --bs-gutter-x: 0.75rem;
        }

        .table-wrapper {
            background: #ffffff;
            border-radius: 16px;
            padding: 12px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.06);
        }

        .table-custom thead th {
            background-color: #1e7e34;
            color: #fff;
            border-color: #1e7e34;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .table-custom tbody tr:hover {
            background-color: #f2fbf5;
        }

        /* ✅ จำกัดความสูงตาราง เลื่อนดูข้างในแทนที่จะยาวทั้งหน้า */
        .table-scroll {
            max-height: 70vh;
            overflow-y: auto;
        }
    </style>

    <div class="container-fluid mt-4">
        <div class="page-card">
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
            {{-- เลือกระดับ (โท/เอก/วิชาชีพครู) เพื่อกรองรายการหลักสูตรด้านล่างให้สั้นลง --}}
            <div class="col-md-2">
                <select name="level" id="degreeLevel" class="form-select" onchange="filterMajors()">
                    <option value="" {{ request('level') == '' ? 'selected' : '' }}>ทุกระดับ</option>
                    <option value="master" {{ request('level') == 'master' ? 'selected' : '' }}>โท</option>
                    <option value="doctor" {{ request('level') == 'doctor' ? 'selected' : '' }}>เอก</option>
                    <option value="teacher" {{ request('level') == 'teacher' ? 'selected' : '' }}>วิชาชีพครู</option>
                </select>
            </div>

            {{-- เลือกหลักสูตร (ใช้ Hardcode Array) --}}
            <div class="col-md-4">
                <select name="degree" id="degreeSelect" class="form-select">
                    <option value="">ทั้งหมด</option>
                    @foreach($hardcoded_majors as $code => $name)
                        @php
                            $optionLevel = $code === '72001' ? 'teacher' : (str_starts_with($code, '70') ? 'master' : 'doctor');
                        @endphp
                        <option value="{{ $code }}" data-level="{{ $optionLevel }}"
                            {{ request('degree') == $code ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <script>
                function filterMajors() {
                    const level = document.getElementById('degreeLevel').value;
                    const select = document.getElementById('degreeSelect');

                    [...select.options].forEach(opt => {
                        if (!opt.dataset.level) return; // ตัวเลือก "ทั้งหมด"
                        const match = !level || opt.dataset.level === level;
                        opt.hidden = !match;
                        if (!match && opt.selected) {
                            select.value = '';
                        }
                    });
                }

                document.addEventListener('DOMContentLoaded', filterMajors);
            </script>

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
        </div>

        {{-- ตาราง --}}

        <div class="table-wrapper">
        <div class="table-scroll">
        <table class="table table-bordered table-sm table-custom">
            <thead class="table-light">
                <tr>
                    <th style="width: 30px;">ลำดับ</th>
                    <th style="width: 60px;">รหัสสมัคร</th>
                    <th style="width: 90px;">บัตรประชาชน</th>
                    <th style="width: 88px;">ชื่อ-นามสกุล</th>
                    <th style="width: 60px;">IDline</th>
                    <th style="width: 60px;">เบอร์โทร</th>
                    <th style="width: 100px;">ปริญญา</th>
                    <th style="width: 55px;">ระดับ</th>
                    <th style="width: 55px;">ภาค/ปีการศึกษา</th>
                    <th style="width: 90px;">สาขาเรียน</th>
                    <th style="width: 40px;">เกรด</th>
                    <th style="width: 70px;">ค่าสมัคร</th>
                    <th style="width: 70px;">ค่าลงทะเบียน</th>
                    <th style="width: 68px;">สถานะ</th>
                    <th style="width: 60px;">เอกสาร</th>
                    <th style="width: 65px;">สมัคร</th>
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
                        <td class="text-left"
                            title="{{ $hardcoded_majors[trim($s->branch_one)] ?? $s->branch_one }}">
                            <small>{{ $hardcoded_majors[trim($s->branch_one)] ?? $s->branch_one }}</small>
                        </td>
                        <td><small>{{ $s->educationan_sch }}</small></td>
                        <td>
                            @php
                                // เฉพาะสาขาวิชาชีพครู (72001) ข้อมูล year_nameid ในฐานยังไม่ถูกต้อง
                                // (เก็บเป็น 3 ทั้งหมด) จึงคำนวณเทอมจากวันที่สมัครแทนไปก่อน:
                                // สมัครหลัง 13/5/2569 = เทอม 2, ก่อนหน้านั้น = เทอม 1
                                $termDisplay = trim($s->year_nameid);
                                if (trim($s->branch_one) === '72001') {
                                    $applyDate = substr($s->insert_datetime, 0, 10);
                                    $termDisplay = $applyDate > '2026-05-13' ? '2' : '1';
                                }
                            @endphp
                            {{ $termDisplay }}/{{ $s->year_register }}
                        </td>
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
                        <td colspan="16" class="text-center py-4 text-muted">ไม่พบข้อมูลนักเรียนในปีการศึกษานี้</td>
                    </tr>
                @endforelse


            </tbody>
        </table>
        </div>
        </div>
    </div>
@endsection