<?php
namespace App\Http\Controllers\Admin;

use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends BaseController
{

    public function index()
    {
        $name    = isset($_GET['name']) ? $_GET['name'] : '';
        $id      = isset($_GET['id']) ? $_GET['id'] : '';
        $partner = Partner::where('name', 'like', '%' . $name . '%')->where('id', 'like', '%' . $id . '%')->orderBy('id', 'desc')->orderBy('sort', 'desc')->paginate(10);
        return view('admin/partner', ['partner' => $partner]);
    }

    public function upload(Request $request)
    {
        $data     = $request->all();
        $fileName = '';
        if (isset($data['file'])) {
            $uploadFile = $data['file'];

            $fileName = $uploadFile->store('partner', 'my');

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
            $partner = new Partner;
        } else {
            $partner = Partner::find($data['id']);
        }
        foreach ($data as $k => $v) {
            if ($k != '_token' && $k != 'id') {
                $partner->$k = $v;
            }
        }
        $res = $partner->save();
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
        $info = Partner::find($id);
        if (!empty($info)) {
            $json = ['code' => 200, 'msg' => [
                'name'  => $info->name,
                'url'   => $info->url,
                'image' => $info->image,
                'sort'  => $info->sort,
            ]];
        } else {
            $json = ['code' => 404, 'msg' => '数据获取失败'];
        }

        echo json_encode($json);
    }

    public function destroy(Request $request)
    {
        $id  = $request->get('id');
        $res = Partner::where('id', $id)->delete();
        if ($res) {
            $json = ["code" => 200];
        } else {
            $json = ["code" => 404, "msg" => "服务器错误"];
        }
        echo json_encode($json);
    }

}
