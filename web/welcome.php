Welcome to Hust Lawson Store! <br>
Goods List:
<?php
  $conn = new mysqli('localhost', 'kali', 'kali', 'hustDB');
  if ($conn->connect_error)
  {
    echo '<p>' . 'Connect DB error'. "<br>";
    exit;
  }
  else { 
  	echo '<p>' . 'Connect hustDB Success'. "<br>";
	$sql = "SELECT * FROM goods";
	$result = $conn->query($sql);
 
	if ($result->num_rows > 0) {
    	// 输出数据
    		while($row = $result->fetch_assoc()) {
        		echo $row["id"]. " Item: " . $row["itemname"]. " Price: " . $row["price"]. "<br>";
    		}
	} else {
    		echo '<p>' . 'Empty items in table goods'. "<br>";
		}
	$conn->close();  
	}

?>
