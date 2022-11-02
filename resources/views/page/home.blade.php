@extends('layouts.app')
@section('title')
Главная
@endsection
@section('content')
<main class="py-16 lg:py-20">
	 <div class="container">
		<section>
		    <x-subtitle subtitle="Наши преимущества" />
			<!-- Advantages -->
            <x-advantages />
		</section>
        <section class="mt-16 lg:mt-24">
		    <x-category.main-page />
        </section>

		<section class="mt-16 lg:mt-24">
            <x-product.main-page />
		</section>

		<section class="mt-20">
            <x-brand.main-page />
		</section>

	</div>
 </main>
@endsection