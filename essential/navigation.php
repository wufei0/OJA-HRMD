<?php


echo '<ul class="nav navbar-nav pull-right">
		<li ><a href="home.php">Home</a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Application <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li class="dropdown-header">Personal Data Sheet</li>
					
						
						<li><a href="pds.php">Update PDS</a></li>
						<li><a href="lib\pdf\pds.php" target="_blank">Print PDS</a></li>
					
				<li class="divider"></li>
				<li class="dropdown-header">Application </li>
				<li><a href="apply.php">Job Openings</a></li>
				<li><a href="applications.php">My Application</a></li>
				<!-- <li class="divider"></li>
				<li class="dropdown-header">Portfolio</li>
				<li><a href="#">Portfolio 1</a></li>
				<li><a href="#">Portfolio 2</a></li> --!>
			</ul>
		</li>

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li class="dropdown-header">Applications</li>
				<li class=""><a href="rptListofOpenPosition.php">List of Open Position</a></li>
				<li class=""><a href="rptListofApplicants.php">List of Applicants</a></li>
			</ul>

		</li>

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Maintenance <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li class="dropdown-header">Job</li>
				<li><a href="position.php">Position</a></li>
				<li><a href="applicationlist.php">Applications</a></li>
				<li class="divider"></li>
				<li class="dropdown-header">Portfolio</li>
				<li><a href="#">Portfolio 1</a></li>
				<li><a href="#">Portfolio 2</a></li>
			</ul>
		</li>
		<li><a href="#">Help</a></li>
	</ul>';


// echo "
// // <nav class='navbar navbar-inverse1 navbar-static-top marginBottom-0' role='navigation'>
// // <div class='collapse navbar-collapse' id='navbar-collapse-1'>
// // 	<ul class='nav navbar-nav navbar-right'>
// // 		<li><a href='#'>Homme</a></li>

// // 		<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Test</a>
// // 			<ul class='dropdown-menu'>
// // 				<li class='dropdown dropdown-submenu'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Sub menu</a>
// // 					<ul class='dropdown-menu'>
// // 						<li><a href='#'><span>1</span></a></li>
// // 						<li><a href='#'><span>2</span></a></li>
// // 					</ul>
// // 				</li>
// // 			</ul>
// // 		</li>

// // 	</ul>
// // </div>
// // </nav>
// ";

// echo '
// 	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
//     <div class="container">
//         <div class="navbar-header">
//             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">  
//                 <span class="sr-only">Toggle navigation</span>
//                 <span class="icon-bar"></span>
//                 <span class="icon-bar"></span>
//                 <span class="icon-bar"></span>
//             </button>
//         </div>
//         <div class="collapse navbar-collapse navbar-ex1-collapse">
//             <ul class="nav navbar-nav">
//                 <li class="menu-item dropdown">
//                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop Down<b class="caret"></b></a>
//                     <ul class="dropdown-menu">
//                         <li class="menu-item dropdown dropdown-submenu">
//                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Level 1</a>
//                             <ul class="dropdown-menu">
//                                 <li class="menu-item ">
//                                     <a href="#">Link 1</a>
//                                 </li>
//                                 <li class="menu-item dropdown dropdown-submenu">
//                                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Level 2</a>
//                                     <ul class="dropdown-menu">
//                                         <li>
//                                             <a href="#">Link 3</a>
//                                         </li>
//                                     </ul>
//                                 </li>
//                             </ul>
//                         </li>
//                     </ul>
//                 </li>
//             </ul>
//         </div>
//     </div>
// </div>
// ';

?>