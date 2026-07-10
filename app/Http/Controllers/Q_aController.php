<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class Q_aController extends Controller
{
    // แสดงฟอร์ม
    public function create()
    {
        return view('qanda.question');
    }




    public function store(Request $request)
    {
        // Validate ข้อมูลและไฟล์
        $request->validate([
            'heading' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'details' => 'required|string',
            'mail' => 'required|email',
            'name' => 'required|string|max:100',
            'image' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048', // ✅ รองรับ PDF/PNG/JPG
        ]);

        $fileName = null;
        $fileUrl = null;

      if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('documents', $fileName, 'public');
            $fileUrl = asset('storage/documents/' . $fileName);
        } else {
            $fileName = null;
            $fileUrl = null;
        }

    

        // เตรียมข้อมูลสำหรับบันทึก DB
        $data = [
            'heading' => $request->heading,
            'type' => $request->type,
            'details' => $request->details,
            'mail' => $request->mail,
            'name' => $request->name,
            'status' => 'ยังไม่มีคำตอบ',
            'answer' => '',
            'created_at' => now(),
            'image' => $fileName, // เก็บชื่อไฟล์ใน DB

        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if (!$file->isValid()) {
                dd("❌ File INVALID", $file->getError(), $file->getErrorMessage());
            }

            try {
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('documents', $fileName, 'public');
            } catch (\Exception $e) {
                dd("❌ Upload Error", $e->getMessage());
            }
        }


        try {
            DB::connection('pgsql_qanda')->table('qanda_data')->insert($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'บันทึกไม่สำเร็จ: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'ส่งคำถามเรียบร้อยแล้ว!');
    }




    // ✅ แสดงตาราง q_a ไปยัง view qanda.tableanswer เท่านั้น
    public function tableanswer(Request $request)
    {
        $query = DB::connection('pgsql_qanda')->table('qanda_data')
            ->where('status', 'ตอบแล้ว')
            ->orderByDesc('created_at');


        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $qa = $query->paginate(20);

        return view('qanda.tableanswer', compact('qa'));
    }

    public function index(Request $request)
    {
        if (!Session::has('user_id')) {
            return redirect('/qanda/login')->with('error', 'กรุณาเข้าสู่ระบบก่อน');
        }

        $query = DB::connection('pgsql_qanda')->table('qanda_data');

        if ($request->filled('type')) {
            if ($request->type === 'ยังไม่ได้ตอบ') {
                $query->where('status', 'ยังไม่มีคำตอบ');
            } else {
                $query->where('type', 'like', '%' . $request->type . '%');
            }
        }

        $qa = $query->paginate(10);

        return view('qanda.qandaedit.list', compact('qa'));
    }



    public function showLogin()
    {
        return view('qanda.qandalogin'); // Blade ที่ใช้ login
    }

    public function login(Request $request)
    {
        $user = DB::table('qanda_login')
            ->where('username', $request->username)
            ->where('password', $request->password) // plain text
            ->first();

        if ($user) {
            Session::put('user_id', $user->id);
            return redirect('/qanda/edit');
        } else {
            return redirect()->back()->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
        }
    }


    public function logout()
    {
        Session::forget('user_id');
        return redirect('/qanda/login');
    }

    /**
     * แสดงฟอร์มแก้ไขคำถาม (เฉพาะผู้ล็อกอินเท่านั้น)
     */
    public function edit($id)
    {
        if (!Session::has('user_id')) {
            return redirect('/qanda/login')->with('error', 'กรุณาเข้าสู่ระบบก่อน');
        }

        $record = DB::connection('pgsql_qanda')->table('qanda_data')->find($id);

        return view('qanda.qandaedit.edit', compact('record'));

    }

    /**
     * อัปเดตข้อมูลคำถาม
     */
    public function update(Request $request, $id)
    {
        if (!Session::has('user_id')) {
            return redirect('/qanda/login')->with('error', 'กรุณาเข้าสู่ระบบก่อน');
        }

        DB::connection('pgsql_qanda')->table('qanda_data')->where('id', $id)->update($request->except(['_token', '_method']));

        return redirect()->route('qanda.index')->with('success', 'อัปเดตคำถามเรียบร้อยแล้ว');
    }

    /**
     * ลบคำถาม
     */
    public function show($id)
    {
        $record = DB::table('pgsql_qanda')
            ->where('id', $id)
            ->where('status', 'ตอบแล้ว') // ✅ เช็กสถานะก่อน
            ->first();

        if (!$record) {
            // ถ้าไม่มี หรือยังไม่ตอบ → redirect กลับ หรือขึ้น error
            return abort(404, 'ไม่สามารถดูคำถามนี้ได้ เพราะยังไม่ได้รับการตอบ');
            // หรือใช้ return redirect()->back()->with('error', 'คำถามนี้ยังไม่ได้รับการตอบ');
        }

        return view('qanda.qandashow', compact('record'));
    }

    public function destroy($id)
    {
        if (!Session::has('user_id')) {
            return redirect('/qanda/login')->with('error', 'กรุณาเข้าสู่ระบบก่อน');
        }

        // ดึงข้อมูลก่อน
        $row = DB::connection('pgsql_qanda')->table('qanda_data')->where('id', $id)->first();

        if (!$row) {
            return redirect()->back()->with('error', 'ไม่พบรายการที่ต้องการลบ');
        }

        // ลบไฟล์ภาพถ้ามี
        if (!empty($row->image)) {
            $path = storage_path('app/public/documents/' . $row->image);
            if (file_exists($path)) {
                @unlink($path);
            }
        }


        // ลบข้อมูลจาก database
        DB::connection('pgsql_qanda')->table('qanda_data')->where('id', $id)->delete();

        return redirect()->route('q_a.index')->with('success', 'ลบรายการเรียบร้อยแล้ว');
    }




}
