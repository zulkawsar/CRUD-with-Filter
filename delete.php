<?php
	include 'connection.php';
	   
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$query = "DELETE FROM `users` WHERE `id` ='$id'";

		$result = mysqli_query($conn, $query);
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
		?>
		<script>
			alert('Delete Successfully');
		</script>
		<?php
	}
?>