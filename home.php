<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name = "viewport" content = "width = device-width, user-scalable = no" />
<title>Call home</title>
<style type="text/css">
/* @media query for pleasant display on mobile devices */
@media only screen and (max-device-width: 480px) {
#container, form#subForm div {
	width: 90% !important;
}
#container form#subForm input[type=text] {
	width: 86% !important;
}
}
/* Styles to make the text pretty */
body {
	background-color: #1B252D;
	font-family: "Helvetica Neue", Arial, sans-serif;
	-webkit-font-smoothing: antialiased;
}
p, label {
	color: #808C97;
	font-size: 13px;
	line-height: 19px;
	font-weight: bold;
}
#container label {
	text-shadow: 1px 1px #FFF;
}
#container h1 {
	color: #fff;
	font-size: 16px;
	line-height: 19px;
	text-transform: uppercase;
}
#container h1, #container p {
	margin: 15px 30px 15px 30px;
}
/* Setting the width of the container and form box in the browser */
#container {
	width: 385px;
}

form#subForm div {
	width: 325px;
}
/* Formatting the form box */
form#subForm div {
	background:url('pass.gif') repeat;
	-khtml-border-radius:8px;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	padding: 20px 30px;
}
#container form#subForm input[type=text] {
	width: 290px;
	border:1px solid #b2bcc5;
	padding:12px 15px 11px 15px;
	margin:3px 0 15px 0;
	outline:none;
	color:#444;
	font-family:"Helvtica Neue", arial, sans-serif;
	font-size:13px;
	-khtml-border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
}
/* Pretty 'Subscribe' button */
#container form#subForm input[type=submit] {
	cursor:pointer;
	margin: 10px 0 0 0;
	-webkit-appearance:none;
	font-family:"Helvtica Neue", arial, sans-serif;
	font-weight:bold;
	font-size:12px;
	padding:13px 21px 12px 21px;
	border:1px solid #fff;
	color:#fff;
	text-transform:uppercase;
	background-color: #a4d747;
	background-image: -webkit-gradient(linear, left top, left bottom, to(rgb(164, 215, 71)), from(rgb(128, 188, 53)));
	background-image: -webkit-linear-gradient(top, rgb(164, 215, 71), rgb(128, 188, 53));
	background-image: -moz-linear-gradient(top, rgb(164, 215, 71), rgb(128, 188, 53));
	background-image: -o-linear-gradient(top, rgb(164, 215, 71), rgb(128, 188, 53));
	background-image: -ms-linear-gradient(top, rgb(164, 215, 71), rgb(128, 188, 53));
	background-image: linear-gradient(top, rgb(164, 215, 71), rgb(128, 188, 53));
 filter: progid: DXImageTransform.Microsoft.gradient(startColorStr='#a4d747', EndColorStr='#80bc35');
	-khtml-border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	text-shadow:1px 1px #62a717;
	outline:none;
}
#container form#subForm input[type=submit]:active {
	background-color: #80bc35;
	background-image: -webkit-gradient(linear, left top, left bottom, to(rgb(128, 188, 53)), from(rgb(164, 215, 71)));
	background-image: -webkit-linear-gradient(top, rgb(128, 188, 53), rgb(164, 215, 71));
	background-image: -moz-linear-gradient(top, rgb(128, 188, 53), rgb(164, 215, 71));
	background-image: -o-linear-gradient(top, rgb(128, 188, 53), rgb(164, 215, 71));
	background-image: -ms-linear-gradient(top, rgb(128, 188, 53), rgb(164, 215, 71));
	background-image: linear-gradient(top, rgb(128, 188, 53), rgb(164, 215, 71));
 filter: progid: DXImageTransform.Microsoft.gradient(startColorStr='#80bc35', EndColorStr='#a4d747');
	text-shadow:-1px -1px #62a717;
}
</style>
</head>
<body>
<div id="container">
<?php
if(isset($_GET['text'])) {
    $datx = $_GET['text'];
      if(strlen($datx) > 0) {
         $data = $datx . PHP_EOL;
         $ret = file_put_contents('/home/maroen/call/call.txt', $data, FILE_APPEND | LOCK_EX);
            if($ret === false) {
            die( 'There was an error writing this file');
            }
            else {
            header('Location: home.php?send='.$datx);
            unset ($_GET);
            }
     }
}
if (isset($_GET['send'])) {
     echo "<h1>Message send:</h1>";	
     echo "<p>".$_GET['send']."</p>";
     } 
     else {
     echo "<h1>Call home</h1>";
     echo "<p>Please enter your message</p>";
}
?>
<form method="GET" action="home.php" id="subForm">
<div>
<label for="text">Text:</label>
      <br />
<input type="text" name="text" id="text" />
      <br />
<input type="submit" value="Send" />
</form>
</div>
<p>(c) 2014 maroen.nl</p>
</body>
</html>
