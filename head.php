<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php include $_SERVER['DOCUMENT_ROOT']."/720/gajs.php"; ?>
	<meta charset="UTF-8">
	<title>OWL's Asylum</title>
	<link rel="shortcut icon" href="./favicon.ico">
	<!-- Manifest file -->
	<link rel="manifest" href="./manifest.json">
	
	<!-- CSS -->
<style type="text/css">
	<?php include './poisonforcrows.php'; ?>


</style>
	<meta name="msapplication-TileColor" content="#87af4a">
	<meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#87af4a">
	
	 <!-- Meta -->
    <meta name="author" content="Jay OWL Farand">  
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:creator" content="@owlsasylum" />
    <meta property="twitter:site" content="@owlasylum" />  
    <!-- <meta property="og:url" content="https://owlasylum.net"> -->
	 <script>
		if ('serviceWorker' in navigator) {
		  window.addEventListener('load', function() {
			 navigator.serviceWorker.register('/sw.js').then(function(registration) {
				// Registration was successful
				console.log('ServiceWorker registration successful with scope: ', registration.scope);
			 }, function(err) {
				// registration failed :(
				console.log('ServiceWorker registration failed: ', err);
			 });
		  });
		}
		</script>
	
	<style type="text/css">
	<?php include 'style.php'; ?>
 </style>
</head>
