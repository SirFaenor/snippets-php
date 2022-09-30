<?php
/**
 * Extract youtube video id from link
 */
function youtubeVideoIdFromLink(string $link): string
{
    if (strpos($link, "youtu.be") !== false) {
        $url = explode("/", $link);
        return  array_pop($url);
    }

    if (strpos($link, "youtube.com") !== false) {
        $params = parse_url($link, PHP_URL_QUERY);

        parse_str($params, $result);

        return $result['v'];
    }

    return '';
}
