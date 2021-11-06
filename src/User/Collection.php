<?php

namespace JMichaelWard\BoardGameGeek\User;

use JMichaelWard\BoardGameGeek\OptionsInterface;

/**
 * Model for requesting a user's collection.
 */
class Collection implements OptionsInterface
{
    public function get_options(): array
    {
        return [];
    }
}
