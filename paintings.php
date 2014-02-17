<!DOCTYPE html>
<html>
<head>
    <title>Matthew Olyphant</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Apartments,Houses,Guest Houses,Spare Bedrooms,Rentals,Rent" />
	<meta name="google-site-verification" content="9_SV6lnp6ABEWiWtxB5WUjEG14I59XtK33ApEJPdSf0" />
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script|Orienta|Alegreya' rel='stylesheet' type='text/css'>
    <link href="css/reset-min.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/base.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="css/jquery-ui-1.9.1.custom.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="css/artwork.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="css/artwork-v2.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body class="page-gallery layout-uniform width-320 v2 test-php" id="" data-arttype="paintings">
	<div class="content">
		<div class="main">
			<div class="gallery-main">
				<em class="gradient-top"></em>
				<ul></ul>
			</div>
			<div class="gallery-menu">
				<div class="gallery-sections">
					<ul class="list-menu menu-opened">
						<li class="title"><a>Paintings</a></li>
						<li class="selected">
							<a>. all paintings</a>
						</li>
						<li class="">
							<a href="gallery.php?type=installations">. installations</a>
						</li>
					</ul>
				</div>
				<ul class="list-menu-tags">
					<span>Tags:</span>
					<a data-tagValue="art" class="size-2">art</a>
					<a data-tagValue="artist" class="size-2">artist</a>
					<a data-tagValue="acrylic" class="size-8">acrylic</a>
					<a data-tagValue="abstract" class="size-3">abstract</a>
					<a data-tagValue="canvas" class="size-9">canvas</a>
					<a data-tagValue="colorful" class="size-6">colorful</a>
					<a data-tagValue="contemporary" class="size-4">contemporary</a>
					<a data-tagValue="chicago" class="size-3">chicago</a>
					<a data-tagValue="cityscape" class="size-9">cityscape</a>
					<a data-tagValue="painting" class="size-10">painting</a>
				</ul>
				<ul class="pagination pagination-gallery">
					<li class="previous"><a></a></li>
					<li class="next"><a></a></li>
				</ul>
			</div>
		</div>
		<div class="nav nav-main">
			<div class="nav-wrapper">
				<ul>
					<li class="first"><a href="gallery.php?type=paintings"><span>gallery</span></a></li>
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
	<div class="dialog dialog-gallery-large" id="gallery-large">
		<a class="gallery-large-pagination pagination-previous"><em><i></i></em></a>
		<img width="" height="" alt="test" alt="title" />
		<a class="gallery-large-pagination pagination-next"><em><i></i></em></a>
	</div>
	<script id="template-gallery-item" type="text/x-handlebars-template">
		<li data-index="{{index}}"><a href="img/artwork/{{type}}/large/{{imgUrl}}" data-width="{{width}}" data-height="{{height}}" data-orientation="{{orientation}}" data-index="{{index}}"><img width="320" height="240" src="img/artwork/{{type}}/thumbnail/{{imgUrl}}" alt="{{title}}" title="{{title}}" /></a></li>
	</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
	<script src="js/libraries/handlebars-v1.1.2.js"></script>
	<script src="js/libraries/handlebars.helpers.js"></script>
	<script src="js/libraries/firebase.js"></script>
	<script src="js/helpers.js"></script>
	<script type="text/javascript" src="js/global.js"></script>
	<script type="text/javascript" src="js/gallery.js"></script>
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
