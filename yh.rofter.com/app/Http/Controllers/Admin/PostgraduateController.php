<?php

namespace App\Http\Controllers\Admin;

use App\Adminuser;
use App\Teachergroup;
use App\User;
use Illuminate\Http\Request;

class PostgraduateController extends BaseController
{
    public function index()
    {
        $uname   = isset($_GET['name']) ? $_GET['name'] : '';
        $phone   = isset($_GET['phone']) ? $_GET['phone'] : '';
        $adminid = session()->get('adminid');
        if (session()->get('admintype') == 1) {
            $postgraduate = User::select('hd_user.*', 'tg.adminid', 'tg.teacherid', 'hd_admin_user.id as aid', 'hd_admin_user.uname as auname')
                ->leftJoin('hd_teacher_group as tg', "hd_user.id", "=", "tg.teacherid")
                ->leftJoin('hd_admin_user', "hd_admin_user.id", "=", "tg.adminid")
                ->where('hd_user.type', 1)
                ->where('hd_user.uname', 'like', '%' . $uname . '%')
                ->where('hd_user.phone', 'like', '%' . $phone . '%')
                ->orderBy('hd_user.id', 'desc')
                ->orderBy('hd_user.created_at', 'desc')
                ->paginate(10);
        } else {
            $postgraduate = User::select('hd_user.*', 'tg.adminid', 'tg.teacherid', 'hd_admin_user.id as aid', 'hd_admin_user.uname as auname')
                ->leftJoin('hd_teacher_group as tg', "hd_user.id", "=", "tg.teacherid")
                ->leftJoin('hd_admin_user', "hd_admin_user.id", "=", "tg.adminid")
                ->where('hd_user.type', 1)
                ->where('hd_user.uname', 'like', '%' . $uname . '%')
                ->where('hd_user.phone', 'like', '%' . $phone . '%')
                ->where('hd_admin_user.id', $adminid)
                ->orderBy('hd_user.id', 'desc')
                ->orderBy('hd_user.created_at', 'desc')
                ->paginate(10);
        }

        $admin = Adminuser::get();
        return view('admin/postgraduate', ['postgraduate' => $postgraduate, "admin" => $admin]);
    }

    public function distribute(Request $request)
    {
        $data    = $request->all();
        $adminid = $data['secondAdmin'];
        $id      = $data['id'];
        $hasres  = Teachergroup::where('teacherid', $id)->count();
        $res     = false;
        if ($hasres === 0) {
            $teacherGroup            = new Teachergroup;
            $teacherGroup->adminid   = $adminid;
            $teacherGroup->teacherid = $id;
            $res                     = $teacherGroup->save();
        } else {
            $teacherGroup          = Teachergroup::where('teacherid', $id)->first();
            $teacherGroup->adminid = $adminid;
            $res                   = $teacherGroup->save();
        }

        if ($res) {
            $json = ["code" => 200];
        } else {
            $json = ["code" => 404, "msg" => "分配失败"];
        }
        echo json_encode($json);
    }

    public function searchdist(Request $request)
    {
        $id      = $request->get('id');
        $adminid = Teachergroup::where('teacherid', $id)->first();
        // var_dump($adminid->adminid);
        $json = ["code" => 200, "msg" => 0];
        if ($adminid) {
            $json = ["code" => 200, "msg" => "{$adminid->adminid}"];
        }
        echo json_encode($json);
    }

}
