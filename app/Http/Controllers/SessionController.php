<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // Session Show
    public function show(Request $request) {
        if ($request->session()->has('nama')) {
            echo $request->session()->get('nama');
        } else {
            echo 'No Data in Session';
        }
    }

    // Create Session
    public function create(Request $request) {
        $request->session()->put('nama', 'Fadjri Alfalah');
        echo "Data has been inserted to Session";
    }

    // Delete Session
    public function delete(Request $request) {
        $request->session()->forget('nama');
        echo "Data has been deleted from Session";
    }
}
