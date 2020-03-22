
		<style>
		.notif{
			top: 60px;
			right: 0px;
			left: unset;
			width: 460px;
			box-shadow: 0px 5px 7px -1px #c1c1c1;
			padding-bottom: 0px;
			padding: 0px;
		}
		.notif:before{
			content: "";
			position: absolute;
			top: -20px;
			right: 12px;
			border:10px solid #343A40;
			border-color: transparent transparent #343A40 transparent;
		}
		.notif-head{
			padding:5px 15px;
			border-radius: 3px 3px 0px 0px;
		}
		.notif-footer{
			padding:5px 15px;
			border-radius: 0px 0px 3px 3px; 
		}
		.notif-notification-box{
			padding: 10px 0px; 
		}
		</style>
		<!-- Jumbotron -->
        <div class="card card-image" style="background-image: url(img/index.jpg); background-repeat: no-repeat; background-size: cover;">
			  <div class="text-white text-center rgba-stylish-strong py-5 px-4">
			    <div class="py-5">

			    </div>
			  </div>
			</div>
			<!-- Jumbotron -->
		<!--Navbar -->
			<nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color-dark lighten-1 sticky-top">
				<a class="navbar-brand" href="#">
			    	<img src="logo.png" height="40" alt="mdb logo">
			  	</a>
				  <a class="navbar-brand" href="#">Advisemate</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar_advisemate"
				    aria-controls="navbar_advisemate" aria-expanded="false" aria-label="Toggle navigation">
				  </button>             
				  <div class="collapse navbar-collapse" id="navbar_advisemate">
                    <ul class="navbar-nav ml-auto nav-flex-icons">
							<!-- NOTIF-->
							<li class="nav-item dropdown">
								<a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-bell"></i>
									<span class="badge badge-secondary"><?php echo student_lack_grades($con); ?></span>
								</a>
								<ul class="dropdown-menu notif">
								<li class="notif-head text-light info-color-dark">
									<div class="row">
									<div class="col-lg-12 col-sm-12 col-12">
										<span>Notifications (3)</span>
										<a href="" class="float-right text-light">Mark all as read</a>
									</div>
								</li>
								<li class="notif-notification-box">
									<div class="row">
									<?php $connect = mysqli_connect("localhost", "root", "", "advisemate");
										$user_id = $_SESSION["uid"];
										$query = "SELECT
										students.student_id,
										grades.student_id,    
										subjects.sub_unit,
										subjects.sub_code,
										subjects.sub_desc,
										subjects.sub_prereq,
										grades.grade, 
										grades.grade_status
										FROM subjects
										LEFT JOIN grades ON subjects.sub_code = grades.sub_code 
										LEFT JOIN students ON (grades.student_id = students.student_id)
										WHERE (grades.grade = '4.0' OR grades.grade = '5.0' OR grades.grade = 'INCOMPLETE' OR grades.grade = 'INC')
										AND grades.student_id = '$user_id'
										AND students.student_id = '$user_id'
										LIMIT 5";

										$result = mysqli_query($connect, $query);
										if (!$result) 
											{
												printf("Error: %s\n", mysqli_error($connect));
												exit();
											}
										while($row = mysqli_fetch_array($result))  
											{
										?>
										<div class="col-lg-3 col-sm-3 col-3 text-center">
											<i class="fa fa-exclamation-circle" aria-hidden="true"></i>
										</div>
										<div class="col-lg-8 col-sm-8 col-8">
											<strong class="text-info"><?php echo $row['grade']; ?></strong>
											<div>
												<?php echo $row['sub_desc']; ?>
											</div>
											<small class="text-warning"><?php echo $row['sub_code']; ?></small>
										</div>
											</br> 
									<?php
										}?>
										
									</div>
								</li>
								<li class="notif-footer info-color-dark text-center">
									<a href="" class="text-light">View All</a>
								</li>
								</ul>
							</li>
							 <!-- Notif -->
                            <li class="nav-item avatar dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                                	<a class="dropdown-item waves-effect waves-light" href="logout.php">Logout</a>
									<a class="dropdown-item waves-effect waves-light" href="update_yrlvl.php">Update YrLvl</a>
									
                                </div>
                            </li>
                        </ul>
				  </div>
			</nav>
