<?php
/**
 * Created by PhpStorm.
 * User: PINYER Co ltd
 * Date: 2018/8/21
 * Time: 16:57
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }
}