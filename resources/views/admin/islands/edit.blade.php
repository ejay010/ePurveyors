<x-adminlayout>
    <div class="flex flex-col mx-auto p-4 m-2 bg-white w-3/4 rounded shadow">
        <h2 class="text-xl">Create an Island</h2>
        <hr>
        <form class="flex flex-col" method="POST" action="{{ route('admin.islands.update', ['island' => $island->slug]) }}">
            <div class="flex flex-col m-2">
                <label for="name">
                    Island Name (Required)
                </label>
                <input type="text" value="{{$island->name}}" name="name" id="name" class="rounded-md" required />
            </div>

            <div class="flex flex-col m-2">
                <fieldset>
                    <legend>
                        Is it open?
                    </legend>
                    <input type="radio" name="is_open" id="yes" value="1" {{$island->is_open ? 'checked' : null}}/>
                    <label for="yes">Yes</label>

                    <input type="radio" name="is_open" id="no" value="0" {{!$island->is_open ? 'checked' : ''}}/>
                    <label for="no">No</label>
                </fieldset>
            </div>
            
            <div class="flex flex-col m-2">
                <label for="description">Short Description (Optional)</label>
                <textarea name="description" id="description" class="rounded-md">{{$island->description}}</textarea>
            </div>
            @csrf
            @method('PATCH')
            <button type="submit" class="bg-green-300 border rounded-lg p-4">
                Update Island
            </button>
        </form> 
    </div>
</x-adminlayout>