<?php
namespace App\Http\Controllers\Frontend;

use App\Subject;
use App\SubjectDetail;
use App\User;
use Illuminate\Http\Request;

class SubjectController extends BaseController
{
    public function addSubject(Request $request)
    {
        $data        = $request->all();
        $phone       = $data['subject']['teacher'];
        $teacherName = $data['subject']['teacher_name'];
        $teacher     = User::where('phone', $phone)->where('uname', $teacherName)->where('type', 1)->first();
        if ($teacher) {
            $studentid          = session()->get('userid');
            $teacherid          = $teacher->id;
            $name               = $data['subject']['name'];
            $subject            = new Subject;
            $subject->studentid = $studentid;
            $subject->teacherid = $teacherid;
            $subject->name      = $name;
            $subject->status    = 0;
            $res                = $subject->save();

            if ($res) {
                $json = ['code' => 200, 'msg' => '添加课程成功'];
            } else {
                $json = ['code' => 404, 'msg' => '添加课程失败'];
            }

        } else {
            $json = ['code' => 404, 'msg' => '教师账号不存在'];
        }
        echo json_encode($json);
    }

    public function changeSubjectStatus(Request $request)
    {
        $id              = $request->get('id');
        $subject         = Subject::find($id);
        $subject->status = 1;
        $res             = $subject->save();
        if ($res) {
            $json = ['code' => 200];
        } else {
            $json = ['code' => 404, 'msg' => '确认失败'];
        }

        echo json_encode($json);
    }

    public function addSubjectDetail(Request $request)
    {
        $data               = $request->all();
        $detail             = new SubjectDetail;
        $detail->status     = 0;
        $detail->date       = $data['subject_detail']['date'];
        $detail->content    = $data['subject_detail']['content'];
        $detail->subject_id = $data['subject_detail']['subject_id'];
        $res                = $detail->save();
        if ($res) {
            $json = ['code' => 200, 'msg' => '添加成功'];
        } else {
            $json = ['code' => 404, 'msg' => '添加失败'];
        }
        echo json_encode($json);
    }

    public function changeSubjectDetailStatus(Request $request)
    {
        $data           = $request->all();
        $detail         = SubjectDetail::find($data['id']);
        $detail->status = $detail->status + 1;
        $res            = $detail->save();
        if ($res) {
            $json = ['code' => 200, 'msg' => '确认成功'];
        } else {
            $json = ['code' => 404, 'msg' => '确认失败'];
        }
        echo json_encode($json);
    }
}
