
<?php

namespace App\Http\Controllers; // ✅ อย่าลืม namespace

use Illuminate\Http\Request;
use App\Models\StdProfile;
use Barryvdh\DomPDF\Facade\Pdf;

class VisaController extends Controller
{
    public function visaPDF($id)
    {
        $student = StdProfile::findOrFail($id);

        $pdf = Pdf::loadView('pdf.visa', compact('student'))
            ->setPaper('A4', 'portrait'); // แนวตั้ง

        return $pdf->stream("visa_form_{$student->id_no}.pdf");
    }
}
