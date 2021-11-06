<?php

namespace JMichaelWard\BoardGameGeek\User;

use JMichaelWard\BoardGameGeek\OptionsInterface;

/**
 * Data model for the BoardGameGeek user endpoint.
 */
class User implements OptionsInterface
{
    /**
     * The username.
     *
     * @var string
     */
    private string $name;

    /**
     * Retrieve buddies.
     *
     * @var int
     */
    private int $buddies;

    /**
     * Retrieve guilds.
     *
     * @var int
     */
    private int $guilds;

    /**
     * Retrieve hot.
     *
     * @var int
     */
    private int $hot;

    /**
     * Retrieve top.
     *
     * @var int
     */
    private int $top;

    /**
     * User domain (one of boardgame, rpg, videogame).
     *
     * @var string
     */
    private string $domain = 'boardgame';

    /**
     * @param string $username The username.
     */
    public function __construct(string $username)
    {
        $this->name = $username;
    }

    public function setBuddies(): User
    {
        $this->buddies = 1;

        return $this;
    }

    public function setGuilds(): User
    {
        $this->guilds = 1;

        return $this;
    }

    public function setHot(): User
    {
        $this->hot = 1;

        return $this;
    }

    public function setTop(): User
    {
        $this->top = 1;

        return $this;
    }

    public function setDomain(string $domain)
    {
        if (!in_array($domain, ['boardgame', 'rpg', 'videogame']))
        {
            throw new \Exception("Domain must be one of boardgame, rpg, or videogame. {$domain} given.");
        }

        $this->domain = $domain;

        return $this;
    }

    /**
     * Set all the options for the user.
     *
     * @return User
     */
    public function setAllOptions(): User
    {
        return $this->setBuddies()
            ->setGuilds()
            ->setHot()
            ->setTop();
    }

    /**
     * Get the options for this model.
     *
     * @return array
     */
    public function getOptions(): array
    {
        $set_options = [
            'name'   => $this->name,
            'domain' => $this->domain,
        ];

        $additional = array_filter(['buddies', 'guilds', 'hot', 'top'], function ($option)
        {
            return isset($this->{$option});
        });

        foreach ($additional as $option)
        {
            $set_options[$option] = 1;
        }

        return $set_options;
    }
}
