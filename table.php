<!DOCTYPE html>
<html>
<head>
<meta  name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Transaction history</title>
<style >
*{
    margin: 0;
    padding: 0;
}
body, html {
  height: 100%;
  margin: 0;
}
body {
    background-color: #EBEBEB;
}

.topnav{
	border-radius: 12px;
	overflow: hidden;
	background-size: cover;
	height:150px;

}
.topnav a{
	float: right;
	color: black;
	text-align: center;
	padding: 14px 20px;
	text-decoration: none;
	font-size: 30px;
}
#first{
	float: left;
	color: #4A4C59;
}
#trans_money{
	font-family: Poppins;
	font-weight: bold;
	font-size: 30px;
	position: absolute;
    top: 8%;
    left: 39%;

    width: 50%;
    height: auto;
}
table{
	border-radius: 13px; 
	margin-top: 10px;
	margin-left: 70px;
	border-collapse: collapse;
	width: 90%;
	color: black;
	font-family: Poppins;
	font-size: 25px;
	text-align: center;
}
th{
	background-color: #F481A5 ;
	color: white;
}
tr:nth-child(even) {background-color: #894BBA;}

.back_btn {
    position: absolute;
    top: 5%;
    left: 90%;

    width: 4%;
    height: auto;
}
</style>
</head>
<body>
<div class="topnav">

<a href="customer.html"><img class="back_btn" src="img/back.png"></a>
</div>
<!-- header ends here -->
<label id="trans_money">TRANSACTION HISTORY</label>
<table>
<tr>
<th>Id</th>
<th>Sender</th>
<th>Recipient</th>
<th>Amount</th>
</tr>
<?php
$link = mysqli_connect("localhost","root","") or die(mysqli_error($link));
mysqli_select_db($link,"test") or die(mysql_error($link));

$sql ="SELECT id,myname,toname,transframt from transfer";
$result =$link->query($sql);

if ($result-> num_rows > 0) {
while ($row = $result-> fetch_assoc()) {
echo "<tr><td>". $row["id"] . "</td><td>". $row["myname"] ."</td><td>". $row["toname"] . "</td><td>". $row["transframt"] ."</td></tr>";
}
echo "</table>";
}
else {
echo "0 result";
}
$link->close();
?>
</table>
</body>
</html>