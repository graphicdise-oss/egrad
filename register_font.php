<?php

require __DIR__ . '/vendor/autoload.php';

use Dompdf\Options;
use Dompdf\Dompdf;

$options = new Options();
$options->set('fontDir', __DIR__ . '/storage/fonts');
$options->set('fontCache', __DIR__ . '/storage/fonts');
$options->set('defaultFont', 'sarabun');

// 🟢 สร้าง Dompdf instance
$dompdf = new Dompdf($options);

// 🟢 register font mapping ด้วย CSS @font-face
$html = '
<style>
@font-face {
    font-family: "sarabun";
    src: url("'.__DIR__.'/storage/fonts/THSarabunNew.ttf") format("truetype");
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: "sarabun";
    src: url("'.__DIR__.'/storage/fonts/THSarabunNew-Bold.ttf") format("truetype");
    font-weight: bold;
    font-style: normal;
}
@font-face {
    font-family: "sarabun";
    src: url("'.__DIR__.'/storage/fonts/THSarabunNew-Italic.ttf") format("truetype");
    font-weight: normal;
    font-style: italic;
}
@font-face {
    font-family: "sarabun";
    src: url("'.__DIR__.'/storage/fonts/THSarabunNew-BoldItalic.ttf") format("truetype");
    font-weight: bold;
    font-style: italic;
}
body { font-family: "sarabun", sans-serif; font-size: 18pt; }
</style>

<p>ทดสอบฟอนต์ภาษาไทย Sarabun</p>
';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4');
$dompdf->render();

file_put_contents(__DIR__ . '/storage/test.pdf', $dompdf->output());

echo "🎉 PDF สร้างแล้วที่ storage/test.pdf\n";
