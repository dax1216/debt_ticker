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
 
// import Joomla controller library
jimport('joomla.application.component.controller');

jimport('joomla.html.parameter');
jimport('joomla.application.module.helper');
 
/**
 * Hello World Component Controller
 *
 * @since   0.0.1
 */

define('INIT_VALUE', 400000000);
define('MINUTES_IN_A_DAY', 1440);
//define('SEC_IN_A_YR', 31104000);
//define('RATE_URL', 'http://www.emmi-benchmarks.eu/euribor-eonia-org/about-eonia.html');

set_time_limit(0);

class DebtTickerController extends JControllerLegacy
{

   public function setDebtValueDaily() {
      $datetime = date('Y-m-d H:i:s'); 
      
      
      exit;
   }

   public function setDebtValueMinutes() {
      $contents = file_get_contents(RATE_URL);    

      $model = $this->getModel('RateLog', 'DebtTickerModel');
      
      exit;
   }
  
   public function getRates() {
      $module = JModuleHelper::getModule('mod_debtticker');
      $moduleParams = new JRegistry();
      $moduleParams->loadString($module->params);
      
      return array('interest_rate' => $moduleParams->get('interest_rate'), 'comp_interest_rate' => $moduleParams->get('comp_interest_rate'));
   }
}