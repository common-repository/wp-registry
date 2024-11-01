<?php
/*
Plugin Name: WP-Registry
Plugin URI: http://calculating-infinity.de/wp-registry
Description: The plugin provides a globally accessible container for storing values of any kind. The Registry is a singleton and can be accessed via <code>WP_Registry::set( 'key', $value )</code> and <code>WP_Registry::get( 'key' )</code>. It extends the SPL ArrayObject class.
Author: Jan Gorman
Version: 0.1
Author URI: http://calculating-infinity.de/
*/

class WP_Registry extends ArrayObject
{
	
	/**
	 * The Registry object
	 * @var WP_Registry
	 */
	private static $registry;
	
	/**
     * Constructs an ArrayObject
     *
     * @param array $array
     * @param int $flags
     */
	public function __construct ( $array = array(), $flags = parent::ARRAY_AS_PROPS )
	{
		parent::__construct( $array, $flags );
	}
	
	/**
	 * Get an instance of the registry
	 * 
	 * @return WP_Registry
	 */
	public static function getInstance()
	{
		if ( null === self::$registry )
		{
			self::init();
		}
		return self::$registry;
	}
	
	/**
	 * Retrieve a value from the registry.
	 * Throws an Exception if the key is not registered
	 * 
	 * @param string $key
	 * @return mixed
	 */
	public static function get( $key )
	{
		$instance = self::getInstance();
		if ( !$instance->offsetExists( $key ) )
		{
			throw new Exception( "No entry registered for key '$key'" );
		}
		return $instance->offsetGet( $key );
	}
	
	/**
	 * Initialise the registry
	 * 
	 * @return void
	 */
	protected static function init()
	{
		self::$registry = new self();
	}
	
	/**
	 * Check if a key is already registered
	 * 
	 * @return boolean
	 */
	public static function isRegistered( $key )
	{
		if ( null === self::$registry )
		{
			return false;
		}
		return self::$registry->offsetExists( $key );
	}
	
	/**
	 * Set a value in the registry
	 * 
	 * @param string $key
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public static function set( $key, $value )
	{
		$instance = self::getInstance();
		$instance->offsetSet( $key, $value );
	}
	
}