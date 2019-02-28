<?php

/*
 * This script emulates an ActivityPub response to a profile request.
 * It returns expected responses from an ActivityPub peer.
 */

$validAccount = 'bob@' . $_SERVER['HTTP_HOST'];
$preferredUsername = substr($validAccount, 0, strpos($validAccount, '@'));

header('Content-Type: application/jrd+json');
echo json_encode([
        'id'   => 'http://' . $_SERVER['HTTP_HOST'] . '/accounts/' . $preferredUsername,
        'type' => 'Person',
        'preferredUsername' => $preferredUsername,
        'outbox' => 'http://' . $_SERVER['HTTP_HOST'] . '/accounts/' . $preferredUsername . '/outbox',
    ]
    , JSON_PRETTY_PRINT
);
