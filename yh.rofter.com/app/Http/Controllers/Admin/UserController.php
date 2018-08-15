<?php
namespace App\Http\Controllers\Admin;

use App\Adminuser;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function login(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return view('admin/user/login');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $request->all();
            $user = Adminuser::where('phone', $data['user'])->where('pwd', md5($data['password']))->first();

            if ($user) {
                session()->put('adminuser', $user->uname);
                session()->put('admintype', $user->type);
                session()->put('adminid', $user->id);
                return redirect(url('admin'));
            } else {
                // session()->put('loginMsg', '用户名或密码错误');
                return redirect(url('admin/login'))->with('message', '用户名或密码错误');
            }
        }
    }

    public function logout()
    {
        setcookie('adminid', null, time() - 1, '/');
        setcookie('adminuser', null, time() - 1, '/');
        setcookie('admintype', null, time() - 1, '/');
        session()->put('adminid', null);
        session()->put('adminuser', null);
        session()->put('admintype', null);
        return redirect(url('admin'));
    }
}
