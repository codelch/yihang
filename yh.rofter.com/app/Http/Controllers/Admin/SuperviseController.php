<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

class SuperviseController extends BaseController
{
    public function index()
    {
        $uname   = isset($_GET['uname']) ? $_GET['uname'] : '';
        $sname   = isset($_GET['sname']) ? $_GET['sname'] : '';
        $adminid = session()->get('adminid');
        if (session()->get('admintype') == 1) {
            $detail = DB::table('hd_subject_detail as sd')
                ->select('sd.id', 'sd.subject_id', 'sd.date', 'sd.content', 'sd.created_at', 'sd.status', 's.teacherid', 's.studentid', 's.name as sname', 'ut.uname as tuname', 'us.uname as suname')
                ->join('hd_subject as s', 'sd.subject_id', '=', 's.id')
                ->join('hd_user as ut', 's.teacherid', '=', 'ut.id')
                ->join('hd_user as us', 's.studentid', '=', 'us.id')
                ->where('us.uname', 'like', '%' . $uname . '%')
                ->where('s.name', 'like', '%' . $sname . '%')
                ->orderBy('sd.id', 'desc')
                ->paginate(20);
        } else {
            $detail = DB::table('hd_subject_detail as sd')
                ->select('sd.id', 'sd.subject_id', 'sd.date', 'sd.content', 'sd.created_at', 'sd.status', 's.teacherid', 's.studentid', 's.name as sname', 'ut.uname as tuname', 'us.uname as suname')
                ->join('hd_subject as s', 'sd.subject_id', '=', 's.id')
                ->join('hd_user as ut', 's.teacherid', '=', 'ut.id')
                ->join('hd_user as us', 's.studentid', '=', 'us.id')
                ->leftJoin('hd_teacher_group as tg', 'tg.teacherid', '=', 'ut.id')
                ->leftJoin('hd_admin_user as au', 'au.id', '=', 'tg.adminid')
                ->where('au.id', $adminid)
                ->where('us.uname', 'like', '%' . $uname . '%')
                ->where('s.name', 'like', '%' . $sname . '%')
                ->orderBy('sd.id', 'desc')
                ->paginate(20);
        }

        return view('admin/supervise', ['detail' => $detail]);
    }
}
