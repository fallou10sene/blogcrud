@extends('master')
@section('content')

	
	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-header">
					<h5>{{ $news->titre }}</h5>
				</div>
				<div class="card-body">
					<p>{{ $news->contenu }}</p>
				</div>
			</div>
			
		</div>	
	</div>
	
	
@endsection