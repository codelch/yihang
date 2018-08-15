<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

// use Illuminate\Http\Request;

class OlduserController extends BaseController
{
    public function index()
    {
        $uname   = isset($_GET['name']) ? $_GET['name'] : '';
        $phone   = isset($_GET['phone']) ? $_GET['phone'] : '';
        $student = DB::table('hd_olduser')
            ->where('uname', 'like', '%' . $uname . '%')
            ->where('tel', 'like', '%' . $phone . '%')
            ->orderBy('id', 'desc')
            ->orderBy('created', 'desc')
            ->paginate(20);
        return view('admin/olduser', ['student' => $student]);
    }
}
