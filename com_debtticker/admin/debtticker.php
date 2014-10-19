<?php
// No direct access to this file
defined('_JEXEC') or die;
 
// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('DebtTicker');
 
$jlang =& JFactory::getLanguage();
$jlang->load('com_debtticker', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('com_debtticker', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
$jlang->load('com_debtticker', JPATH_ADMINISTRATOR, null, true);
$jlang->load('com_debtticker', JPATH_SITE, 'en-GB', true);
$jlang->load('com_debtticker', JPATH_SITE, $jlang->getDefault(), true);
$jlang->load('com_debtticker', JPATH_SITE, null, true);

// Perform the Request task and Execute request task
$controller->execute(JFactory::getApplication()->input->getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();