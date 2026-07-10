<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport; // ดึงทั้งหมด
use App\Exports\StudentsPageExport; // ดึงเฉพาะหน้า
use Illuminate\Support\Facades\Storage;

use App\Exports\AlumniExport;          // ✅ ตัว A พิมพ์ใหญ่



class StudentProfileController extends Controller
{
    // แสดงหน้า index พร้อมข้อมูลนักศึกษา
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 20;
        $offset = ($page - 1) * $perPage;

        // ✅ ดึงรายชื่อหลักสูตรทั้งหมด
        $courses = DB::connection('sqlsrv_register')
            ->table('Ve_studentbunditfinan')
            ->select('namelevel_full', 'detail')
            ->whereNotNull('namelevel_full')
            ->whereNotNull('detail')
            ->distinct()
            ->orderBy('namelevel_full')
            ->orderBy('detail')
            ->get();

        // ✅ ดึงปีล่าสุด 5 ปี
        $latestYearsQuery = DB::connection('sqlsrv_register')->select("
        SELECT DISTINCT TOP 100 RIGHT(term, 2) AS year_part
        FROM Ve_studentbunditfinan
        WHERE term IS NOT NULL
        ORDER BY year_part DESC
    ");

        $latestYears = array_map(fn($row) => $row->year_part, $latestYearsQuery);

        // ✅ เตรียมตัวกรอง
        $filters = [];
        $bindings = [];

        // เฉพาะคนที่ยังไม่จบหลักสูตร
        $filters[] = "status_name = 'เรียนยังไม่ครบหลักสูตร'";

        // ✅ ถ้ามีเลือก “ระดับปริญญา”
        if ($request->filled('namelevel_full')) {
            $filters[] = "namelevel_full = ?";
            $bindings[] = $request->namelevel_full;
        }

        // ✅ ถ้ามีเลือก “สาขา”
        if ($request->filled('detail')) {
            $filters[] = "detail = ?";
            $bindings[] = $request->detail;
        }

        // ✅ ถ้ามีกรอกรหัสนักศึกษา
        if ($request->filled('id_no')) {
            $filters[] = "id_no = ?";
            $bindings[] = $request->id_no;
        }

        $whereFilters = '';
        if (!empty($filters)) {
            $whereFilters = ' AND ' . implode(' AND ', $filters);
        }

        // ✅ SQL หลัก

        $sql = "
SELECT * FROM (
    SELECT ROW_NUMBER() OVER (ORDER BY id_no DESC) AS rownum, *
    FROM (
        SELECT *,
               ROW_NUMBER() OVER (
                   PARTITION BY id_no 
                   ORDER BY 
                       CAST(RIGHT(term, 2) AS INT) ASC,  -- ปีน้อยสุดก่อน
                       CAST(LEFT(term, 1) AS INT) ASC    -- เทอมน้อยสุดก่อน
               ) AS rn
        FROM Ve_studentbunditfinan
        WHERE RIGHT(term, 2) IN ('" . implode("','", $latestYears) . "')
        $whereFilters
    ) AS t
    WHERE rn = 1
) AS temp
WHERE rownum > ? AND rownum <= ?
ORDER BY id_no DESC
";



        $bindings[] = $offset;
        $bindings[] = $offset + $perPage;

        $students = DB::connection('sqlsrv_register')->select($sql, $bindings);

        // ✅ นับจำนวนรวม
        $countBindings = array_slice($bindings, 0, count($bindings) - 2);
        $totalSql = "
SELECT COUNT(*) AS cnt FROM (
    SELECT id_no,
           ROW_NUMBER() OVER (
               PARTITION BY id_no 
               ORDER BY 
                   CAST(RIGHT(term, 2) AS INT) ASC,  -- ปีน้อยสุดก่อน
                   CAST(LEFT(term, 1) AS INT) ASC    -- เทอมน้อยสุดก่อน
           ) AS rn
    FROM Ve_studentbunditfinan
    WHERE RIGHT(term, 2) IN ('" . implode("','", $latestYears) . "')
    $whereFilters
) AS t WHERE rn = 1
";



        $totalResult = DB::connection('sqlsrv_register')->select($totalSql, $countBindings);
        $total = $totalResult[0]->cnt ?? 0;

        $students = collect($students);

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $students,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('students.index', [
            'students' => $paginator,
            'courses' => $courses,
        ]);
    }


    public function visatime(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 20;
        $offset = ($page - 1) * $perPage;

        // ✅ ดึงรายชื่อหลักสูตรทั้งหมด (distinct)
        $courses = DB::connection('sqlsrv_register')
            ->table('Ve_studentbunditfinan')
            ->select('namelevel_full', 'detail')
            ->whereNotNull('namelevel_full')
            ->whereNotNull('detail')
            ->distinct()
            ->orderBy('namelevel_full')
            ->orderBy('detail')
            ->get();

        // ✅ ดึงปีล่าสุด 5 ปี จาก term เช่น 1/68, 2/67, 1/66
        $latestYearsQuery = DB::connection('sqlsrv_register')->select("
        SELECT DISTINCT TOP 100 RIGHT(term, 2) AS year_part
        FROM Ve_studentbunditfinan
        WHERE term IS NOT NULL
        ORDER BY year_part DESC
    ");

        $latestYears = array_map(fn($row) => $row->year_part, $latestYearsQuery);

        // ✅ SQL หลัก: เลือกเฉพาะเทอมล่าสุดของแต่ละ id_no แล้วค่อย paginate
        $sql = "
 SELECT * FROM (
    SELECT ROW_NUMBER() OVER (ORDER BY id_no DESC) AS rownum, *
    FROM (
        SELECT *,
               ROW_NUMBER() OVER (
                   PARTITION BY id_no 
                   ORDER BY 
                       CAST(RIGHT(term, 2) AS INT) ASC,
                       CAST(LEFT(term, 1) AS INT) ASC
               ) AS rn
        FROM Ve_studentbunditfinan
        WHERE dateidcard_end IS NOT NULL
          AND status_name = N'เรียนยังไม่ครบหลักสูตร'
          AND RIGHT(term, 2) IN ('68','67','66')
          AND pname LIKE '[A-Za-z]%'
AND name LIKE '[A-Za-z]%'
AND lname LIKE '[A-Za-z]%'
    ) AS t
    WHERE rn = 1
) AS temp
WHERE rownum > ? AND rownum <= ?
ORDER BY id_no DESC

    ";

        $bindings = [];

        if ($request->filled('detail')) {
            $sql = str_replace("WHERE rn = 1", "WHERE rn = 1 AND detail = ?", $sql);
            $bindings[] = $request->detail;
        }

        if ($request->filled('id_no')) {
            $sql = str_replace("WHERE rn = 1", "WHERE rn = 1 AND id_no = ?", $sql);
            $bindings[] = $request->id_no;
        }

        $bindings[] = $offset;
        $bindings[] = $offset + $perPage;

        // ✅ Query ข้อมูลนักศึกษา
        $students = DB::connection('sqlsrv_register')->select($sql, $bindings);

        // ✅ Query นับจำนวนรวม (เฉพาะ rn = 1 และ 5 ปีล่าสุด)
        $totalSql = "
    SELECT COUNT(*) AS cnt FROM (
        SELECT id_no,
             ROW_NUMBER() OVER (
    PARTITION BY id_no 
    ORDER BY 
        CAST(RIGHT(term, 2) AS INT) ASC,  -- ปีน้อยสุดก่อน
        CAST(LEFT(term, 1) AS INT) ASC    -- เทอมน้อยสุดก่อน
) AS rn

        FROM Ve_studentbunditfinan
        
        WHERE dateidcard_end IS NOT NULL
             AND pname LIKE '[A-Za-z]%'
AND name LIKE '[A-Za-z]%'
AND lname LIKE '[A-Za-z]%'
          AND status_name = N'เรียนยังไม่ครบหลักสูตร'
          AND RIGHT(term, 2) IN ('" . implode("','", $latestYears) . "')
    ";

        $totalBindings = [];

        if ($request->filled('detail')) {
            $totalSql .= " AND detail = ? ";
            $totalBindings[] = $request->detail;
        }

        if ($request->filled('id_no')) {
            $totalSql .= " AND id_no = ? ";
            $totalBindings[] = $request->id_no;
        }

        $totalSql .= ") AS t WHERE rn = 1";

        $totalResult = DB::connection('sqlsrv_register')->select($totalSql, $totalBindings);
        $total = $totalResult[0]->cnt ?? 0;

        // ✅ แปลงผลลัพธ์เป็น paginator
        $students = collect($students);



        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $students,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // ✅ ข้อมูลที่ใช้ในปุ่ม Gmail
        $subject = "VISA Expiration Reminder";
        $body = "Dear Student,\n\nYour VISA is about to expire.\nPlease contact the 100th Year Building, 1st Floor, with your VISA documents.\n\nThank you.";

        return view('students.visatime', [
            'students' => $paginator,
            'courses' => $courses,
            'subject' => $subject,
            'body' => $body,
        ]);
    }

    // ✅ ดาวน์โหลดข้อมูลทั้งหมด (ตามตัวกรองหน้า visatime)
    public function exportVisaAll(Request $request)
    {
        return Excel::download(
            new \App\Exports\VisaExport(
                $request->input('namelevel_full'),
                $request->input('detail'),
                $request->input('id_no')
            ),
            'visa_all.xlsx'
        );
    }

    // ✅ ดาวน์โหลดเฉพาะหน้าที่แสดงตอนนี้
    public function exportVisaCurrent(Request $request)
    {
        return Excel::download(
            new \App\Exports\VisaPageExport(
                $request->input('page', 1),
                $request->input('namelevel_full'),
                $request->input('detail'),
                $request->input('id_no')
            ),
            'visa_page_' . $request->input('page', 1) . '.xlsx'
        );
    }




    public function alumni(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 20;
        $offset = ($page - 1) * $perPage;

        // ✅ ดึงรายชื่อหลักสูตรทั้งหมด (distinct)
        $courses = DB::connection('sqlsrv_register')
            ->table('Ve_studentbunditfinan')
            ->select('namelevel_full', 'detail')
            ->whereNotNull('namelevel_full')
            ->whereNotNull('detail')
            ->distinct()
            ->orderBy('namelevel_full')
            ->orderBy('detail')
            ->get();

        // ✅ SQL หลัก
        $sql = "
        SELECT *
        FROM (
            SELECT *,
                ROW_NUMBER() OVER(
                    PARTITION BY id_no
            ORDER BY 
        CAST(RIGHT(term, 2) AS INT) ASC,  -- ปีน้อยสุดก่อน
        CAST(LEFT(term, 1) AS INT) ASC    -- เทอมน้อยสุดก่อน
) AS rn

            FROM Ve_studentbunditfinan
            WHERE status_name = N'เรียนครบหลักสูตร'
    ";

        $bindings = [];

        // ✅ เพิ่มกรองระดับปริญญา (ปริญญาโท / ปริญญาเอก)
        if ($request->filled('namelevel_full')) {
            $sql .= " AND namelevel_full = ? ";
            $bindings[] = $request->namelevel_full;
        }

        // ✅ กรองตามหลักสูตร
        if ($request->filled('detail')) {
            $sql .= " AND detail = ? ";
            $bindings[] = $request->detail;
        }

        // ✅ กรองตามรหัสนักศึกษา
        if ($request->filled('id_no')) {
            $sql .= " AND id_no = ? ";
            $bindings[] = $request->id_no;
        }

        // ✅ ดึงเฉพาะปีล่าสุดของแต่ละนักศึกษา
        $sql .= ") AS temp WHERE rn = 1";
        $sql .= " ORDER BY id_no DESC";

        // ✅ Query ข้อมูลทั้งหมดก่อนตัดหน้า
        $allStudents = DB::connection('sqlsrv_register')->select($sql, $bindings);

        // ✅ แปลงเป็น collection และ paginate
        $students = collect($allStudents);
        $total = count($students);
        $students = $students->slice($offset, $perPage);

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $students,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // ✅ ส่งข้อมูลไปหน้า view
        return view('students.alumni', [
            'students' => $paginator,
            'courses' => $courses,
        ]);
    }


    // ✅ ดาวน์โหลดทั้งหมดตามเงื่อนไขที่เลือก


    public function exportAlumniAll(Request $request)
    {
        return Excel::download(
            new \App\Exports\AlumniExport(
                $request->input('namelevel_full'),
                $request->input('detail'),
                $request->input('id_no')
            ),
            'alumni_all.xlsx'
        );
    }

    // ดาวน์โหลดทั้งหมด
    public function exportCurrent(Request $request)
    {
        $page = $request->input('page', 1);
        $namelevel_full = $request->input('namelevel_full');
        $detail = $request->input('detail');
        $id_no = $request->input('id_no');

        $response = Excel::download(
            new StudentsPageExport($page, $namelevel_full, $detail, $id_no),
            'students_page_' . $page . '.xlsx'
        );

        // ป้องกัน Google index หน้านี้
        $response->headers->set('X-Robots-Tag', 'noindex, nofollow');

        // เผื่อบาง server ต้องการ content-type
        $response->headers->set(
            'Content-Type',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        return $response;
    }


    public function exportAll(Request $request)
    {
        $namelevel_full = $request->input('namelevel_full');
        $detail = $request->input('detail');
        $id_no = $request->input('id_no');

        $response = Excel::download(
            new StudentsExport($namelevel_full, $detail, $id_no),
            'students_all.xlsx'
        );

        // ป้องกัน Google, Bing, Bot ทั้งหมด
        $response->headers->set('X-Robots-Tag', 'noindex, nofollow');

        // เพื่อความสมบูรณ์ (บาง server ต้องตั้ง content-type เอง)
        $response->headers->set(
            'Content-Type',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        return $response;
    }





    //เเก้ไข
    // แก้ฟังก์ชัน edit
    public function edit($id_no)
    {
        // ✅ ดึงข้อมูลนักศึกษาจาก SQL Server
        $student = DB::connection('sqlsrv_register')
            ->table('Ve_studentbunditfinan')
            ->where('id_no', $id_no)
            ->first();

        if (!$student) {
            abort(404, "ไม่พบนักศึกษาใน SQL Server");
        }

        // ✅ เช็คว่ามี profile ใน PostgreSQL หรือยัง
        $profile = DB::connection('pgsql')
            ->table('t_std_profile')
            ->where('id_no', $id_no)
            ->first();

        if (!$profile) {
            // ถ้ายังไม่มี → insert อัตโนมัติ
            DB::connection('pgsql')
                ->table('t_std_profile')
                ->insert([
                    'id_no' => $student->id_no,
                    'pname' => $student->pname,
                    'name' => $student->name,
                    'lname' => $student->lname,
                    'detail' => $student->detail,
                    'namelevel_full' => $student->namelevel_full,
                    'idcard' => $student->idcard,
                    'tel' => $student->tel,
                    'homeadd' => $student->homeadd,
                    'email' => $student->email,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }



        // ✅ ดึงใหม่หลัง insert
        $profile = DB::connection('pgsql')
            ->table('t_std_profile')
            ->where('id_no', $id_no)
            ->first();


        $notification = null;
        if (Storage::disk('local')->exists('notification_data.json')) {
            $json = Storage::disk('local')->get('notification_data.json');
            $notification = json_decode($json);
        }

        // ✅ ส่งไปยัง view

        return view('students.edit', compact('student', 'profile', 'notification'));
    }


    public function editStd($id_no)
    {
        // ✅ ดึงข้อมูลนักศึกษาจาก SQL Server
        $student = DB::connection('sqlsrv_register')
            ->table('Ve_studentbunditfinan')
            ->where('id_no', $id_no)
            ->first();

        if (!$student) {
            abort(404, "ไม่พบนักศึกษาใน SQL Server");
        }

        // ✅ เช็คว่ามี profile ใน PostgreSQL หรือยัง
        $profile = DB::connection('pgsql')
            ->table('t_std_profile')
            ->where('id_no', $id_no)
            ->first();

        if (!$profile) {
            // ถ้ายังไม่มี → insert อัตโนมัติ
            DB::connection('pgsql')
                ->table('t_std_profile')
                ->insert([
                    'id_no' => $student->id_no,
                    'pname' => $student->pname,
                    'name' => $student->name,
                    'lname' => $student->lname,
                    'detail' => $student->detail,
                    'namelevel_full' => $student->namelevel_full,
                    'idcard' => $student->idcard,
                    'tel' => $student->tel,
                    'homeadd' => $student->homeadd,
                    'email' => $student->email,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }

        // ✅ ดึงใหม่หลัง insert
        $profile = DB::connection('pgsql')
            ->table('t_std_profile')
            ->where('id_no', $id_no)
            ->first();

        // ---------------------------------------------------------
        // ⭐ ส่วนที่เพิ่ม: อ่านไฟล์แจ้งเตือน (Notification) ⭐
        // ---------------------------------------------------------
        $notification = null;
        if (Storage::disk('local')->exists('notification_data.json')) {
            $json = Storage::disk('local')->get('notification_data.json');
            $notification = json_decode($json);
        }
        // ---------------------------------------------------------

        // ✅ ส่งตัวแปร $notification ไปที่ View ด้วย
        return view('studentsstd.edit', compact('student', 'profile', 'notification'));
    }



    public function showSection($section, $id_no)
    {
        $views = [
            'abstract1' => 'students.editstudent.abstract_en.abstract1',
            'money1' => 'students.editstudent.money.money1',
            'money2' => 'students.editstudent.money.money2',
            'p_research1' => 'students.editstudent.publish_research.p_research1',
            'visa' => 'students.editstudent.visa.visa',
            'visa2' => 'students.editstudent.visa.visa2',
            'visaform' => 'students.editstudent.visa.visaform',
            'thesis_name1' => 'students.editstudent.thesis.thesis_name1',
            'thesis_name2' => 'students.editstudent.thesis.thesis_name2',
            'thesis_name3' => 'students.editstudent.thesis.thesis_name3',
            'thesis_re1' => 'students.editstudent.research_thesis.thesis_re1',
            'thesis_re2' => 'students.editstudent.research_thesis.thesis_re2',
            'thesis_re3' => 'students.editstudent.research_thesis.thesis_re3',
            'thesis_re4' => 'students.editstudent.research_thesis.thesis_re4',
            'thesis_re5' => 'students.editstudent.research_thesis.thesis_re5',
            'thesis_re6' => 'students.editstudent.research_thesis.thesis_re6',
            'sys_fi1' => 'students.editstudent.system_finish.sys_fi1',
            'sys_fi2' => 'students.editstudent.system_finish.sys_fi2',
            'sys_fi3' => 'students.editstudent.system_finish.sys_fi3',
            'sys_fi4' => 'students.editstudent.system_finish.sys_fi4',
            'sys_tr1' => 'students.editstudent.system_t_r.sys_tr1',
            't_system1' => 'students.editstudent.tutoringsystem.t_system1',
            't_system2' => 'students.editstudent.tutoringsystem.t_system2',
            't_system3' => 'students.editstudent.tutoringsystem.t_system3',
            '3' => 'students.editstudent.3.3edit',
        ];



        // ✅ ดึงจาก SQL Server
        $student = DB::connection('sqlsrv_remote')
            ->table('Gradent.dbo.tbl_std_master_register')
            ->where('id_no', $id_no)
            ->first();

        if (!$student) {
            // fallback ไปดึงจาก sqlsrv_register แทน
            $student = DB::connection('sqlsrv_register')
                ->table('Ve_studentbunditfinan')
                ->where('id_no', $id_no)
                ->first();
        }

        // ถ้าไม่มีจริง ๆ ค่อย abort
        if (!$student) {
            abort(404, "ไม่พบนักศึกษาในฐานข้อมูลทั้งสอง");
        }

        // ✅ เช็ค/สร้าง record ใน PostgreSQL
        $profile = DB::connection('pgsql')
            ->table('t_std_profile')
            ->where('id_no', $id_no)
            ->first();

        if (!$profile) {
            DB::connection('pgsql')
                ->table('t_std_profile')
                ->insert([
                    'id_no' => $id_no,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            $profile = DB::connection('pgsql')
                ->table('t_std_profile')
                ->where('id_no', $id_no)
                ->first();
        }

        // ✅ รวมข้อมูลจาก PG เข้า student
        foreach ($profile as $key => $value) {
            $student->$key = $value;
        }

        // section พิเศษ: money2 (ค่ารักษาสภาพ)
        if ($section === 'money2') {
            $payments = DB::connection('sqlsrv_register')
                ->table('Register.dbo.Ve_studentbunditfinan')
                ->where('id_no', $id_no)
                ->whereRaw("LTRIM(RTRIM(regcode)) = '4'")
                ->orderByRaw("
        CAST(SUBSTRING(term, CHARINDEX('/', term) + 1, LEN(term)) AS INT) ASC,
        CAST(LEFT(term, CHARINDEX('/', term) - 1) AS INT) ASC
    ")
                ->get();


            return view('students.editstudent.money.money2', compact('payments', 'student'));
        }


        // section พิเศษ: money (ค่าเทอม)
        if (in_array($section, ['money1', 'money2'])) {
            $payments = DB::connection('sqlsrv_register')
                ->table('Register.dbo.Ve_studentbunditfinan')
                ->where('id_no', $id_no)
                ->whereRaw("LTRIM(RTRIM(regcode)) IN ('1','d')")
                ->orderByRaw("
        CAST(SUBSTRING(term, CHARINDEX('/', term) + 1, LEN(term)) AS INT) ASC,  -- เรียงปี (หลัง /)
        CAST(LEFT(term, CHARINDEX('/', term) - 1) AS INT) ASC                    -- เรียงเทอม (ก่อน /)
    ")
                ->get();


            return view($views[$section], compact('payments', 'student'));
        }

        // section อื่น ๆ
        return view($views[$section], compact('student', 'id_no'));


    }


    public function showSectionStd($section, $id_no)
    {
        $views = [
            'abstract1' => 'studentsstd.editstudent.abstract_en.abstract1',
            'money1' => 'studentsstd.editstudent.money.money1',
            'money2' => 'studentsstd.editstudent.money.money2',
            'p_research1' => 'studentsstd.editstudent.publish_research.p_research1',
            'visa' => 'studentsstd.editstudent.visa.visa',
            'visa2' => 'studentsstd.editstudent.visa.visa2',
            'visaform' => 'studentsstd.editstudent.visa.visaform',
            'thesis_name1' => 'studentsstd.editstudent.thesis.thesis_name1',
            'thesis_name2' => 'studentsstd.editstudent.thesis.thesis_name2',
            'thesis_name3' => 'studentsstd.editstudent.thesis.thesis_name3',
            'thesis_re1' => 'studentsstd.editstudent.research_thesis.thesis_re1',
            'thesis_re2' => 'studentsstd.editstudent.research_thesis.thesis_re2',
            'thesis_re3' => 'studentsstd.editstudent.research_thesis.thesis_re3',
            'thesis_re4' => 'studentsstd.editstudent.research_thesis.thesis_re4',
            'thesis_re5' => 'studentsstd.editstudent.research_thesis.thesis_re5',
            'thesis_re6' => 'studentsstd.editstudent.research_thesis.thesis_re6',
            'sys_fi1' => 'studentsstd.editstudent.system_finish.sys_fi1',
            'sys_fi2' => 'studentsstd.editstudent.system_finish.sys_fi2',
            'sys_fi3' => 'studentsstd.editstudent.system_finish.sys_fi3',
            'sys_fi4' => 'studentsstd.editstudent.system_finish.sys_fi4',
            'sys_tr1' => 'studentsstd.editstudent.system_t_r.sys_tr1',
            't_system1' => 'studentsstd.editstudent.tutoringsystem.t_system1',
            't_system2' => 'studentsstd.editstudent.tutoringsystem.t_system2',
            't_system3' => 'studentsstd.editstudent.tutoringsystem.t_system3',
            '3' => 'studentsstd.editstudent.3.3edit',
        ];

        // ✅ ดึงข้อมูลจาก SQL Server
        $student = DB::connection('sqlsrv_remote')
            ->table('Gradent.dbo.tbl_std_master_register')
            ->where('id_no', $id_no)
            ->first();

        if (!$student) {
            $student = DB::connection('sqlsrv_register')
                ->table('Ve_studentbunditfinan')
                ->where('id_no', $id_no)
                ->first();
        }

        if (!$student) {
            abort(404, "ไม่พบนักศึกษาในฐานข้อมูลทั้งสอง");
        }

        // ✅ รวมข้อมูลจาก PostgreSQL
        $profile = DB::connection('pgsql')
            ->table('t_std_profile')
            ->where('id_no', $id_no)
            ->first();

        if (!$profile) {
            DB::connection('pgsql')->table('t_std_profile')->insert([
                'id_no' => $id_no,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $profile = DB::connection('pgsql')
                ->table('t_std_profile')
                ->where('id_no', $id_no)
                ->first();
        }

        foreach ($profile as $key => $value) {
            $student->$key = $value;
        }

        // ✅ section พิเศษ: money
        if (in_array($section, ['money1', 'money2'])) {
            $payments = DB::connection('sqlsrv_register')
                ->table('Register.dbo.Ve_studentbunditfinan')
                ->where('id_no', $id_no)
                ->orderBy('term', 'ASC')
                ->get();

            return view($views[$section], compact('payments', 'student'));
        }

        // ✅ section อื่น ๆ
        return view($views[$section], compact('student', 'id_no'));
    }



    public function saveSection(Request $request, $section, $id_no)
    {
        // 🔹 ตรวจว่านักศึกษาอยู่ใน SQL Server หรือไม่
        $student = DB::connection('sqlsrv_register')
            ->table('Ve_studentbunditfinan')
            ->where('id_no', $id_no)
            ->first();

        if (!$student) {
            abort(404, "ไม่พบนักศึกษาใน SQL Server");
        }

        // 🔹 รายชื่อฟิลด์ที่ต้องรับไฟล์ (ทั้ง PDF และ Word)
        $files = [
            'pdf_researche',
            'original_passport',
            'tuition_fee',
            'academic_transcrip',
            'e_visa',
            'passport_sized',
            'abstractword1',
            'abstractword2',
            'abstractword3',
            'thesis_repdf'
        ];

        $fileNames = [];

        // 🔹 จัดการไฟล์ทั้งหมด
        foreach ($files as $fileField) {
            // ดึงชื่อไฟล์เดิมจาก Postgres
            $fileNames[$fileField] = DB::connection('pgsql')
                ->table('t_std_profile')
                ->where('id_no', $id_no)
                ->value($fileField);

            // ถ้ามีไฟล์ใหม่อัปโหลดมา
            if ($request->hasFile($fileField) && $request->file($fileField)->isValid()) {
                $file = $request->file($fileField);

                // ลบไฟล์เก่าถ้ามี
                if ($fileNames[$fileField] && Storage::disk('public')->exists('documents/' . $fileNames[$fileField])) {
                    Storage::disk('public')->delete('documents/' . $fileNames[$fileField]);
                }

                // ตั้งชื่อไฟล์ใหม่ (timestamp + fieldname + นามสกุลเดิม)
                $fileNames[$fileField] = time() . '_' . $fileField . '.' . $file->getClientOriginalExtension();

                // เก็บไฟล์ไว้ที่ storage/app/public/documents/
                $file->storeAs('documents', $fileNames[$fileField], 'public');
            }
        }

        // 🔹 บันทึกข้อมูลลง Postgres
        DB::connection('pgsql')->table('t_std_profile')
            ->updateOrInsert(
                ['id_no' => $id_no],
                [
                    'comp_exam_status' => $request->comp_exam_status,
                    'comp_exam_status2' => $request->comp_exam_status2,
                    'comp_exam_status3' => $request->comp_exam_status3,
                    'thesis_title_en1' => $request->thesis_title_en1,
                    'thesis_title_th1' => $request->thesis_title_th1,
                    'thesis_title_en2' => $request->thesis_title_en2,
                    'thesis_title_th2' => $request->thesis_title_th2,
                    'advisor_1_name' => $request->advisor_1_name,
                    'advisor_2_name' => $request->advisor_2_name,
                    'advisor_3_name' => $request->advisor_3_name,
                    'advisor_4_name' => $request->advisor_4_name,
                    'advisor_5_name' => $request->advisor_5_name,
                    'advisor_6_name' => $request->advisor_6_name,
                    'curriculum_chair_name' => $request->curriculum_chair_name,
                    'curriculum_chair_role' => $request->curriculum_chair_role,
                    'appointed_date' => $request->appointed_date,
                    'committee_meeting_round' => $request->committee_meeting_round,
                    'committee_meeting_date' => $request->committee_meeting_date,
                    'approval_date' => $request->approval_date,
                    'tool_check' => $request->tool_check,
                    'ethics_approval' => $request->ethics_approval,
                    'tool_trial' => $request->tool_trial,
                    'data_collection' => $request->data_collection,
                    'final_correction' => $request->final_correction,
                    'final_date' => $request->final_date,

                    'sysfr1' => $request->sysfr1,
                    'sysfr1_1' => $request->sysfr1_1,
                    'sysfr2' => $request->sysfr2,
                    'sysfr2_2' => $request->sysfr2_2,
                    'sysfr3' => $request->sysfr3,
                    'sysfr3_3' => $request->sysfr3_3,
                    'sysfr4' => $request->sysfr4,
                    'sysfr4_4' => $request->sysfr4_4,

                    'abstractdate1' => $request->abstractdate1,
                    'abstractdate2' => $request->abstractdate2,
                    'abstractdate3' => $request->abstractdate3,
                    'p_research1' => $request->p_research1,
                    'p_research_date' => $request->p_research_date,

                    // ✅ เก็บชื่อไฟล์ที่อัปโหลดจริง
                    'pdf_researche' => $fileNames['pdf_researche'],
                    'original_passport' => $fileNames['original_passport'],
                    'tuition_fee' => $fileNames['tuition_fee'],
                    'academic_transcrip' => $fileNames['academic_transcrip'],
                    'e_visa' => $fileNames['e_visa'],
                    'passport_sized' => $fileNames['passport_sized'],
                    'abstractword1' => $fileNames['abstractword1'],
                    'abstractword2' => $fileNames['abstractword2'],
                    'abstractword3' => $fileNames['abstractword3'],
                    'thesis_repdf' => $fileNames['thesis_repdf'],

                    'sys_fi1' => $request->sys_fi1,
                    'sys_fi2' => $request->sys_fi2,
                    'sys_fi2_time' => $request->sys_fi2_time,
                    'sys_fi2_date' => $request->sys_fi2_date,
                    'sys_fi3' => $request->sys_fi3,
                    'sys_fi3_time' => $request->sys_fi3_time,
                    'sys_fi3_date' => $request->sys_fi3_date,
                    'sys_fi4' => $request->sys_fi4,
                    'sys_fi4_time' => $request->sys_fi4_time,
                    'sys_fi4_date' => $request->sys_fi4_date,

                    'prefix_visa' => $request->prefix_visa,
                    'birth_visa' => $request->birth_visa,
                    'p_f_b' => $request->p_f_b,
                    'gender_visa' => $request->gender_visa,
                    'nat_visa' => $request->nat_visa,
                    'passport_start_date' => $request->passport_start_date,
                    'passport_end_date' => $request->passport_end_date,
                    'is_au' => $request->is_au,
                    'phone_visa' => $request->phone_visa,
                    'degree_visa' => $request->degree_visa,
                    'date_arr' => $request->date_arr,
                    'majo_visa' => $request->majo_visa,
                    'visa_purpose' => $request->visa_purpose,
                    'visa_other_text' => $request->visa_other_text,
                    'visa_type' => $request->visa_type,
                    'visa_type_text' => $request->visa_type_text,
                    'visa_fac' => $request->visa_fac,
                    'date_dep' => $request->date_dep,

                    'exam_date' => $request->exam_date,
                    'exam_time' => $request->exam_time,
                    'exam_room' => $request->exam_room,
                    'thesis_re5_1' => $request->thesis_re5_1,
                    'thesis_re5_2' => $request->thesis_re5_2,
                    'thesis_re5_3' => $request->thesis_re5_3,
                    'thesis_re5_4' => $request->thesis_re5_4,
                    'thesis_re5_5' => $request->thesis_re5_5,
                    'thesis_re5_6' => $request->thesis_re5_6,
                    'thesis_re5_7' => $request->thesis_re5_7,

                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );

        return back()->with('success', 'บันทึกข้อมูลสำเร็จ');
    }



    public function saveSectionStd(Request $request, $section, $id_no)
    {
        // ดึงข้อมูลจาก SQL Server
        $student = DB::connection('sqlsrv_register')
            ->table('Ve_studentbunditfinan')
            ->where('id_no', $id_no)
            ->first();

        if (!$student) {
            abort(404, "ไม่พบนักศึกษาใน SQL Server");
        }

        // รายชื่อไฟล์ทั้งหมด
        $files = [
            'pdf_researche',
            'original_passport',
            'tuition_fee',
            'academic_transcrip',
            'e_visa',
            'passport_sized',
            'abstractword1',
            'abstractword2',
            'abstractword3',
            'thesis_repdf'
        ];

        $fileNames = [];

        foreach ($files as $fileField) {
            $fileNames[$fileField] = DB::connection('pgsql')
                ->table('t_std_profile')
                ->where('id_no', $id_no)
                ->value($fileField); // ไฟล์เก่า

            if ($request->hasFile($fileField) && $request->file($fileField)->isValid()) {
                $file = $request->file($fileField);

                // ลบไฟล์เก่าถ้ามี
                $existing = DB::connection('pgsql')
                    ->table('t_std_profile')
                    ->where('id_no', $id_no)
                    ->value($fileField);

                if ($existing && Storage::disk('public')->exists('documents/' . $existing)) {
                    Storage::disk('public')->delete('documents/' . $existing);
                }

                // ตั้งชื่อไฟล์ใหม่
                $fileNames[$fileField] = time() . '_' . $fileField . '.' . $file->getClientOriginalExtension();

                $file->storeAs('documents', $fileNames[$fileField], 'public');
            }
        }

        // ✅ อัปเดตหรือสร้างใน Postgres
        DB::connection('pgsql')->table('t_std_profile')
            ->updateOrInsert(
                ['id_no' => $id_no],
                [
                    'comp_exam_status' => $request->comp_exam_status,
                    'comp_exam_status2' => $request->comp_exam_status2,
                    'comp_exam_status3' => $request->comp_exam_status3,
                    'thesis_title_en1' => $request->thesis_title_en1,
                    'thesis_title_th1' => $request->thesis_title_th1,
                    'thesis_title_en2' => $request->thesis_title_en2,
                    'thesis_title_th2' => $request->thesis_title_th2,
                    'advisor_1_name' => $request->advisor_1_name,
                    'advisor_2_name' => $request->advisor_2_name,
                    'advisor_3_name' => $request->advisor_3_name,
                    'advisor_4_name' => $request->advisor_4_name,
                    'advisor_5_name' => $request->advisor_5_name,
                    'advisor_6_name' => $request->advisor_6_name,
                    'curriculum_chair_name' => $request->curriculum_chair_name,
                    'curriculum_chair_role' => $request->curriculum_chair_role,
                    'appointed_date' => $request->appointed_date,
                    'committee_meeting_round' => $request->committee_meeting_round,
                    'committee_meeting_date' => $request->committee_meeting_date,
                    'approval_date' => $request->approval_date,
                    'tool_check' => $request->tool_check,
                    'ethics_approval' => $request->ethics_approval,
                    'tool_trial' => $request->tool_trial,
                    'data_collection' => $request->data_collection,
                    'final_correction' => $request->final_correction,
                    'final_date' => $request->final_date,
                    'sysfr1' => $request->sysfr1,
                    'sysfr1_1' => $request->sysfr1_1,
                    'sysfr2' => $request->sysfr2,
                    'sysfr2_2' => $request->sysfr2_2,
                    'sysfr3' => $request->sysfr3,
                    'sysfr3_3' => $request->sysfr3_3,
                    'sysfr4' => $request->sysfr4,
                    'sysfr4_4' => $request->sysfr4_4,
                    'abstractdate1' => $request->abstractdate1,
                    'abstractdate2' => $request->abstractdate2,
                    'abstractdate3' => $request->abstractdate3,
                    'p_research1' => $request->p_research1,
                    'p_research_date' => $request->p_research_date,



                    'sys_fi1' => $request->sys_fi1,
                    'sys_fi2' => $request->sys_fi2,
                    'sys_fi2_time' => $request->sys_fi2_time,
                    'sys_fi2_date' => $request->sys_fi2_date,
                    'sys_fi3' => $request->sys_fi3,
                    'sys_fi3_time' => $request->sys_fi3_time,
                    'sys_fi3_date' => $request->sys_fi3_date,
                    'sys_fi4' => $request->sys_fi4,
                    'sys_fi4_time' => $request->sys_fi4_time,
                    'sys_fi4_date' => $request->sys_fi4_date,
                    'prefix_visa' => $request->prefix_visa,
                    'birth_visa' => $request->birth_visa,
                    'p_f_b' => $request->p_f_b,
                    'gender_visa' => $request->gender_visa,
                    'nat_visa' => $request->nat_visa,
                    'passport_start_date' => $request->passport_start_date,
                    'passport_end_date' => $request->passport_end_date,
                    'is_au' => $request->is_au,
                    'phone_visa' => $request->phone_visa,
                    'degree_visa' => $request->degree_visa,
                    'date_arr' => $request->date_arr,
                    'majo_visa' => $request->majo_visa,
                    'visa_purpose' => $request->visa_purpose,
                    'visa_other_text' => $request->visa_other_text,
                    'visa_type' => $request->visa_type,
                    'visa_type_text' => $request->visa_type_text,
                    'visa_fac' => $request->visa_fac,
                    'date_dep' => $request->date_dep,

                    // ✅ เก็บชื่อไฟล์ที่อัปโหลดจริง
                    'pdf_researche' => $fileNames['pdf_researche'],
                    'original_passport' => $fileNames['original_passport'],
                    'tuition_fee' => $fileNames['tuition_fee'],
                    'academic_transcrip' => $fileNames['academic_transcrip'],
                    'e_visa' => $fileNames['e_visa'],
                    'passport_sized' => $fileNames['passport_sized'],
                    'abstractword1' => $fileNames['abstractword1'],
                    'abstractword2' => $fileNames['abstractword2'],
                    'abstractword3' => $fileNames['abstractword3'],
                    'thesis_repdf' => $fileNames['thesis_repdf'],

                    'exam_date' => $request->exam_date,
                    'exam_time' => $request->exam_time,
                    'exam_room' => $request->exam_room,
                    'thesis_re5_1' => $request->thesis_re5_1,
                    'thesis_re5_2' => $request->thesis_re5_2,
                    'thesis_re5_3' => $request->thesis_re5_3,
                    'thesis_re5_4' => $request->thesis_re5_4,
                    'thesis_re5_5' => $request->thesis_re5_5,
                    'thesis_re5_6' => $request->thesis_re5_6,
                    'thesis_re5_7' => $request->thesis_re5_7,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );

        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

}



