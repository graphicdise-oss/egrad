<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StdProfile extends Model
{
    protected $connection = 'sqlsrv_register';   // ✅ ใช้ connection ที่เชื่อม SQL Server
    protected $table = 'Ve_studentbunditfinan';  // ✅ ชื่อตารางใหม่
    protected $primaryKey = 'id_no';             // ✅ primary key ของตารางนี้
    public $incrementing = false;                // ถ้า id_no ไม่ใช่ auto increment
    protected $keyType = 'string';               // ถ้า id_no เป็น varchar
    
}
