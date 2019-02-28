<?php

/*
 * This file is part of the ActivityPub package.
 *
 * Copyright (c) landrok at github.com/landrok
 *
 * For the full copyright and license information, please see
 * <https://github.com/landrok/activitypub/blob/master/LICENSE>.
 */

namespace ActivityPub\Type\Extended\Object;

/**
 * \ActivityPub\Type\Extended\Object\Page is an implementation of 
 * one of the Activity Streams Extended Types.
 * 
 * Represents a Web Page.
 * 
 * @see https://www.w3.org/TR/activitystreams-vocabulary/#dfn-page
 */ 
class Page extends Document
{
    /**
     * @var string
     */
    protected $type = 'Page';
}
