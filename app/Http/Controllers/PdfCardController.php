<?php

namespace App\Http\Controllers;

use App\Models\PdfCardSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PdfCardController extends Controller
{
    protected array $majors = [
        '70001' => 'หลักสูตรและการสอน (Curriculum and Instruction)',
        '70006' => 'การจัดการเทคโนโลยี (Technology Management)',
        '70007' => 'การจัดการระบบสุขภาพ (Health System Management)',
        '70005' => 'นวัตกรรมการจัดการสิ่งแวดล้อม (Innovation of Environmental Management)',
        '70009' => 'รัฐประศาสนศาสตร์ (Public Administration)',
        '70014' => 'การจัดการปกครอง (Governance)',
        '70015' => 'การจัดการธุรกิจ (Business Management)',
        '70011' => 'ทัศนศิลป์และการออกแบบ (Visual Arts and Design)',
        '70010' => 'นวัตกรรมการบริหารปกครอง และการประกอบการเพื่อสังคม',
        '70008' => 'นวัตกรรมการบริหารการศึกษา',
        '70016' => 'วิทยาศาสตร์การกีฬา',
        '71005' => 'หลักสูตรและการสอน (Curriculum and Instruction)',
        '71004' => 'นวัตกรรมการบริหารการศึกษา (Educational Administrative Innovation)',
        '71006' => 'การจัดการระบบสุขภาพ (Health System Management)',
        '71003' => 'สิ่งแวดล้อมศึกษา (Environmental Studies)',
        '71009' => 'นวัตกรรมการจัดการสิ่งแวดล้อม (Innovation of Environmental Management)',
        '71007' => 'นวัตกรรมเพื่อการพัฒนาที่ยั่งยืน (Innovation for Sustainable Development)',
        '71008' => 'ทัศนศิลป์และการออกแบบ (Visual Arts and Design)',
        '71001' => 'การบริหารธุรกิจ (Business Administration)',
        '71011' => 'การจัดการธุรกิจ (Business Management)',
        '71012' => 'วิทยาศาสตร์การกีฬา',
        '72001' => 'สาขาวิชาชีพครู',
    ];

    protected array $degreeLabels = [
        'master' => "ปริญญาโท / Master's Degree",
        'doctor' => "ปริญญาเอก / Doctor's Degree",
        'teacher' => 'ประกาศนียบัตรบัณฑิต สาขาวิชาชีพครู',
    ];

    public function show(string $name_id)
    {
        $student = DB::connection('sqlsrv_remote')
            ->table('tbl_std_master_register')
            ->where('name_id', $name_id)
            ->first();

        abort_unless($student, 404, 'ไม่พบข้อมูลผู้สมัคร');

        $branchOne = trim($student->branch_one);

        if ($branchOne === '72001') {
            $degree = 'teacher';
        } elseif (str_starts_with($branchOne, '70')) {
            $degree = 'master';
        } elseif (str_starts_with($branchOne, '71')) {
            $degree = 'doctor';
        } else {
            abort(404, 'ไม่พบข้อมูลหลักสูตรของผู้สมัครรายนี้');
        }

        if ($degree === 'teacher') {
            // ข้อมูล year_nameid ของสาขาวิชาชีพครูในฐานยังไม่ถูกต้อง (เก็บเป็น 3 ทั้งหมด)
            // จึงคำนวณเทอมจากวันที่สมัครแทนไปก่อน เช่นเดียวกับหน้าตารางเอกสารการสมัคร
            $applyDate = substr($student->insert_datetime, 0, 10);
            $term = $applyDate > '2026-05-13' ? 2 : 1;
        } else {
            $term = (int) trim($student->year_nameid);
        }

        $year = (int) trim($student->year_register);

        $setting = PdfCardSetting::where('degree', $degree)
            ->where('term', $term)
            ->where('year', $year)
            ->first();

        $pdf = Pdf::loadView('pdf.applicantcard', [
            'student' => $student,
            'degree' => $degree,
            'degreeLabel' => $this->degreeLabels[$degree],
            'term' => $term,
            'year' => $year,
            'setting' => $setting,
            'majorName' => $this->majors[$branchOne] ?? '',
        ])->setPaper('A4');

        return $pdf->stream('applicant-card-' . $student->name_id . '.pdf');
    }
}
