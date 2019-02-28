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


// Test Post
// $outbox = $server->outbox($handle);
// var_dump($_SERVER);
// $req = Request::createFromGlobals();
// var_dump($req->headers);
// //$req->headers['accept'];
// $post = $outbox->post($req);
// var_dump($post);
