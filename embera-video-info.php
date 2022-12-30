<?php
/**
 * salvo info video con Embera
 */
use Embera\Embera;


// salvo info video
$embera = new Embera(['responsive' => true]);

// Aggiunta "rel=0" per non mostrare suggerimenti generici
$embera->addFilter(function ($response) {
    if (!empty($response['html']) && $response['embera_provider_name'] == 'Youtube') {
        $response['html'] = str_ireplace('feature=oembed', 'feature=oembed&rel=0', $response['html']);
    }
    return $response;
});

$videoinfo = $embera->getUrlData({youtubeLink});

