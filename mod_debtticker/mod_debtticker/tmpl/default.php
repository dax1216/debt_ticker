<?php 
// No direct access
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addStyleSheet( JUri::root() . 'modules/mod_debtticker/css/odometer.css' );
$doc->addScript( JUri::root() . 'modules/mod_debtticker/js/odometer.js' );

?>
<div class="dt-mod">
    <div class="dt-text-before"><?= $settings['text_before'] ?></div>
    <div id="dt-display"></div>
    <div class="dt-text-before"><?= $settings['text_after'] ?></div>
</div>

<script type="text/javscript">
   var el = document.getElementById('dt-display');

   var od = new Odometer({
     el: el,
     value: 333555,

     // Any option (other than auto and selector) can be passed in here
     format: '(,ddd)',
     theme: 'train-station'
   });
   var seconds = <?= $seconds?>;
   
   setInterval( function() {
      var debt_value = 400000000 * (1 + <?=$recentRate['rate']?> * ( seconds / 31104000));
      seconds += 1000;
      od.update(debt_value);
   }, 1000);
   
   
</script>