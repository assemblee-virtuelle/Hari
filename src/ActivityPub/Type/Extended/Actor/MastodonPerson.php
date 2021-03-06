<?php

namespace ActivityPub\Type\Extended\Actor;


/**
 * \ActivityPub\Type\Extended\Actor\Person is an implementation of
 * one of the Activity Streams Extended Types.
 *
 * Represents an individual person.
 *
 * @see https://www.w3.org/TR/activitystreams-vocabulary/#dfn-person
 */
class MastodonPerson extends Person
{
    /**
     * @var string
     */
    protected $featured;

    /**
     * @var boolean
     */
    protected $manuallyApprovesFollowers;

}
