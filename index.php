<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<style type="text/css">
		div.title{
			text-align: center;
			background: #eee;
			border: 1px solid #fff;
			color: green;
			width: 50%;
			margin: 0 auto;
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
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		td, th {
		    border: 1px solid #fff;
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}
		.error {
			float: right;
			color: #acffdf;
		}
		table .data{
			color: #312e47;
		}
	</style>
</head>
<body>
	<div class="title">
		<marquee><h3>Insert Data to Database</h3></marquee>
	</div>
	<div class="form">

		<?php 
			// Insert Data
			include 'insert-data.php';
		?>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="name">
				<label for="name">Name</label>
				<input type="text" id="name" name="name">
				<span class="error">* <?php echo $nameErr;?></span>
			</div>	
			<div class="name">
				<label for="email">Email</label>
				<input type="email" id="email" name="email">
				<span class="error">* <?php echo $emailErr;?></span>
			</div>	
			<div class="phone">
				<label for="phone">Phone</label>
				<input type="text" id="phone" name="phone">
				<span class="error">* <?php echo $phoneErr;?></span>
			</div>
			<button type="submit" name="submit" value="submit">Submit</button><br>	
			<marquee behavior="alternate"> <span class="error"><?php echo $error;?></span></marquee>
		</form>

	</div>
	<!-- For View Update Delete Data -->
	<div class="title">
		<marquee direction="right"> <h3>@@ View & Update & Delete & Filter @@</h3></marquee>
	</div>

	<div class="table">
		<!-- View Data -->
		<?php
			include 'view-data.php'; 
		?>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="text" name="valueToSearch" placeholder="name email or phone" style="width: 50%; padding: 6px 6px; border-radius: 4px;"><br>
            <input type="submit" name="search" value="Filter"><br><br>
		
		<table>
			<thead>
				<tr>
				    <th>Name</th>
				    <th>Email</th>
				    <th>Phone</th>
				    <th>Action</th>
				</tr>
			</thead>
			<tbody>


				 <?php while($row = mysqli_fetch_array($search_result)):?>
					<tr>
					  <td class="data"><?php echo $row['name']; ?></td>
					  <td class="data"><?php echo $row['email']; ?></td>
					  <td class="data"><?php echo $row['phone']; ?></td>
					  <td>
					  	<a href="edit.php?edit=<?php echo $row['id']; ?>" type="button">Update</button>
					  	<a href="delete.php?delete=<?php echo $row['id']; ?>" type="button">Delete</button>
					  </td>
					</tr>
				<?php endwhile ?>
			</tbody>

		</table>
		</form>
	</div>
</body>
</html> 