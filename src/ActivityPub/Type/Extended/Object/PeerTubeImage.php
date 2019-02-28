<?php

namespace ActivityPub\Type\Extended\Object;

/**
 * \ActivityPub\Type\Extended\Object\Image is an implementation of
 * one of the Activity Streams Extended Types.
 *
 * An image document of any kind.
 *
 * @see https://www.w3.org/TR/activitystreams-vocabulary/#dfn-image
 */
class PeerTubeImage extends Image
{
  protected $width;
  protected $height;
}

// Useless for the moment
// No distinction from peertube !
