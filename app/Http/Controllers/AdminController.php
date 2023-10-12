<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public static function login(Request $request)
    {
        $admin = Admin::where("login", $request->login)->where("password", $request->password)->get()->first();
        if ($admin) {
            session(['admin' => $admin]);
            return view("create_story");
        } else {
            return view("admin.adminLogin")->withErrors("Wrong username or password");
        }
    }

    public static function logOut()
    {
        session()->forget("admin");

        return redirect()->route("Admin");
    }
}
