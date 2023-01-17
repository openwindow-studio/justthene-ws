<?php

$url = $_GET['url'];
$rss_xml = @file_get_contents($url);
$xml = simplexml_load_string($rss_xml, "SimpleXMLElement", LIBXML_NOCDATA);
$rss_json = json_encode($xml);
$rss_array = json_decode($rss_json, TRUE);

if (is_array($rss_array) && isset($rss_array['channel']['item']) && is_array($rss_array['channel']['item']) && count($rss_array['channel']['item']) > 0) {
    $data['rss_feed'] = $rss_array['channel']['item'];
    echo json_encode($data);
} else {
    echo 'failed to get data';
}