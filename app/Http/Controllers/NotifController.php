<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class NotifController extends Controller
{
    // Index Notif
    public function index() {
        return view('notifikasi');
    }

    // Success Notif
    public function success(){
		Session::flash('success','Success Notification');
		return redirect('pesan');
    }
    
    // Warning Notif
    public function warning(){
		Session::flash('warning','Warning Notification');
		return redirect('pesan');
    }
    
    // Fail Notif
    public function fail(){
		Session::flash('fail','Fail Notification');
		return redirect('pesan');
	}
}
