<?php

namespace JMichaelWard\BoardGameGeek\Hot;

use JMichaelWard\BoardGameGeek\OptionsInterface;

class Hot implements OptionsInterface
{
    /**
     * @var string
     */
    private string $type = 'boardgame';

    /**
     * Set the type of hot list.
     *
     * @param string $type
     * @return $this
     * @throws \Exception
     */
    public function setType(string $type): Hot
    {
        if (!in_array($type, [
            'boardgame',
            'rpg',
            'videogame',
            'boardgameperson',
            'rgpperson',
            'boardgamecompany',
            'rpgcompany',
            'videogamecompany',
        ]))
        {
            throw new \Exception("Invalid type used for the hot list: {$type}.");
        }

        {
            $this->type = $type;
        }

        return $this;
    }

    public function getOptions(): array
    {
        return [
            'type' => $this->type,
        ];
    }
}
