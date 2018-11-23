<!DOCTYPE html>

<html> 	
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>PharmAssist</title>

	<link rel="shortcut icon" type="image/png" href="/./img/favicon.png"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.bootstrap.min.css">
	<link rel="stylesheet" href="/css/app.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  	<header class="main-header">
		<!-- Logo -->
		<a href="" class="logo" style="background-color: #ae0c07">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><img src="/./img/pharma2.png" alt="pharmAssist logo" style="width: 40px; height: 40px;"></span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><img src="/./img/pharma2.png" alt="pharmAssist logo" style="width: 40px; height: 40px;"><b>&nbsp PharmAssist</b></span>
		</a>

		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top" style="background-color: #ae0c07">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="/./img/avatar5.png" class="user-image" alt="User Image">
							<span class="hidden-xs">{{ Auth::user()->firstname }}</span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="/./img/avatar5.png" class="img-circle" alt="User Image">
							
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="#" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="/logout" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
  	</header>
	@include('includes.sidebar')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@yield('content')
    <!-- /.content -->
  	</div>
  	<!-- /.content-wrapper -->

  	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Developed By</b> <a href="https://www.facebook.com/solidscript/">Solid Script Web Systems</a>
		</div>
    	<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    	reserved. PharmAssist 2018
  	</footer>
</div>
<!-- ./wrapper -->
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script 
  src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
  crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript">
	var restart=0; 

	 function tick(){
	 	restart++;
	 	if(restart==500){
	 		location.reload();
	 	}
    //get the mins of the current time
    var mins = new Date().getMinutes();
    var hours =  new Date().getHours();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12;
    var strTime;

    if(mins == "55"){
    	if(hours==12){
         strTime = (1) +" "+ ampm;   
        }else{
         strTime = (hours+1) +" "+ ampm;
        }
       
        console.log(strTime);
       $.ajax({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"/sendMessage",
        method: 'POST',
        dataType:'text',
        data:{data:strTime},
        success:function(data){
            console.log(data);
            setTimeout(() => { clearInterval(time)});
           
        },
        error: function(data){
           console.log('error');
        }
    })
       
     }
}
let time = setInterval(tick, 5000);
</script>
@yield('script')
</body>
</html>
