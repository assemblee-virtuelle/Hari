<?php

namespace ActivityPub\Type\Core;

class PropertyValue extends ObjectType
{
    /**
     * @var string
     */
    protected $type = 'PropertyValue';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $url;
}
