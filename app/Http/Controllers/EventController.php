<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'home_team');
        $events = Event::orderBy($sort)->get();
        return view('events.index', compact('events', 'sort'));
    }
}