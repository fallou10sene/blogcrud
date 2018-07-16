@extends('master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h2 style="margin-top: 20px;">Modifier l'article </h2>
			<form method="POST" action="{{route('news.update', $news)}}">
			 @csrf	
			 @method('PUT')
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
				<input type="text" name="titre" class="form-control" id="ti" value="{{  $news->titre }}">
			</div>
			<div class="form-group">
				<label for="con">Contenue de l'article</label>
				<textarea name="contenu" class="form-control" rows="10" id="con">{{  $news->contenu }}</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-outline-info" >Modifier</button>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection