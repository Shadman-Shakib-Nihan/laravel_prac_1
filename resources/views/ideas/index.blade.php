<x-layout>

  <form method="POST" action="/ideas">
    @csrf
    <div class="col-span-full">
          <label for="description" class="block text-sm/6 font-medium text-white">Ideas</label>
          <div class="mt-2">
            <textarea id="description" name="description" rows="3" class="block w-full rounded-md bg-gray-800 px-3 py-1.5 text-base text-gray-300 outline-1 -outline-offset-1 outline-gray-500 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
          </div>
          <p class="mt-3 text-sm/6 text-gray-400">Write a few sentences about your ideas.</p>
        </div>
   <div class="mt-6 flex items-center  gap-x-6">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>

</form>

@if($ideas->count() > 0)
  <div class="mt-6" text-white>
    <h1 class="text-2xl font-bold text-white">
        Your Ideas
    </h1>
    <ul class="mt-4 space-y-2">
       @foreach ($ideas as $idea)
        <li class="text-sm text-gray-300">{{$idea->description}}</li>
       @endforeach
     </ul>
  </div> 
@endif
</x-layout>