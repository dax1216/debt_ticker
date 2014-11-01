<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
    <tr class="row<?php echo $i % 2; ?>">        
        <td>
            <?php echo $item->rate_date; ?>
        </td>
        <td>
            <?php echo ($item->rate * 100) . '%'; ?>
        </td>
        <td>
            <?php echo number_format($item->rate_val1, 2); ?>
        </td>
        <td>
            <?php echo number_format($item->rate_val2, 2); ?>
        </td>
        <td>
            <?php echo number_format($item->comp_rate_val, 2); ?>
        </td>
        <td>
            <?php echo number_format($item->debt, 2); ?>
        </td>
    </tr>
<?php endforeach; ?>
