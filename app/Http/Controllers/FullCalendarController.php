<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events;

class FullCalendarController extends Controller
{
    public function index(){
        return view('calendar.fullcalendar');
    }
}
