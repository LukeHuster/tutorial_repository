<?php
	$conn=new mysqli("localhost","kali","kali","hustDB");//链接数据库
	header("Content-type:text/html;charset=utf-8");
  	if ($conn->connect_error)
  	{
   	 	echo '<p>' . 'Connect DB error'. "<br>";
    		exit;
  	}
	 echo '<p>' . 'Connect DB success'. "<br>";	
    	//echo"链接数据库成功";
      	if(isset($_POST["sub"]))
     	{
		$name=$_POST["username"];
		$password1=$_POST["password"];//获取表单数据
		$password2=$_POST["password2"];
		if($name==""||$password1=="")//判断是否填写
		{
		  echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写完成！"."\"".")".";"."</script>";
		  echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>"; 
		  exit;
		}
		if($password1==$password2)//确认密码是否正确
		{
		 $sql="select * from users where username="."'"."$name"."'";
		 echo '<p>'."$sql"."<br>";
		 $result=$conn->query($sql);
		 if($result->num_rows>0)//判断数据库表中是否已存在该用户名
			{	
			echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."该用户名已被注册"."\"".")".";"."</script>";
			echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";   
			exit; 
		 	}
		 $sql="insert into users (username,password) values ("."\""."$name"."\"".","."\""."$password1"."\"".")";//将注册信息插入数据库表中
		 echo '<p>'."$sql"."<br>";
		 if($conn->query($sql)==TRUE){
		    	echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."用户注册完成"."\"".")".";"."</script>";
		    	echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html"."\""."</script>"; 
		 }
	    
		 $conn->close();

       		}
       		else
        	{
          	echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."密码不一致！"."\"".")".";"."</script>";
		echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";    
		}

      	} //end if(isset($_POST["sub"]))

?>