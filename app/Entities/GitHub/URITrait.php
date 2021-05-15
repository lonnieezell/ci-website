<?php

namespace App\Entities\GitHub;

use CodeIgniter\Entity\Entity;
use CodeIgniter\HTTP\URI;

/**
 * URI Trait
 *
 * Provides automated casting of *_url
 * keys to URI.
 *
 */
trait URITrait
{
	/**
	 * Intercepts magic access to check for URLs.
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function __get(string $key)
	{
		$result = parent::__get($key);

		return is_string($result) && is_int(strpos($key, 'url')) ? new URI($result) : $result;
	}
}