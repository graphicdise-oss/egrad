<?php

namespace App\Http\Controllers;

use App\Models\PdfCardSetting;
use Illuminate\Http\Request;

class PdfCardSettingController extends Controller
{
    protected array $degreeLabels = [
        'master' => 'ปริญญาโท',
        'doctor' => 'ปริญญาเอก',
        'teacher' => 'วิชาชีพครู',
    ];

    public function selectTerm(string $degree)
    {
        abort_unless(isset($this->degreeLabels[$degree]), 404);

        $year = now()->year + 543;

        return view('pdfsettings.select-term', [
            'degree' => $degree,
            'degreeLabel' => $this->degreeLabels[$degree],
            'year' => $year,
        ]);
    }

    public function edit(string $degree, int $term)
    {
        abort_unless(isset($this->degreeLabels[$degree]), 404);
        abort_unless(in_array($term, [1, 2]), 404);

        $year = now()->year + 543;

        $setting = PdfCardSetting::firstOrNew([
            'degree' => $degree,
            'term' => $term,
            'year' => $year,
        ]);

        return view('pdfsettings.edit', [
            'setting' => $setting,
            'degree' => $degree,
            'degreeLabel' => $this->degreeLabels[$degree],
            'term' => $term,
            'year' => $year,
        ]);
    }

    public function update(Request $request, string $degree, int $term)
    {
        abort_unless(isset($this->degreeLabels[$degree]), 404);
        abort_unless(in_array($term, [1, 2]), 404);

        $year = now()->year + 543;

        $data = $request->validate([
            'exam_announce_text' => 'nullable|string|max:255',
            'exam_date_text' => 'nullable|string|max:255',
            'admit_announce_text' => 'nullable|string|max:255',
            'semester_start_text' => 'nullable|string|max:255',
        ]);

        PdfCardSetting::updateOrCreate(
            ['degree' => $degree, 'term' => $term, 'year' => $year],
            $data
        );

        return back()->with('success', 'บันทึกข้อความบัตรประจำตัวผู้สมัครเรียบร้อยแล้ว');
    }
}
