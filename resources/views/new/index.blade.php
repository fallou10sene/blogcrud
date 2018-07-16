@extends('master')
@section('content')
	<div class="container">
		<div class="row " style="margin-top: 50px;">
			<div class="col-md-2 mt-8">
				
			</div>
			<div class="col-md-10 mt-8 ">
				<h1>Vos dernières articles</h1>	
			</div>
					
		</div>
		@if(session()->has('message'))
		<div class="alert alert-success">
			{{ session()->get('message')}}			
		</div>
		@endif
		<ul style="margin-top: 50px;">
			@foreach($news as $new)					
				<div class="row mt-2" >
							<div class="col-md-6 mt-3">
								<a href="{{ route('news.show', $new) }}">{{ $new->titre }}</a>
							</div>		
						
							<div class="col-md-6 " >
								<button class="btn btn-info mt-2" > 
									<a href="{{ route('news.edit', $new) }}" style="color: white;">Modifier</a> 
								</button>
							
								<form method="POST" action="{{ route('news.destroy', $new->id) }}" style="display: inline-block;" onsubmit="return confirm('êtes vous sur de vouloir Supprimer l\'article')">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger mt-2" >
									  Supprimer
									</button>
								</form>
							
							</div>
				</div>		
			@endforeach
		</ul>
		<div class="row mt-8" style="margin-top: 70px;">
			<div class="col-md-2">
				
			</div>
			<div class="col-md-10">
				{{ $news->links() }}
			</div>
			
		</div>
		
	</div>
@endsection