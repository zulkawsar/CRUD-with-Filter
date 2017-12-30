<?php $nameErr = $emailErr = $phoneErr = $error = "";

if (isset($_POST['submit'])) {
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
  		
	if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
		$sql = "INSERT INTO users (name, email, phone) VALUES ('$name','$email','$phone')";
		if ($conn->query($sql)=== TRUE) {
			?>
			<script>
				alert('Successfully Inserted');
			</script>
			<?php
		}else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else{
		$error = "Please Check All Field";
	}
	
}
?>