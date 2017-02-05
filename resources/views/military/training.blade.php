@extends('layout')

@section('title')
Unit training
@endsection

@section('subtitle')
<em>War is peace. Freedom is slavery. Ignorance is strenght.</em> - Georges Orwell
@endsection

@section('content')
<div class="columns">
	<div class="column is-8 is-offset-2">
		<table class="table">
			<thead>
				<tr>
					<th width="37%">Name</th>
					<th width="5%"><p class="has-text-centered"><abbr title="Offense points">Off</abbr></p></th>
					<th width="5%"><p class="has-text-centered"><abbr title="Defense points">Def</abbr></p></th>
					<th width="5%"><p class="has-text-centered">Cost</p></th>
					<th width="5%"><p class="has-text-centered">Ready</p></th>
					<th width="5%"><p class="has-text-centered">Training</p></th>
					<th width="37%">To train</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th colspan="6">&nbsp;</th>
					<th><a class="button">Start training</a></th>
				</tr>
			</tfoot>
			<tbody>
				<tr>
					<th>{{ $units->where('type', 'off')->first()->name }}</th>
					<td class="has-text-centered">{{ $units->where('type', 'off')->first()->atk }}</td>
					<td class="has-text-centered">{{ $units->where('type', 'off')->first()->def }}</td>
					<td class="has-text-centered">{{ $units->where('type', 'off')->first()->cost }}</td>
					<td class="has-text-centered">{{ $faction->off }}</td>
					<td class="has-text-centered">0</td>
					<td><input type="text" class="input is-small"></td>
				</tr>
				<tr>
					<th>{{ $units->where('type', 'def')->first()->name }}</th>
					<td class="has-text-centered">{{ $units->where('type', 'def')->first()->atk }}</td>
					<td class="has-text-centered">{{ $units->where('type', 'def')->first()->def }}</td>
					<td class="has-text-centered">{{ $units->where('type', 'def')->first()->cost }}</td>
					<td class="has-text-centered">{{ $faction->def }}</td>
					<td class="has-text-centered">0</td>
					<td><input type="text" class="input is-small"></td>
				</tr>
				<tr>
					<th>{{ $units->where('type', 'spec')->first()->name }}</th>
					<td class="has-text-centered">{{ $units->where('type', 'spec')->first()->atk }}</td>
					<td class="has-text-centered">{{ $units->where('type', 'spec')->first()->def }}</td>
					<td class="has-text-centered">{{ $units->where('type', 'spec')->first()->cost }}</td>
					<td class="has-text-centered">{{ $faction->spec }}</td>
					<td class="has-text-centered">0</td>
					<td><input type="text" class="input is-small"></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<h1 class="title">Training schedule for the month</h1>
<div class="columns">
	<div class="column is-12">
		<table class="table">
			<thead>
				<th>Day:</th>
				@for($i = 1; $i <= 24; $i++)
				<th width="4%">{{ $i }}</th>
				@endfor
			</thead>
			<tbody>
				<tr>
					<th>{{ $units->where('type', 'off')->first()->name }}</th>
					@for($i = 0; $i <= 23; $i++)
					<td>{{ $trainingSchedule->where('unit_id', $units->where('type', 'off')->first()->id)->first()->{"day_".$i} }}</td>
					@endfor
				</tr>
				<tr>
					<th>{{ $units->where('type', 'def')->first()->name }}</th>
					@for($i = 0; $i <= 23; $i++)
					<td>{{ $trainingSchedule->where('unit_id', $units->where('type', 'def')->first()->id)->first()->{"day_".$i} }}</td>
					@endfor
				</tr>
				<tr>
					<th>{{ $units->where('type', 'spec')->first()->name }}</th>
					@for($i = 0; $i <= 23; $i++)
					<td>{{ $trainingSchedule->where('unit_id', $units->where('type', 'spec')->first()->id)->first()->{"day_".$i} }}</td>
					@endfor
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection