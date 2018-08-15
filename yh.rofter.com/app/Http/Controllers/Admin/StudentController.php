<?php

namespace App\Http\Controllers\Admin;

use App\User;

// use Illuminate\Http\Request;

class StudentController extends BaseController
{
    public function index()
    {
        $uname   = isset($_GET['name']) ? $_GET['name'] : '';
        $phone   = isset($_GET['phone']) ? $_GET['phone'] : '';
        $student = User::where('type', 2)
            ->where('uname', 'like', '%' . $uname . '%')
            ->where('phone', 'like', '%' . $phone . '%')
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin/student', ['student' => $student]);
    }
}
