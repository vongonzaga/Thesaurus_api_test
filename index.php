<?php

if(!empty($_GET['word'])){
	$thesaurus_url = 'http://words.bighugelabs.com/api/2/61b2f6bce73d772dc18ac42858279145/'. urlencode($_GET['word']) .'/json';

	$thesaurus_json = file_get_contents($thesaurus_url);
	$thesaurus_array = json_decode($thesaurus_json, true);

	$synonym = $thesaurus_array['noun']['syn'];
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Thesaurus Api</title>
		<meta name="viewport" content="width=device-width , initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="search-form">
				<p class="form-title">Search</p>

				<div class="display-labels">
						<img src="img/magnify-glass.svg">
						<p><span>Synonyms</span></p>
				</div>

				<div class="row actual-form">
					<form action="">
						<div class="col-sm-9">
							<input type="text" name="word" value="<?php if (isset($_GET["word"])) { echo htmlspecialchars($_GET["word"]); } ?>"/>
						</div>
						<div class="col-sm-3 search-btn-container">
							<button type="submit">Search</button>
						</div>
					</form>
				</div>
				<p class="current-text"><?php if (isset($_GET["word"])) { echo htmlspecialchars($_GET["word"]); } ?></p>
			</div>
			<ul class="word-list">
				<?php
							for ($var = 0; $var < sizeof($synonym); $var++) 
								echo "<li><p>" . 
								$synonym[$var] .
								"</p></li>";
				?>
			</ul>
			<div class="ads-container">
				<img class="ads" src="img/ads.png">
			</div>
		</div>
	</body>
</html>