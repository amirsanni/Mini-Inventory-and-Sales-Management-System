<?php
defined('BASEPATH') OR exit('');

$total_earned = 0;

/**
 * @fileName transReport
 * @author Ameer <amirsanni@gmail.com>
 * @date 06-Apr-2017
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Transaction Report</title>
		
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>public/images/icon.ico">
        <!-- favicon ends --->
        
        <!--- LOAD FILES -->
        <?php if((stristr($_SERVER['HTTP_HOST'], "localhost") !== FALSE) || (stristr($_SERVER['HTTP_HOST'], "192.168.") !== FALSE)|| (stristr($_SERVER['HTTP_HOST'], "127.0.0.") !== FALSE)): ?>
        <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/css/bootstrap.min.css">

        <?php else: ?>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <?php endif; ?>
        
        <!-- custom CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>public/css/main.css">
    </head>

    <body>
        <div class="container margin-top-5">
            <div class="row">
                <div class="col-xs-12 text-right hidden-print">
                    <button class="btn btn-primary btn-sm" onclick="window.print()">Print Report</button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h4>Transactions Between <?=date('jS M, Y', strtotime($from))?> and <?=date('jS M, Y', strtotime($to))?></h4>
                </div>
            </div>
            
            <div class="row margin-top-5">
                <div class="col-xs-12 table-responsive">
                    <div class="panel panel-primary">
                        <!-- Default panel contents -->
                        <div class="panel-heading text-center">
                            Transactions Between <?=date('jS M, Y', strtotime($from))?> and <?=date('jS M, Y', strtotime($to))?>
                        </div>
                        <?php if($allTransactions): ?>
                        <div class="table table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Receipt No</th>
                                        <th>Total Items</th>
                                        <th>Total Amount</th>
                                        <th>Amount Tendered</th>
                                        <th>Change Due</th>
                                        <th>Mode of Payment</th>
                                        <th>Staff</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 1;?>
                                    <?php foreach($allTransactions as $get): ?>
                                    <tr>
                                        <th><?= $sn ?>.</th>
                                        <td><?= $get->ref ?></td>
                                        <td><?= $get->quantity ?></td>
                                        <td>&#8358;<?= number_format($get->totalMoneySpent, 2) ?></td>
                                        <td>&#8358;<?= number_format($get->amountTendered, 2) ?></td>
                                        <td>&#8358;<?= number_format($get->changeDue, 2) ?></td>
                                        <td><?=  str_replace("_", " ", $get->modeOfPayment)?></td>
                                        <td><?=$get->staffName?></td>
                                        <td><?=$get->cust_name?> - <?=$get->cust_phone?> - <?=$get->cust_email?></td>
                                        <td><?= date('jS M, Y h:ia', strtotime($get->transDate)) ?></td>
                                    </tr>
                                    <?php $sn++; ?>
                                    <?php $total_earned += $get->totalMoneySpent; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- table div end--->
                        <?php else: ?>
                            <ul><li>No Transaction Found Within Specified Dates</li></ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-6">
                    <button class="btn btn-primary btn-sm hidden-print" onclick="window.print()">Print Report</button>
                </div>
                
                <div class="col-xs-6 text-right">
                    <h4>Total Earned: &#8358;<?=number_format($total_earned, 2)?></h4>
                </div>
            </div>
        </div>
        <!--- panel end-->
    </body>
</html>