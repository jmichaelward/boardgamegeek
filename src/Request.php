<?php

namespace JMichaelWard\BoardGameGeek;

use JMichaelWard\BoardGameGeek\User\User;

class Request {
	const BASE_URL = 'https://www.boardgamegeek.com/xmlapi2';

	public function getHot(): string {
		return '';
	}

	public function getCollection(): string {
		return '';
	}

	public function getPlays(): string {
		return '';
	}

	public function getForumList(): string {
		return '';
	}

	public function getGuilds(): string {
		return '';
	}

    /**
     * Request user data.
     *
     * @param OptionsInterface $user
     * @return string
     */
	public function getUser( OptionsInterface $user, $format = 'json' ): string {
		$query = http_build_query( $user->get_options() );
		$curl  = curl_init( self::BASE_URL . "/user?{$query}" );

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => true,
		]);

		$response = curl_exec($curl);

		curl_close($curl);

		return $format === 'xml' ? $response : json_encode(simplexml_load_string($response));
	}
}
