<?php session_start(); ?>
<?php include('connection.php'); ?>
<?php
									if (isset($_POST['login']))
										{
											$username = mysqli_real_escape_string($con, $_POST['user']);
											$password = mysqli_real_escape_string($con, $_POST['pass']);
											
											$query      = mysqli_query($con, "SELECT * FROM users WHERE  password='$password' and username='$username'");
											$row        = mysqli_fetch_array($query);
											$num_row    = mysqli_num_rows($query);
											
											if ($num_row > 0) 
												{           
													$_SESSION['id']=$row['id'];
													header('location:home.php');
													
												}
											else
												{
													// <div class="alert alert-danger" id="myAlert">
													// <a href="#" class="close">&times;</a>
													// <strong>Hey you!</strong> Try to close this alert message.
													// </div>
/* 													$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>'; */
												}
										}
?>