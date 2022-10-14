<nav class="hidden 2xl:flex gap-8">
    @forelse ($navigation_items as $item)
        <a href="{{ $item->link }}" class="text-white hover:text-pink font-bold">{{ $item->title }}</a>
    @empty
    @endforelse
</nav>