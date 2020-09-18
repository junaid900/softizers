<div class="top_nav">
	<div class="nav_menu">
		<nav>

			<div class="nav toggle">

				<a id="menu_toggle"><i class="fa fa-bars"></i></a>

			</div>


			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<?php 
						

		
						if(!empty($row_mng->image)){
						echo '<img src="images/'.$row_mng->image.'" />';
						}else{ echo '<img src="images/admin.png" />';}
						?>
						<?php echo ucwords($_SESSION[ 'first_name' ]);
                       // $gen->IDencode($_SESSION['user_reg']);
                        ?>



						<span class=" fa fa-angle-down"></span>

					</a>



					<ul class="dropdown-menu dropdown-usermenu pull-right">


						<li><a href="view_user.php?CD=<?=$gen->IDencode($_SESSION['user_reg'])?>"><i class="fa fa-user pull-right"></i> Profile</a>

						</li>

						<li><a href="security.php"><i class="fa fa-lock pull-right"></i> Security</a>

						</li>

						<li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>

						</li>

					</ul>

				</li>

			</ul>

		</nav>

	</div>

</div>