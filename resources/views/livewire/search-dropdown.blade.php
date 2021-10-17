<div class="relative z-40" x-data="{isOpen: true}" @click.away="isOpen = false">
    <input
        wire:model="search" type="text" class="w-64 px-3 py-1 text-sm bg-gray-700 rounded-full pl-9 focus:outline-none focus:shadow-outline" placeholder='Search... Press "/"  To Search'
        {{-- press '/' to search --}}
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        {{-- Hide dropdown when press Escape / bug when press Escape and return to search the dropdown not showing --}}
        {{-- @keydown.escape.window="isOpen = false" --}}
        @keydown.shift.tab="isOpen = false"
        >
        <div class="absolute top-0 flex items-center h-full ml-2 right-3">
            <img class="w-5" src="{{asset('assets/search.svg')}}" alt="Search-icon">
        </div>
        <div wire:loading class="top-0 right-0 mt-3 mr-4 spinner"></div>
        {{-- Dropdown search --}}
    @if (strlen($search) >= 2)
    <div class="absolute w-64 mt-4 text-sm text-gray-900 bg-gray-400 rounded"
     x-show="isOpen">
        {{-- Check if there any search results --}}
        @if ($searchResults->count() > 0)
        <ul>
            {{-- Search Results --}}
            @foreach ($searchResults as $result )
            <li class="border-b border-gray-700">
                <a href="{{route('movies.show', $result['id'])}}" class="flex items-center px-3 py-3 transition ease-in-out hover:bg-gray-700 hover:text-gray-300"
                @if ($loop->last) @keydown.tab="isOpen = false"  @endif
                >
                @if ($result['poster_path'])
                <img src="{{'https://image.tmdb.org/t/p/w92/'.$result['poster_path']}}" alt="Poster" class="w-8">
                @else
                <img src="https://via.placeholder.com/50x75" class="w-8" alt="Poster Holder">
                @endif
               <span class="ml-4"> {{$result['title']}}</span>
            </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="px-3 py-3">No results for "{{$search}}"</div>
        @endif
    </div>
    @endif
</div>
