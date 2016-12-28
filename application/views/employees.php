<?php
defined('BASEPATH') OR exit('');
?>

<div class="row">
    <div class="col-sm-12">
        <div class="pwell" style="">
            <!-- Header (add new customer, sort order etc.) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-3 col-xs-12 pull-right">
                        <input type="search" id="custSearch" placeholder="search customers" class="form-control">
                    </div>
                    <div class="col-sm-3 col-xs-12 pull-left fa fa-user-plus pointer" data-target='#addNewCustModal' data-toggle='modal'>
                        Add new customer
                    </div>
                </div>
            </div>
            <br>
            <!-- Header (sort order etc.) ends -->
            
            <!-- Customer info -->
            <div class="row">
                <div class="col-sm-12">
                     <!-- Customer list -->
                    <div class="col-sm-8">
                        <div class="table table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Customer ID</th>
                                        <th>Phone Number</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td><a href="#">Amir Sanni</a></td>
                                        <td>CUS-ID-0001</td>
                                        <td>07030167606</td>
                                        <td class="text-center"><i class="fa fa-edit pointer"></i></td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td><a href="#">Amir Sanni</a></td>
                                        <td>CUS-ID-0001</td>
                                        <td>07030167606</td>
                                        <td class="text-center"><i class="fa fa-edit pointer"></i></td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td><a href="#">Amir Sanni</a></td>
                                        <td>CUS-ID-0001</td>
                                        <td>07030167606</td>
                                        <td class="text-center"><i class="fa fa-edit pointer"></i></td>
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <td><a href="#">Amir Sanni</a></td>
                                        <td>CUS-ID-0001</td>
                                        <td>07030167606</td>
                                        <td class="text-center"><i class="fa fa-edit pointer"></i></td>
                                    </tr>
                                    <tr>
                                        <th>5</th>
                                        <td><a href="#">Amir Sanni</a></td>
                                        <td>CUS-ID-0001</td>
                                        <td>07030167606</td>
                                        <td class="text-center"><i class="fa fa-edit pointer"></i></td>
                                    </tr>
                                    <tr>
                                        <th>6</th>
                                        <td><a href="#">Amir Sanni</a></td>
                                        <td>CUS-ID-0001</td>
                                        <td>07030167606</td>
                                        <td class="text-center"><i class="fa fa-edit pointer"></i></td>
                                    </tr>
                                    <tr>
                                        <th>7</th>
                                        <td><a href="#">Amir Sanni</a></td>
                                        <td>CUS-ID-0001</td>
                                        <td>07030167606</td>
                                        <td class="text-center"><i class="fa fa-edit pointer"></i></td>
                                    </tr>
                                    <tr>
                                        <th>8</th>
                                        <td><a href="#">Amir Sanni</a></td>
                                        <td>CUS-ID-0001</td>
                                        <td>07030167606</td>
                                        <td class="text-center"><i class="fa fa-edit pointer"></i></td>
                                    </tr>
                                    <tr>
                                        <th>9</th>
                                        <td><a href="#">Amir Sanni</a></td>
                                        <td>CUS-ID-0001</td>
                                        <td>07030167606</td>
                                        <td class="text-center"><i class="fa fa-edit pointer"></i></td>
                                    </tr>
                                    <tr>
                                        <th>10</th>
                                        <td><a href="#">Amir Sanni</a></td>
                                        <td>CUS-ID-0001</td>
                                        <td>07030167606</td>
                                        <td class="text-center">
                                            <i id="CUS-ID-0001" class="fa fa-edit pointer" onclick="editCust(this.id)"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="row text-center">
                            <div class="pagination">Pagination</div>
                        </div>
                        <!-- Pagination ends -->
                    </div>
                     <!-- Customer list end -->
                    
                    <!-- Customer details -->
                    <div class="col-sm-4">
                        <div class="pwell custDetail scroll">
                            <table class="table table-bordered">
                                <h4 class="text-center text-uppercase">Sanni Amir Olalekan</h4>
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>CUS-ID-0001</td>
                                    </tr>
                                    <tr>
                                        <th>Tel</th>
                                        <td>07030167606</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>amirsanni@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <th>Debt</th>
                                        <td>N2,000</td>
                                    </tr>
                                    <tr>
                                        <th>Last Transaction</th>
                                        <td>23rd Dec, 2015</td>
                                    </tr>
                                    <tr>
                                        <th>Total Transactions</th>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <th>Total Money Spent</th>
                                        <td>N500,000</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary">View User's Transactions</button>
                            </div>
                        </div>
                    </div>
                     <!-- Customer details end -->
                </div>
            </div>
            <!-- Customer list ends -->
        </div>
    </div>
</div>


<!--- Modal to add new customer --->
<div class='modal fade' id='addNewCustModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <button class="close" data-dismiss='modal'>&times;</button>
                <h4 class="text-center">Add New Customer</h4>
            </div>
            <div class="modal-body">
                <form id='addNewCustForm' role='form'>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for='firstName' class="control-label">First Name</label>
                            <input type="text" id='firstName' name='firstName' class="form-control" placeholder="First Name">
                            <span class="help-block errMsg"></span>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for='lastName' class="control-label">Last Name</label>
                            <input type="text" id='lastName' name='lastName' class="form-control" placeholder="Last Name">
                            <span class="help-block errMsg"></span>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for='otherName' class="control-label">Other Names</label>
                            <input type="text" id='otherName' name='otherName' class="form-control" placeholder="Other Names">
                            <span class="help-block errMsg"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for='Mobile1' class="control-label">Phone Number</label>
                            <input type="tel" id='Mobile1' name='Mobile1' class="form-control" placeholder="Phone Number">
                            <span class="help-block errMsg"></span>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for='Mobile2' class="control-label">Other Number</label>
                            <input type="tel" id='Mobile2' name='Mobile2' class="form-control" placeholder="Other Number (optional)">
                            <span class="help-block errMsg"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for='email' class="control-label">Email</label>
                            <input type="email" id='email' name='email' class="form-control" placeholder="Email (optional)">
                            <span class="help-block errMsg"></span>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for='gender' class="control-label">Gender</label>
                            <select class="form-control" id='gender' name="gender">
                                <option value=''>Gender</option>
                                <option value='male'>Male</option>
                                <option value='female'>Female</option>
                            </select>
                            <span class="help-block errMsg"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for='address' class="control-label">Address</label>
                        <textarea id='address' name='address' class="form-control" placeholder="Address"></textarea>
                        <span class="help-block errMsg"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type='button' id='addCust' class="btn btn-primary">Add Customer</button>
                <button type='button' class="btn btn-danger" data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end of modal to add new customer --->


<!--- Modal for editing customer details --->
<div class='modal fade' id='editCustModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <button class="close" data-dismiss='modal'>&times;</button>
                <h4 class="text-center">Edit Customer Info</h4>
            </div>
            <div class="modal-body">
                <form id='editCustForm' role='form'>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for='firstName' class="control-label">First Name</label>
                            <input type="text" id='firstName' name='firstName' class="form-control" placeholder="First Name">
                            <span class="help-block errMsg"></span>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for='lastName' class="control-label">Last Name</label>
                            <input type="text" id='lastName' name='lastName' class="form-control" placeholder="Last Name">
                            <span class="help-block errMsg"></span>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for='otherName' class="control-label">Other Names</label>
                            <input type="text" id='otherName' name='otherName' class="form-control" placeholder="Other Names">
                            <span class="help-block errMsg"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for='Mobile1' class="control-label">Phone Number</label>
                            <input type="tel" id='Mobile1' name='Mobile1' class="form-control" placeholder="Phone Number">
                            <span class="help-block errMsg"></span>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for='Mobile2' class="control-label">Other Number</label>
                            <input type="tel" id='Mobile2' name='Mobile2' class="form-control" placeholder="Other Number (optional)">
                            <span class="help-block errMsg"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for='email' class="control-label">Email</label>
                            <input type="email" id='email' name='email' class="form-control" placeholder="Email (optional)">
                            <span class="help-block errMsg"></span>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for='gender' class="control-label">Gender</label>
                            <select class="form-control" id='gender' name="gender">
                                <option value=''>Gender</option>
                                <option value='male'>Male</option>
                                <option value='female'>Female</option>
                            </select>
                            <span class="help-block errMsg"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for='address' class="control-label">Address</label>
                        <textarea id='address' name='address' class="form-control" placeholder="Address"></textarea>
                        <span class="help-block errMsg"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type='button' id='editCust' class="btn btn-primary">Update</button>
                <button type='button' class="btn btn-danger" data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end of modal to edit customer details --->

<script src="<?=base_url()?>public/js/customers.js"></script>