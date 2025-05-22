<?php

namespace App\Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController
{

    public function participantIndex(){

        return view('Dashboard::participant.dashboard');

    }
}
