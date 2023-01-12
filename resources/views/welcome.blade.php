<x-layout>
    <x-flash />
@auth
<h1>Welcome <a href="/profile">{{auth()->user()->name}}</a> </h1>   
@endauth

@if(Request::is('tasks/sort/unclaimed'))
  <a href="{{ route('home') }}" class="btn btn-primary">Go back to all tasks</a>
@elseif(!Request::is('tasks/sort/unclaimed'))
  <a href="{{ route('unclaimed.sort') }}" class="btn btn-primary">Show unclaimed tasks</a>
@endif

    @if(count($tasks) > 0)
        <div class="flex justify-center items-center mx-40 my-20">
            <div style="border-color:#7d7d7d" class="p-15 border-2 rounded-lg p-3">
                @if(Request::is('/'))
                <p class="text-xl font-bold"> All Tasks: </p>
                @else
                <p class="text-xl font-bold"> Unclaimed Tasks: </p>
                @endif

                @foreach($tasks as $task)
                    <div class="my-5">
                        <h1 class="text-lg">{{$task->title}}:</h1>
                        <h3 class="text-s text-gray-400-600">{{$task->description}} - {{$task->type}}</h3>
                        @if ($task->user_id != null)
                            <p style="border-color:#7d7d7d" class="border-2 p-1 rounded-lg font-bold">{{$task->status}} 
                                @if ($task->status == 'Claimed')
                                - {{$task->claimed_at->diffForHumans()}} 
                                @elseif ($task->status == 'Finished')
                                - {{$task->finished_at->diffForHumans()}} 
                                @endif
                                by {{$task->user->name}}</p>
                        @else
                            <form action="{{ route('tasks.claim', $task) }}" method="POST">
                                @csrf
                                <button type="submit" style="border-color:#7d7d7d" class="btn btn-primary border-solid hover:bg-gray-400 border-2 p-1 rounded-lg font-bold"> Claim Task</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>  
        </div>
    @else 
        <p class="text-center text-lg font-medium">No Upcoming Tasks!</p>
    @endif
    <div class="text-center my-5">
        <a href="/tasks/create" style="border-color:#7d7d7d" class="btn btn-primary border-solid hover:bg-gray-400 border-2 p-1 rounded-lg font-bold">CREATE TASK</a>
<a href="/claimed-tasks" style="border-color:#7d7d7d" class="btn btn-primary border-solid hover:bg-gray-400 border-2 p-1 rounded-lg font-bold">CLAIMED TASKS</a>

    </div>
</x-layout>
