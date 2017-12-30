<?php 

	 if(isset($_POST['search']))
	{
	    $valueToSearch = $_POST['valueToSearch'];
	    // search in all table columns
	    // using concat mysql function
	    $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `name`, `email`, `phone`) LIKE '%".$valueToSearch."%'";
	    $search_result = filterTable($query);
		   
	}
	 else {
	    $query = "SELECT * FROM `users`";
	    $search_result = filterTable($query);
	}

	// function to connect and execute the query
	function filterTable($query)
	{
	   	include 'connection.php';
	    $filter_Result = mysqli_query($conn, $query);
	    return $filter_Result;
	}

	?>