<?php
/*
*  ==================================================================================================================================
*  Kucing-Comel PHP Framework . (KC PHP Framework)                                                                                     *
*  Proudly Made By Muhammad Aliff Muazzam .                                                                                            *
*  Built in Alor Gajah, Melaka .                                                                                                       *
*  https://www.facebook.com/Tester2009                                                                                                 *
*  https://github.com/alepcat1710                                                                                                      *
*  Day im start built this framework - February 12, 2014                                                                               *
*                                                                                                                                      *
*  Reason im building this framework is for educational purpose . i do not have intention to copy other script then proud with that.   *
*  Respect me, Im respecting you too .                                                                                                 *
*  ==================================================================================================================================
*/

// start session .
session_start();

define("Kucing_Comel", true);
define("Kucing_Comel_Framework_Current_Version", "0.1");
define("KUCING_COMEL_SYSTEM_HASH", "Kucing_Comel_Framework");

// start database . future .
define("DATABASE_HOST", "localhost");
define("DATABASE_USER", "root");
define("DATABASE_PASS", "rooted");
define("DATABASE_DATA", "local");

// common setup .
define("KC_TITLE", "STORAN");
define("KC_DESCRIPTION", "THE PLACE WHERE YOU KEEP DATA !");
define("KC_AUTHOR", "Kucing-Comel");
define("KC_KEYWORDS", "");
define("KC_CHARSET", "UTF-8");

// for maintenance break :D
define("HEADER_BREAK", "It's Down !");
define("CONTENT_BREAK", "Hello visitors! Our site is down for a while. We be right back soon :D");


// timezone .
if (defined("CURRENT_TIMEZONE")) {
	date_default_timezone_set(CURRENT_TIMEZONE); 
} else {
	date_default_timezone_set("Asia/Kuala_Lumpur");
}

$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = '';

// start kucing_comel class
class kucing_comel
{

/* **************************************************************************************************************** */

	function fillHead($title, $description, $author, $keywords, $charset) // title , description, author, keywords, charset .
	{
		if ($title==null && $description==null && $author==null && $keywords==null && $charset==null)
		{
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .'<title>' .KC_TITLE. '</title>';
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .'<meta name="description" content="' .KC_DESCRIPTION. '">';
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .'<meta name="author" content="' .KC_AUTHOR. '">';
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .'<meta name="keywords" content="' .KC_KEYWORDS. '">';
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .'<meta name="charset" content="' .KC_CHARSET. '">';
		}
		else
		{
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .'<title>' .$title. '</title>';
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .'<meta name="description" content="' .$description. '">';
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .'<meta name="author" content="' .$author. '">';
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .'<meta name="keywords" content="' .$keywords. '">';
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .'<meta name="charset" content="' .$charset. '">';
		}
	}

	function p($text)
	{
		$_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] = $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'] .$text;
	}

	function showOutput($environment)
	{
		switch($environment)
		{

			// maintainence mode :D
			case("DEVELOPMENT"):
			echo '<title>' .KC_TITLE. ' | Maintenance Break</title>';
			echo '<h1><center>' .HEADER_BREAK. '</center></h1>';
			echo '<p>' .CONTENT_BREAK. '</p>';
			break;

			default:
			echo $_SESSION['kucing_comel'.KUCING_COMEL_SYSTEM_HASH.'_output'];
			break;
		}
	}

/* **************************************************************************************************************** */

	// show error
	function halt($type, $details)
	{
		if ($type=="ERROR")
		{
			trigger_error($details);
			echo "ERROR<br />" .$details;
			die();
		}
	}

	function userip()
	// With CloudFlare reverse IP support
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
		//check ip from share internet
			{
				$ip=$_SERVER['HTTP_CLIENT_IP'];
			}
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			//to check ip is pass from proxy//
			{
				$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			elseif (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
			{
				$ip=$_SERVER["HTTP_CF_CONNECTING_IP"];
			} else {
				$ip=$_SERVER['REMOTE_ADDR'];
			}
			return $ip;
	}

/* ================================================================================================================================ */

	// connect mysql method (soon will remove, deprecated)
	function connectmysql()
	{
		$connect = mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS);
		if(!is_resource($connect))
		{
			self::halt("ERROR", "DATABASE CAN'T CONNECT"); // okay . you can use both; 1) $this->halt | 2) self::halt
		}
		else
		{
			$select = mysql_select_db(DATABASE_DATA);
			echo "hello . database connected";

			if(!$select)
			{
				self::halt("ERROR", "DATABASE NOT EXISTS!"); // okay . you can use both; 1) $this->halt | 2) self::halt
			}
		}
	}

	// connect mysqli method . 
	function connectmysqli()
	{
		$database = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DATA);
		if($database->connect_errno)
		{
			self::halt("ERROR" , "DATABASE CAN'T CONNECT.<br />" .$database->connect_error); // okay . you can use both; 1) $this->halt | 2) self::halt

		}
	}


	function connect()
	{
		$data = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DATA);
		if (!$data)
		{
			self::halt("ERROR", "".mysqli_connect_error().""); // okay . you can use both; 1) $this->halt | 2) self::halt
		}
		else
		{
			echo 'Connected. Yay !';
		}
	}

/* ================================================================================================================================ */
} // end of kucing_comel class .
?>