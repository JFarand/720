<?php 
//Start Session
session_start();
//set posts
if(isset($_SESSION["posts"])){

$post = $_SESSION["posts"];
} else {
	$json = file_get_contents("./posts_07232018-1015.json");
	$post = json_decode($json, true);

	//Set Session variable with json array
	$_SESSION["posts"] = $post;


}

// set url

if(isset($_SESSION["baseurl"])){
	$url = $_SESSION["baseurl"];
} else {
	//Set local url
	$url = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
	$url .= $_SERVER['SERVER_NAME'];
  $url .= isset($_SERVER['HTTPS']) ? '/' : '/2020/hydroplane';	
	$_SERVER["baseurl"] = $url;

}
//Selecting key for post
$postSlug = $_GET['p'];
$key = array_search($postSlug, array_column($post, 'slug'));

//Include head
include 'head.php'; ?>
<body>


	<div id="wrapper" class="drizzle_bg">
		<header id="header" class="onyx_bg">
		</header>
		
		<section class="cards_home brilliant_bg">
		
			<div class="card">
			<ul>
			<?php if(isset($post[$key]['_embedded']['wp:featuredmedia'])) : ?>
				<li class="card-component__image"><img src="<?php echo $url . "/img/".$post[$key]['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['file'];  ?>" alt=""></li>

				<li>
			<?php endif; ?>
				<div class="meta_description">
					<span class="category fira"><?php echo $post[$key]['_embedded']['wp:term'][0][0]['name']; ?></span>
					<span class="title">
						<a href="<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "single.php?p=" . $post[$key]['id']; ?>" target="_self">
						<h1 class="h1 firenzen caps"><?php echo $post[$key]['title']['rendered']; ?></h1>
						</a>
					</span>
					<span class="author_byline fira"><?php echo $post[$key]['_embedded']['author'][0]['name']; ?></span>
				</div> <!-- Close Meta Div -->
			</li>
		</ul>
		<article class="article">
		<?php echo $post[$key]['content']['rendered']; ?>
		</article>
		</div> <!-- Close Card -->
		
	</section>
	</div> <!-- Close Wrapper -->


</body>
</html><!-- Closing HTML -->
