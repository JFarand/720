<?php
//Start session
//
//
session_start();
ini_set("allow_url_fopen", 1);
//SET json data
//$json = file_get_contents("http://localhost/2017/wp-json/wp/v2/posts/?categories=635&per_page=53&_embed");
//$json = file_get_contents("./posts_10092018-1546.json");
$inputurl = "https://www.owlasylum.net/anput/wp-json/wp/v2/posts/?categories=4,5&per_page=53&_embed";
$json = file_get_contents($inputurl);
/* function get_content($url){
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt( $ch, CURLOPT_URL, $url);
	$curldata = curl_exec($ch);
	curl_close($ch);
	return $curldata;
} 
$json = get_content($inputurl);*/
$data = json_decode($json, true);

//Set Session variable with json array
$_SESSION["posts"] = $data;

//Set local url
$url = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
$url .= $_SERVER['SERVER_NAME'];
$url .= $_SERVER['REQUEST_URI'];
$_SERVER["baseurl"] = $url;



?>
<?php include 'head.php'; ?>
<body>

	<div id="wrapper" class="drizzle_bg">
		<header id="header" class="onyx_bg">
		</header>
		<section class="cards_home brilliant_bg">
		<?php foreach($data as $post): ?>
			<?php //WordPress API variables
			if(isset($post['_embedded']['wp:featuredmedia'])){
				$image = $post['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['source_url'];
			}
			?>


			<div class="card">
			<ul>
			<?php if(isset($image)) : ?>
				<li class="card-component__image"><img src="<?php echo $image;  ?>" alt=""></li>
			<?php endif; ?>
				<li>
			
				<div class="meta_description">
					<span class="category fira"><?php echo $post['_embedded']['wp:term'][0][0]['name']; ?></span>
					<span class="title">
						<a href="<?php echo $url . $post['_embedded']['wp:term'][0][0]['slug'] . "/" . $post['slug']; ?>" target="_self">
						<h3 class="h3 firenzen cap"><?php echo $post['title']['rendered']; ?></h3>
						</a>
					</span>
					<span class="author_byline fira"><?php echo $post['_embedded']['author'][0]['name']; ?></span>
				</div> <!-- Close Meta Div -->
			</li>
		</ul>
		</div> <!-- Close Card -->
		<?php endforeach; ?>
	</section>
	</div> <!-- Close Wrapper -->
	<footer>copyright &copy; 2009</footer>
</body>
</html>
