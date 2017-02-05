@extends('laravel-bulma-starter::layouts.bulma')

@section('content')
<!-- notifications -->
<div class="columns">
	<div class="column is-10 is-offset-1">
		<div class="notification is-info">
			<b>You have not joined any faction!</b>
			<p>Before you can jump in the game, you must tell us who you are, and where you stand.</p>
		</div>
	</div>
</div>

<form action="{{ route('new-faction.save') }}" method="post">
	{{ csrf_field() }}
	<!-- leader name -->
	<div class="columns">
		<div class="column is-5 is-offset-1">
			<h1 class="title">How would you name yourself?</h1>
			<h1 class="subtitle">Make it good. History will remember you by this name...</h1>
			
			<p class="control">
			  <input name="leader_name" class="input" type="text" maxlength="100" required="" value="{{ old('leader_name') }}">
			</p>
			@include('laravel-bulma-starter::components.forms-errors', ['field' => 'leader_name'])
		</div>
	</div>

	<!-- faction name -->
	<div class="columns">
		<div class="column is-5 is-offset-1">
			<h1 class="title">How would you name your group?</h1>
			<h1 class="subtitle">It's for the glory of your faction, but also you own clique!</h1>
			
			<p class="control">
			  <input name="name" class="input" type="text" maxlength="100" required="" value="{{ old('name') }}">
			</p>
			@include('laravel-bulma-starter::components.forms-errors', ['field' => 'name'])
		</div>
	</div>

	<!-- faction type -->
	<div class="columns">
		<div class="column is-5 is-offset-1">
			<h1 class="title">Where do you stand?</h1>
			<h1 class="subtitle">"Choose your faith and write your own destiny..."<sup><a href="https://en.wikipedia.org/wiki/Lords_of_Magic" target="_blank">1</a></sup></h1>

			<p class="control">
			  <span class="select">
			    <select name="type_id" required="" value="{{ old('type_id') }}">
			    	@foreach($types as $type)
			    		<option value="{{ $type->id }}">{{ $type->name }}</option>
			    	@endforeach
			    </select>
			  </span>
			</p>
			@include('laravel-bulma-starter::components.forms-errors', ['field' => 'type_id'])
		</div>
	</div>

	<!-- submit -->
	<div class="columns">
		<div class="column is-5 is-offset-1">
			<p class="control">
			    <button class="button is-primary">The game is on!</button>
			  </p>
		</div>
	</div>
</form>
@endsection