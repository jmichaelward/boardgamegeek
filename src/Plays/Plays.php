<?php

namespace JMichaelWard\BoardGameGeek\Plays;

use JMichaelWard\BoardGameGeek\OptionsInterface;

/**
 *
 */
class Plays implements OptionsInterface
{
    /**
     * @var string
     */
    private string $username;

    /**
     * @var string
     */
    private string $id;

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username ): Plays {
        $this->username = $username;

        return $this;
    }

    /**
     * @param int $id
     */
    public function setId(int $id ): Plays {
        $this->id = $id;

        return $this;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get_options(): array
    {
        if ( ! isset( $this->username ) && ! isset( $this->id ) ) {
            throw new \Exception( 'Plays require either a username or an ID.' );
        }

        return array_filter(
            [
                'username' => $this->username ?? '',
                'id' => $this->id ?? '',
            ]
        );
    }
}
