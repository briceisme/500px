<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="style_500.css" />
<link rel="stylesheet" href="fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
<script src="https://code.jquery.com/jquery-2.2.1.min.js" type="application/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="application/javascript"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox.js"></script>


<title>Galerie de photos de briceis.me // provenance api 500px.com</title>
</head>
<body>
<header id="top">
	<h1><i class="fa fa-camera-retro fa-lg"></i> Galerie Photos <a href="http://www.briceis.me">briceis.me</a></h1>
</header>
<main>
	<p class="presentation">
		Photographe récréatif sans prétentions et sans véritable thème de prédilection, j'aime saisir l'instant, ainsi qu'admirer le travail de photographes connus ou amateurs comme moi.<br />
		Je capture avec un Nikon D7100 avec objectif kit 18-105, un sigma 18-55 2.8 et un 50mm 1.8, le tri et les retouches se font sur Photoshop & Lightroom.<br />
		Les photos présentées ci-dessous et bien plus encore sont disponibles sur ma galerie <a href="https://500px.com/bricemouget" target="_blank">500px</a>
        Le code source de ce micro portail se trouve sur <a href="" target="_blank">Github</a>
	</p>
<?php

function showpre($display){
    echo "<pre>";
    print_r($display);
    echo "</pre>";
}

// clé perso de l'API 500px
// generez là ici : https://500px.com/settings/applications
$key = "";


// on va chercher les données via l'api 500px & notre key
$json = file_get_contents("https://api.500px.com/v1/photos?feature=user&username=bricemouget&sort=created_at&image_size=3&include_store=store_download&include_states=voted&consumer_key=" . $key);
$json2 = file_get_contents("https://api.500px.com/v1/photos?feature=user&username=bricemouget&sort=created_at&image_size=5&include_store=store_download&include_states=voted&consumer_key=" . $key );


// on met le résultat en json
$json = json_decode($json);
$json2 = json_decode($json2);

// showpre($json->photos[0]);

// nombre de photos à traiter / afficher
$nb_photos = 12;



?>
<ul>
<?php


// boucle
for($i=0;$i<$nb_photos;$i++){
    echo "<li class='pic'>";
	echo "<a class='images_500' rel='galerie' href='". $json2->photos[$i]->images[0]->url . "?.jpg";
    echo "'><img src=' ";
    echo $json->photos[$i]->images[0]->url;
    echo "' alt='". $json->photos[$i]->name ."'>\n";
    echo "<span class='desc'><span>" . $json->photos[$i]->name . "</span></span></a></li>";
}
?>
</ul>
</main>

<a class="fa fa-chevron-circle-up retour" href="#top"></a>

<footer><a href="http://www.briceis.me">www.briceis.me</a> & <a href="https://500px.com/bricemouget" target="_blank">500px.com/bricemouget</a></footer>

</body>
</html>
