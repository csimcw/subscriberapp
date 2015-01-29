<?php
/*
error_reporting(E_ALL);
require 'PHPMailer\class.phpmailer.php';
require 'PHPMailer\class.smtp.php';

$mail = new PHPMailer;
	
$mail->IsSMTP(); // send via SMTP
//$mail->SMTPDebug      = 1;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "acsimcw@gmail.com"; // SMTP username
$mail->Password = "csimcw2015"; // SMTP password
$webmaster_email = "acsimcw@gmail.com"; //Reply to this email ID
$email="v.sam.jacob@gmail.com"; // Recipients email ID
$name="Sam"; // Recipient's name
$mail->From = $webmaster_email;
$mail->FromName = "Webmaster";
$mail->AddAddress($email,$name);
$mail->AddReplyTo($webmaster_email,"Webmaster");
$mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
$mail->IsHTML(true); // send as HTML
$mail->Subject = "This is the subject";
$mail->Body = "Hi,
This is the HTML BODY "; //HTML Body
$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Message has been sent";
}*/
/*
*	Mailer script ending...
*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memorial Church | Registration Form</title>

    <!-- Bootstrap -->
    <link href="media/css/bootstrap.min.css" rel="stylesheet">
	<link href="media/css/bootstrap-theme.css" rel="stylesheet">
	<link rel="stylesheet" href="media/css/datepicker.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9] -->
      <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		body{
			background:lightgoldenrodyellow;
		}
		h2{
			color:purple;
		}
		h3{
			color:green;
		}
		select#baptism.form-control.input-lg{			
			width:70px !important;
		}
		select#baptism.form-control.input-lg{
			width:70px !important;
		}
		select#baptism.form-control.input-lg{
			width:70px !important;
		}
		#myIframe{
			width:600px;
			height:600px;
		}
		.navbar{
			margin-bottom:0px !important;			
		}
		#editor {overflow:scroll;min-height:380px;}
	</style>
  </head>
  <body>
  
  <img src="media/images/Head.png" width="100%" />
 	<nav class="navbar navbar-default" style="background:azure;"/>
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<ul class="nav nav-pills">					
					<li role="presentation" ><a href="registeration.php">Registration</a></li>
					<li role="presentation"><a href="members.php">Congregation members</a></li>
					<li role="presentation"><a href="subscription.php">Subscription</a></li>
					<li role="presentation" class="active"><a href="Sendmail.php">Email</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>
					<li role="presentation"><a href="login.php?q=logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
  <div class="container">
  <h1>Send Email</h1>
  
  <div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="country" id="country" class="form-control input-lg" placeholder="From Email Address" tabindex="54">
					</div>
				</div>
			</div>
	<div class="row">		
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="zipcode" id="zipcode" class="form-control input-lg" placeholder="To Email Address" tabindex="55">
					</div>
				</div>
			</div>
  
  <div class="row">
  
    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
      <div class="btn-group">
        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font"><i class="glyphicon glyphicon-font"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></li><li><a data-edit="fontName Sans" style="font-family:'Sans'">Sans</a></li><li><a data-edit="fontName Arial" style="font-family:'Arial'">Arial</a></li><li><a data-edit="fontName Arial Black" style="font-family:'Arial Black'">Arial Black</a></li><li><a data-edit="fontName Courier" style="font-family:'Courier'">Courier</a></li><li><a data-edit="fontName Courier New" style="font-family:'Courier New'">Courier New</a></li><li><a data-edit="fontName Comic Sans MS" style="font-family:'Comic Sans MS'">Comic Sans MS</a></li><li><a data-edit="fontName Helvetica" style="font-family:'Helvetica'">Helvetica</a></li><li><a data-edit="fontName Impact" style="font-family:'Impact'">Impact</a></li><li><a data-edit="fontName Lucida Grande" style="font-family:'Lucida Grande'">Lucida Grande</a></li><li><a data-edit="fontName Lucida Sans" style="font-family:'Lucida Sans'">Lucida Sans</a></li><li><a data-edit="fontName Tahoma" style="font-family:'Tahoma'">Tahoma</a></li><li><a data-edit="fontName Times" style="font-family:'Times'">Times</a></li><li><a data-edit="fontName Times New Roman" style="font-family:'Times New Roman'">Times New Roman</a></li><li><a data-edit="fontName Verdana" style="font-family:'Verdana'">Verdana</a></li></ul>
      </div>
      <div class="btn-group">
        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font Size"><i class="glyphicon glyphicon-text-height"></i>&nbsp;<b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
          <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
          <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
          </ul>
      </div>
      <div class="btn-group">
        <a class="btn btn-primary" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)"><i class="glyphicon glyphicon-bold"></i></a>
        <a class="btn btn-primary" data-edit="italic" title="" data-original-title="Italic (Ctrl/Cmd+I)"><i class="glyphicon glyphicon-italic"></i></a>
        <a class="btn btn-primary" data-edit="underline" title="" data-original-title="Underline (Ctrl/Cmd+U)"><i class="glyphicon glyphicon-text-width"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn btn-primary" data-edit="insertunorderedlist" title="" data-original-title="Bullet list"><i class="glyphicon glyphicon-list"></i></a>
        <a class="btn btn-primary" data-edit="insertorderedlist" title="" data-original-title="Number list"><i class="glyphicon glyphicon-list-alt"></i></a>
        <a class="btn btn-primary" data-edit="outdent" title="" data-original-title="Reduce indent (Shift+Tab)"><i class="glyphicon glyphicon-indent-left"></i></a>
        <a class="btn btn-primary" data-edit="indent" title="" data-original-title="Indent (Tab)"><i class="glyphicon glyphicon-indent-right"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn btn-primary" data-edit="justifyleft" title="" data-original-title="Align Left (Ctrl/Cmd+L)"><i class="glyphicon glyphicon-align-left"></i></a>
        <a class="btn btn-primary" data-edit="justifycenter" title="" data-original-title="Center (Ctrl/Cmd+E)"><i class="glyphicon glyphicon-align-center"></i></a>
        <a class="btn btn-primary" data-edit="justifyright" title="" data-original-title="Align Right (Ctrl/Cmd+R)"><i class="glyphicon glyphicon-align-right"></i></a>
        <a class="btn btn-primary" data-edit="justifyfull" title="" data-original-title="Justify (Ctrl/Cmd+J)"><i class="glyphicon glyphicon-align-justify"></i></a>
      </div>
      <div class="btn-group">
      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Hyperlink"><i class="glyphicon glyphicon-link"></i></a>
        <div class="dropdown-menu input-append">
          <input class="span2" placeholder="URL" type="text" data-edit="createLink">
          <button class="btn" type="button">Add</button>
        </div>
        <a class="btn btn-primary" data-edit="unlink" title="" data-original-title="Remove Hyperlink"><i class="glyphicon glyphicon-remove"></i></a>

      </div>

      <div class="btn-group">
        <a class="btn btn-primary" title="" id="pictureBtn" data-original-title="Insert picture (or just drag &amp; drop)"><i class="glyphicon glyphicon-picture"></i></a>
        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 37px; height: 30px;">
      </div>
      <div class="btn-group">
        <a class="btn btn-primary" data-edit="undo" title="" data-original-title="Undo (Ctrl/Cmd+Z)"><i class="glyphicon glyphicon-backward"></i></a>
        <a class="btn btn-primary" data-edit="redo" title="" data-original-title="Redo (Ctrl/Cmd+Y)"><i class="glyphicon glyphicon-forward"></i></a>
      </div>
    </div>
    
    <div id="editor" class="panel col-md-10">
      Go ahead..
    </div>
  
  </div>
  <div class="row">
				<div class="col-xs-12 col-md-12"><input type="submit" name="submitreg" value="Send" class="btn btn-primary btn-lg" tabindex="7">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset" class="btn btn-primary  btn-lg" tabindex="7"></div>
				<!--<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>-->
			</div><br/><br/>

</div>
</body>
<link href="media/css/jquery-ui.css" rel="stylesheet" type="text/css" />
		
		<script src="media/js/jquery-1.11.2.min.js"></script>
		<script src="media/js/jquery-ui.min.js"></script>
        <script src="media/js/bootstrap.js"></script>
		
		<script src="http://mindmup.github.io/bootstrap-wysiwyg/external/jquery.hotkeys.js"></script>
		<script src="http://mindmup.github.io/bootstrap-wysiwyg/bootstrap-wysiwyg.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                

  $('#editor').wysiwyg();
  $('#editor').cleanHtml();

});

               
			

        </script>
		<nav class="navbar navbar-default" style="text-align:center; background:palegoldenrod;"/>
		<div>
			&copy;All rights reserved 2015, CSI Memorial Church, Whitefield, Bangalore
		</div>		
</nav>	
</body>
</html>