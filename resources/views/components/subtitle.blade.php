@if ($subtitle)
    <h2 {{ $attributes->merge(['class' => 'text-lg font-black lg:text-[42px]']) }}>{{ $subtitle }}</h2>
@endif