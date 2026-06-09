<x-layout>



@if($ideas->count() > 0)
  <div class="mt-6" text-white>
    <h1 class="text-2xl font-bold text-white" >
        Welcome to your Ideas
    </h1>
    <a href="/ideas/create" class="text-sm bg-green-600 hover:bg-green-500 px-2 py-1 rounded text-white mt-6">Create your  ideas</a> 
  </div>
  <div class="mt-6" text-white>
    <h1 class="text-2xl font-bold text-white">
        Your Ideas
    </h1>
    <div class="mt-4 space-y-3">
       @foreach ($ideas as $idea)
        <div class="flex items-center justify-between bg-gray-800 p-3 rounded-md">
          <span class="text-sm text-gray-300">{{$idea->description}}</span>
          <div class="flex gap-2">
            <a href="/ideas/{{ $idea->id }}/edit" class="text-xs bg-blue-600 hover:bg-blue-500 px-2 py-1 rounded text-white">Edit</a>
            <form method="POST" action="/ideas/{{ $idea->id }}" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-xs bg-red-600 hover:bg-red-500 px-2 py-1 rounded text-white">Delete</button>
            </form>
          </div>
        </div>
       @endforeach
    </div>
  </div> 
@else
  <div class="mt-6" text-white>
    <h1 class="text-2xl font-bold text-white" >
        No Ideas Yet
    </h1>
    <a href="/ideas/create" class="text-sm bg-green-600 hover:bg-green-500 px-2 py-1 rounded text-white">Create your first idea</a> 
  </div>
@endif
</x-layout> 