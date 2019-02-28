<?php

/*
 * This file is part of the ActivityPub package.
 *
 * Copyright (c) landrok at github.com/landrok
 *
 * For the full copyright and license information, please see
 * <https://github.com/landrok/activitypub/blob/master/LICENSE>.
 */

namespace ActivityPub;

use ActivityPub\Server\Actor;
use ActivityPub\Server\Actor\Inbox;
use ActivityPub\Server\Actor\Outbox;
use ActivityPub\Server\CacheHelper;
use ActivityPub\Server\Configuration;
use Exception;

/**
 * \ActivityPub\Server is the entry point for server processes.
 */ 
class Server
{
    /**
     * @var \ActivityPub\Server\Actor[]
     */
    protected $actors = [];

    /**
     * @var \ActivityPub\Server\Actor\Inbox[]
     */
    protected $inboxes = [];

    /**
     * @var \ActivityPub\Server\Actor\Outbox[]
     */
    protected $outboxes = [];

    /**
     * @var null|\Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @var null|\ActivityPub\Server\Configuration
     */
    protected $configuration;

    /**
     * Server constructor
     * 
     * @param array $config Server configuration
     */
    public function __construct(array $config = [])
    {
        $this->configuration = new Configuration($config);
        $this->logger = $this->config('logger')->createLogger();
        CacheHelper::setPool(
            $this->config('cache')
        );
    }

    /**
     * Get logger instance
     * 
     * @return null|\Psr\Log\LoggerInterface
     */
    public function logger()
    {
        return $this->logger;
    }

    /**
     * Get cache instance
     * 
     * @return null|\Psr\Cache\CacheItemPoolInterface
     */
    public function cache()
    {
        return $this->cache;
    }

    /**
     * Get a configuration handler
     * 
     * @param  string $parameter
     * @return \ActivityPub\Server\Configuration\LoggerConfiguration
     *       | \ActivityPub\Server\Configuration\InstanceConfiguration
     *       | \ActivityPub\Server\Configuration\HttpConfiguration
     *       | string
     */
    public function config(string $parameter)
    {
        return $this->configuration->getConfig($parameter);
    }

    /**
     * Getting an inbox instance
     * It can be a local or a distant inbox.
     * 
     * @param  string $handle An actor name
     * @return \ActivityPub\Server\Actor\Inbox
     */
    public function inbox(string $handle)
    {
        $this->logger()->info($handle . ':' . __METHOD__);

        if (isset($this->inboxes[$handle])) {
            return $this->inboxes[$handle];
        }

        // Build actor
        $actor = $this->actor($handle);

        $this->inboxes[$handle] = new Inbox($actor, $this);

        return $this->inboxes[$handle];
    }

    /**
     * Getting an outbox instance
     * It may be a local or a distant outbox.
     * 
     * @param  string $handle
     * @return \ActivityPub\Server\Actor\Outbox
     */
    public function outbox(string $handle)
    {
        $this->logger()->info($handle . ':' . __METHOD__);

        if (isset($this->outboxes[$handle])) {
            return $this->outboxes[$handle];
        }

        // Build actor
        $actor = $this->actor($handle);

        $this->outboxes[$handle] = new Outbox($actor, $this);

        return $this->outboxes[$handle];
    }

    /**
     * Build an server-oriented actor object
     * 
     * @param  string $handle
     * @return \ActivityPub\Server\Actor
     */
    public function actor(string $handle)
    {
        if (isset($this->actors[$handle])) {
            return $this->actors[$handle];
        }

        $this->actors[$handle] = new Actor($handle, $this);

        return $this->actors[$handle];
    }
}
