<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geekfarm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// SQL Join
$sql = "SELECT ID, NAME, AGE, AMOUNT 
  FROM CUSTOMERS, ORDERS
  WHERE CUSTOMERS.ID = ORDERS.CUSTOMER_ID";
$result = $conn->query($sql);
$dataBaru = "<tr> <td>AAA </td>  <td>BBB</td> <td>CCC</td> <td>DDD</td>  </tr>";
$dataFinal = "";

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table> <tr> <th>ID </th>  <th>Name</th> <th>age</th> <th>amount</th>  </tr>";
    while($row = $result->fetch_assoc()) {
		$dataFinal = str_replace("AAA",$row["ID"], $dataBaru);
		$dataFinal = str_replace("BBB",$row["NAME"], $dataFinal);
		$dataFinal = str_replace("CCC",$row["AGE"], $dataFinal);
		$dataFinal = str_replace("DDD",$row["AMOUNT"], $dataFinal);
		
		echo $dataFinal ;
		
    }
	echo "</table>";
} else {
    echo "0 results";
}
echo " <br><br>= = = = = INNER JOIN = = = =  = <br><br>";

$sql2 = "SELECT ID, NAME, AMOUNT, DATE
         FROM CUSTOMERS
		INNER JOIN ORDERS
		ON CUSTOMERS.ID = ORDERS.CUSTOMER_ID";
$result2 = $conn->query($sql2);
$dataBaru2 = "<tr> <td>AAA </td>  <td>BBB</td> <td>CCC</td> <td>DDD</td>  </tr>";
$dataFinal2 = "";

if ($result2->num_rows > 0) {
    echo "<table> <tr> <th>ID </th>  <th>Name</th> <th>Amount</th> <th>Date</th>  </tr>";
    while($row = $result2->fetch_assoc()) {

		$dataFinal2 = str_replace("AAA",$row["ID"], $dataBaru2);
		$dataFinal2 = str_replace("BBB",$row["NAME"], $dataFinal2);
		$dataFinal2 = str_replace("CCC",$row["AMOUNT"], $dataFinal2);
		$dataFinal2 = str_replace("DDD",$row["DATE"], $dataFinal2);
		
		echo $dataFinal2 ;	
    }
	echo "</table>";
} else {
    echo "0 results";
}

echo " <br><br>= = = = = LEFT JOIN = = = =  = <br><br>";

$sql3 = "SELECT ID, NAME, AMOUNT, DATE
         FROM CUSTOMERS
		 LEFT JOIN ORDERS
		ON CUSTOMERS.ID = ORDERS.CUSTOMER_ID";
$result3 = $conn->query($sql3);
$dataBaru3 = "<tr> <td>AAA </td>  <td>BBB</td> <td>CCC</td> <td>DDD</td>  </tr>";
$dataFinal3 = "";

if ($result3->num_rows > 0) {
    echo "<table> <tr> <th>ID </th>  <th>Name</th> <th>Amount</th> <th>Date</th>  </tr>";
    while($row = $result3->fetch_assoc()) {

		$dataFinal3 = str_replace("AAA",$row["ID"], $dataBaru3);
		$dataFinal3 = str_replace("BBB",$row["NAME"], $dataFinal3);
		$dataFinal3 = str_replace("CCC",$row["AMOUNT"], $dataFinal3);
		$dataFinal3 = str_replace("DDD",$row["DATE"], $dataFinal3);
		
		echo $dataFinal3 ;		
    }
	echo "</table>";
} else {
    echo "0 results";
}

echo " <br><br>= = = = = 4. RIGHT JOIN = = = =  = <br><br>";
$sql4 = "SELECT ID, NAME, AMOUNT, DATE
		FROM CUSTOMERS
		RIGHT JOIN ORDERS
		ON CUSTOMERS.ID = ORDERS.CUSTOMER_ID";
$result4 = $conn->query($sql4);
$dataBaru4 = "<tr> <td>AAA </td>  <td>BBB</td> <td>CCC</td> <td>DDD</td>  </tr>";
$dataFinal4 = "";

if ($result4->num_rows > 0) {
    echo "<table> <tr> <th>ID </th>  <th>Name</th> <th>Amount</th> <th>Date</th>  </tr>";
    while($row = $result4->fetch_assoc()) {

		$dataFinal4 = str_replace("AAA",$row["ID"], $dataBaru4);
		$dataFinal4 = str_replace("BBB",$row["NAME"], $dataFinal4);
		$dataFinal4 = str_replace("CCC",$row["AMOUNT"], $dataFinal4);
		$dataFinal4 = str_replace("DDD",$row["DATE"], $dataFinal4);
		
		echo $dataFinal4 ;			
    }
	echo "</table>";
	
} else {
    echo "0 results";
}

echo " <br><br>= = = = = 5. FULL JOIN/UNION = = = =  = <br><br>";
$sql5 = " SELECT ID, NAME, AMOUNT, DATE
			FROM CUSTOMERS
			LEFT JOIN ORDERS
			ON CUSTOMERS.ID = ORDERS.CUSTOMER_ID
			UNION ALL
			SELECT  ID, NAME, AMOUNT, DATE
			FROM CUSTOMERS
			RIGHT JOIN ORDERS
			ON CUSTOMERS.ID = ORDERS.CUSTOMER_ID;";
$result5 = $conn->query($sql5);
$dataBaru5 = "<tr> <td>AAA </td>  <td>BBB</td> <td>CCC</td> <td>DDD</td>  </tr>";
$dataFinal5 = "";

if ($result5->num_rows > 0) {
    echo "<table> <tr> <th>ID </th>  <th>Name</th> <th>Amount</th> <th>Date</th>  </tr>";
    while($row = $result5->fetch_assoc()) {

		$dataFinal5 = str_replace("AAA",$row["ID"], $dataBaru5);
		$dataFinal5 = str_replace("BBB",$row["NAME"], $dataFinal5);
		$dataFinal5 = str_replace("CCC",$row["AMOUNT"], $dataFinal5);
		$dataFinal5 = str_replace("DDD",$row["DATE"], $dataFinal5);
		
		echo $dataFinal5 ;			
    }
	echo "</table>";
} else {
    echo "0 results";
}

echo "<br><br> = = = = =6. SELF JOIN  = = = =  = <br><br>";
$sql6 = "SELECT a.ID, b.NAME, a.SALARY 
      FROM CUSTOMERS a, CUSTOMERS b 
      WHERE a.SALARY < b.SALARY ";
$result6 = $conn->query($sql6);
$dataBaru6 = "<tr> <td>AAA </td>  <td>BBB</td> <td>CCC</td></tr>";
$dataFinal6 = "";

if ($result6->num_rows > 0) {
    echo "<table> <tr> <th>ID </th>  <th>Name</th> <th>Salary</th>   </tr>";
    while($row = $result6->fetch_assoc()) {

		$dataFinal6 = str_replace("AAA",$row["ID"], $dataBaru6);
		$dataFinal6 = str_replace("BBB",$row["NAME"], $dataFinal6);
		$dataFinal6 = str_replace("CCC",$row["SALARY"], $dataFinal6);
		echo $dataFinal6 ;
    }
	echo "</table>";
} else {
    echo "0 results";
}

echo " <br><br>= = = = =7. Cartesian join = = = =  = <br><br>";

$sql7 = "SELECT ID, NAME, AMOUNT, DATE 
      FROM CUSTOMERS, ORDERS";
$result7 = $conn->query($sql7);
$dataBaru7 = "<tr> <td>AAA </td>  <td>BBB</td> <td>CCC</td> <td>DDD</td>  </tr>";
$dataFinal7 = "";


if ($result7->num_rows > 0) {
    echo "<table> <tr> <th>ID </th>  <th>Name</th> <th>Amount</th> <th>Date</th>  </tr>";
    while($row = $result7->fetch_assoc()) {
		$dataFinal7 = str_replace("AAA",$row["ID"], $dataBaru7);
		$dataFinal7 = str_replace("BBB",$row["NAME"], $dataFinal7);
		$dataFinal7 = str_replace("CCC",$row["AMOUNT"], $dataFinal7);
		$dataFinal7 = str_replace("DDD",$row["DATE"], $dataFinal7);
		
		echo $dataFinal7 ;
    }
	echo "</table>";

} else {
    echo "0 results";
}




$conn->close();
?>


</body>
</html>