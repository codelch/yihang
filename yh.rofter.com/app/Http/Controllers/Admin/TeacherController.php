<?php
namespace App\Http\Controllers\Admin;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends BaseController
{

    public function index()
    {

        $name    = isset($_GET['name']) ? $_GET['name'] : '';
        $id      = isset($_GET['id']) ? $_GET['id'] : '';
        $teacher = Teacher::where('name', 'like', '%' . $name . '%')->where('id', 'like', '%' . $id . '%')->orderBy('id', 'desc')->orderBy('sort', 'desc')->paginate(10);
        return view('admin/teacher', ['teacher' => $teacher]);
    }

    public function upload(Request $request)
    {
        $data     = $request->all();
        $fileName = '';
        if (isset($data['file'])) {
            $uploadFile = $data['file'];

            $fileName = $uploadFile->store('teacher', 'my');

        }
        if ($fileName) {
            $json = ['code' => 200, 'msg' => $fileName];
        } else {
            $json = ['code' => 404, 'msg' => '图片上传失败'];
        }
        echo json_encode($json);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (empty($data['id'])) {
            $teacher = new Teacher;
        } else {
            $teacher = Teacher::find($data['id']);
        }
        foreach ($data as $k => $v) {
            if ($k != '_token' && $k != 'id') {
                $teacher->$k = $v;
            }
        }
        $res = $teacher->save();
        if ($res) {
            $json = ['code' => 200, 'msg' => '保存成功'];
        } else {
            $json = ['code' => 404, 'msg' => '保存失败'];
        }

        echo json_encode($json);
    }

    public function show(Request $request)
    {
        $id   = $request->get('id');
        $info = Teacher::find($id);
        if (!empty($info)) {
            $json = ['code' => 200, 'msg' => [
                'name'        => $info->name,
                'profession'  => $info->profession,
                'image'       => $info->image,
                'description' => $info->description,
                'sort'        => $info->sort,
                'score'       => $info->score,
            ]];
        } else {
            $json = ['code' => 404, 'msg' => '数据获取失败'];
        }

        echo json_encode($json);
    }

    public function destroy(Request $request)
    {
        $id  = $request->get('id');
        $res = Teacher::where('id', $id)->delete();
        if ($res) {
            $json = ["code" => 200];
        } else {
            $json = ["code" => 404, "msg" => "服务器错误"];
        }
        echo json_encode($json);
    }

}
