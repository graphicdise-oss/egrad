<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PgStdProfile extends Model
{
    protected $connection = 'pgsql_local';   // ✅ PostgreSQL connection
    protected $table = 't_std_profile';      // ✅ ตารางจริง
    protected $primaryKey = 'id_no';         // ✅ ใช้ id_no เป็น key
    public $incrementing = false;            // ✅ id_no ไม่ได้รันอัตโนมัติ
    protected $keyType = 'string';           // ✅ id_no เป็นข้อความ เช่น "68U74810112"
}
