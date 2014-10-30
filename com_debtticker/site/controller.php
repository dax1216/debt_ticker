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
define('BASIS_RATE1', 397705109.71);
define('BASIS_RATE2', 20031908.58);
//define('SEC_IN_A_YR', 31104000);
//define('RATE_URL', 'http://www.emmi-benchmarks.eu/euribor-eonia-org/about-eonia.html');

set_time_limit(0);

class DebtTickerController extends JControllerLegacy
{

   public function setDebtValueDaily() {
      $model = $this->getModel('DebtLogsDaily', 'DebtTickerModel');
      
      $rates = $this->getRates();
      
      $obj = new stdClass();
      $obj->rate_date = date('Y-m-d');
      $obj->rate = $rates['interest_rate'];
      $obj->comp_rate = $rates['comp_interest_rate'];
      $obj->rate_val1 = BASIS_RATE1 * (1/360) * $rates['interest_rate'];
      $obj->rate_val2 = BASIS_RATE2 * (1/360) * $rates['interest_rate'];
      
      $model->insertDailyLog($obj);
      
      exit;
   }

   public function setDebtValueMinutes() { 
      $model = $this->getModel('DebtLogsMinutes', 'DebtTickerModel');

      $model->insertMinuteLog();
      exit;
   }
  
   public function getRates() {
      $module = JModuleHelper::getModule('mod_debtticker');
      $moduleParams = new JRegistry();
      $moduleParams->loadString($module->params);
      
      return array('interest_rate' => $moduleParams->get('interest_rate'), 'comp_interest_rate' => $moduleParams->get('comp_interest_rate'));
   }
}