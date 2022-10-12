
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>CutCode</title>
	<meta name="description" content="Видеокурс по изучению принципов программирования">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

	<link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
	<link rel="mask-icon" href="./images/safari-pinned-tab.svg" color="#1E1F43">
	<meta name="msapplication-TileColor" content="#1E1F43">
	<meta name="theme-color" content="#1E1F43">

	@vite(['resources/css/app.css', 'resources/css/scss/main.sass'])
</head>
<body>

 <main class="md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
	 <div class="container">

		<!-- Page heading -->
		<div class="text-center">
			<a href="index.html" class="inline-block" rel="home">
				<img src="./template/images/logo.svg" class="w-[148px] md:w-[201px] h-[36px] md:h-[50px]" alt="CutCode">
			</a>
		</div>

		<div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
			<h1 class="mb-5 text-lg font-semibold">Вход в аккаунт</h1>
			<form class="space-y-3" method="POST" action="{{ route('login') }}">
                @csrf
				<input type="email" name="email" class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/20 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold" value="{{ old('email') }}" placeholder="E-mail" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
				<input type="password" name="password" class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/20 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold" placeholder="Пароль" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
				<button type="submit" class="w-full btn btn-pink">Войти</button>
			</form>
			<div class="space-y-3 mt-5">
				<div class="text-xxs md:text-xs"><a href="{{ route('password.request') }}" class="text-white hover:text-white/70 font-bold">Забыли пароль?</a></div>
				<div class="text-xxs md:text-xs"><a href="{{ route('register') }}" class="text-white hover:text-white/70 font-bold">Регистрация</a></div>
			</div>
			<ul class="flex flex-col md:flex-row justify-between gap-3 md:gap-4 mt-14 md:mt-20">
				<li>
					<a href="#" class="inline-block text-white hover:text-white/70 text-xxs md:text-xs font-medium" target="_blank" rel="noopener">Пользовательское соглашение</a>
				</li>
				<li class="hidden md:block">
					<div class="h-full w-[2px] bg-white/20"></div>
				</li>
				<li>
					<a href="#" class="inline-block text-white hover:text-white/70 text-xxs md:text-xs font-medium" target="_blank" rel="noopener">Политика конфиденциальности</a>
				</li>
			</ul>
		</div>

	</div>
 </main>

 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
 @vite(['resources/js/app.js'])

</body>
</html>