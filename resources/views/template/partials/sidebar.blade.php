<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="{{ route('home') }}" class="brand-link">
		<img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8; margin-left: 0px;">
		<span class="brand-text font-weight-light">CMASEZ</span>
	</a>

	<div class="sidebar font-weight-light">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			@auth
				<div class="image">
					<img src="{{ asset('admin/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="Imagen de perfil">
				</div>
				<div class="info">
					<a href="#" class="d-block">{{ Auth::user()->name }}</a>
				</div>
			@else
			@endif
		</div>

		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="{{ route('home') }}" class="nav-link">
						<i class="nav-icon fa fa-book"></i>
						<p>Inicio</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-list"></i>
						<p>
							Catálogos
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
							<li class="nav-item">
							<a href="{{ route('home') }}" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Algo</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>