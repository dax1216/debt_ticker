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
      
      $debtTickerModel = $this->getModel('DebtTicker', 'DebtTickerModel');
      $liabilityLogModel = $this->getModel('DebtTicker', 'LiabilityLogsModel');
      $settings = $debtTickerModel->getSettings();                 
      
      if($settings['start_date'] != NULL && !empty($settings['start_date'])) {
         $seconds = strtotime($datetime) - strtotime($settings['start_date']);
      } else {
         $seconds = 0;
      }
      
      $rateLogModel = $this->getModel('RateLog', 'DebtTickerModel');
      $recentRate = $rateLogModel->getRecentRate();            
      
      $debt_value = INIT_VALUE * (1 + $recentRate['rate'] * ($seconds / SEC_IN_A_YR));

      $liabilityLogObj = new stdClass();
      $liabilityLogModel->liability = $debt_value;

      $liabilityLogModel->insertLog($liabilityLogModel);
      
      $newSettings = new stdClass();
      $newSettings->id = 1;
      
      if($seconds == 0) {
         $newSettings->start_date = date('Y-m-d H:i:s');
      }
      
      $newSettings->current_liabilities = $debt_value;
            
      $debtTickerModel->updateSettings($newSettings);
      
      exit;
   }

   public function setDebtValueMinutes() {
      $contents = file_get_contents(RATE_URL);    

      $model = $this->getModel('RateLog', 'DebtTickerModel');
      
      if(!empty($rateMatches) && !empty($rateDateMatches) && !empty($rateMatches[1]) && !empty($rateDateMatches[1])) {          
          $model->insertRate($rateMatches[1], date('Y-m-d', strtotime(str_replace('/', '-', $rateDateMatches[1]))));
      } else {
          $recentRate = $model->getRecentRate();
          $secondsDiff = time() - strtotime($recentRate['log_date']);
          
          if(floor($secondsDiff/3600/24) >= 5) {
            $this->_sendEmail();
          }
      }
      exit;
   }
  
   public function getRates() {
      $rateLogModel = $this->getModel('RateLog', 'DebtTickerModel');
      $recentRate = $rateLogModel->getRecentRate();  
      
      header('Content-Type: application/json');
      
      echo json_encode($recentRate);
      exit;
   }
}