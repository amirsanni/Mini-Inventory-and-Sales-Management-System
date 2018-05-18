<?php
defined('BASEPATH') OR exit('');
?>
<?php if($allTransInfo):?>
<?php $sn = 1; ?>
<div id="transReceiptToPrint">
    <div class="row">
        <div class="col-xs-12 text-center text-uppercase">
            <center style='margin-bottom:5px'><img src="<?=base_url()?>public/images/receipt_logo.png" alt="logo" class="img-responsive" width="60px"></center>
            <b>1410 Store, plot 5, block 2</b>
            <div>+234 7086201801, +234 7030167606</div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-sm-12">
            <b><?=isset($transDate) ? date('jS M, Y h:i:sa', strtotime($transDate)) : ""?></b>
        </div>
    </div>
    
    <div class="row" style="margin-top:2px">
        <div class="col-sm-12">
            <label>Receipt No:</label>
            <span><?=isset($ref) ? $ref : ""?></span>
		</div>
    </div>
    
	<div class="row" style='font-weight:bold'>
		<div class="col-xs-4">Item</div>
		<div class="col-xs-4">QtyxPrice</div>
		<div class="col-xs-4">Tot(&#8358;)</div>
	</div>
	<hr style='margin-top:2px; margin-bottom:0px'>
    <?php $init_total = 0; ?>
    <?php foreach($allTransInfo as $get):?>
        <div class="row">
            <div class="col-xs-4"><?=ellipsize($get['itemName'], 10);?></div>
            <div class="col-xs-4"><?=$get['quantity'] . "x" .number_format($get['unitPrice'], 2)?></div>
            <div class="col-xs-4"><?=number_format($get['totalPrice'], 2)?></div>
        </div>
        <?php $init_total += $get['totalPrice'];?>
    <?php endforeach; ?>
    <hr style='margin-top:2px; margin-bottom:0px'>       
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>Total: &#8358;<?=isset($init_total) ? number_format($init_total, 2) : 0?></b>
        </div>
    </div>
    <hr style='margin-top:2px; margin-bottom:0px'>      
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>Discount(<?=$discountPercentage?>%): &#8358;<?=isset($discountAmount) ? number_format($discountAmount, 2) : 0?></b>
        </div>
    </div>       
    <div class="row">
        <div class="col-xs-12 text-right">
            <?php if($vatPercentage > 0): ?>
            <b>VAT(<?=$vatPercentage?>%): &#8358;<?=isset($vatAmount) ? number_format($vatAmount, 2) : ""?></b>
            <?php else: ?>
            VAT inclusive
            <?php endif; ?>
        </div>
    </div>      
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>FINAL TOTAL: &#8358;<?=isset($cumAmount) ? number_format($cumAmount, 2) : ""?></b>
        </div>
    </div>
    <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-xs-12">
            <b>Mode of Payment: <?=isset($_mop) ? str_replace("_", " ", $_mop) : ""?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Amount Tendered: &#8358;<?=isset($amountTendered) ? number_format($amountTendered, 2) : ""?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Change: &#8358;<?=isset($changeDue) ? number_format($changeDue, 2) : ""?></b>
        </div>
    </div>
    <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-xs-12">
            <b>Customer Name: <?=$cust_name?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Customer Phone: <?=$cust_phone?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Customer Email: <?=$cust_email?></b>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 text-center">Thanks for your patronage</div>
    </div>
</div>
<br class="hidden-print">
<div class="row hidden-print">
    <div class="col-sm-12">
        <div class="text-center">
            <button type="button" class="btn btn-primary ptr">
                <i class="fa fa-print"></i> Print Receipt
            </button>
            
            <button type="button" data-dismiss='modal' class="btn btn-danger">
                <i class="fa fa-close"></i> Close
            </button>
        </div>
    </div>
</div>
<br class="hidden-print">
<?php endif;?>