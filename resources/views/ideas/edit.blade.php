<x-layout>

  <form method="POST" action="/ideas/{{ $idea->id }}">
    @csrf
    @method('PATCH')
    <div class="col-span-full">
          <label for="description" class="block text-sm/6 font-medium text-white"> Edit your  Ideas</label>
          <div class="mt-2">
            <textarea id="description" name="description" rows="3" class="block w-full rounded-md bg-gray-800 px-3 py-1.5 text-base text-gray-300 outline-1 -outline-offset-1 outline-gray-500 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ $idea->description }}</textarea>
          </div>
          
        </div>
   <div class="mt-6 flex items-center  gap-x-6">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
  </div>

</form>

</x-layout>