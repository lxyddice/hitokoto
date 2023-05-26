<?php
$jsonData = file_get_contents('sentences/version.json');
$data = json_decode($jsonData, true);
$sentences = $data['sentences'];
$randomSentence = $sentences[array_rand($sentences)];
$jsonPath = $randomSentence['path'];
$jsonData = file_get_contents($jsonPath);
$jsonArray = json_decode($jsonData, true);
$randomHitokoto = $jsonArray[array_rand($jsonArray)];
if ($_GET['do'] == "text"){
    echo $randomHitokoto['hitokoto'];
} else {
    header('Content-Type: application/json');
    $r = $randomHitokoto;
    echo json_encode($r, JSON_PRETTY_PRINT);
}
?>
