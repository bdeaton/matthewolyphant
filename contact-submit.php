<!DOCTYPE html>
<html>
<head>
    <title>Matthew Olyphant</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Apartments,Houses,Guest Houses,Spare Bedrooms,Rentals,Rent" />
	<meta name="google-site-verification" content="9_SV6lnp6ABEWiWtxB5WUjEG14I59XtK33ApEJPdSf0" />
		
    <!--global stylesheet begin-->  
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script|Orienta|Alegreya' rel='stylesheet' type='text/css'>
    <link href="css/reset-min.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/base.css" media="screen" rel="stylesheet" type="text/css" />
    <!--global stylesheet end-->

    <!--section-specific css begin--> 
	<link href="css/contact.css" media="screen" rel="stylesheet" type="text/css" />
	<!--section-specific css end-->
    

	
      <script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
	
	
</head>
<?php
if(isset($_POST['email'])) {
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contact@matthewolyphant.com";
    $email_subject = "Contact Form Submission";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Contact form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->

<body class="page-contact" id="">
	<div class="content">
		<div class="main">
			<div class="content-primary">
				<h3>Contact</h3>
				<div class="col col1">
					<p>Thank you for contacting us. We will be in touch with you very soon.</p>
				</div>
				<div class="imagery imagery-contact">
					<img src="img/matthew-olyphant-contact-page-gold-color-vertical-cropped.jpg" width="290" height="" alt="Matthew Olyphant Contact Page (Color photo)" title="Matthew Olyphant Contact Page (Color photo)" />
				</div>

				
			</div>
		</div>
		<div class="nav nav-main">
			<div class="nav-wrapper">
				<ul>
					<li class="first"><a href="paintings.html"><span>gallery</span></a></li>
					<li class="separator"><i></i></li>
					<li><a href="exhibits.html"><span>exhibits</span></a></li>
					<li class="separator"><i></i></li>
					<li><a href="bio.html"><span>bio</span></a></li>
					<li class="separator"><i></i></li>
					<li><a href="contact.html"><span>contact</span></a></li>
					<li class="logo"><a href="index.html"><span>MatthewOlyphant.com</span></a></li>
				</ul>
			</div>
		</div>
	</div>
<?php
}
?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="js/jcarousel/jquery.jcarousel.min.js"></script>-->
	<script type="text/javascript" src="js/global.js"></script>
	<script type="text/javascript" src="js/contact.js"></script>
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("UA-12577254-1");
	pageTracker._trackPageview();
	} catch(err) {}</script>
</body>
</html>
