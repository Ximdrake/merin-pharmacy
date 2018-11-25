<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar" >
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="{{ !empty(Auth::user()->image)? Auth::user()->image : '/./img/nobody.jpg'}}" class="img-circle" alt="User Image" >
				</div>
        		<div class="pull-left info"> 
					<p>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
        		</div>
      		</div>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header" style="color: #FFFFFF" >MAIN NAVIGATION</li>
				
				<li class="{{ (Request::path() == 'dashboard') ? 'active' : '' }}">
					<a href="/dashboard" >
						<i class="fa fa-tachometer-alt"></i> <span>Dashboard</span>
						<span class="pull-right-container">
						</span>
					</a>
				</li>
		
                <li class="{{ (Request::path() == 'patients') ? 'active' : '' }}">
					<a href="/patients">
						<i class="fa fa-user"></i> <span>Patient List</span>
						<span class="pull-right-container">
						</span>
					</a>
				</li>

				<li class="{{ (Request::path() == 'doctors') ? 'active' : '' }}">
					<a href="/doctors">
						<i class="fa fa-address-card"></i> <span>Doctor Management</span>
						<span class="pull-right-container">
						</span>
					</a>
				</li>

                
      		</ul>
    	</section>
    	<!-- /.sidebar -->
</aside>