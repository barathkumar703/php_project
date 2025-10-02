<?php
/**
 * PHPMailer SPL autoloader.
 * PHP Version 5+
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author Marcus Bointon
 * @author Jim Jagielski
 * @author Andy Prevost
 * @author Brent R. Matzelle (original founder)
 * @copyright 2012 - 2014 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

/**
 * PHPMailer SPL autoloader.
 * @param string $classname The name of the class to load
 */
function PHPMailerAutoload($classname)
{
    $filename = __DIR__ . DIRECTORY_SEPARATOR . 'class.' . strtolower($classname) . '.php';
    if (is_readable($filename)) {
        require $filename;
    }
}

// Use spl_autoload_register exclusively
spl_autoload_register('PHPMailerAutoload');
