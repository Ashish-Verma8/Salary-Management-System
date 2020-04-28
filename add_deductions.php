<?php
	
		require("db.php");
		
		@$id 			= $_POST['id'];
		@$ppf 			= $_POST['ppf'];
		@$med 			= $_POST['med'];


		$sql = mysqli_query($connection,"UPDATE dedemp SET ppf='$ppf', med='$med' WHERE id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Deductions successfully updated...');
		            window.location.href='home_deductions.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>