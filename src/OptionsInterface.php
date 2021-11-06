<?php

namespace JMichaelWard\BoardGameGeek;

/**
 * Provides an interface for retrieving options for a given API model.
 */
interface OptionsInterface {
	public function get_options(): array;
}
