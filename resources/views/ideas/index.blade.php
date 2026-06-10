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

    <div class="mt-4 space-y-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

  
       @foreach ($ideas as $idea)

<div class="card bg-neutral text-neutral-content shadow-md h-64">
    <div class="card-body flex flex-col h-full">
        
        <div class="overflow-y-auto flex-1">
            <p class="text-sm break-words">
                {{ $idea->description }}
            </p>
        </div>

        <div class="card-actions justify-end mt-2">
            <a href="/ideas/{{ $idea->id }}/edit" class="btn btn-primary btn-sm">
                Edit
            </a>

            <form method="POST" action="/ideas/{{ $idea->id }}">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-error btn-sm">
                    Delete
                </button>
            </form>
        </div>
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