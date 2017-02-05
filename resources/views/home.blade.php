@extends('layout')

@section('title')
{{ $faction->name }}
@endsection

@section('subtitle')
A faction of the {{ $faction->type->name }}, under the leadership of {{ $faction->leader_name }}
@endsection

@section('content')
<!-- notifications -->
@if(session('success'))
<div class="columns">
	<div class="column is-10 is-offset-1">
		@if(session('success') == "faction.created")
		<div class="notification is-success">
			<b>You faction has been created!</b>
			<p>Let's play!</p>
		</div>
		@endif
	</div>
</div>
@endif
@endsection