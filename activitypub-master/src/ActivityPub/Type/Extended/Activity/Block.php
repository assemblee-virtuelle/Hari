<?php

/*
 * This file is part of the ActivityPub package.
 *
 * Copyright (c) landrok at github.com/landrok
 *
 * For the full copyright and license information, please see
 * <https://github.com/landrok/activitypub/blob/master/LICENSE>.
 */

namespace ActivityPub\Type\Extended\Activity;

/**
 * \ActivityPub\Type\Extended\Activity\Block is an implementation of 
 * one of the Activity Streams Extended Types.
 *
 * Indicates that the actor is blocking the object. Blocking is a 
 * stronger form of Ignore. The typical use is to support social systems 
 * that allow one user to block activities or content of other users. 
 * The target and origin typically have no defined meaning.
 *
 * @see https://www.w3.org/TR/activitystreams-vocabulary/#dfn-block
 */
class Block extends Ignore
{
    /**
     * @var string
     */
    protected $type = 'Block';
}
