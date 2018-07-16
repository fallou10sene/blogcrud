<!DOCTYPE html>
<html>
<head>
	<title>blog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="bg-info text-white p-4 mt-2">

			<a href="{{ route('news.index') }}" class="btn btn-secondary">Home </a>

			<a href="{{ route('news.create') }}" class="btn btn-secondary"> Créer un article</a>
			@auth
			<form action="{{ route('logout') }}" method="POST" class="d-inline-block float-right">
		
				<button class="btn btn-secondary" type="submit">
					{{ auth()->user()->name}} | Deconnexion
				</button>
				
				
			</form>
			@else

			<a href="{{ route('login')}}" class="btn btn-secondary">Connection</a>


			@endauth
			
		</div>
	</div>
	<div>

		@yield('content')
		
	</div>
	<div class="container">
		<div class="bg-dark text-white p-4 text-center">
			All right reserved blog {{  date('Y')}}		
		</div>
		
	</div>
	
	
	

</body>
</html>