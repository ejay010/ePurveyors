<x-adminlayout>
    <div class="flex flex-col w-3/4 bg-white rounded mx-auto m-2 p-4">
        <h1 class="text-xl">{{ $island->name }}</h1>
        <hr>

        <a href="{{ route('admin.island.edit', ['island' => $island->slug]) }}" class="text-blue-500">Edit Info</a>
        <a href="{{ route('admin.island.delete', ['island' => $island->slug]) }}" class="text-blue-500">Destroy Island</a>


        <div class="flex m-4">
            <div class="">
                <ul>
                    @if ($island->is_open)
                    <li>Island is open</li>
                    @else
                    <li>Island is closed</li>
                    @endif

                    <li>
                        {{ $island->description }}
                    </li>
                </ul>
            </div>

            @if ($island->marinas->count())
            <div class="mx-auto p-4">
                <ul class="list-disc">
                    @foreach ($island->marinas as $marina)
                        <li>
                            <a href="#" class="text-blue-500">{{$marina->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            @else
            <p class="mx-auto text-center m-4">
                No marinas added -_- <a href="{{ route('admin.island.marina.create', ['island' => $island->slug]) }}" class="text-blue-600">Click here to add a marina</a>
            </p>
            @endif
            
        </div>
    </div>
</x-adminlayout>