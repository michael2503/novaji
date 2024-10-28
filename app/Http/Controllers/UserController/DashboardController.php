<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{


    public function index()
    {
        return view('user.dashboard', [
        ]);
    }


    public function encryptString(Request $request)
    {
        $encryptionKey = 'novaji';
        $encryptMethod = "AES-256-CBC";
        $encryNumIv = '1020304050605478';

        $encryption = openssl_encrypt($request['text'], $encryptMethod, $encryptionKey, $options=0, $encryNumIv);
        Session::flash('response', $encryption);
        return redirect()->back();
    }

    public function decryptString(Request $request)
    {
        $encryptionKey = 'novaji';
        $encryptMethod = "AES-256-CBC";
        $encryNumIv = '1020304050605478';

        $encryption = openssl_decrypt($request['text'], $encryptMethod, $encryptionKey, $options=0, $encryNumIv);
        Session::flash('decResponse', $encryption);
        return redirect()->back();
    }


    public function formView()
    {

    }



}
