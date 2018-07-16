@extends('master')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h2 style="margin-top: 20px;">Bienvenue </h2>
			<form method="POST" action="{{route('news.store')}}">
			 @csrf	
			 <div class="form-group">
			 	@if($errors->all())
			 		<div class="alert alert-danger">
			 			@foreach($errors->all() as $error)
			 				<li>{{$error}}</li>
			 			@endforeach		
			 		</div>	
			 	@endif
			 	
			 </div>
			<div class="form-group">
				<label for="ti">Titre de l'article</label>
				<input type="text" name="titre" class="form-control" id="ti">
			</div>
			<div class="form-group">
				<label for="con">Contenue de l'article</label>
				<textarea name="contenu" class="form-control" rows="10" id="con"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-outline-info" >Creer un article</button>
			</div>
			</form>
		</div>
	</div>
</div>

@endsection