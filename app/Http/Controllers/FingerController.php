<?php

namespace App\Http\Controllers;

use App\ActivityLog;
use App\Finger;
use Illuminate\Http\Request;

class FingerController extends Controller
{

    public function index()
    {
    }
    public function __construct()
    {
        // $this->middleware('auth')->except(['store', 'userclick']);
        // $this->middleware('auth');
    }

    public function store(Request $request)
    {




        $user_id = auth()->id();


        if ($request->ajax()) {

            $ip = getIp();
            $country = ip_info('visitor', 'country');
            $finger = new Finger();
            $finger->user_id = $user_id;
            $finger->ipaddress  = $ip;
            $finger->country    = $country;
            $finger->finger     = $request->get('uid');
            $finger->browser    = $request->get('browser');
            $finger->flash      = $request->get('flash');
            $finger->canvas     = $request->get('canvas');
            $finger->connection = $request->get('connection');
            $finger->cookies    = $request->get('cookies');
            $finger->display    = $request->get('display');
            $finger->fonts      = $request->get('fonts');
            $finger->formfields = $request->get('formfields');
            $finger->java       = $request->get('java');
            $finger->language   = $request->get('language');
            $finger->os         = $request->get('os');
            $finger->touch      = $request->get('touch');
            $finger->plugins    = $request->get('plugins');
            $finger->useragent  = $request->get('useragent');
            $finger->save();
        }
    }
}
