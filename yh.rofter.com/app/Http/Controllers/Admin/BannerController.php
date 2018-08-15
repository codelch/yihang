<?php
namespace App\Http\Controllers\Admin;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends BaseController
{
    public function index()
    {
        $key    = isset($_GET['key']) ? $_GET['key'] : '';
        $id     = isset($_GET['id']) ? $_GET['id'] : '';
        $banner = Banner::where('key', 'like', '%' . $key . '%')->where('id', 'like', '%' . $id . '%')->orderBy('id', 'desc')->orderBy('sort', 'desc')->paginate(10);
        return view('admin/banner', ['banner' => $banner]);
    }

    public function upload(Request $request)
    {
        $data     = $request->all();
        $fileName = '';
        if (isset($data['file'])) {
            $uploadFile = $data['file'];

            $fileName = $uploadFile->store('banner', 'my');

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
        if (empty($data['form']['id'])) {
            $banner = new Banner;
        } else {
            $banner = Banner::find($data['form']['id']);
        }
        foreach ($data['form'] as $k => $v) {
            if ($k != '_token' && $k != 'id') {
                $banner->$k = $v;
            }
        }
        $res = $banner->save();
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
        $info = Banner::find($id);
        if (!empty($info)) {
            $json = ['code' => 200, 'msg' => [
                'title'       => $info->title,
                'url'         => $info->url,
                'image'       => $info->image,
                'description' => $info->description,
                'sort'        => $info->sort,
                'key'         => $info->key,
            ]];
        } else {
            $json = ['code' => 404, 'msg' => '数据获取失败'];
        }

        echo json_encode($json);
    }

    public function destroy(Request $request)
    {
        $id  = $request->get('id');
        $res = Banner::where('id', $id)->delete();
        if ($res) {
            $json = ["code" => 200];
        } else {
            $json = ["code" => 404, "msg" => "服务器错误"];
        }
        echo json_encode($json);
    }

}
