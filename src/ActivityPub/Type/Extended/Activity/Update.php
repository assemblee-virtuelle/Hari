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

use ActivityPub\Type\Core\Activity;

/**
 * \ActivityPub\Type\Extended\Activity\Update is an implementation of 
 * one of the Activity Streams Extended Types.
 *
 * Indicates that the actor has updated the object. Note, however, that 
 * this vocabulary does not define a mechanism for describing the actual
 * set of modifications made to object.
 * 
 * The target and origin typically have no defined meaning.  
 *
 * @see https://www.w3.org/TR/activitystreams-vocabulary/#dfn-update
 */
class Update extends Activity
{
    /**
     * @var string
     */
    protected $type = 'Update';
}
