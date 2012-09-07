<?php

include "fotolia-lib.php";

$api = new Fotolia_Api('svBKgX7unls2Y7abxY9pRe8hJacn5MAn');

// searching for files
$results = $api->getSearchResults(
    array(
        'words' => 'avion',
        'language_id' => Fotolia_Api::LANGUAGE_ID_ES_ES,
        'limit' => 10,
    ));

printf("Found %d results", $results['nb_results']);


foreach ($results as $key => $value) {
    // iterating only over numeric keys and silently skip other keys
    if (is_numeric($key)) {
    	//$url = $api->getMediaComp($value['id']);
    	print_r($key);
    	echo '<img src="'.$key["thumbnail_url"].'">';
    }
}
?>