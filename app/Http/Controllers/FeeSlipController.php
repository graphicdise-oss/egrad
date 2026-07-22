<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeSlipController extends Controller
{
    protected array $majors = [
        '70001' => '(ปริญญาโท) หลักสูตรและการสอน (Curriculum and Instruction)',
        '70006' => '(ปริญญาโท) การจัดการเทคโนโลยี (Technology Management)',
        '70007' => '(ปริญญาโท) การจัดการระบบสุขภาพ (Health System Management)',
        '70005' => '(ปริญญาโท) นวัตกรรมการจัดการสิ่งแวดล้อม (Innovation of Environmental Management)',
        '70009' => '(ปริญญาโท) รัฐประศาสนศาสตร์ (Public Administration)',
        '70014' => '(ปริญญาโท) การจัดการปกครอง (Governance)',
        '70015' => '(ปริญญาโท) การจัดการธุรกิจ (Business Management)',
        '70011' => '(ปริญญาโท) ทัศนศิลป์และการออกแบบ (Visual Arts and Design)',
        '70010' => '(ปริญญาโท) นวัตกรรมการบริหารปกครอง และการประกอบการเพื่อสังคม',
        '70008' => '(ปริญญาโท) นวัตกรรมการบริหารการศึกษา',
        '70016' => '(ปริญญาโท) วิทยาศาสตร์การกีฬา',
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
        '72001' => 'สาขาวิชาชีพครู',
    ];

    protected array $scopeLabels = [
        'grad' => 'โท-เอก',
        'teacher' => 'วิชาชีพครู',
    ];

    public function search(Request $request, string $scope)
    {
        abort_unless(isset($this->scopeLabels[$scope]), 404);

        $cardid = trim((string) $request->query('cardid', ''));
        $student = null;
        $searched = $cardid !== '';

        if ($searched) {
            $query = DB::connection('sqlsrv_remote')
                ->table('tbl_std_master_register')
                ->where(function ($q) use ($cardid) {
                    $q->whereRaw('LTRIM(RTRIM(cardid1)) = ?', [$cardid])
                        ->orWhereRaw('LTRIM(RTRIM(cardid2)) = ?', [$cardid]);
                })
                // ไม่แสดงคนที่ถูกยกเลิกใบสมัคร
                ->where(function ($q) {
                    $q->whereNull('cardid1')
                        ->orWhereRaw("LTRIM(RTRIM(cardid1)) <> ?", ['ยกเลิก']);
                });

            if ($scope === 'teacher') {
                $query->whereRaw('LTRIM(RTRIM(master_status_id)) = ?', ['4']);
            } else {
                $query->whereRaw('LTRIM(RTRIM(master_status_id)) IN (?, ?)', ['2', '3']);
            }

            $student = $query->first();
        }

        return view('feeslip.search', [
            'scope' => $scope,
            'scopeLabel' => $this->scopeLabels[$scope],
            'cardid' => $cardid,
            'searched' => $searched,
            'student' => $student,
            'majorName' => $student ? ($this->majors[trim($student->branch_one)] ?? trim($student->branch_one)) : null,
        ]);
    }
}
