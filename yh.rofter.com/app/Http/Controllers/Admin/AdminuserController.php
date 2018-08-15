<?php

namespace App\Http\Controllers\Admin;

use App\Adminuser;
use Illuminate\Http\Request;

class AdminuserController extends BaseController
{
    public function index()
    {
        $uname = isset($_GET['name']) ? $_GET['name'] : '';
        $phone = isset($_GET['phone']) ? $_GET['phone'] : '';
        $admin = Adminuser::where('type', 2)
            ->where('uname', 'like', '%' . $uname . '%')
            ->where('phone', 'like', '%' . $phone . '%')
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin/adminuser', ['admin' => $admin]);
    }

    public function store(Request $request)
    {
        $data  = $request->all();
        $phone = Adminuser::where('phone', $data['phone'])->count();
        if ($phone > 0) {
            $json = ["code" => 404, "msg" => "手机号已被注册"];
        } else {
            $admin               = new Adminuser;
            $admin->phone        = $data['phone'];
            $admin->pwd          = md5($data['password']);
            $admin->uname        = $data['uname'];
            $admin->original_pwd = $data['password'];
            $admin->type         = 2;
            $admin->status       = 1;
            $res                 = $admin->save();
            if ($res) {
                $json = ["code" => 200, "msg" => "添加成功"];
            } else {
                $json = ["code" => 404, "msg" => "保存失败"];
            }
        }

        echo json_encode($json);

    }

    public function disable(Request $request)
    {
        $id            = $request->get('id');
        $admin         = (new Adminuser)->find($id);
        $admin->status = 0;
        $res           = $admin->save();
        if ($res) {
            $json = ["code" => 200, "msg" => "禁用成功"];
        } else {
            $json = ["code" => 404, "msg" => "禁用失败"];
        }
        echo json_encode($json);
    }

    public function enabled(Request $request)
    {
        $id            = $request->get('id');
        $admin         = (new Adminuser)->find($id);
        $admin->status = 1;
        $res           = $admin->save();
        if ($res) {
            $json = ["code" => 200, "msg" => "禁用成功"];
        } else {
            $json = ["code" => 404, "msg" => "禁用失败"];
        }
        echo json_encode($json);
    }
}
