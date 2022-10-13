<x-subtitle subtitle="Категории" />
<!-- Categories -->
<div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3 sm:gap-4 md:gap-5 mt-8">
    @forelse($categories as $category)
        <x-category.item :category="$category" />
    @empty
        {{ __('Unfortunately, no category has been added to the site') }}
    @endforelse
</div>