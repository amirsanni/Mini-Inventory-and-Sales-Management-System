<?php
defined('BASEPATH') OR exit(':D');
?>


<?php if(isset($daily_visitors) && $daily_visitors): ?>
<table class="table table-responsive table-striped table-hover">
    <thead>
        <tr>
            <th>Date</th>
            <th>Total</th>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach($daily_visitors as $get): ?>
        <tr>
            <td><?=date('l jS M, Y', strtotime($get->visit_time));?></td>
            <td><?=$get->counter?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php else: ?>
<li>No Record</li>
<?php endif; ?>