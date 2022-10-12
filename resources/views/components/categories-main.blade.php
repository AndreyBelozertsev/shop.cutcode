@include('partials.subtitle',['subtitle'=>'Категории'])
<!-- Categories -->
<div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3 sm:gap-4 md:gap-5 mt-8">
    @forelse($categories as $category)
        <a href="{{ route('category',$category->slug) }}" class="p-3 sm:p-4 2xl:p-6 rounded-xl bg-card hover:bg-pink text-xxs sm:text-xs lg:text-sm text-white font-semibold">{{ $category->title }}</a>
    @empty
        {{ __('Unfortunately, no category has been added to the site') }}
    @endforelse
</div>