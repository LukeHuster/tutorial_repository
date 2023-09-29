<?php
	header("Content-type:text/html;charset=utf-8");
	$conn=new mysqli("localhost","kali","kali","hustDB");
	if ($conn->connect_error){
		die("connect_error:".$conn->connect_error);
	}
	echo "<p>"."connect to DB success"."<br>";
	if(isset($_POST["sub"])) 
		{
			$name=$_POST["username"];
			$inputpassword=$_POST["password"];
			$sql="select password from users where username="."'"."$name"."' and password="."'"."$inputpassword"."'";
			echo $sql;			
			$result=$conn->query($sql);
			if(mysqli_num_rows($result)>0)
			{
				echo"登录成功！";
				echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."登录成功！"."\"".")".";"."</script>";
				echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."welcome.php"."\""."</script>";
			}
  			else{
  				echo "login fail";
				echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."登录失败！!"."\"".")".";"."</script>";
        			echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html"."\""."</script>";
			}
		}
		else{
			echo "Empty input";
		}
?>