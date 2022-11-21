<x-adminlayout>
    <div class="flex flex-col mx-auto p-4 m-2 bg-white w-3/4 rounded shadow">
        <h2 class="text-xl">Create a Marina</h2>
        <hr>
        <form class="flex flex-col" method="POST" action="{{ route('admin.marina.store') }}">
            <div class="flex flex-col m-2">
                <label for="island">
                    Island (Required)
                </label>
                @if ($island)
                <input type="text" name="island" id="island" class="rounded-md" value="{{ $island->name }}" required disabled /> 
                <input type="hidden" name="island_slug" value="{{$island->slug}}"/>                   
                @endif
            </div>

            <div class="flex flex-col m-2">
                <label for="name">
                    Marina Name (Required)
                </label>
                <input type="text" name="name" id="name" class="rounded-md" required />
            </div>
            
            <div class="flex flex-col m-2">
                <label for="description">Short Description (Optional)</label>
                <textarea name="description" id="description" class="rounded-md"></textarea>
            </div>
            @csrf
            <button type="submit" class="bg-green-300 border rounded-lg p-4">
                Create Marina
            </button>
        </form> 
    </div>
</x-adminlayout>