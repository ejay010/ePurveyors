<x-adminlayout>
    <div class="flex flex-col w-3/4 bg-white rounded mx-auto m-2 p-4">
        
        <h1 class="text-xl">Islands</h1>
        <a href="{{ route('admin.islands.create') }}" class="text-blue-500">Create an Island</a>

        <hr>

        @if ($Islands->count())

        <div class="m-2 p-4">
            <ul class="list-disc">
                @foreach ($Islands as $island)
                    <li>
                        <a href="{{ route('admin.islands.show', ['island' => $island->slug])}}" class="text-blue-500">{{$island->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        
            
        @else
        <p class="mx-auto text-center m-4">
            No islands created -_-
        </p>
        @endif
        
    </div>
</x-adminlayout>