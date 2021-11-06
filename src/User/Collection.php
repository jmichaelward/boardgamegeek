<?php

namespace JMichaelWard\BoardGameGeek\User;

use JMichaelWard\BoardGameGeek\OptionsInterface;

/**
 * Model for requesting a user's collection.
 */
class Collection implements OptionsInterface
{
    /**
     * The username identifying which collection to retrieve.
     *
     * @var string
     */
    private string $username;

    /**
     * The subtype of the collection to retrieve.
     *
     * May be one of: boardgame, boardgameexpansion, boardgameaccessory, rpgitem, rpgissuse, or videogame.
     *
     * @var string
     */
    private string $subtype = 'boardgame';

    /**
     * Class constructor.
     *
     * @param string $username Username identifying which collection to retrieve.
     */
    public function __construct( string $username )
    {
        $this->username = $username;
    }

    public function get_options(): array
    {
        return [
            'username' => $this->username,
            'subtype'  => $this->subtype,
        ];
    }
}
