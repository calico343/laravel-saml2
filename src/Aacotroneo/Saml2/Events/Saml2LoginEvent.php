<?php namespace Aacotroneo\Saml2\Events;

class Saml2LoginEvent 
{
	protected $user;

	function __construct($user)
	{
		$this->user = $user;
	}

	public function getSaml2User()
	{
		return $this->user;
	}

	public function getSessionIndex()
	{
		return $this->user->getSessionIndex();
	}

	public function getAttributes()
	{
		return $this->user->getAttributes();
	}

	public function getRawSamlAssertion()
	{
		return $this->user->getRawSamlAssertion();
	}
}
