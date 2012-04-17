<?php
/**
 * PHP Template
 *
 * Template Inheritance allows HTML views to manage themselves, saving the
 * controllers from worrying about display logic. In short, inheritance in
 * your templates offers the same decoupling benefits as standard PHP objects
 * making it easier to manage presentation.
 *
 * This class is more powerful than it looks.
 *
 * @package		PHP-Template
 * @author		http://github.com/Xeoncross/php-template
                https://github.com/NazarkinRoman
 * @copyright	(c) 2011 David Pennington <http://xeoncross.com>
                Nazarkin Roman <roman@nazarkin.su>
 * @license		MIT License
 ********************************** 80 Columns *********************************
 */

/**
 * Helper function to make it easier to work with template objects.
 *
 * @param string $file the template file to load
 * @return object
 */
function template($file)
{
	return new Template($file);
}

/**
 * PHP Template Class
 */
class Template
{
	static $path = 'view/';
	public $__file, $__blocks, $__append;

	/**
	 * Returns a new template object
	 *
	 * @param string $file the template file to load
	 */
	public function __construct($file)
	{
		$this->__file = $file;
	}


	/**
	 * Allows setting template values while still returning the object instance
	 * $template->title($title)->text($text);
	 *
	 * @return this
	 */
	public function __call($key, $args)
	{
		$this->$key = $args[0];
		return $this;
	}


	/**
	 * Render template HTML
	 *
	 * @return string
	 */
	public function __toString()
	{
		try {
			return $this->load($this->__file);
		}
		catch(\Exception $e)
		{
			return (string) $e;
		}
	}


	/**
	 * Load the given template
	 *
	 * @param string $__f file name
	 * @return string
	 */
	public function load($__f)
	{
		ob_start();
		extract((array) $this);
		require self::$path . $__f . '.php';
		return ob_get_clean();
	}


	/**
	 * Extend a parent template
	 *
	 * @param string $__f name of template
	 */
	public function extend($__f)
	{
		ob_end_clean(); // Ignore this child class and load the parent!
		ob_start();
		print $this->load($__f);
	}


	/**
	 * Start a new block
	 */
	public function start()
	{
		ob_start();
	}


	/**
	 * Empty default block to be extended by child templates
	 *
	 * @param string $name of block
	 */
	public function block($name)
	{
		if(isset($this->__blocks[$name]))
		{
			return $this->__blocks[$name];
		}
	}


	/**
	 * End a block
	 *
	 * @param string $name name of block
	 * @param boolean $keep_parent true to append parent block contents
	 * @param mixed $filter functions
	 */
	public function end($name, $keep_parent = FALSE, $filters = NULL)
	{
		$buffer = ob_get_clean();

		foreach((array) $filters as $filter)
		{
			$buffer = $filter($buffer);
		}

		// This block is already set
		if( ! isset($this->__blocks[$name]))
		{
			$this->__blocks[$name] = $buffer;
			if($keep_parent) $this->__append[$name] = TRUE;
		}
		elseif(isset($this->__append[$name]))
		{
			$this->__blocks[$name] .= $buffer;
		}

		print $this->__blocks[$name];
	}


	/**
	 * Encode/Decode special characters to HTML safe entities
	 *
	 * @param string $string to encode/decode
	 * @param boolean $decode decodes string
	 * @return string
	 */
	public function e($string, $decode = false)
	{
	  if($decode)
        $func = 'htmlspecialchars_decode';
      else
        $func = 'htmlspecialchars';

      return $func($string, ENT_QUOTES, 'UTF-8');
	}
}
