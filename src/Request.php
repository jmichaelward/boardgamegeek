<?php

namespace JMichaelWard\BoardGameGeek;

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

	public function getUser( $username ): string {
		$curl = curl_init(self::BASE_URL . '/user' );

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );

		$response = curl_exec($curl);

		curl_close($curl);

		return json_encode(simplexml_load_string($response));
	}
}
