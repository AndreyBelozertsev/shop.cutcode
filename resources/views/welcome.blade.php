@extends('layouts.app')

@section('content')
<main class="py-16 lg:py-20">
	 <div class="container">

		<section>
			<!-- Section heading -->
            @include('partials.subtitle',['subtitle'=>'Наши преимущества'])
			<!-- Advantages -->
			@include('partials.advantages')
		</section>
        <section class="mt-16 lg:mt-24">
		    <x-categories-main />
        </section>

		<section class="mt-16 lg:mt-24">
            <x-products-main />
		</section>

		<section class="mt-20">
            <x-brands-main />
		</section>

	</div>
 </main>
@endsection