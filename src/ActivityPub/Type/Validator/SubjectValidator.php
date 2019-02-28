<?php

/*
 * This file is part of the ActivityPub package.
 *
 * Copyright (c) landrok at github.com/landrok
 *
 * For the full copyright and license information, please see
 * <https://github.com/landrok/activitypub/blob/master/LICENSE>.
 */

namespace ActivityPub\Type\Validator;

use ActivityPub\Type\Extended\Object\Relationship;
use ActivityPub\Type\Util;
use ActivityPub\Type\ValidatorInterface;

/**
 * \ActivityPub\Type\Validator\SubjectValidator is a dedicated
 * validator for subject attribute.
 */
class SubjectValidator implements ValidatorInterface
{
    /**
     * Validate subject value
     * 
     * @param  string|array|object $value
     * @param  object              $container
     * @return bool
     */
    public function validate($value, $container)
    {
        // Container is a Relationship
        Util::subclassOf(
            $container, 
            Relationship::class,
            true
        );

        // URL
        if (is_string($value)) {
            return Util::validateUrl($value);
        }

        if (is_array($value)) {
            $value = Util::arrayToType($value);
        }

        // Link or ObjectType
        if (is_object($value)) {
            return Util::validateLink($value)
                || Util::isObjectType($value);
        }
    }
}
