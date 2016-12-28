<?php
defined('BASEPATH') OR exit(':D');
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-body topAnalyticsBody" style="background-color: #337ab7">
                        <div class="pull-left"><i class="fa fa-calendar-minus-o"></i></div>
                        <div class="pull-right">
                            <div><?=isset($totalVisitsToday) && $totalVisitsToday ? $totalVisitsToday : '0'?></div>
                            <div class="topAnalyticsText"><?=date('D jS')?></div>
                        </div>
                    </div>
                    <div class="panel-footer text-center" style="color:#337ab7">Number of Visits Today</div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="panel panel-warning">
                    <div class="panel-body topAnalyticsBody" style="background-color: #f0ad4e">
                        <div class="pull-left"><i class="fa fa-calendar"></i></div>
                        <div class="pull-right">
                            <div><?=isset($totalVisitsThisMonth) && $totalVisitsThisMonth ? $totalVisitsThisMonth : '0'?></div>
                            <div class="topAnalyticsText"><?=date('F')?></div>
                        </div>
                    </div>
                    <div class="panel-footer text-center" style="color:#f0ad4e">Number of Visits This Month</div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="panel panel-success">
                    <div class="panel-body topAnalyticsBody" style="background-color: #5cb85c">
                        <div class="pull-left"><i class="fa fa-calendar-check-o"></i></div>
                        <div class="pull-right">
                            <div><?=isset($totalVisitsThisYear) && $totalVisitsThisYear ? $totalVisitsThisYear : '0'?></div>
                            <div class="topAnalyticsText"><?=date('Y')?></div>
                        </div>
                    </div>
                    <div class="panel-footer text-center" style="color:#5cb85c">Number of Visits This Year</div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4" id="dailyVisitors">
                <div class="panel panel-primary">
                    <div class="panel-heading">Daily Visitors' Count</div>
                    <div class="panel-body scroll panel-height">
                        <?php if(isset($daily_visitors_table) && $daily_visitors_table):?>
                        <?=$daily_visitors_table?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Locations</div>
                    <div class="panel-body scroll panel-height">
                        <?php if(isset($locations) && $locations): ?>
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php foreach($locations as $get):?>
                                <tr>
                                    <td><?=$get->location?></td>
                                    <td><?=$get->counter?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <li>No Record</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Devices</div>
                    <div class="panel-body scroll panel-height">
                        <?php if(isset($devices) && $devices): ?>
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php foreach($devices as $get):?>
                                <tr>
                                    <td><?=$get->device?></td>
                                    <td><?=$get->counter?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <li>No Record</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Browsers</div>
                    <div class="panel-body scroll panel-height">
                        <?php if(isset($browsers) && $browsers): ?>
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php foreach($browsers as $get):?>
                                <tr>
                                    <td><?=$get->browser?></td>
                                    <td><?=$get->counter?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <li>No Record</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">OS</div>
                    <div class="panel-body scroll panel-height">
                        <?php if(isset($os) && $os): ?>
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php foreach($os as $get):?>
                                <tr>
                                    <td><?=$get->os?></td>
                                    <td><?=$get->counter?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <li>No Record</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Time of Day</div>
                    <div class="panel-body scroll panel-height">
                        <?php if(isset($time_of_day) && $time_of_day): ?>
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Period</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php foreach($time_of_day as $get):?>
                                <tr>
                                    <td>
                                        <?=$get->visit_period == "M" ? "Morning" : ($get->visit_period == "A" ? "Afternoon" : "Night")?>
                                    </td>
                                    <td><?=$get->counter?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <li>No Record</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Visits By Days</div>
                    <div class="panel-body scroll panel-height">
                        <?php if(isset($days) && $days): ?>
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php foreach($days as $get):?>
                                <tr>
                                    <td><?=$get->day.'s'?></td>
                                    <td><?=$get->counter?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <li>No Record</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Visits By Months</div>
                    <div class="panel-body scroll panel-height">
                        <?php if(isset($months) && $months): ?>
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php foreach($months as $get):?>
                                <tr>
                                    <td><?=$get->month?></td>
                                    <td><?=$get->counter?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <li>No Record</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Visits By Year</div>
                    <div class="panel-body scroll panel-height">
                        <?php if(isset($years) && $years): ?>
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php foreach($years as $get):?>
                                <tr>
                                    <td><?=$get->year?></td>
                                    <td><?=$get->counter?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <li>No Record</li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>