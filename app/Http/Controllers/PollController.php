<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePollRequest;
use App\Http\Requests\VoteRequest;
use App\Models\Option;
use App\Models\Poll;

class PollController extends Controller
{
    public function store(CreatePollRequest $request){
        
    
       $poll =  auth()->user()->polls()->create($request->safe()->except('options'));

       $poll->options()->createMany($request->options);

       return back()->with('success', 'Poll created Successfully!');
    }

    public function show(Poll $poll){

         $poll->load('options');

         $selectedOption = $poll->votes()->where('user_id',auth()->id())->first()?->option_id;
         //dump($selectedOption);die;
        
    
         return view('polls.show',[
            'poll' => $poll, 
            'selectedOption' => $selectedOption,
         ]);

    }

    public function vote(VoteRequest $request , Poll $poll){

    
        $selectedOption = $poll->votes()->where('user_id',auth()->id())->first()?->option;
        
        $poll->votes()->updateOrCreate(
            [
                'user_id' => auth()->id(),
            ],
            [
                'option_id' => $request->option_id,
            ]
        );
       
        $newOption = Option::find($request->option_id);
        $newOption->increment('votes_count');

        if($selectedOption){
            $selectedOption->decrement('votes_count');
        }

        $selectedOption = $newOption;
       
        return redirect()->route('poll.results', ['poll_id' => $poll->id]);
    }

    public function results($poll_id){
        $poll = Poll::find($poll_id);
        $options = $poll->load('options');

        return view('polls.result', compact('poll', 'options'));
      
    }

    
}
