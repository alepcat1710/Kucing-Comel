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

require 'modules.php';

$kucing = new kucing_comel;
$kucing->fillHead(); // Leave it blank for default(get from 'modules.php'). Else, Format: "TITLE", "DESCRIPTION", "AUTHOR", "KEYWORDS", "CHARSET" .



// put showOutput below footer .
$kucing->showOutput("DEVELOPMENT"); // Put "DEVELOPMENT" inside this to show maintenance break page ! :D