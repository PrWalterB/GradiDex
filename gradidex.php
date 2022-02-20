<!DOCTYPE html>
<html>
<head>
<title>GradiDex - Langues-Regionales.org - GNU-GPLv3</title>
<!-- Sah vu que je le publie je vais devoir faire des commentaires pour avoir l'air sérieux >:^( -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>

<body>
<?php
//Fonction pour couper les entrées en fonction des barres
function splitBar($income) {
		$spliter = explode("|",$income);
		return $spliter;
}

function splitPoint($income) {
		$spliter = explode(";",$income);
		return $spliter;
}
//Fonction pour retourner la ligne contenant un mot recherché
function getFileLine($chemin, $recherche) {
	$contents = file_get_contents($chemin);
	$pattern = preg_quote($recherche,'/');
	$pattern = "/^.*$pattern.*\$/m";
	if(preg_match_all($pattern, $contents, $matches)){
		return $matches[0][0];
	}
	else{
		printf("Mot ou expression introuvable. :^/");
	}
}
//Fonction créant un tableau contenant les lignes de tout les fichiers où le mot est recherché
function getFilesWith($folder, $searchFor) {
	if($folder) {
		$foundArray = array();
		$foundContent = array();
		foreach(glob($folder . sprintf("*")) as $file) {
			$content = file_get_contents($file);
			if(strpos($content, $searchFor) !== false) {
				$crdv = getFileLine($file, "crdv");
				$crdx = getFileLine($file, "crdx");
				$crdy = getFileLine($file, "crdy");
				$mot = getFileLine($file, $searchFor);
				$foundContent[] = array($crdv, $crdx, $crdy, $mot);
				$foundArray[] = $file;
			}
		}
		if(count($foundArray)) {
			return $foundContent;
		} else {
			echo"";
		}
	} else {
		echo "";
	}
}

//Fonction pour trouver plusieurs résultats
function lineByLine($folder, $recherche) {
	if ($file = fopen($folder, "r")) {
		$foundMatch = array();
		while(!feof($file)) {
			$textperline = fgets($file);
			$pattern = preg_quote($recherche,'/');
			$pattern = "/^.*$pattern.*\$/m";
			if(preg_match_all($pattern, $textperline, $matches)){
				$foundMatch[] = $matches[0][0];
			}
		}
		return $foundMatch;
		fclose($file);
	}
}


function listFile($folder){
	$fileList = glob($folder.'*');
	$foundLex = array();
	foreach($fileList as $filename){
		$filename = str_replace($folder,'',$filename);
		$foundLex[] = $filename;
	}
	return $foundLex;
}
$lex = str_replace('>','',str_replace('<','',$_GET['lex']));
if ($lex == ''){
	$lex = 'paris';
}
?>

<!--Formulaire de recherche -->
<form action"" method="get">
Rechercher dans le GradiDex, dans le lexique de 
<select name='lex'>
<?php
$lexList = listFile('dexs/');
foreach ($lexList as $i){
	echo '<option ';
	if ($i == $lex){
		echo 'selected="yes"';
	}
	echo '>'.$i.'</option>';
}
?>
</select>
:
<input type=text name="recherche">
<br>
<input type=submit value="Rechercher" name="s">
<?php
if(isset($_GET['s'])){
	$recherche = str_replace('>','',str_replace('<','',$_GET['recherche']));
	$lex = str_replace('>','',str_replace('<','',$_GET['lex']));
}
?>
</form>

<?php
if ($recherche == ''){
	$recherche = 'crdv';
}
//On cherche le mot dans le lexique choisi, et on prend l'ID du mot, mais avant ça on regarde si ya pas des homonymes.
$matches = lineByLine('dexs/'.$lex,$recherche);
if (sizeof($matches) > 1){
	echo 'Plusieurs homonymes trouvés:<br>';
	foreach ($matches as $i){
		$j = splitBar($i);
		echo '<a href="gradidex.php?'.'lex='.$lex.'&'.'recherche='.$j[0].'&s=Rechercher">'.str_replace('<br>',' ',$j[1]).'</a><br>';
	}
}
else {
	$id = splitBar(getFileLine("dexs/".$lex,$recherche))[0];
}
//On cherche les mots correspondant dans tout les lexiques grâce à l'ID + les coordonnées correspondantes et le nom de la Ville.
$matched_files = getFilesWith('dexs/', $id);
//Séparation en plusieurs tableaux pour les envoyer dans le code JS
$mot = array();
$x = array();
$y = array();
$ville = array();
foreach ($matched_files as $i) {
	$motus[] = splitBar($i[3])[1];
	$type[] = splitPoint(splitBar($i[3])[1])[0];
	$mot[] = splitPoint(splitBar($i[3])[1])[1];
	$prcs[] = splitPoint(splitBar($i[3])[1])[2];
	$api[] = splitPoint(splitBar($i[3])[1])[3];
	$font[] = splitPoint(splitBar($i[3])[1])[4];
	$x[] = splitBar($i[1])[1];
	$y[] = splitBar($i[2])[1];
	$ville[] = splitBar($i[0])[1];
}
echo "Espéranto: ".substr($id, 1);
?>
<div id="mapid" style="width: 600px; height: 600px;"></div>
<script>
//Pramètres par défaut de la map OSM
var mymap = L.map('mapid').setView([46.800059, 1.867676], 6);
//Réception des variables PHP
var type = <?php echo json_encode($type); ?>;
var mot = <?php echo json_encode($mot); ?>;
var prcs = <?php echo json_encode($prcs); ?>;
var api = <?php echo json_encode($api); ?>;
var font = <?php echo json_encode($font); ?>;
var x = <?php echo json_encode($x); ?>;
var y = <?php echo json_encode($y); ?>;
var ville = <?php echo json_encode($ville); ?>;
//Code machin de la map OSM chais pas trop j'ai juste copié collé
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);
//Boucle for pour ajouter les marqueurs de mots sur la map (ça c'est moi qui l'ai codé jle jjur)
	for (i in mot){
		L.marker([+(x[i]), +(y[i])]).addTo(mymap)
		.bindPopup(`<i>${type[i]} </i><b>${mot[i]}</b> ${prcs[i]}<br><i>${api[i]}</i> ${font[i]}`).openPopup();

	}

//Ça c'est pas moi qui l'ai fait mais c'est pratique pour ceux qui veulent faire un nouveau lexique du coup je l'ai laissé
	function onMapClick(e) {
		popup
		.setLatLng(e.latlng)
		.setContent("Coordonnées: " + e.latlng.toString())
		.openOn(mymap);
	}mymap.on('click', onMapClick);
</script>
</body>
</html>
