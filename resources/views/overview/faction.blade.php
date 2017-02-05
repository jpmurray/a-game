<div class="columns">
	<div class="column is-10 is-offset-1 box">
		<nav class="level">
		  <div class="level-item has-text-centered">
		    <div>
		      <p class="heading">{{ str_plural($faction->type->units()->where('type', 'off')->first()->name, $faction->off) }}</p>
		      <p class="title">{{ $faction->off }}</p>
		    </div>
		  </div>
		  <div class="level-item has-text-centered">
		    <div>
		      <p class="heading">{{ str_plural($faction->type->units()->where('type', 'def')->first()->name, $faction->def) }}</p>
		      <p class="title">{{ $faction->def }}</p>
		    </div>
		  </div>
		  <div class="level-item has-text-centered">
		    <div>
		      <p class="heading">{{ str_plural($faction->type->units()->where('type', 'spec')->first()->name, $faction->spec) }}</p>
		      <p class="title">{{ $faction->spec }}</p>
		    </div>
		  </div>
		  <div class="level-item has-text-centered">
		    <div>
		      <p class="heading">Prestige</p>
		      <p class="title">{{ $faction->prestige }}</p>
		    </div>
		  </div>
		</nav>
	</div>
</div>