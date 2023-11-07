<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$reg_no = $_POST['reg_no'];
		$sur_name = $_POST['sur_name'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$gender = $_POST['gender'];
		$birthday = $_POST['birthday'];
		$marital = $_POST['marital'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$contact_address = $_POST['contact_address'];
		$nationality = $_POST['nationality'];
		$religion = $_POST['religion'];
		$state = $_POST['state'];
		$lga = $_POST['lga'];
		$department = $_POST['department'];
		$yearAdmitted = $_POST['year-admitted'];
		$levelRegex = "";
		if(isset($_POST['level'])){
			$levelRegex = strtolower(preg_replace('/\s+/', '', $_POST['level']));
		}
		$password = $_POST['password'];

		if(!empty($sur_name) && !empty($password) && !empty($reg_no) && !empty($first_name) && !empty($middle_name) && !empty($gender) && !empty($birthday) && !empty($marital) && !empty($email) && !empty($phone_number) && !empty($contact_address) && !empty($nationality) && !empty($religion) && !empty($state) && !empty($lga) && !empty($department) && !empty($yearAdmitted) && !empty($levelRegex))
		{

			//save to database
			$user_id = uniqid();
			$query = "insert into registration (user_id,reg_no, sur_name, first_name, middle_name, gender, birthday, marital, email, phone_number, contact_address, nationality, religion, state, lga, department, year_admitted, level, password) values ('$user_id','$reg_no','$sur_name', '$first_name', '$middle_name', '$gender', '$birthday', '$marital', '$email', '$phone_number', '$contact_address', '$nationality', '$religion', '$state', '$lga', '$department', '$yearAdmitted', '$levelRegex', '$password')";

			mysqli_query($con, $query);
			echo "<p>Signup success.</p>";


			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
		integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous">
</head>
<body>

	<style type="text/css">
	
	/* #text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}


	*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
} */
body{
  /* height: 100vh; */
  /* display: flex; */
  
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: #F6F6F9;
}
.container{
  max-width: 700px;
  margin: 0 auto;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.content form .user-details {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  /* width: calc(100% / 2 - 20px); */
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 /* form input[type="radio"]{
   display: none;
 } */
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: #7380ec;
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: #7380ec;
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
	</style>

	<div id="box">
		
		<!-- <form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form> -->

		<form method="post">
			<div class="container">
				<div class="" style="text-align: center; font-size: 30px;">Students Registration</div>
				<div class="content">
				<form action="#">
					<div class="user-details">
					<div class="input-box">
						<span class="details">Reg Number</span>
						<input type="text" name="reg_no" placeholder="Enter your reg number" required>
					</div>
					<div class="input-box">
						<span class="details">Surname</span>
						<input type="text" name="sur_name" placeholder="Enter your surname" required>
					</div>

					<div class="input-box">
						<span class="details">First Name</span>
						<input type="text" name="first_name" placeholder="Enter your username" required>
					</div>

					<div class="input-box">
						<span class="details">Middle Name</span>
						<input type="text" name="middle_name" placeholder="Enter your username" required>
					</div>

					<div class="">
						<span>Gender</span>
						<section style="display: flex; margin-bottom: 20px; margin-top: 10px;">
							<input type="radio" name="gender" value="male" checked> Male<br>
							<input type="radio" name="gender" value="female"> Female<br>
							<input type="radio" name="gender" value="other"> Other
						</section>
					</div>

					<div class="input-box">
						<label for="birthday">Date Of Birth</label>
  						<input type="date" id="birthday" name="birthday">
					</div>

					<div class="">
						<span>Marital Status</span>
						<section style="display: flex; margin-bottom: 20px; margin-top: 10px;">
							<input type="radio" name="marital" value="male" checked> Single<br>
							<input type="radio" name="marital" value="female"> Married<br>
						</section>
					</div>

					<div class="input-box">
						<span class="details">Email</span>
						<input type="email" name="email" placeholder="Enter your email" required>
					</div>

					<div class="input-box">
						<span class="details">Phone Number</span>
						<input type="number" name="phone_number" placeholder="Enter your number" required>
					</div>

					<div class="input-box">
						<span class="details">Contact Address</span>
						<input type="text" name="contact_address" placeholder="Enter your contact address" required>
					</div>

					<div class="input-box">
						<span class="details">Nationality</span>
						<input type="text" name="nationality" placeholder="Nigeria" required>
					</div>

					<div class="input-box">
						<span class="details">Religion</span>
						<input type="text" name="religion" placeholder="Christianity" required>
					</div>

					<div class="form-group">
						<label class="control-label">State of Origin</label>
						<select onchange="toggleLGA(this);" name="state" id="state" class="form-control">
							<option value="" selected="selected">- Select -</option>
							<option value="Abia">Abia</option>
							<option value="Adamawa">Adamawa</option>
							<option value="AkwaIbom">AkwaIbom</option>
							<option value="Anambra">Anambra</option>
							<option value="Bauchi">Bauchi</option>
							<option value="Bayelsa">Bayelsa</option>
							<option value="Benue">Benue</option>
							<option value="Borno">Borno</option>
							<option value="Cross River">Cross River</option>
							<option value="Delta">Delta</option>
							<option value="Ebonyi">Ebonyi</option>
							<option value="Edo">Edo</option>
							<option value="Ekiti">Ekiti</option>
							<option value="Enugu">Enugu</option>
							<option value="FCT">FCT</option>
							<option value="Gombe">Gombe</option>
							<option value="Imo">Imo</option>
							<option value="Jigawa">Jigawa</option>
							<option value="Kaduna">Kaduna</option>
							<option value="Kano">Kano</option>
							<option value="Katsina">Katsina</option>
							<option value="Kebbi">Kebbi</option>
							<option value="Kogi">Kogi</option>
							<option value="Kwara">Kwara</option>
							<option value="Lagos">Lagos</option>
							<option value="Nasarawa">Nasarawa</option>
							<option value="Niger">Niger</option>
							<option value="Ogun">Ogun</option>
							<option value="Ondo">Ondo</option>
							<option value="Osun">Osun</option>
							<option value="Oyo">Oyo</option>
							<option value="Plateau">Plateau</option>
							<option value="Rivers">Rivers</option>
							<option value="Sokoto">Sokoto</option>
							<option value="Taraba">Taraba</option>
							<option value="Yobe">Yobe</option>
							<option value="Zamfara">Zamafara</option>
						</select>
					</div>

					<div class="form-group">
						<label class="control-label">LGA of Origin</label>
						<select name="lga" id="lga" class="form-control select-lga" required>
						</select>
					</div>

					<div class="input-box">
						<span class="details">Department</span>
						<input type="text" name="department" placeholder="department" required>
					</div>

					<div class="input-box">
						<span class="details">Year Admitted</span>
						<input type="number" name="year-admitted" placeholder="year-admitted" required>
					</div>

					<div class="input-box">
						<span class="details">Level</span>
						<input type="text" name="level" placeholder="year-admitted" required>
					</div>

					<div class="input-box">
						<span class="details">Password</span>
						<input type="text" name="password" placeholder="Enter your password" required>
					</div>
					<div class="input-box">
						<span class="details">Confirm Password</span>
						<input type="text" name="confirm_password" placeholder="Confirm your password" required>
					</div>
					</div>
					
					<div class="button">
					<input type="submit" value="Register">

					
				</div>
				<a href="login.php" style="margin-top: 30px;"> or login up</a>
				</form>
				</div>
			</div>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
		integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
		crossorigin="anonymous"></script>
	<script src="js/lga.min.js"></script>
</body>
</html>