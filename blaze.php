<?php 
include "connnection.php";
?>

<?php 

	$allfieldErr = "";
	$nocustErr = "";

if(isset($_POST["button1"]))
{
 	if (empty($_POST['cname']) || empty($_POST['trnsfrname']) || empty($_POST['amount'])) {
 	
		$allfieldErr = " *All fields are required";		
	}
	  $myname = "select name from customers where name = '".$_POST['cname']."'";
		$ress = mysqli_query($link, $myname);
		$row = mysqli_fetch_assoc($ress);
		$finalname = ($row['name']);
		

		$custname = "select name from customers where name = '".$_POST['trnsfrname']."'";
		$resss = mysqli_query($link, $custname);
		$row = mysqli_fetch_assoc($resss);
		$finalcust = ($row['name']);
		

	if (($finalname==$_POST['cname']) && ($finalcust==$_POST['trnsfrname'])) {
			
		$value = "select curbal from customers where name = '".$_POST['trnsfrname']."' ";
		$res = mysqli_query($link, $value);
		$row = mysqli_fetch_assoc($res);
		$finalvalue = ($row['curbal']);


		mysqli_query($link, "update customers set curbal=$finalvalue + $_POST[amount] where name ='".$_POST['trnsfrname']."' " );


		mysqli_query($link, "insert into transfer(myname, toname, transframt) values ('".$_POST['cname']."','".$_POST['trnsfrname']."',$_POST[amount])" );
		
		}

	else {
		$nocustErr = " *No Such Customer Exists";
	}
	
	

}

?>


<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
    <link rel="stylesheet" href="css/kayning.css">
	<title>test</title>
</head>
<body>
<a href="customer.html"><img class="back_btn" src="img/back.png"></a>
<div class="main_div">
        <img id="kayning_img" src="img/12.png">
        <img id="pay_rect" src="img/payrect.png">
        <div class="trnsfr_card">
            <img id="transfr_img" src="img/transfer.png">
            <img id="card_img" src="img/card.png">

            <img id="monthspend_img" src="img/monthspend.png">

            <img id="monthoutcome_img" src="img/monthoutcome.png">
        </div>
    </div>



<form action="" method="post">

<input type="text" name="cname" class="n_ame">


<input type="text" name="trnsfrname" class="t_name" >


<input type="text" name="amount" class="a_mount">
		<input type="submit" name="button1" class="btn">

<p class="error">
 <?php 
 echo $allfieldErr;
 
 ?>
 <br>

 <p class="error2">
 <?php 
 echo $nocustErr;
 
 ?>
 	
 </p>

	</form>

</body>
</html>

