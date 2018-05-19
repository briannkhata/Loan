                            <?php $currency = $this->db->get('company')->row()->currency;?>

<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?> | <a href="<?php echo base_url();?>Loans">Back</a></h6>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                            <h4 class="widgettitle" style="padding:0.1%; border: 0px; background-color:transparent; "> 
                                            
                                                <div class="btn-group pull-right" style="margin-bottom: 1%;">
                                                    
                                                    <button type="button" class="btn bg-teal-400 dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fa fa-gears"></i> Loan Options <span class="caret"></span></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                         <li>
                                                          <a href="<?php echo base_url();?>Loans/status_change/<?php echo $loan_id;?>"><i class="fa fa-check-circle"></i> 
                                                        Change Status</a></li>
                                                        <li class="divider"></li>
                                                        <li>
                                                          <a href="<?php echo base_url();?>Loans/add_fees/<?php echo $loan_id;?>"><i class="fa fa-plus-circle"></i> 
                                                        Add Additional Fees</a></li>
                                                        <li class="divider"></li>
                                                        <li>
                                                          <a href="<?php echo base_url();?>Loans/add_attachment/<?php echo $loan_id;?>"><i class="fa fa-plus-circle"></i>
                                                            Add Attachment</a></li>
                                                            <li class="divider"></li>
                                                        <li>
                                                          <a href="<?php echo base_url();?>Loans/add_collateral/<?php echo $loan_id;?>"><i class="fa fa-plus-circle"></i>
                                                        Add Collateral</a></li>
                                                        <li class="divider"></li>
                                                        <li>
                                                          <a href="<?php echo base_url();?>Loans/add_payment/<?php echo $loan_id;?>"><i class="fa fa-money"></i> 
                                                        Add Payment</a></li>
                                                         <li class="divider"></li>
                                                        <li><a href="#" onclick="window.print();"><i class="fa fa-print"></i> 
                                                        Print</a></li>
                                                    </ul>
                                                </div>
                                            </h4>

                                                <!-- Questions area -->
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <!-- Questions list -->
                                                        <div class="panel-group panel-group-control panel-group-control-right">
                                                            <div class="panel panel-white">
                                                                <div class="panel-heading">
                                                                    <h6 class="panel-title">
                                                                        <a class="collapsed" data-toggle="collapse" href="#question1">
                                                                            <i class="fa fa-info-circle position-left text-slate"></i> Loan Information
                                                                        </a>
                                                                    </h6>
                                                                </div>

                                                                <div id="question1" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                       <table class="table datatable-selection-single">
                              
                                                                            <tbody>
                                                                                <?php 
                                                                                $this->db->join('users','users.user_id = loans.user_id');
                                                                                $this->db->join('clients','users.user_id = clients.user_id');
                                                                                $gr = $this->db->get_where('loans',array('loan_id' => $loan_id))->result_array();
                                                                                foreach($gr as $row){

                                                                                if ($row['status'] =='1'){
                                                                                    $status = '<span class="label label-info">PENDING</span>';
                                                                                  }
                                                                                  if($row['status'] == '2'){
                                                                                    $status = '<span class="label label-success">APPROVED AND STILL PAYING</span>';
                                                                                  }
                                                                                   if ($row['status'] == '3'){
                                                                                    $status = '<span class="label label-danger">DECLINED</span>';
                                                                                  }
                                                                                   if ($row['status'] == '4'){
                                                                                    $status = '<span class="label label-default">APPROVED AND FINISHED PAYING</span>';
                                                                                  }
                                                                                ?>
                                                                         <tr>
                                                                                <td colspan="2">

                                                                                     <img alt="" id="image" src="<?php echo base_url();?>uploads/client/<?php echo $row['photo'];?>" class="img-responsive img-thumbnail" style="width: 100px; height: 100px; margin-left: 3%; margin-top: 0%;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2">
                                                                                 <span class="label label-primary"><i class="fa fa-user"></i>
                                                                                    <?php echo $row['name'];?></span>

                                                                                    <span class="label label-primary"> id - 
                                                                                    <?php echo $row['national_id'];?></span>

                                                                                     <span class="label label-default"> gender - 
                                                                                    <?php echo $row['gender'];?></span>
                                                                                    </td>
                                                                            </tr>
                                                                           
                                                                         
                                                                              <tr>
                                                                                <td colspan="2">
                                                                                    <span class="label label-success"><i class="fa fa-mobile"></i>
                                                                                     <?php echo $row['phone'];?></span>
                                                                               
                                                                                     <span class="label label-success"><i class="fa fa-envelope"></i>
                                                                                     <?php echo $row['email'];?></span>
                                                                                </td>
                                                                              </tr>

                                                                              <tr>
                                                                                <td>
                                                                                    Loan Category
                                                                                </td>
                                                                                 <td>
                                                                                    <span class="label label-default">
                                            <?php echo $this->db->get_where('loan_types',array('loan_type_id' =>$row['loan_type_id']))->row()->loan_type;?>  |
                                            Interest Rate                                             
                                            <?php echo $this->db->get_where('loan_types',array('loan_type_id' =>$row['loan_type_id']))->row()->type_rate;?>%


                                                                                   </span>
                                                                               
                                                                                </td>
                                                                              </tr>
                                                                           
                                                                              <tr>
                                                                                <td>Address 1</td>
                                                                                <td><?php echo $row['address1'];?></td>
                                                                              </tr>
                                                                               <tr>
                                                                                <td>Address 2</td>
                                                                                <td><?php echo $row['address2'];?></td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td>Branch</td>
                                                                                <td>

                                                                                       <span class="label label-default">
                                                                                  <?php 
                                                                                  if($row['branch_id'] !=''){
                                                                            echo $this->db->get_where('branch',array('branch_id' => $row['branch_id']))->row()->branch_name;
                                                                          }?>
                                                                                    </span>
                                                                                  </td>
                                                                              </tr>

                                                                              <tr>
                                                                                <td colspan="2">
                                                                                 <span class="label label-success"> Amount Applied: 
                                                    <?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['amount'])),2);?>  
                                                    </span>  


                                                                                       <span class="label label-success">amount to pay
                                                    <?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['total_amount'])),2);?>  
                                                    </span>


                                                                                       <span class="label label-warning"> balance
                                                    <?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['balance'])),2);?>  
                                                    </span>


                                                                                       <span class="label label-success"> total paid : 
                                                    <?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['cash_in'])),2);?>  
                                                    </span>

                                                                                 <span class="label label-default">
                                                                                    AGENT - <?php echo $row['agent'];?></span>
                                                </td>
                                                                            </tr>
                                                                           
                                                                           
                                                                              <tr>
                                                                                <td>Payment Date</td>
                                                                                <td>
                                                                                    <span class="label label-default">
                                                                                   <?php echo date('Y M d',$row['payment_date']);?></span>

                                                                                </td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>Date Applied</td>
                                                                                <td>                                                                                    <span class="label label-info">
                                                                                  <?php echo date('d M Y', strtotime($row['date_applied']));?> </span>
                                                                                  
                                                                                      <?php echo $status;?> 
                                                                                    
                                                                                    <span class="label label-info">

                                                                                        <?php echo $row['reason'];?>
                                                                                            
                                                                                        </span> 
                                                </td>
                                                                            </tr>
                                                                              <tr>
                                                                                <td>Description</td>
                                                                                <td><?php echo $row['desc'];?></td>
                                                                              </tr>
                                                                            <?php }?>
                                                                         
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                    
                                                                </div>
                                                            </div>

                                                            <div class="panel panel-white">
                                                                <div class="panel-heading">
                                                                    <h6 class="panel-title">
                                                                        <a class="collapsed" data-toggle="collapse" href="#question2">
                                                                            <i class="fa fa-info-circle position-left text-slate"></i> Guarantor
                                                                        </a>
                                                                    </h6>
                                                                </div>

                                                                <div id="question2" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        <table class="table datatable-selection-single">
                              
                                                                            <tbody>
                                                                                <?php 
                                                                                $gr = $this->db->get_where('guaranta',array('loan_id' => $loan_id))->result_array();
                                                                                foreach($gr as $row){?>
                                                                                    <tr>
                                                                                <td colspan="2">

                                                                                     <img alt="" id="image" src="<?php echo base_url();?>uploads/guaranta/<?php echo $row['g_photo'];?>" class="img-responsive img-thumbnail" style="width: 100px; height: 100px; margin-left: 3%; margin-top: 0%;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                               
                                                                                <td colspan="2">
                                                                                <span class="label label-primary"><i class="fa fa-user"></i>
                                                                                    <?php echo $row['g_name'];?></span>

                                                                                    <span class="label label-primary"> id - 
                                                                                    <?php echo $row['g_id'];?></span>


                                                                                </td>
                                                                              
                                                                            </tr>
                                                                           
                                                                              <tr>
                                                                                <td>
                                                                                    <span class="label label-success"><i class="fa fa-mobile"></i>
                                                                                     <?php echo $row['g_phone'];?></span>
                                                                                </td>
                                                                              
                                                                                <td>
                                                                                     <span class="label label-success"><i class="fa fa-envelope"></i>
                                                                                     <?php echo $row['g_email'];?></span>
                                                                                </td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td>Relationship</td>
                                                                                <td><?php echo $row['relationship'];?></td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td>Address</td>
                                                                                <td><?php echo $row['g_address'];?></td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td>Remarks</td>
                                                                                <td><?php echo $row['remarks'];?></td>
                                                                              </tr>
                                                                            <?php }?>
                                                                         
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                   
                                                                </div>
                                                            </div>

                                                            <div class="panel panel-white">
                                                                <div class="panel-heading">
                                                                    <h6 class="panel-title">
                                                                        <a class="collapsed" data-toggle="collapse" href="#question3">
                                                                            <i class="fa fa-info-circle position-left text-slate"></i> Additional Fees
                                                                        </a>
                                                                    </h6>
                                                                </div>

                                                                <div id="question3" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        
                                                                        <table class="table datatable-selection-single">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Title</th>
                                                                                <th>Amount</th>
                                                                                <th class="text-center">Actions</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                   
                                                                           
                                                                                <?php 
                                                            $fees = $this->db->get_where('addional_fees',array('loan_id' =>$loan_id,'deleted'=>0))->result_array();
                                                                            foreach($fees as $row){?>
                                                                            <tr>
                                                                                <td><?php echo $row['fee_title'];?></td>
                                                                                <td><span class="label label-success">
                                                                        <?php echo $currency.' 
                                                                        '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['fee_amount'])),2);?>  
                                                                    </span>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <ul class="icons-list">
                                                                                    <li class="dropdown">
                                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                            <i class="icon-menu9"></i>
                                                                                        </a>

                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                            <li><a href="project.html"><i class="fa fa-edit"></i> Edit</a></li>
                                                                                            <li><a href="#"><i class="fa fa-remove"></i> Delete</a></li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                                </td>
                                                                            </tr>
                                                                        <?php }?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="panel panel-white">
                                                                <div class="panel-heading">
                                                                    <h6 class="panel-title">
                                                                        <a class="collapsed" data-toggle="collapse" href="#question4">
                                                                            <i class="fa fa-info-circle position-left text-slate"></i> Attachments
                                                                        </a>
                                                                    </h6>
                                                                </div>

                                                                <div id="question4" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        
                                                                          <table class="table datatable-selection-single">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Title</th>
                                                                                <th>File</th>
                                                                                <th class="text-center">Actions</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                   
                                                                           
                                                                                <?php 
                                                  $att = $this->db->group_by('title')->get_where('attachments',array('loan_id' =>$loan_id,'deleted'=>0))->result_array();
                                                                            foreach($att as $row){
                                                $file = $this->db->get_where('attachments',array('loan_id' =>$loan_id,'title'=>$row['title'],'deleted'=>0))->result_array();

                                                                              ?>
                                                                            <tr>
                                                                                <td><?php echo $row['title'];?></td>
                                                                                <td>
                                                                                  <?php foreach ($file as$value) {?>
                                                                                 <span class="label label-default"> 
                                                                                  <a href="<?php echo base_url();?>/Loans/attach_download/<?php echo $value['file']?>">
                                                                                    <b><?php echo $value['file'];?></b></a> </span>
                                                                                    <?php }?>
                                                                                  </td>
                                                                                <td class="text-center">
                                                                                    <ul class="icons-list">
                                                                                    <li class="dropdown">
                                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                            <i class="icon-menu9"></i>
                                                                                        </a>

                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                            <li><a href="project.html"><i class="fa fa-edit"></i> Edit</a></li>
                                                                                            <li><a href="#"><i class="fa fa-remove"></i> Delete</a></li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                                </td>
                                                                            </tr>
                                                                        <?php }?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                   
                                                                </div>
                                                            </div>

                                                            <div class="panel panel-white">
                                                                <div class="panel-heading">
                                                                    <h6 class="panel-title">
                                                                        <a class="collapsed" data-toggle="collapse" href="#question5">
                                                                            <i class="fa fa-info-circle position-left text-slate"></i> Collateral
                                                                        </a>
                                                                    </h6>
                                                                </div>

                                                                <div id="question5" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                       
                                                                          <table class="table datatable-selection-single">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th>Serial</th>
                                                                                <th>Files</th>
                                                                                <th>Estimated Price</th>
                                                                                <th class="text-center">Actions</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                   
                                                                           
                                                                                <?php 
                                                            $coll = $this->db->get_where('collaterals',array('loan_id' =>$loan_id,'deleted'=>0))->result_array();
                                                                            foreach($coll as $row){?>
                                                                            <tr>
                                                                                <td>
                                                                                  <?php echo $row['name'];?><br>
                                                                                 Model : <?php echo $row['model'];?><br>
                                                                                  Make : <?php echo $row['make'];?><br>
                                                                                  Type : <?php echo $row['type'];?><br>
                                                                                    
                                                                                  </td>
                                                                                <td><?php echo $row['s_no'];?></td>
                                                                                <td>
                                                                                   File : <a href="<?php echo base_url();?>/Loans/file1_download/<?php echo $row['file']?>">
                                                                                    <b><?php echo $row['file'];?></b></a> <br>

                                                                                    Proof of ownership : <a href="<?php echo base_url();?>/Loans/file2_download/<?php echo $row['proof']?>">
                                                                                    <b><?php echo $row['proof'];?></b></a> <br>

                                                                                </td>
                                                                                <td>
                                                                                  <span class="label label-success">
                                                                        <?php echo $currency.' 
                                                                        '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['price'])),2);?>  
                                                                    </span>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <ul class="icons-list">
                                                                                    <li class="dropdown">
                                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                            <i class="icon-menu9"></i>
                                                                                        </a>

                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                            <li><a href="project.html"><i class="fa fa-edit"></i> Edit</a></li>
                                                                                            <li><a href="#"><i class="fa fa-remove"></i> Delete</a></li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                                </td>
                                                                            </tr>
                                                                        <?php }?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                   
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--div class="panel-group panel-group-control panel-group-control-right">
                                                            <div class="panel panel-white">
                                                                <div class="panel-heading">
                                                                    <h6 class="panel-title">
                                                                        <a class="collapsed" data-toggle="collapse" href="#question6">
                                                                            <i class="fa fa-info-circle position-left text-slate"></i> Payment Schedule
                                                                        </a>
                                                                    </h6>
                                                                </div>

                                                                <div id="question6" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        
                                                                          <table class="table datatable-selection-single">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Date</th>
                                                                                <th>Decsription</th>
                                                                                <th>Rate</th>
                                                                                <th class="text-center">Actions</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                   
                                                                           
                                                                                <?php 
                                                            $ps = $this->db->get_where('pay_schedule',array('loan_id' =>$loan_id,'deleted'=>0))->result_array();
                                                                            foreach($ps as $row){?>
                                                                            <tr>
                                                                                <td><?php echo $row['date'];?></td>
                                                                                <td><?php echo $row['desc'];?></td>
                                                                                <td><span class="label label-success">
                                                                        <?php echo $currency.' 
                                                                        '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['rate'])),2);?>  
                                                                    </span>
                                                                             
                                                                                <td class="text-center">
                                                                                    <ul class="icons-list">
                                                                                    <li class="dropdown">
                                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                            <i class="icon-menu9"></i>
                                                                                        </a>

                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                            <li><a href="project.html"><i class="fa fa-edit"></i> Edit</a></li>
                                                                                            <li><a href="#"><i class="fa fa-remove"></i> Delete</a></li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                                </td>
                                                                            </tr>
                                                                        <?php }?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                    
                                                                </div>
                                                            </div-->

                                                            <div class="panel panel-white">
                                                                <div class="panel-heading">
                                                                    <h6 class="panel-title">
                                                                        <a class="collapsed" data-toggle="collapse" href="#question7">
                                                                            <i class="fa fa-info-circle position-left text-slate"></i> Payment History
                                                                        </a>
                                                                    </h6>
                                                                </div>

                                                                <div id="question7" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        <table class="table datatable-selection-single">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Date</th>
                                                                                <th>Comment</th>
                                                                                <th>Amount</th>
                                                                                <th class="text-center">Actions</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                   
                                                                           
                                                                                <?php 
                                                            $pp = $this->db->get_where('payments',array('loan_id' =>$loan_id,'deleted'=>0))->result_array();
                                                                            foreach($pp as $row){?>
                                                                            <tr>
                                                                                <td><?php echo date('Y F d H:m :i',strtotime($row['payment_date']));?></td>
                                                                                <td><?php echo $row['comment'];?></td>
                                                                                <td><span class="label label-success">
                                                                        <?php echo $currency.' 
                                                                        '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['payment_amount'])),2);?>  
                                                                    </span>
                                                                             
                                                                                <td class="text-center">
                                                                                    <ul class="icons-list">
                                                                                    <li class="dropdown">
                                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                            <i class="icon-menu9"></i>
                                                                                        </a>
                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                            <li><a href="#"><i class="fa fa-list"></i> Receipt</a></li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                                </td>
                                                                            </tr>
                                                                        <?php }?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                    
                                                                </div>
                                                            </div>


                                                            
                                                        </div>
                                                        <!-- /questions list -->

                                                    </div>

                                                    

                                        </div>
                                    </div>
                                </div>
                            </div>
               





