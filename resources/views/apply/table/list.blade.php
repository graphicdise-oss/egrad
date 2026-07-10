@extends('layouts.appapply') {{-- หรือเปลี่ยนเป็น layout ที่คุณใช้จริง --}}

@section('content')
    <div class="container">
        <h3 class="mb-4">รายการผู้สมัคร</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('apply.index') }}" class="row g-2 mb-2">
           
            <div class="col-md-3">
                {{-- fac_code --}}
                    <select name="fac_code" class="form-control  mb-2" style="border: 2px solid #ff77d0;">

                        <option value="">-- เลือกหลักสูตร --</option>

                        {{-- Master's Degree --}}
                        <option value="ปริญญาโท(Master's Degree) หลักสูตรและการสอน (Curriculum and Instruction)" {{ request('fac_code') == 'หลักสูตรและการสอน' ? 'selected' : '' }}>
                            ปริญญาโท หลักสูตรและการสอน
                        </option>

                        <option
                            value="ปริญญาโท(Master's Degree) สาขาวิชานวัตกรรมการจัดการสิ่งแวดล้อม (Innovation of Environmental Management)"
                            {{ request('fac_code') == 'นวัตกรรมการจัดการสิ่งแวดล้อม' ? 'selected' : '' }}>
                            ปริญญาโท นวัตกรรมการจัดการสิ่งแวดล้อม
                        </option>
                        <option value="ปริญญาโท(Master's Degree) การจัดการเทคโนโลยี (Technology Management)" {{ request('fac_code') == 'การจัดการเทคโนโลยี' ? 'selected' : '' }}>
                            ปริญญาโท การจัดการเทคโนโลยี
                        </option>
                        <option value="ปริญญาโท(Master's Degree) การจัดการระบบสุขภาพ (Health System Management)" {{ request('fac_code') == 'การจัดการระบบสุขภาพ' ? 'selected' : '' }}>
                            ปริญญาโท การจัดการระบบสุขภาพ
                        </option>
                        <option
                            value="ปริญญาโท(Master's Degree) นวัตกรรมการบริหารการศึกษา (Educational Administrative Innovation)"
                            {{ request('fac_code') == 'นวัตกรรมการบริหารการศึกษา' ? 'selected' : '' }}>
                            ปริญญาโท นวัตกรรมการบริหารการศึกษา
                        </option>
                        <option value="ปริญญาโท(Master's Degree) รัฐประศาสนศาสตร์ (Public Administration)" {{ request('fac_code') == 'รัฐประศาสนศาสต' ? 'selected' : 'ร์' }}>
                            ปริญญาโท รัฐประศาสนศาสตร์
                        </option>
                        <option
                            value="ปริญญาโท(Master's Degree) นวัตกรรมการบริหารปกครองและการประกอบการเพื่อสังคม (Innovative Governance and Social Entrepreneurship)"
                            {{ request('fac_code') == 'นวัตกรรมการบริหารปกครองและการประกอบการเพื่อสังคม' ? 'selected' : '' }}>
                            ปริญญาโท นวัตกรรมการบริหารปกครองและการประกอบการเพื่อสังคม
                        </option>
                        <option
                            value="ปริญญาโท(Master's Degree) หลักสูตรศิลปกรรมศาสตรมหาบัณฑิต สาขาวิชาทัศนศิลป์และการออกแบบ (Entrepreneurship and Business Innovative Design)"
                            {{ request('fac_code') == 'ศิลปกรรมศาสตรมหาบัณฑิต ทัศนศิลป์และการออกแบบ' ? 'selected' : '' }}>
                            ปริญญาโท ศิลปกรรมศาสตรมหาบัณฑิต ทัศนศิลป์และการออกแบบ
                        </option>
                        <option
                            value="ปริญญาโท(Master's Degree) หลักสูตรบริหารธุรกิจมหาบัณฑิต สาขาวิชาผู้ประกอบการและการออกแบบนวัตกรรมธุรกิจ"
                            {{ request('fac_code') == 'บริหารธุรกิจมหาบัณฑิต ผู้ประกอบการและการออกแบบธุรกิจ' ? 'selected' : '' }}>
                            ปริญญาโท บริหารธุรกิจมหาบัณฑิต ผู้ประกอบการและการออกแบบธุรกิจ
                        </option>
                        <option value="ปริญญาโท(Master's Degree) หลักสูตรรัฐศาสตรมหาบัณฑิต สาขาวิชาการจัดการปกครอง" {{ request('fac_code') == 'รัฐศาสตรมหาบัณฑิต การจัดการปกครอง' ? 'selected' : '' }}>
                            ปริญญาโท รัฐศาสตรมหาบัณฑิต การจัดการปกครอง
                        </option>
                        <option value="ปริญญาโท(Master's Degree) หลักสูตรบริหารธุรกิจมหาบัณฑิต สาขาวิชาการจัดการธุรกิจ"
                            {{ request('fac_code') == 'บริหารธุรกิจมหาบัณฑิต การจัดการธุรกิจ' ? 'selected' : '' }}>
                            ปริญญาโท บริหารธุรกิจมหาบัณฑิต การจัดการธุรกิจ
                        </option>

                        {{-- Doctoral Degree --}}
                        <option value="ปริญญาเอก(Doctoral Degree) การบริหารธุรกิจ (Business Administration)" {{ request('fac_code') == 'การบริหารธุรกิจ' ? 'selected' : '' }}>
                            ปริญญาเอก การบริหารธุรกิจ
                        </option>
                        <option value="ปริญญาเอก(Ph.D.) สิ่งแวดล้อมศึกษา (Environmental Studies)" {{ request('fac_code') == 'สิ่งแวดล้อมศึกษา' ? 'selected' : '' }}>
                            ปริญญาเอก สิ่งแวดล้อมศึกษา
                        </option>
                        <option
                            value="ปริญญาเอก(Doctoral Degree) นวัตกรรมการบริหารการศึกษา (Educational Administrative)" {{ request('fac_code') == 'นวัตกรรมการบริหารการศึกษา' ? 'selected' : '' }}>
                            ปริญญาเอก นวัตกรรมการบริหารการศึกษา
                        </option>
                        <option value="ปริญญาเอก(Ph.D.) หลักสูตรและการสอน (Curriculum and Instruction)" {{ request('fac_code') == 'หลักสูตรและการสอน' ? 'selected' : '' }}>
                            ปริญญาเอก หลักสูตรและการสอน
                        </option>
                        <option value="ปริญญาเอก(Doctoral Degree) การจัดการระบบสุขภาพ (Health System Management)" {{ request('fac_code') == 'การจัดการระบบสุขภาพ' ? 'selected' : '' }}>
                            ปริญญาเอก การจัดการระบบสุขภาพ
                        </option>
                        <option
                            value="ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชานวัตกรรมเพื่อการพัฒนาที่ยั่งยืน (Innovation of Environmental)"
                            {{ request('fac_code') == 'นวัตกรรมเพื่อการพัฒนาที่ยั่งยืน' ? 'selected' : '' }}>
                            ปริญญาเอก นวัตกรรมเพื่อการพัฒนาที่ยั่งยืน
                        </option>
                        <option
                            value="ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชาทัศนศิลป์และการออกแบบ (Entrepreneurship and Business Innovative Design)"
                            {{ request('fac_code') == 'ทัศนศิลป์และการออกแบบ' ? 'selected' : '' }}>
                            ปริญญาเอก ทัศนศิลป์และการออกแบบ
                        </option>
                        <option value="ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชานวัตกรรมการจัดการสิ่งแวดล้อม"
                            {{ request('fac_code') == 'นวัตกรรมการจัดการสิ่งแวดล้อม' ? 'selected' : '' }}>
                            ปริญญาเอก นวัตกรรมการจัดการสิ่งแวดล้อม
                        </option>
                        <option
                            value="ปริญญาเอก(Ph.D.) หลักสูตรปรัชญาดุษฎีบัณฑิต สาขาวิชาผู้ประกอบการและการออกแบบนวัตกรรมธุรกิจ"
                            {{ request('fac_code') == 'ผู้ประกอบการและการออกแบบนวัตกรรมธุรกิจ' ? 'selected' : '' }}>
                            ปริญญาเอก ผู้ประกอบการและการออกแบบนวัตกรรมธุรกิจ
                        </option>
                    </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-success" style="background-color: #ff3ebbff; border-color: #92005fff;">ค้นหา</button>
            </div>
        </form>


        <form action="{{ route('apply.status.bulkUpdate') }}" method="POST">
            @csrf
            <div class="text-end mt-3">
                <button type="submit" class="btn text-white" style="background-color: #ff3ebbff; border-color: #92005fff;">
                ยืนยันทั้งหมด
                </button>
                <br><br>
            </div>

            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark text-center align-middle">
                    <tr>
                      <th style="width: 5%;">ลำดับ</th>
                        <th style="width: 7%;">คำนำหน้า</th>
                       <th style="width: 15%;">ชื่อ - นามสกุล</th>

                        <th style="width: 10%;">เบอร์โทร</th>
                        <th style="width: 20%;">คณะ/สาขา</th>
                        <th style="width: 5%;">PDF</th>
                        
                        <th style="width: 7%;">ผลสอบ</th>
                        <th style="width: 12%;">รหัสนักศึกษา</th>
                        <th style="width: 15%;">จัดการ</th>          
                          
                    </tr>
                </thead>

                <tbody>
                    @foreach($applylist as $row)
                     <tr>
                            <td>{{ $row->id}}</td>
                            <td>{{ $row->prefix_code }}</td>
                            <td>{{ trim(($row->first_name ?? '').' '.($row->last_name ?? '')) }}</td>

                            <td>{{ $row->mobile_phone_no }}</td>
                            <td>{{ $row->fac_code }}</td>


                            <td>
                                @if($row->document_pdf)
                                    <a href="{{ asset('storage/documents/' . $row->document_pdf) }}" target="_blank">
                                        เปิด PDF
                                    </a>
                                @else
                                    <span class="text-gray-400">ไม่มีไฟล์</span>
                                @endif
                            </td>

                            <td>
                            <!-- hidden input ต้องมาก่อน checkbox -->
                            <input type="hidden" name="apply_status[{{ $row->id }}]" value="0">
                            <input type="checkbox" name="apply_status[{{ $row->id }}]" value="1"
                            {{ $row->apply_status == 1 ? 'checked' : '' }}>
                            </td> 

                            <td>
                                <input type="text" name="std_code[{{ $row->id }}]" value="{{ $row->std_code }}" class="form-control text-center">
                            </td>


                                    <td>
                                    <!-- ปุ่มแก้ไข -->
                                    <a href="{{ route('apply.edit', $row->id) }}" class="btn btn-sm btn-warning me-1">แก้ไข</a>
                                    
                              

                                            <!-- ปุ่มลบ: ใช้วิธีเดิม แต่กันไม่ให้ submit ฟอร์มใหญ่ -->
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="if(confirm('คุณแน่ใจว่าต้องการลบข้อมูลนี้?')) document.getElementById('delete-form-{{ $row->id }}').submit();">
                                                ลบ
                                            </button>

                                </td>
                            </tr>
                
                    @endforeach
                </tbody>
            </table>
                            <!-- เลขหน้า pagination -->
                    <div class="mt-3">
                        {{ $applylist->links('pagination::bootstrap-5') }}
                    </div>
        </form>

        @foreach($applylist as $row)
<form id="delete-form-{{ $row->id }}"
      action="{{ route('apply.delete', $row->id) }}"
      method="POST" style="display:none;">
    @csrf
    @method('DELETE')  {{-- ถ้า routes ใช้ Route::delete --}}
    {{-- ถ้า routes ใช้ Route::post แทน ให้ลบ @method('DELETE') ออก --}}
</form>
@endforeach

    </div>
@endsection