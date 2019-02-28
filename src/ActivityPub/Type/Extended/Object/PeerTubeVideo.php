<?php

namespace ActivityPub\Type\Extended\Object;

/**
 * \ActivityPub\Type\Extended\Object\Video is an implementation of
 * one of the Activity Streams Extended Types.
 *
 * Represents a video document of any kind.
 *
 * @see https://www.w3.org/TR/activitystreams-vocabulary/#dfn-video
 */

class PeerTubeVideo extends Video
{
  protected $uuid;            
  protected $category;
  protected $language;
  protected $views;
  protected $sensitive;
  protected $waitTranscoding;
  protected $state;
  protected $commentsEnabled;
  protected $support;
  protected $subtitleLanguage;
  protected $likes;
  protected $dislikes;
  protected $shares;
  protected $comments;
  protected $licence;
}
