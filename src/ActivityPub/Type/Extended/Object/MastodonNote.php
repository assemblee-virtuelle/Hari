<?php

namespace ActivityPub\Type\Extended\Object;

/**
 * \ActivityPub\Type\Extended\Object\Note is an implementation of
 * one of the Activity Streams Extended Types.
 *
 * Represents a short written work typically less than a single
 * paragraph in length.
 *
 * @see https://www.w3.org/TR/activitystreams-vocabulary/#dfn-note
 */

class MastodonNote extends Note
{
    /**
     * @var boolean
     */
    protected $sensitive;

    /**
     * @var string
     */
    protected $atomUri;

    /**
     * @var string
     */
    protected $inReplyToAtomUri;

    /**
     * @var string
     */
    protected $conversation;
}
