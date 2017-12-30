<?php 

	include 'connection.php';
    
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$query= "SELECT * FROM `users` WHERE `id`= '$id'";
		$result = mysqli_query($conn, $query);
		$row= mysqli_fetch_assoc($result);	
	}
 
	if( isset($_POST['submit']) )
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$id  = $_POST['id'];
		$query  = "UPDATE `users` SET `name`='$name', `email`='$email', `phone`='$phone' WHERE `id`='$id'";
		$result = mysqli_query($conn, $query) or die("Could not update".mysqli_error());
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
		?>
		<script>
			alert('Successfully Update');
		</script>
		<?php
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Information</title>
	<style type="text/css">
		div.title{
			text-align: center;
			background: #eee;
			border: 1px solid #fff;
			color: green;
		}
		div.form, div.table{
			width: 50%;
			height: 250px;
			margin: 0 auto;
			background: #8ca5ce;
		}
		div.table{
			height: auto !important;
		}
		.form .name, .form .email, .form .phone{
			position: relative;
			text-align: center;
			padding: 10px;
		}
		.form input{
			width: 40%;
			padding-left: 5px;
			padding: 5px;
			border-radius: 3px;
		}
		.form button {
			text-align: center;
			padding: 10px;
			position: relative;
			font-weight: 700;
			border-radius: 5%;
			background: #eee;
			cursor: pointer;
			left: 32%;
		}
	</style>
</head>
<body>
	<div class="title">
		<marquee><h3>Update Data to Database</h3></marquee>
	</div>
	<div class="form">
		<form method="post" action="edit.php?edit=<?php echo $row['id']; ?>">
			<div class="name">
				<label for="name">Name</label>
				<input type="text" id="newname" name="name" value="<?php echo $row['name']; ?>">
			</div>	
			<div class="email">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
			</div>	
			<div class="phone">
				<label for="phone">Phone</label>
				<input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
			</div>
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<button type="submit" name="submit" value="submit">Submit</button><br>	
		</form>
	</div>


</body>
</html>