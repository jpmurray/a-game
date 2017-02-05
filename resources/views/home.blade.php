@extends('laravel-bulma-starter::layouts.bulma')

@section('content')
<!-- notifications -->
@if($success)
<div class="columns">
	<div class="column is-10 is-offset-1">
		@if($success == "faction.created")
		<div class="notification is-success">
			<b>You faction has been created!</b>
			<p>Let's play!</p>
		</div>
		@endif
	</div>
</div>
@endif
@endsection