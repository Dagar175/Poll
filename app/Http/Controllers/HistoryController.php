<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\User;

class HistoryController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();
        $createdPolls = $user->polls;
        $votedPolls = $user->getVotedPolls();
    
        return view('polls.history',[
            'createdPolls' => $createdPolls,
            'votedPolls' => $votedPolls,
        ]);
    }
}
