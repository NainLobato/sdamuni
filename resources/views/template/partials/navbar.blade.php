<nav class="main-header navbar navbar-expand bg-dark navbar-dark border-bottom">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{route('home')}}" class="nav-link">Inicio</a>
		</li>
	</ul>

	<ul class="navbar-nav ml-auto">
		@auth
			<li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión">
				<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
				document.getElementById('logout-form').submit();" ><i class="fa fa-power-off"></i></a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                {{ csrf_field() }}
	            </form>
			</li>
		@endauth

		<li class="nav-item">
			<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fa fa-th-large"></i></a>
		</li>
	</ul>
</nav>