<?php
namespace App\Http\Controllers\Admin;

use App\Course;
use App\CourseDetail;
use Illuminate\Http\Request;

class CourseController extends BaseController
{

    public function index()
    {
        $name   = isset($_GET['name']) ? $_GET['name'] : '';
        $id     = isset($_GET['id']) ? $_GET['id'] : '';
        $course = Course::where('name', 'like', '%' . $name . '%')->where('id', 'like', '%' . $id . '%')->paginate(10);
        return view('admin/course', ['course' => $course]);
    }

    public function upload(Request $request)
    {
        $data     = $request->all();
        $fileName = '';
        if (isset($data['file'])) {
            $uploadFile = $data['file'];

            $fileName = $uploadFile->store('course', 'my');

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
            $course = new Course;
            foreach ($data['form'] as $k => $v) {
                if ($k != '_token' && $k != 'id' && $k != 'detail_url' && $k != 'detail_title') {
                    $course->$k = $v;
                }
            }
            $res = $course->save();
            foreach ($data['form']['detail_title'] as $k => $v) {
                $detail               = new CourseDetail;
                $detail->courseid     = $course->id;
                $detail->detail_title = $v;
                $detail->detail_url   = $data['form']['detail_url'][$k];
                $resd                 = $detail->save();
            }

        } else {
            $course = Course::find($data['form']['id']);
            // var_dump($data);
            foreach ($data['form'] as $k => $v) {
                if ($k != '_token' && $k != 'id' && $k != 'detail_url' && $k != 'detail_title') {
                    $course->$k = $v;
                }
            }
            $res = $course->save();
            CourseDetail::where('courseid', $course->id)->delete();
            foreach ($data['form']['detail_title'] as $k => $v) {
                $detail               = new CourseDetail;
                $detail->courseid     = $course->id;
                $detail->detail_title = $v;
                $detail->detail_url   = $data['form']['detail_url'][$k];
                $resd                 = $detail->save();
            }
        }
        if ($res && $resd) {
            $json = ['code' => 200, 'msg' => '保存成功'];
        } else {
            $json = ['code' => 404, 'msg' => '保存失败'];
        }
        echo json_encode($json);
    }

    public function show(Request $request)
    {
        $id         = $request->get('id');
        $info       = Course::find($id);
        $infoDetail = CourseDetail::where('courseid', $id)->get();
        $details    = [];
        foreach ($infoDetail as $k => $v) {
            $details[] = [
                'title' => $v->detail_title,
                'url'   => $v->detail_url,
            ];
        }

        if (!empty($info)) {
            $json = ['code' => 200, 'msg' => [
                'name'        => $info->name,
                'school'      => $info->school,
                'profession'  => $info->profession,
                'sort'        => $info->sort,
                'thumb'       => $info->thumb,
                'image'       => $info->image,
                'description' => $info->description,
                'match'       => $info->match,
                'price'       => $info->price,
                'studied'     => $info->studied,
                'sign'        => $info->sign,
                'praise'      => $info->praise,
                'type'        => $info->type,
                'details'     => $details,
            ]];
        } else {
            $json = ['code' => 404, 'msg' => '数据获取失败'];
        }

        echo json_encode($json);
    }

    public function destroy(Request $request)
    {
        $id         = $request->get('id');
        $info       = Course::where('id', $id)->delete();
        $infoDetail = CourseDetail::where('courseid', $id)->delete();
        if ($info) {
            $json = ["code" => 200];
        } else {
            $json = ["code" => 404, "msg" => "服务器错误"];
        }
        echo json_encode($json);
    }
}
