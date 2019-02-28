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

use ActivityPub\Type\Core\Activity;
use ActivityPub\Type\Core\ObjectType;
use ActivityPub\Type\Extended\Object\Relationship;
use ActivityPub\Type\Util;
use ActivityPub\Type\ValidatorInterface;

/**
 * \ActivityPub\Type\Validator\ObjectValidator is a dedicated
 * validator for object attribute.
 */
class ObjectValidator implements ValidatorInterface
{
    /**
     * Validate an object value
     *
     * @param  string|array|object $value
     * @param  object              $container
     * @return bool
     */
    public function validate($value, $container)
    {
        // Container is an ObjectType or a Link
        Util::subclassOf(
            $container,
            [Activity::class, Relationship::class],
            true
        );
        
        // URL
        if (is_string($value)) {
            return Util::validateUrl($value);
        }

        // Array
        if (is_array($value)) {
            $value = Util::arrayToType($value);
        }

        // Link or Object
        if (is_object($value)) {
            return Util::validateLink($value)
                || Util::isObjectType($value);
        }

        // Collection
        if (is_array($value)) {
            foreach ($value as $item) {
                if (is_string($item) && Util::validateUrl($item)) {
                    continue;
                } elseif (is_array($item)) {
                    $item = Util::arrayToType($item);
                }

                if (is_object($item)
                    && Util::subclassOf($item, [ObjectType::class], true)) {
                    continue;
                }

                return false;
            }

            return count($value) && true;
        }
    }
}
