<!-- Section heading -->
@include('partials.subtitle',['subtitle'=>'Каталог товаров'])
<!-- Products list -->
<div class="products grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-x-8 gap-y-8 lg:gap-y-10 2xl:gap-y-12 mt-8">
    @forelse($products as $product)
        @include('partials.category.product', $product)
    @empty
    {{ __('Unfortunately, no product has been added to the site') }}
    @endforelse
</div>

<div class="mt-12 text-center">
    <a href="catalog.html" class="btn btn-purple">Все товары &nbsp;→</a>
</div>