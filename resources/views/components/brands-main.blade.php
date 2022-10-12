@include('partials.subtitle',['subtitle'=> 'Бренды'])
<!-- Brands list -->
<div class="grid grid-cols-2 md:grid-cols-3 2xl:grid-cols-6 gap-4 md:gap-8 mt-12">
    @forelse($brands as $brand)
        @include('partials.brand', $brand)
    @empty
    @endforelse
</div>