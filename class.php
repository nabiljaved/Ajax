<?php

	
	$degreeid = $_POST['datapost'];


	$conn = mysqli_connect('localhost', 'root');
	mysqli_select_db($conn, 'formdb');

	$query = "select * from classes where mid = '$degreeid' ";
	$result = mysqli_query($conn, $query);


					while($rows = mysqli_fetch_array($result)){
					?>

					<option> <?php echo $rows['class'];?> </option>
			<?php		
				}
				
			?>


