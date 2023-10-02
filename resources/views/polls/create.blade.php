@extends('layouts.app')

@section('content')
<div class="bg-white max-w-md mx-auto p-6 rounded-lg shadow-md">
    @if ($errors->any())
        @foreach($errors->all() as $err)
            <li> {{$err}} </li>
        @endforeach    
        
    @endif
    <h2 class="text-2xl font-semibold mb-6">Create a Poll</h2>
    <form action="{{route('poll.store')}}" method="POST">
        @csrf

        <div id="notification" class="text-red-500 text-sm mb-4 hidden"></div>

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-semibold mb-2">Title:</label>
            <input type="text" name="title" id="title" class="w-full px-3 py-2 text-gray-700 border-b  focus:outline-none focus:border-blue-500" >
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-semibold mb-2">Description:</label>
            <textarea name="description" id="description" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" rows="4" ></textarea>
        </div>

        <div class="mb-4">
            <label for="options" class="block text-gray-700 text-sm font-semibold mb-2">Options:</label>
            <div id="options-container">
                <div class="flex items-center mb-2">
                    <input type="text" name="options[0][content]" class="w-full px-3 py-2 text-gray-700 border-b  focus:outline-none focus:border-blue-500" placeholder="Option 1">
                    <button type="button" class="ml-2 p-2 text-red-500 hover:text-red-700 focus:outline-none" onclick="removeOption(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center mb-2">
                    <input type="text" name="options[1][content]" class="w-full px-3 py-2 text-gray-700 border-b  focus:outline-none focus:border-blue-500" placeholder="Option 2">
                    <button type="button" class="ml-2 p-2 text-red-500 hover:text-red-700 focus:outline-none" onclick="removeOption(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <button onclick="addOption()" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center space-x-2 focus:outline-none focus:shadow-outline-blue">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add Option
            </button>

        </div>

        <div class="text-center flex place-content-center">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center space-x-2 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
            Create Poll
        </button>

        </div>
    </form>
</div>

<script>
    // JavaScript functions to dynamically add and remove option input fields
    
    function addOption() {
        const optionsContainer = document.querySelector('#options-container');
        const newOption = document.createElement('div');
        newOption.className = 'flex items-center mb-2';
        newOption.innerHTML = `
            <input type="text" name="options[${optionsContainer.children.length }][content]" class="w-full px-3 py-2 text-gray-700 border-b  focus:outline-none focus:border-blue-500" placeholder="Option ${optionsContainer.children.length + 1}" >
            <button type="button" class="ml-2 p-2 text-red-500 hover:text-red-700 focus:outline-none" onclick="removeOption(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
            </button>
        `;
        optionsContainer.appendChild(newOption);
    }

    function removeOption(button) {
        const optionsContainer = button.parentElement.parentElement;
        if(optionsContainer.children.length > 2){
        optionsContainer.removeChild(button.parentElement);}
        else{
            const notification = document.querySelector('#notification');
            notification.innerText = "Two options should be there!";
            notification.classList.remove('hidden');
            setTimeout(function () {
            notification.classList.add('hidden');
        }, 2000);
        }
    }
</script>

@endsection