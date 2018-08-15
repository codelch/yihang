<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\SmsSendConn;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    //教师注册
    public function regTeacher()
    {
        return view('frontend/user/regteacher');
    }

    public function doRegTeacher(Request $request)
    {
        $data = $request->all();
        // var_dump($data);

        // if (strtotime(session()->get('time')) + 300 > time()) {
        //     if (session()->get('phonecode') == $data['code']) {
        $utcount = User::where('phone', $data['phone'])->count();
        if ($utcount === 0) {
            $user           = new User;
            $user->type     = 1;
            $user->user     = $data['user'];
            $user->phone    = $data['phone'];
            $user->password = md5($data['password']);
            $user->image    = 'avatar/default_avatar.jpg';
            $res            = $user->save();
            if ($res) {
                session()->put('userid', $user->id);
                session()->put('username', $user->user);
                $json = ['code' => 200, 'msg' => '注册成功'];
            } else {
                $json = ['code' => 404, 'msg' => '注册失败'];
            }
        } else {
            $json = ['code' => 404, 'msg' => '手机号已被注册'];
        }
        //     } else {
        //         $json = ['code' => 404, 'msg' => '验证码无效'];
        //     }
        // } else {
        //     $json = ['code' => 404, 'msg' => '验证码过期,请重新获取' . strtotime(session()->get('time')) . '+' . time()];
        // }

        echo json_encode($json);
    }

    public function infoTeacher()
    {
        return view('frontend/user/teacherInfo');
    }

    public function doInfoTeacher(Request $request)
    {
        $data     = $request->all();
        $userInfo = (new User)->find(session()->get('userid'));
        // var_dump($userInfo);
        foreach ($data as $k => $v) {
            if ($k != '_token') {
                $userInfo->$k = $v;
            }
        }
        $userInfo->status = 1;
        $res              = $userInfo->save();
        if ($res) {
            $json = ['code' => 200, 'msg' => '信息填写成功'];
        } else {
            $json = ['code' => 404, 'msg' => '信息填写失败'];
        }
        echo json_encode($json);
    }

    public function successTeacher()
    {
        return view('frontend/user/teacherSuccess');
    }

    public function teacherCenter()
    {
        $user    = User::where('id', session()->get('userid'))->first();
        $subject = Subject::select('hd_user.uname', 'hd_user.phone', 'hd_subject.teacherid', 'hd_subject.studentid', 'hd_subject.id', 'hd_subject.name')
            ->join('hd_user', 'hd_subject.studentid', '=', 'hd_user.id')
            ->where('hd_subject.status', 0)
            ->get();
        $subjectDetail = (new Subject)->getSubjectDetail();

        return view('frontend/user/teacherCenter', ['user' => $user, 'subject' => $subject, 'subjectDetail' => $subjectDetail]);
    }

    //考生注册
    public function regStudent()
    {
        return view('frontend/user/regstudent');
    }

    public function doRegStudent(Request $request)
    {
        $data = $request->all();
        // if (strtotime(session()->get('time')) + 300 > time()) {
        //if (session()->get('phonecode') == $data['code']) {
        $utcount = User::where('phone', $data['phone'])->count();
        if ($utcount === 0) {
            $user           = new User;
            $user->type     = 2;
            $user->user     = $data['user'];
            $user->phone    = $data['phone'];
            $user->password = md5($data['password']);
            $user->image    = 'avatar/default_avatar.jpg';
            $res            = $user->save();
            if ($res) {
                session()->put('userid', $user->id);
                session()->put('username', $user->user);
                $json = ['code' => 200, 'msg' => '注册成功'];
            } else {
                $json = ['code' => 404, 'msg' => '注册失败'];
            }
        } else {
            $json = ['code' => 404, 'msg' => '手机号已被注册'];
        }
        // } else {
        //     $json = ['code' => 404, 'msg' => '验证码无效'];
        // }
        // } else {
        //     $json = ['code' => 404, 'msg' => '验证码过期,请重新获取'];
        // }

        echo json_encode($json);
    }

    public function infoStudent()
    {
        return view('frontend/user/studentInfo');
    }

    public function doInfoStudent(Request $request)
    {
        $data     = $request->all();
        $userInfo = (new User)->find(session()->get('userid'));
        // var_dump($userInfo);
        foreach ($data as $k => $v) {
            if ($k != '_token') {
                $userInfo->$k = $v;
            }
        }
        $userInfo->status = 1;
        $res              = $userInfo->save();
        if ($res) {
            $json = ['code' => 200, 'msg' => '信息填写成功'];
        } else {
            $json = ['code' => 404, 'msg' => '信息填写失败'];
        }
        echo json_encode($json);
    }

    public function successStudent()
    {
        return view('frontend/user/studentSuccess');
    }

    public function studentCenter()
    {
        $user = User::where('id', session()->get('userid'))->first();
        // $subject = Subject::select('hd_user.uname', 'hd_subject.teacherid', 'hd_subject.studentid', 'hd_subject.id', 'hd_subject.name')
        //     ->join('hd_user', 'hd_subject.teacherid', '=', 'hd_user.id')
        //     ->where('hd_subject.status', 1)
        //     ->where('hd_subject.studentid', session()->get('userid'))
        //     ->get();
        $subject = (new Subject)->getSubject();
        return view('frontend/user/studentCenter', ['user' => $user, 'subject' => $subject]);
    }

    public function checkType()
    {
        $user = User::where('id', session()->get('userid'))->first();
        if ($user->type == 1) {
            if ($user->status == 0) {
                return redirect(url('register/teacher/info'));
            } else {
                return redirect(url('teacherCenter'));
            }
        } elseif ($user->type == 2) {
            if ($user->status == 0) {
                return redirect(url('register/student/info'));
            } else {
                return redirect(url('studentCenter'));
            }
        }
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $user = User::where('phone', $data['phone'])->where('password', md5($data['password']))->first();
        if ($user) {
            session()->put('userid', $user->id);
            session()->put('username', $user->user);
            session()->put('image', $user->image);
            // if ($user->type == 1) {
            //     if ($user->status == 0) {
            //         return redirect(url('register/teacher/info'));
            //     } else {
            //         return redirect(url('teacherCenter'));
            //     }
            // } elseif ($user->type == 2) {
            //     if ($user->status == 0) {
            //         return redirect(url('register/student/info'));
            //     } else {
            //         return redirect(url('studentCenter'));
            //     }
            // }
            $json = ['code' => 200];

        } else {
            $json = ['code' => 404, 'msg' => '账号或密码错误'];
        }
        echo json_encode($json);

    }

    public function logout()
    {
        session()->put('userid', null);
        session()->put('username', null);
        return redirect(url('/'));
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $user = User::where('id', session()->get('userid'))->first();
        foreach ($data as $k => $v) {
            if ($k != '_token' && $k != 'avatar') {
                $user->$k = $v;
            }
        }
        $res = $user->save();
        if ($res) {
            $json = ['code' => 200];
        }
        echo json_encode($json);
    }

    public function avatar(Request $request)
    {
        $data = $request->all();
        $user = User::where('id', session()->get('userid'))->first();
        if (isset($data['file'])) {
            $uploadFile = $data['file'];

            $fileName    = $uploadFile->store('avatar', 'my');
            $user->image = $fileName;

        }
        $res = $user->save();
        if ($res) {
            $json = ['code' => 200, 'msg' => $user->image];
        } else {
            $json = ['code' => 404, 'msg' => '图片上传失败'];
        }
        echo json_encode($json);
    }

    public function getcode(Request $request)
    {
        $phone = $request->get('phone');
        $code  = rand(1000, 9999);
        session()->put('phonecode', $code);
        //生成缓存时间

        session()->put('time', date("Y-m-d H:i:s"));

        //南方短信节点url地址
        $url = 'http://api01.monyun.cn:7901/sms/v2/std/';
        //北方短信节点url地址
        //$url = 'http://api02.monyun.cn:7901/sms/v2/std/';
        $smsSendConn = new SmsSendConn($url);
        $data        = array();
        //设置账号(必填)
        $data['userid'] = 'E103CB';
        //设置密码（必填.填写明文密码,如:1234567890）
        $data['pwd'] = 'uOvUfX';

        /*
         * 单条发送 接口调用
         */
        // 设置手机号码 此处只能设置一个手机号码(必填)
        $data['mobile'] = $phone;
        //设置发送短信内容(必填)
        $data['content'] = '您的验证码是' . $code . '，在5分钟内输入有效。如非本人操作请忽略此短信。';
        // 业务类型(可选)
        $data['svrtype'] = '';
        // 设置扩展号(可选)
        $data['exno'] = '';
        //用户自定义流水编号(可选)
        $data['custid'] = '';
        // 自定义扩展数据(可选)
        $data['exdata'] = '';
        try {
            $result = $smsSendConn->singleSend($data);
            if ($result['result'] === 0) {
                $json = ["code" => 200, "msg" => "验证码发送成功", "time" => session()->get('time')];
            } else {
                $json = ["code" => 200, "msg" => "请重新获取验证码"];
            }
        } catch (Exception $e) {
            print_r($e->getMessage()); //输出捕获的异常消息，请根据实际情况，添加异常处理代码
            return false;
        }
        echo json_encode($json);
    }

}
