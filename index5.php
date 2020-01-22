<?php


	$conn = mysqli_connect('localhost', 'root');
	mysqli_select_db($conn, 'formdb');
?>


<!DOCTYPE html>
<html>

<head>
	<TITLE>Form Ajax</TITLE>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

<div class="container col-lg-8">

	<h2 class = "text-center text-danger">get data from database</h2>

	<form >
			
			Username : <input type="text" name="" class="form-control"><br>
			Password : <input type="text" name="" class="form-control"><br>

			Degree : <select class="form-control" onchange="myFunction(this.value)">

				<option>Select Any One</option>

				<?php

				$query = "select * from degree";
				$result = mysqli_query($conn, $query);

				while($rows = mysqli_fetch_array($result)){
					?>

					<option value="<?php echo $rows['mid'] ?>"> <?php echo $rows['degrees'];?></option>
			<?php		
				}
				
			?>

		</select> <br>


		Class : <select class="form-control" id="dataget">
			
				<option>Choose any one</option>

				</select>

				<br><br>

				<button class="btn btn-primary">Submit</button>

		</form>

</div>



<!--java script-->

<script type="text/javascript">
	
	function myFunction(datavalue)
	{
		 //$.ajax({})

		 $.ajax({


		 	url : 'class.php',
		 	type: 'POST',
		 	data : {datapost:datavalue},

		 	success : function(data)
		 	{

		 		if(!data)
        	   {
            		$('#dataget').html("Choose any one");
           		}
           		else{
            	$('#dataget').html(data);
          	}     


		}

		 });

	}


</script>


</body>
</html>