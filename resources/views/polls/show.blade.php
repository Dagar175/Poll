@extends('layouts.app') <!-- Extend your main layout if you have one -->

@section('content')
<div class="min-h-[60vh] flex justify-center items-center">
    <div class="bg-white shadow-md rounded-lg p-6 w-full sm:w-3/4 md:w-3/4 lg:w-3/4 xl:w-1/3">
        <h1 class="text-3xl font-semibold mb-6 text-center">{{$poll->title}}</h1>
        <p class="text-gray-600 mb-4 text-center">{{$poll->description}}</p>

        <form action="{{route('poll.vote',[$poll])}}" method="POST">
            @csrf
            <div class="mb-4 flex flex-col justify-center">
                @foreach ($poll->options as $option)
                <label class="inline-flex items-center mb-2 mx-2">
                    <input type="radio" name="option_id" @if ($selectedOption == $option->id) checked @endif value="{{$option->id}}" class="form-radio h-5 w-5 text-blue-600" required>
                    <span class="ml-2">{{$option->content}}</span>
                </label>
                @endforeach
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg w-full focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Vote
            </button>
        </form>
    </div>
</div>
@endsection
