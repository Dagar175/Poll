@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Your History</h2>

    <h3 class="text-xl font-semibold mb-4">Polls Created by You</h3>
    <ul class="list-inside">
         @foreach ($createdPolls as $poll)
            <li class="mb-2 flex items-center">
                <svg class="w-6 h-6 fill-current text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M21.414 2.586a2 2 0 0 0-2.828 0L2.586 18.586a2 2 0 0 0 0 2.828l2.828 2.828a2 2 0 0 0 2.828 0L24 8.414 21.414 5.828a2 2 0 0 0 0-2.828z"/>
                </svg>
                <a href="{{ route('poll.show', ['poll' => $poll->id]) }}" class="text-blue-500 no-underline hover:underline">{{ $poll->title }}</a>
            </li>
        @endforeach
    </ul>

    <h3 class="text-xl font-semibold mt-4 mb-4">Polls You've Voted On</h3>
    <ul class="list-inside">
        @foreach ($votedPolls as $item)
            <li class="mb-2 flex items-center">
                <svg class="w-6 h-6 fill-current text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M21.414 2.586a2 2 0 0 0-2.828 0L2.586 18.586a2 2 0 0 0 0 2.828l2.828 2.828a2 2 0 0 0 2.828 0L24 8.414 21.414 5.828a2 2 0 0 0 0-2.828z"/>
                </svg>
                <a href="{{ route('poll.show', ['poll' => $item->poll->id]) }}" class="text-green-500 no-underline  hover:underline">{{ $item->poll->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
