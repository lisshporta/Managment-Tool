<x-layout>
    <form method="POST" action="/tasks/{{$task->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div style="display:flex; 
    gap: 20px;
    margin: 40px 20px; 
    height: 100%;">
        <label for="title" class="inline-block text-lg mb-2 font-bold"
            >Task Title:</label>
        <input
            type="text"
            class="text-black border border-gray-200 rounded p-2 w-full outline-black"
            name="title"
            placeholder="Task title..."
            value="{{$task->title}}"
            />
            
            
        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    <label for="description" class="inline-block text-lg mb-2 font-bold"
    >Task description:</label>
    <input
    type="text"
    class="text-black border border-gray-200 rounded p-2 w-full outline-black"
    name="description"
    placeholder="Task description..."
    value="{{$task->description}}"
    />
    
    @error('description')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    
    <button class="hover:bg-gray-500 border-solid border-2 p-3 border-black rounded font-bold outline-black" type="submit">Update</button>
    </form>
    </div>
    <a class=" hover:bg-gray-300 ml-2 mt-5 border-solid border-2 p-1 border-black rounded font-bold outline-black" href="/claimed-tasks">GO BACK</a>
    
    </x-layout>
    
    
    
    
    
    
    
    
    
    