<div>
    <form action="#" method="POST">
        <input type="text" placeholder="Search" wire:model.debounce.500ms="search">

    </form>

    <div wire-loading>
        Search in progress
    </div>


    @if ($sheets->isNotEmpty())
        <p>Results for your search &quot;{{ $search }}&quot;</p>
        <ul>
            @foreach ($sheets as $sheet)
                <li>{{ $sheet->title }}</li>
            @endforeach
        </ul>
    @endif

</div>
