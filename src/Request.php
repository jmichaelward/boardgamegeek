<?php

namespace JMichaelWard\BoardGameGeek;

use JMichaelWard\BoardGameGeek\User\User;

class Request {
	const BASE_URL = 'https://www.boardgamegeek.com/xmlapi2';

    /**
     * The response format to return.
     *
     * The BoardGameGeek API uses XML by default, but this library defaults to JSON. Users of this library can opt
     * instead for XML output by calling `set_xml_format` on this object.
     *
     * @var string
     */
    private string $format = 'json';

    /**
     * Sets the response format to XML.
     */
    public function set_xml_format(): void {
        $this->format = 'xml';
    }

    /**
     * Converts the response to JSON unless XML output is desired.
     *
     * @param string $response The XML response from the API request.
     * @return string
     */
    private function get_parsed_response( string $response ): string {
        return $this->format === 'xml' ? $response : json_encode(simplexml_load_string($response));
    }

	public function getHot(): string {
		return '';
	}

	public function getCollection( OptionsInterface $collection ): string {
        $query = http_build_query( $user->get_options() );
        $curl  = curl_init( self::BASE_URL . "/collection?{$query}" );

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $this->get_parsed_response($response);
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
	public function getUser( OptionsInterface $user ): string {
		$query = http_build_query( $user->get_options() );
		$curl  = curl_init( self::BASE_URL . "/user?{$query}" );

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => true,
		]);

		$response = curl_exec($curl);

		curl_close($curl);

		return $this->get_parsed_response($response);
	}
}
