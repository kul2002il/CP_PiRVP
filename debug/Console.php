<?php

namespace debug;

class Console
{
	private $file = 'log/Log.txt';
	private $content = '';
	
	public function __construct($file = null)
	{
		if ($file !== null)
		{
			$this->file = $file;
		}
		date_default_timezone_set('Asia/Krasnoyarsk');
	}
	
	public function add($text)
	{
		$this->content .= $text;
		return $this;
	}
	
	public function addl($text)
	{
		$this->content .= $text . "\n";
		return $this;
	}
	
	public function var($var)
	{
		$this->content .= var_export($var, true) . "\n";
		return $this;
	}
	
	public function cm($title = null)
	{
		$log = date('Y-m-d h:m:s');
		if ($title !== null)
		{
			$log .= ' — ' . $title;
		}
		$log .= "\n" . $this->content . "\n";
		file_put_contents($this->file, $log, FILE_APPEND);
		return $this;
	}
}
