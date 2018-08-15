<?php
namespace App\Http\Controllers\Frontend;

use App\Banner;
use App\Course;
use App\CourseDetail;
use App\Http\Controllers\Frontend\BaseController;
use App\Partner;
use App\Teacher;

class IndexController extends BaseController
{
    public function index()
    {
        $banner = Banner::where('key', 'home')->orderBy('sort', 'desc')->paginate(3);
        return view('frontend/index', ['banner' => $banner]);
    }

    public function microlesson()
    {
        $banner = Banner::where('key', 'micro-lesson')->orderBy('sort', 'desc')->paginate(3);
        $res985 = Course::where('type', '985')->get();
        $ml985  = [];
        $i      = 0;
        foreach ($res985 as $k => $v) {
            if ($k % 6 == 0) {
                $i++;
            }
            $ml985[$i][] = [
                'id'         => $v->id,
                'thumb'      => $v->thumb,
                'name'       => $v->name,
                'school'     => $v->school,
                'profession' => $v->profession,
            ];

        }
        $res211 = Course::where('type', '985')->get();
        $ml211  = [];
        $i      = 0;
        foreach ($res211 as $k => $v) {
            if ($k % 6 == 0) {
                $i++;
            }
            $ml211[$i][] = [
                'id'         => $v->id,
                'thumb'      => $v->thumb,
                'name'       => $v->name,
                'school'     => $v->school,
                'profession' => $v->profession,
            ];

        }
        $reshot = Course::where('type', '985')->get();
        $mlhot  = [];
        $i      = 0;
        foreach ($reshot as $k => $v) {
            if ($k % 6 == 0) {
                $i++;
            }
            $mlhot[$i][] = [
                'id'         => $v->id,
                'thumb'      => $v->thumb,
                'name'       => $v->name,
                'school'     => $v->school,
                'profession' => $v->profession,
            ];

        }
        return view('frontend/microlesson', [
            'banner' => $banner,
            'ml985'  => $ml985,
            'ml211'  => $ml211,
            'mlhot'  => $mlhot,
        ]);
    }

    public function lessonDetail($id)
    {
        $lesson = Course::where('id', $id)->first();
        $url    = CourseDetail::where('courseid', $id)->get();
        return view('frontend/lessondetail', ['lesson' => $lesson, 'url' => $url]);
    }

    public function lessonVideo($id)
    {
        $url    = CourseDetail::where('id', $id)->first();
        $lesson = Course::where('id', $url->courseid)->first();
        return view('frontend/lessonvideo', ['lesson' => $lesson, 'url' => $url]);
    }
    public function course()
    {
        $banner = Banner::where('key', 'pri-education')->orderBy('sort', 'desc')->paginate(3);
        return view('frontend/course', ['banner' => $banner]);
    }

    public function teacher()
    {
        $banner  = Banner::where('key', 'teacher')->orderBy('sort', 'desc')->paginate(3);
        $teaObj  = Teacher::get();
        $teacher = [];
        $i       = 0;
        foreach ($teaObj as $k => $v) {
            if ($k % 3 == 0) {
                $i++;
            }
            $teacher[$i][] = [
                'id'         => $v->id,
                'name'       => $v->name,
                'image'      => $v->image,
                'profession' => $v->profession,
                'score'      => $v->score,
            ];
        }
        return view('frontend/teacher', ['banner' => $banner, 'teacher' => $teacher]);
    }

    public function teacherDetail($id)
    {
        $teacher = Teacher::find($id);
        return view('frontend/teacherdetail', ['teacher' => $teacher]);
    }

    public function partner()
    {
        $banner = Banner::where('key', 'partner')->orderBy('sort', 'desc')->paginate(3);
        $image  = Partner::orderBy('id', 'desc')->orderBy('sort', 'desc')->limit(16)->get();
        return view('frontend/partner', ['banner' => $banner, 'image' => $image]);
    }

}
