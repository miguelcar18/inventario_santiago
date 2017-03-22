<div class="sidebar" id="sidebar">
	<ul class="nav nav-list">
		<li>
			<a href="#">
				<i class="icon-dashboard"></i>
				<span class="menu-text"> Inicio </span>
			</a>
		</li>
		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-briefcase"></i>
				<span class="menu-text"> Clientes </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li>
					<a href="{{ URL::route('dashboard.clientes.index') }}">
						<i class="icon-double-angle-right"></i>
						Listado de clientes
					</a>
				</li>
				<li>
					<a href="{{ URL::route('dashboard.clientes.create') }}">
						<i class="icon-double-angle-right"></i>
						Agregar cliente
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-barcode"></i>
				<span class="menu-text"> Productos </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li>
					<a href="{{ URL::route('dashboard.productos.index') }}">
						<i class="icon-double-angle-right"></i>
						Listado de productos
					</a>
				</li>
				<li>
					<a href="{{ URL::route('dashboard.productos.create') }}">
						<i class="icon-double-angle-right"></i>
						Agregar producto
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-book"></i>
				<span class="menu-text"> Inventario </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li>
					<a href="{{ URL::route('dashboard.inventario.index') }}">
						<i class="icon-double-angle-right"></i>
						Listado de registros
					</a>
				</li>
				<li>
					<a href="{{ URL::route('dashboard.inventario.create') }}">
						<i class="icon-double-angle-right"></i>
						Agregar registro
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-money"></i>
				<span class="menu-text"> Ventas </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li>
					<a href="{{ URL::route('dashboard.ventas.index') }}">
						<i class="icon-double-angle-right"></i>
						Ventas realizadas
					</a>
				</li>
				<li>
					<a href="{{ URL::route('dashboard.ventas.create') }}">
						<i class="icon-double-angle-right"></i>
						Registrar venta
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-group"></i>
				<span class="menu-text"> Usuarios </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li>
					<a href="{{ URL::route('dashboard.usuarios.index') }}">
						<i class="icon-double-angle-right"></i>
						Listado de usuarios
					</a>
				</li>
				<li>
					<a href="{{ URL::route('dashboard.usuarios.create') }}">
						<i class="icon-double-angle-right"></i>
						Agregar usuario
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="{{ URL::route('reportes') }}">
				<i class="icon-table"></i>
				<span class="menu-text"> Reportes </span>
			</a>
		</li>
		<li>
			<a href="{{ URL::route('logout') }}">
				<i class="icon-signout"></i>
				<span class="menu-text"> Cerrar sesión </span>
			</a>
		</li>
		
	</ul><!--/.nav-list-->
	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left"></i>
	</div>
</div>