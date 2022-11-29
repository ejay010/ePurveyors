<x-adminlayout>
    <div class="flex flex-col w-3/4 bg-white rounded mx-auto m-2 p-4">
        <div class="flex space-x-4">
            <a href="{{ route('admin.islands') }}" class="text-blue-500 text-xl">Islands</a> <h1 class="text-xl">{{ $island->name }}</h1>
        </div>
        <nav class="flex justify-around">
            <a href="{{ route('admin.island.edit', ['island' => $island->slug]) }}" class="text-blue-500">Edit Info</a>
            <a href="{{ route('admin.island.marina.create', ['island' => $island->slug]) }}" class="text-blue-500">Add Marina</a>
            <a href="{{ route('admin.island.delete', ['island' => $island->slug]) }}" class="text-red-500">Destroy Island</a>
        </nav>
        
        <hr>

        <div class="flex m-4">
            <div>
                <h3>Details</h3>
                <dl class="m-2">
                    <dt>
                        Status
                    </dt>
                    @if ($island->is_open)
                    <dd class="ml-4">Island is open</dd>
                    @else
                    <dd class="ml-4">Island is closed</dd>
                    @endif
                    <dt>
                        Description
                    </dt>
                    <dd class="ml-4">
                        @if ($island->description && $island->description != null)
                            {{ $island->description }}
                            @else
                            No description set
                        @endif 
                    </dd>
                </dl>
            </div>

            @if ($island->marinas->count())
            <div class="mx-auto p-4">
                <ul class="list-disc">
                    @foreach ($island->marinas as $marina)
                        <li>
                            <a href="#" class="text-blue-500">{{$marina->name}}</a> - Open: {{ $marina->is_open ? 'Yes' : 'No' }}
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