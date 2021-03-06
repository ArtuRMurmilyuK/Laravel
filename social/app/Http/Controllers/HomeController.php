<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Status;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $statuses =Status::where(function($query)
            {
                return $query->notReply()->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
            })
            ->orderBy('created_at','desc')
            ->paginate(10);
            return view('timeline.index', compact('statuses'));
        }
        return view('home');
    }
    
}
