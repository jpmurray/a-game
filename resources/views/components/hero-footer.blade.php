<nav class="level box">
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">{{ str_plural(auth()->user()->faction->type->currency, auth()->user()->faction->money) }}</p>
			<p class="title">{{ auth()->user()->faction->money }}</p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">{{ str_plural(auth()->user()->faction->type->units()->where('type', 'off')->first()->name, auth()->user()->faction->off) }}</p>
			<p class="title">{{ auth()->user()->faction->off }}</p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">{{ str_plural(auth()->user()->faction->type->units()->where('type', 'def')->first()->name, auth()->user()->faction->def) }}</p>
			<p class="title">{{ auth()->user()->faction->def }}</p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">{{ str_plural(auth()->user()->faction->type->units()->where('type', 'spec')->first()->name, auth()->user()->faction->spec) }}</p>
			<p class="title">{{ auth()->user()->faction->spec }}</p>
		</div>
	</div>
	<div class="level-item has-text-centered">
		<div>
			<p class="heading">Prestige</p>
			<p class="title">{{ auth()->user()->faction->prestige }}</p>
		</div>
	</div>
</nav>