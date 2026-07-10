<?php

namespace App\Http\Controllers;

use App\Models\StdProfile;
use Barryvdh\DomPDF\Facade\Pdf;
use setasign\Fpdi\Fpdi;
use App\Models\PgStdProfile; // ✅ import model ใหม่

class StdProfileController extends Controller
{
    // แสดงตารางนักศึกษา

    // stream PDF ดูใน browser
    public function pdf($id)
    {
        $student = StdProfile::findOrFail($id);

        $main = Pdf::loadView('pdf.pdf', compact('student'))->setPaper('A4');
        $mainPath = storage_path('app/temp_student.pdf');
        $main->save($mainPath);

        $extra = storage_path('app/profile_vru_simple.pdf');

        $merged = new Fpdi();
        $files = [$mainPath, $extra];

        foreach ($files as $file) {
            if (file_exists($file)) {
                $pageCount = $merged->setSourceFile($file);
                for ($i = 1; $i <= $pageCount; $i++) {
                    $tpl = $merged->importPage($i);
                    $size = $merged->getTemplateSize($tpl);
                    $merged->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $merged->useTemplate($tpl);
                }
            }
        }

        unlink($mainPath);
        return $merged->Output('I', "student_{$student->id_no}_with_profile.pdf");
    }

    // PDF VISA
    public function pdfvisa($id)
    {
        $id = (string) $id;
        $student = PgStdProfile::where('id_no', $id)->firstOrFail();

        $main = Pdf::loadView('pdf.pdfvisa', compact('student'))->setPaper('A4');
        $mainPath = storage_path('app/temp_visa.pdf');
        $main->save($mainPath);

        $extra = storage_path('app/visa_vru_simple.pdf');

        $merged = new Fpdi();
        $files = [$mainPath, $extra];

        foreach ($files as $file) {
            if (file_exists($file)) {
                $pageCount = $merged->setSourceFile($file);
                for ($i = 1; $i <= $pageCount; $i++) {
                    $tpl = $merged->importPage($i);
                    $size = $merged->getTemplateSize($tpl);
                    $merged->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $merged->useTemplate($tpl);
                }
            }
        }

        unlink($mainPath);
        return $merged->Output('I', "student_{$student->id_no}_visa_form.pdf");
    }

    // ✅ PDF VISA เฉพาะนักศึกษา
    public function pdfvisa_std($id)
    {
        // ✅ แปลง id ให้เป็น string
        $id = (string) $id;

        // ✅ ดึงข้อมูลนักศึกษาจาก Postgres
        $student = \App\Models\PgStdProfile::where('id_no', $id)->firstOrFail();

        // ✅ โหลด view ของนักศึกษา (คุณต้องสร้าง pdf/pdfvisa_std.blade.php)
        $main = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.pdfvisa_std', compact('student'))->setPaper('A4');
        $mainPath = storage_path('app/temp_visa_std.pdf');
        $main->save($mainPath);

        // ✅ template พิเศษ (ถ้ามี)
        $extra = storage_path('app/visa_std_vru_simple.pdf');

        $merged = new \setasign\Fpdi\Fpdi();
        $files = [$mainPath, $extra];

        foreach ($files as $file) {
            if (file_exists($file)) {
                $pageCount = $merged->setSourceFile($file);
                for ($i = 1; $i <= $pageCount; $i++) {
                    $tpl = $merged->importPage($i);
                    $size = $merged->getTemplateSize($tpl);
                    $merged->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $merged->useTemplate($tpl);
                }
            }
        }

        unlink($mainPath);

        // ✅ ตั้งชื่อไฟล์ตาม id นักศึกษา
        return $merged->Output('I', "student_{$student->id_no}_visa_std_form.pdf");
    }

    // ✅ PDF STD ใหม่ (ไฟล์เฉพาะของนักศึกษา)
    public function pdfstd($id)
    {
        $student = StdProfile::findOrFail($id);

        // ใช้ view ใหม่ pdf.pdfstd (สร้างไฟล์นี้ใน resources/views/pdf/pdfstd.blade.php)
        $main = Pdf::loadView('pdf.pdfstd', compact('student'))->setPaper('A4');
        $mainPath = storage_path('app/temp_std.pdf');
        $main->save($mainPath);

        // ต่อท้ายด้วย template ต่างหาก
        $extra = storage_path('app/std_vru_simple.pdf');

        $merged = new Fpdi();
        $files = [$mainPath, $extra];

        foreach ($files as $file) {
            if (file_exists($file)) {
                $pageCount = $merged->setSourceFile($file);
                for ($i = 1; $i <= $pageCount; $i++) {
                    $tpl = $merged->importPage($i);
                    $size = $merged->getTemplateSize($tpl);
                    $merged->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $merged->useTemplate($tpl);
                }
            }
        }

        unlink($mainPath);
        return $merged->Output('I', "student_{$student->id_no}_std_form.pdf");
    }
}
