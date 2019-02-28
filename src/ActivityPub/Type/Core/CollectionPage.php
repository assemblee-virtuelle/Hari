<?php

/*
 * This file is part of the ActivityPub package.
 *
 * Copyright (c) landrok at github.com/landrok
 *
 * For the full copyright and license information, please see
 * <https://github.com/landrok/activitypub/blob/master/LICENSE>.
 */

namespace ActivityPub\Type\Core;

/**
 * \ActivityPub\Type\Core\CollectionPage is an implementation of one 
 * of the Activity Streams Core Types.
 *
 * Used to represent distinct subsets of items from a Collection.
 *
 * @see https://www.w3.org/TR/activitystreams-core/#paging
 */
class CollectionPage extends Collection
{
    /**
     * @var string
     */
    protected $type = 'CollectionPage';

    /**
     * @var string
     */
    protected $id;

    /**
     * Identifies the Collection to which CollectionPage objects items 
     * belong. 
     *
     * @see https://www.w3.org/TR/activitystreams-vocabulary/#dfn-partof
     * 
     * @var null
     *    | string
     *    | \ActivityPub\Type\Core\Link
     *    | \ActivityPub\Type\Core\Collection 
     */
    protected $partOf;

    /**
     * Indicates the next page of items. 
     * 
     * @see https://www.w3.org/TR/activitystreams-vocabulary/#dfn-next
     *
     * @var null
     *    | string
     *    | \ActivityPub\Type\Core\Link
     *    | \ActivityPub\Type\Core\CollectionPage 
     */
    protected $next;

    /**
     * Identifies the previous page of items. 
     * 
     * @see https://www.w3.org/TR/activitystreams-vocabulary/#dfn-prev
     *
     * @var null
     *    | string
     *    | \ActivityPub\Type\Core\Link
     *    | \ActivityPub\Type\Core\CollectionPage
     */
    protected $prev;
}
