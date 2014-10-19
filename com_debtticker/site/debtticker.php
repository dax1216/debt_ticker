<?php
/**
* @package Joomla.Administrator
* @subpackage com_debtticker
*
* @copyright Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE.txt
*/
 
// No direct access to this file
defined('_JEXEC') or die;
 
// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('DebtTicker');

// some black magic with the language files
$jlang =& JFactory::getLanguage();
$jlang->load('com_debtticker', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('com_debtticker', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
$jlang->load('com_debtticker', JPATH_ADMINISTRATOR, null, true);
$jlang->load('com_debtticker', JPATH_SITE, 'en-GB', true);
$jlang->load('com_debtticker', JPATH_SITE, $jlang->getDefault(), true);
$jlang->load('com_debtticker', JPATH_SITE, null, true);

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
 
// Redirect if set by the controller

$controller->redirect();