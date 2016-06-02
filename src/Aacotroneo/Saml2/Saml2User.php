<?php namespace Aacotroneo\Saml2;

use OneLogin_Saml2_Auth;
use \URL;
/**
 * A simple class that represents the user that 'came' inside the saml2 assertion
 * Class Saml2User
 * @package Aacotroneo\Saml2
 */
 
 //John's edit
 
class Saml2User
{
	protected $auth;

	function __construct(OneLogin_Saml2_Auth $auth)
	{
	    $this->auth = $auth;
	}

	/**
	 * @return OneLogin_Saml2_Auth $auth
	 */
	function returnAuthObject()
	{
		return $this->auth;
	}

	/**
	 * @return string User Id retrieved from assertion processed this request
	 */
	function getUserId()
	{
	    $auth = $this->auth;

	    return $auth->getNameId();
	}
    
	/**
	 * @return string Session Index retrieved from assertion processed this request
 	 */
	function getSessionIndex()
	{
		$auth = $this->auth;

		return $auth->getSessionIndex();
	}    
	
	/**
	 * 
	 @return string NameId retrieved from assertion processed this request
	 */
	function getNameId()
	{
	    return $this->auth->getNameId();
	}

	/**
	 * @return array attributes retrieved from assertion processed this request
	 */
	function getAttributes()
	{
		$auth = $this->auth;

		return $auth->getAttributes();
	}

	/**
	 * @return string the saml assertion processed this request
	 */
	function getRawSamlAssertion()
	{
		return app('request')->input('SAMLResponse'); //just this request
	}

	/**
	 * Returns full URL requested prior to SSO redirect
	 * @return string $relayState
	 */
	function getIntendedUrl()
	{
		$relayState		= app('request')->input('RelayState'); //just this request
		$url				= app('Illuminate\Contracts\Routing\UrlGenerator');

		if ($relayState && URL::full() != $relayState) 
		{
		    return $relayState;
		}
	}
}
