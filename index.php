<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/vendor/autoload.php';

use ActivityPub\Type;
use ActivityPub\Server;
use Symfony\Component\HttpFoundation\Request;


// Create a server instance
$server = new Server();

// Set a handle with any ActivityPub account
$handle = 'https://mamot.fr/@tchevengour';
$handle1 = 'phpc@phpc.social';

// Set a handle with any PeerTube account
$handle3 = 'https://videos.lescommuns.org/accounts/albertrognard';
$handle4 = 'datagueule@peertube.datagueule.tv';

//  Test Outbox
// [
  // Get an actor's outbox as an OrderedCollection

  $outbox = $server->outbox($handle1);

  $page = $outbox->getPage($outbox->get()->first)->orderedItems;




// Affichage des données de la outbox
  foreach ($page as $key) {
    echo '<div style="margin-bottom: 2rem;">';
    echo 'Type : '.$key->object->type.'<>br>';
    echo 'Id : '.$key->object->id.'<br>';
    echo 'Actor : '.$key->object->attributedTo.'<br>';
    echo 'Content :'.$key->object->content.'<br>';
    if ($key->object->attachment) {
      foreach ($key->object->attachment as $url) {
        echo 'Image : <img src="'.$url->url.'"><br>';
      }
    }
    echo 'DatePublication : '.$key->object->published.'<br>';
    echo 'Url : <a href="'.$key->object->url.'">Source</a><br>';
    echo '</div>';
  }
// ]


$data = [
  '@context' => 'https://www.w3.org/ns/activitystreams',
  'type' => 'Note',
  'to' => '["https://phpc.social/users/Nasuk"]',
  'attributedTo' => 'https://mamot.fr/@tchevengour',
  'content' => 'Test Note'
];

$jdata = json_encode($data);
var_dump($jdata);
//var_dump($_SERVER);
$xserv = $_SERVER;
$xserv['HTTP_ACCEPT'] = 'application/ld+json; profile="https://www.w3.org/ns/activitystreams"';
var_dump($xserv);
// $r = new R();
$req = new Request($_GET, $_POST, [], $_COOKIE, $_FILES, $xserv, $jdata);

// $ra = $r->get('https://mamot.fr/@tchevengour');


//var_dump($ra);
var_dump(Util::decodeJson((string)$req->getContent()));
var_dump($req->headers->get('accept'));

var_dump(Helper::validateAcceptHeader($req->headers->get('accept')));


// Test Post
$ot = $outbox->post($req);
var_dump($ot);
