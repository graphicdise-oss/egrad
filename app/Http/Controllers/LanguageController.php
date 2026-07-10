<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        // กำหนดภาษาที่อนุญาตให้เปลี่ยน
        $allowed = ['th', 'en', 'zh'];

        if (in_array($locale, $allowed)) {
            // บันทึกภาษาไว้ใน session
            Session::put('locale', $locale);

            // ตั้งค่าภาษาให้ request ปัจจุบันเลย
            App::setLocale($locale);
        }

        // กลับไปหน้าก่อนหน้า
        return redirect()->back();
    }
}
