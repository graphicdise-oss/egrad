<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1. รับค่าจาก URL
        $selectedLevel = $request->input('namelevel');
        $selectedDetail = $request->input('detail');
        $selectedYear = $request->input('year');

        // ==================================================
        // ✅ ส่วนที่ 1: ดึงตัวเลือก "ระดับปริญญา" จากฐานข้อมูลโดยตรง (เพื่อให้ครบทุกอัน)
        // ==================================================
        $rawLevels = DB::connection('sqlsrv_register')
            ->table('Ve_studentbunditfinan')
            ->select('namelevel_full')
            ->distinct() // เอาที่ไม่ซ้ำ
            ->whereNotNull('namelevel_full')
            ->orderBy('namelevel_full', 'asc')
            ->get();

        // ตัดช่องว่างออก
        $levels = $rawLevels->map(function ($item) {
            return trim($item->namelevel_full);
        })->unique()->values();


        // ==================================================
        // 📊 ส่วนที่ 2: ดึงข้อมูลหลัก (Master Data) สำหรับทำกราฟ
        // ==================================================
        $rawQuery = DB::connection('sqlsrv_register')
            ->table('Ve_studentbunditfinan')
            ->select('id_no', 'term', 'detail', 'namelevel', 'namelevel_full', 'status_name')
            ->whereNotNull('term')
            ->where('status_name', 'เรียนยังไม่ครบหลักสูตร')
            ->get();

        // --- Clean Data & คำนวณปี ---
        $cleanedData = $rawQuery->map(function ($row) {
            $row->detail = trim($row->detail);
            $row->namelevel_full = trim($row->namelevel_full);

            $term = trim($row->term);
            $year = null;
            if (preg_match('/(\d+)\/(\d+)/', $term, $matches)) {
                $yearNum = (int) $matches[2];
                $year = $yearNum < 2500 ? $yearNum + 2500 : $yearNum;
            } elseif (is_numeric($term) && (int) $term < 2500 && (int) $term > 40) {
                $year = (int) $term + 2500;
            } elseif (is_numeric($term) && (int) $term >= 2500) {
                $year = (int) $term;
            }
            $row->year = $year;
            return $row;
        });

        // ⭐ ข้อมูลตั้งต้น (นับเฉพาะปีแรกของแต่ละคน) ⭐
        $masterData = $cleanedData->sortBy('year')->unique('id_no')->values();

        // --- เตรียมตัวเลือก Dropdown อื่นๆ ---
        // (ตัวแปร $levels สร้างไปแล้วข้างบน ไม่ต้องสร้างซ้ำ)
        $details = $masterData->pluck('detail')->filter()->unique()->values();
        $allYears = $masterData->pluck('year')->filter()->unique()->sortDesc()->values();


        // ==========================================
        // 📊 ส่วนที่ 3: กราฟบน (กรองตามสาขาปกติ)
        // ==========================================
        $dataTop = $masterData;
        if (!empty($selectedLevel)) {
            $dataTop = $dataTop->where('namelevel_full', $selectedLevel);
        }
        if (!empty($selectedDetail)) {
            $dataTop = $dataTop->where('detail', $selectedDetail);
        }

        $countByYearTop = $dataTop->groupBy('year')->map(fn($items) => $items->count())->sortKeys();
        $recentYearsTop = $countByYearTop
            ->sortKeysDesc()
            ->take(10)
            ->sortKeys()
            ->keys();

        $chartData = [
            'labels' => $countByYearTop->only($recentYearsTop)->keys(),
            'data' => $countByYearTop->only($recentYearsTop)->values(),
        ];


        // ==========================================
        // 📊 ส่วนที่ 4: กราฟล่าง (ไม่กรองสาขา / แยกปีอิสระ)
        // ==========================================
        $dataBottom = $masterData;
        if (!empty($selectedLevel)) {
            $dataBottom = $dataBottom->where('namelevel_full', $selectedLevel);
        }

        // คำนวณปีสำหรับกราฟล่าง
        $yearsForBottom = $dataBottom->pluck('year')->unique()->sortDesc()->values();
        $recentYearsBottom = $yearsForBottom->take(5);

        if (!empty($selectedYear)) {
            $dataBottom = $dataBottom->where('year', $selectedYear);
        } else {
            $dataBottom = $dataBottom->whereIn('year', $recentYearsBottom);
        }

        $countByMajor = $dataBottom->groupBy('detail')->map(fn($items) => $items->count())->sortDesc();
        $chartMajor = [
            'labels' => $countByMajor->keys(),
            'data' => $countByMajor->values(),
        ];

        return view('egard.home', compact(
            'chartData',
            'chartMajor',
            'levels',
            'details',
            'allYears',
            'selectedLevel',
            'selectedDetail',
            'selectedYear'
        ));
    }
}