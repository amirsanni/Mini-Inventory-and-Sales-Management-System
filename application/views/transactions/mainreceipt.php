<?php
defined('BASEPATH') OR exit('');
?>
<?php if($allTransInfo):?>
<?php $sn = 1; ?>
<div id="transReceiptToPrint">
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-12 text-center text-uppercase">
                <center><img src="<?=base_url()?>public/images/igc_logo.png" alt="logo" class="img-responsive" width="50px"></center>
                <b>Ibadan Golf Club</b>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-12 text-center">Onireke Reservation Area, P.O. Box 22382, Onireke, Ibadan</div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-xs-12">
            027512577, 0805777270
        </div>
    </div>
    <div class="row text-center">
        <div class="col-xs-12">
            <b><?=isset($transDate) ? date('jS M, Y h:i:sa', strtotime($transDate)) : ""?></b>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-4">
                <label>Ref:</label>
            </div>
            
            <div class="col-xs-4">
                <label>Member ID:</label>
            </div>
            
            <div class="col-xs-4">
                <label>Customer Name:</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-4">
                <span><?=isset($ref) ? $ref : ""?></span>
            </div>
            
            <div class="col-xs-4">
                <span><?=isset($membershipId) ? $membershipId : ""?></span>
            </div>
            
            <div class="col-xs-4">
                <span><?=isset($customerName) ? $customerName : ""?></span>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="table table-responsive">
                <table class="table">
                    <thead>
                        <th></th>
                        <th>Item</th>
                        <th>Unit Price</th>
                        <th>Qty</th>
                        <th>Total Price</th>
                    </thead>
                    <tbody>
                        <?php foreach($allTransInfo as $get):?>
                        <tr>
                            <th><?=$sn?>.</th>
                            <td><?=$get['itemName']?></td>
                            <td>&#8358;<?=number_format($get['unitPrice'], 2)?></td>
                            <td><?=$get['quantity']?></td>
                            <td>&#8358;<?=number_format($get['totalPrice'], 2)?></td>
                        </tr>
                        <?php $sn++; ?>
                        <?php endforeach; ?>
                        <!--loop ends-->
                        <tr>
                            <th>Cashier: <?= isset($cashierName) ? $cashierName : "" ?></th>
                            <td></td>
                            <td></td>
                            <th></th>
                            <th>Cumulative Amount: &#8358;<?=isset($cumAmount) ? number_format($cumAmount, 2) : ""?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-4 text-center">
                <label>Mode of Payment:</label><br>
                <span><?=isset($_mop) ? str_replace("_", " ", $_mop) : ""?></span>
            </div>
            <div class="col-xs-4 text-center">
                <label>Amount Tendered:</label><br>
                <span>&#8358;<?=isset($amountTendered) ? number_format($amountTendered, 2) : ""?></span>
            </div>
            <div class="col-xs-4 text-center">
                <label>Change Due:</label><br>
                <span>&#8358;<?=isset($changeDue) ? number_format($changeDue, 2) : ""?></span>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row hidden-print">
    <div class="col-xs-12">
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
<br>
<?php endif;?>