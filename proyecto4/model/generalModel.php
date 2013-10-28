<?php

/**
 * Read .ini config file
 * @param string $filename
 * @param string $state
 * @return array config
 */
function readConfigFile($filename, $state)
{
	$config=parse_ini_file($filename, true);
	return $config;
}