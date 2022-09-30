<?php
/**
 * Extract youtube video id from link
 */
function youtubeVideoIdFromLink(string $link): string
{
    if (strstr($link, "youtu.be")) {
        $url = explode("/", $link);
        return  array_pop($url);
    }

    if (strstr($link, "youtube.com")) {
        $params = parse_url($link, PHP_URL_QUERY);

        parse_str($params, $result);

        return $result['v'];
    }

    return '';
}
