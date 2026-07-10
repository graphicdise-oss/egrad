<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <--- บรรทัดนี้ต้องอยู่บนสุด ตรงนี้ครับ

class NotificationController extends Controller
{
    // ชื่อไฟล์ที่จะใช้เก็บข้อมูล
    private $fileName = 'notification_data.json';

    // 1. ฟังก์ชันเปิดหน้าฟอร์ม (Admin)
    public function index()
    {
        $notification = null;
        
        // ลองอ่านไฟล์ดูว่ามีข้อมูลเก่าไหม (จะได้เอามาแสดงในกล่องข้อความ)
        if (Storage::disk('local')->exists($this->fileName)) {
            $json = Storage::disk('local')->get($this->fileName);
            $notification = json_decode($json);
        }

        // ส่งไปที่หน้า View ของ Admin (students/warn.blade.php)
        return view('students.warn', compact('notification'));
    }

    // 2. ฟังก์ชันบันทึกข้อมูล (เมื่อกดปุ่ม Save)
    public function update(Request $request)
    {
        // รับค่าจากฟอร์ม
        $data = [
            'warn_money' => $request->warn_money,
            'warn_reg'   => $request->warn_reg,
        ];

        // บันทึกลงไฟล์ JSON (ทับของเดิม)
        Storage::disk('local')->put($this->fileName, json_encode($data, JSON_UNESCAPED_UNICODE));

        return redirect()->back()->with('success', 'บันทึกข้อความลงไฟล์เรียบร้อยแล้ว!');
    }
}