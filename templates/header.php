<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=2, shrink-to-fit=yes">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
        
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
<!--    <link href="../public/css/bootstrap.min.css" rel="stylesheet"> --> 
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../public/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../public/css/style.css" rel="stylesheet">
    <link href="../public/css/bootstrap-theme.min.css" rel="stylesheet"/>
    <link href="../public/css/styles.css" rel="stylesheet"/> 

    <?php if (isset($title)): ?>
        <title>Kowie Museum: <?= htmlspecialchars($title) ?></title>
    <?php else: ?>
        <title>Kowie Museum</title>
    <?php endif ?>

    <!-- SCRIPTS -->
    <!-- JQuery -->
<!--    <script type="text/javascript" src="../public/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap tooltips -->
<!--    <script type="text/javascript" src="../public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
<!--    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
<!--    <script type="text/javascript" src="../public/js/mdb.min.js"></script>
	 <!-- Local scripts -->
    <script src="../public/js/scripts.js"></script>
  </head>

  <body>
    <div class="container">
       <div id="top">
     	    <table border="0" cellpadding="0" cellspacing="0" width="100%">
   	      <tr>
	         	<td align="center" bgcolor="#5d8eb6" valign="top">
		           <h1><font color="white">Kowie Museum<br>Eastern Cape People History</font></h1>
		         </td>
	         </tr>
	       </table>
	       <table border="0" cellpadding="0" cellspacing="0" width="100%">
	         <tr>
		        <td align="left" width="50%">Search client: <?php echo $_SESSION["first_name"] . " " . $_SESSION["surname"] ?> </td>
		        <td align="right" width="50%">Timestamp: <?php echo date("Y-m-d H:i:s T"); ?></td>
	         </tr>
	         <tr>
		        <td align="left" width="50%">Search number: <?php echo $_SESSION["search_count"] ?> </td>
		        <td align="right" width="50%">Membership expiry: <?php echo $_SESSION["member_exp"]; ?> </td>
	         </tr>
	       </table>
		 <?php
    		require("../templates/menu.php");
		 ?>
       </div>

       <div id="middle">
