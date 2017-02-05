<!-- navigation -->
<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">
      @stack('right-nav-menu')
      <a class="nav-item is-tab" href="{{ route('overview') }}">Overview</a>
      <a class="nav-item is-tab" href="{{ route('training') }}">Training</a>
      @if (Auth::guest())
      <a class="nav-item is-tab" href="{{ url('/login') }}">Login</a>
      <a class="nav-item is-tab" href="{{ url('/register') }}">Register</a>
      @else
      <a class="nav-item is-tab" href="{{ url('/logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
      Logout</a>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
      @endif
    </div>
  </div>
</nav>