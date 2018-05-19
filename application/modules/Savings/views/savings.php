					<?php $currency = $this->db->get('company')->row()->currency;?>

          <div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title"><span><?php echo $page_title;?> |
                      
                    </span>
                </span></h6>
									<div class="heading-elements">

       <?php 
          if(isset($sub_module_id))
          {
            $modules_actions = $this->db->select('*')
            ->from('sub_module_actions')
            ->join('user_sub_module_actions','user_sub_module_actions.sub_module_action_id = sub_module_actions.sub_module_action_id')
            ->join('users','user_sub_module_actions.user_id = users.user_id')
            ->where('sub_module_actions.sub_module_id',$sub_module_id)
            ->where('user_sub_module_actions.user_id',$user_id)
            ->order_by('sort','ASC')->get()->result_array();
            if(count($modules_actions) > 0)
              {?>
            
              <h4 class="widgettitle" style="padding:0.1%; border: 0px; background-color:transparent; "> 
                    <?php foreach($modules_actions as $row){ 
                         if($row['sub_module_action_id'] != 'view'){
                         ?>
                      <a  
                      <?php if ($row['sub_module_action_id'] =='delete'){?>
                       onclick="deletee();" <?php }
                      else {?>
                        href ="<?php echo $sub_module_id.'/'.$row['sub_module_action_id'];?>"
                      <?php } ?>

                      class="<?php echo $row['class'];?>"> <i class="<?php echo $row['icon'];?>"></i> 
                    <?php echo strtoupper($row['desc']);?>
                  </a>
              <?php }}?>               
                     <button class="btn btn-sm" onclick="window.print()"> <i class="fa fa-print"></i> PRINT </button>
              </h4>
              <?php 
            }?> 

        <?php  }
        elseif(isset($module_id))
        {
            $modules_actionss = $this->db->select('*')
            ->from('modules_actions')
            ->join('user_module_actions','user_module_actions.action_id = modules_actions.action_id')
            ->join('users','user_module_actions.user_id = users.user_id')
            ->where('modules_actions.module_id',$module_id)
            ->where('user_module_actions.user_id',$user_id)
            ->order_by('sort','ASC')->group_by('user_module_actions.action_id')->get()->result_array();
            if(count($modules_actionss) > 0)
              {?>
              <h4 class="widgettitle" style="padding:0.1%; border: 0px; background-color:transparent; "> 
                    <?php foreach($modules_actionss as $row99){ 
                         if($row99['action_id'] != 'view'){
                         ?>
                      <a  
                      <?php if ($row99['action_id'] =='delete'){?>
                       onclick="deletee();" <?php }
                          else
                        {?>
                        href ="<?php echo $module_id.'/'.$row99['action_id'];?>"
                      <?php } ?> 

                      class="<?php echo $row99['class'];?>"> <i class="<?php echo $row99['icon'];?>"></i> 
                    <?php echo strtoupper($row99['desc']);?>
                  </a>
              <?php }}?>               
                     <button class="btn btn-sm" onclick="window.print()"> <i class="fa fa-print"></i> PRINT </button>
              </h4><?php }}?>   




									</div>
								</div>
							<hr style="width: 98%;">
								<div class="panel-body" style="margin-top:%; ">

									<table class="table datatable-selection-single">
											<thead>
											<tr>
												<th><input type="checkbox" class="checkall" /></th>
												<th>TxID</th>
												<th>Transaction Type</th>
                        <th>Account No.</th>
                        <th>Name</th>
                        <th>Amount</th>
												<th>Date</th>
                        <th>Actions</th>
											</tr>
											</thead>
											<tbody>
											<?php $count=1;?>
                      <?php foreach ($savings as $row):
                        if($row['tr_type']== 1){
                           $tr_type = 'Deposit';
                        }

                         if($row['tr_type']== 2){
                           $tr_type = 'Withdraw';
                        }


                      ?>
											<tr>
												<td>
													<span class="center">
                           							 <input type="checkbox" class="cc" name="account_transaction_id[]" value="<?php echo $row['account_transaction_id'];?>" />
                          							</span></td>
                                          <td><?php echo $row['tr_id'];?></td>
                                          <td><span class="label label-info"><?php echo $tr_type;?></span></td>

                                          <td><?php echo $row['account_number'];?></td>
                                          <td><?php echo $row['name'];?></td>
                                    			<td><span class="label label-success">
                                            <?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['tr_amount'])),2);?>
                                          </span>
                                          </td>
												<td><?php echo date('Y F d h:m:i',strtotime($row['tr_date']));?></td>
                                     <td class="text-center">
                                     <ul class="icons-list">

                                                                               <li class="dropdown">
                                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                        <i class="icon-menu9"></i>
                                                                                    </a>

                                                                                    <ul class="dropdown-menu dropdown-menu-right">
                                               <?php
                                 if(isset($sub_module_id))
                                    {
                                      $mos = $this->db->select('*')
                                      ->from('sub_module_actions')
                                      ->join('user_sub_module_actions','user_sub_module_actions.sub_module_action_id = sub_module_actions.sub_module_action_id')
                                      ->join('users','user_sub_module_actions.user_id = users.user_id')
                                      ->where('sub_module_actions.sub_module_id',$sub_module_id)
                                      ->where('user_sub_module_actions.user_id',$user_id)
                                      ->order_by('sort','ASC')->group_by('user_sub_module_actions.sub_module_action_id')->get()->result_array();
                                      if(count($mos) > 0)
                                        {
                                        foreach($mos as $roww){
                                     if($roww['sub_module_action_id'] != 'create' AND $roww['sub_module_action_id'] != 'view'){ echo '';} else {?>
                      <li><a href="<?php echo $sub_module_id.'/'.$roww['sub_module_action_id'].'/'.$row['account_transaction_id'];?>"> 
                    <?php if ($roww['sub_module_action_id'] == 'create'){?> 
                    <i class="fa fa-edit"></i> Edit
                            <?php } else{?>
                    <i class="<?php echo $roww['icon'];?>"></i> 
                       <?php echo ucwords($roww['desc']);}?>
                </a> </li><?php }}}}

                        elseif(isset($module_id))
                       {      $mc = $this->db->select('*')
                                  ->from('modules_actions')
                                  ->join('user_module_actions','user_module_actions.action_id = modules_actions.action_id')
                                  ->join('users','user_module_actions.user_id = users.user_id')
                                  ->where('modules_actions.module_id',$module_id)
                                  ->where('user_module_actions.user_id',$user_id)
                                  ->order_by('sort','ASC')->group_by('user_module_actions.action_id')->get()->result_array();
                                   if(count($mc) > 0)
                                    {
                                  foreach($mc as $roww9){
                                     if($roww9['action_id'] != 'create' AND $roww9['action_id'] != 'view'){ echo '';} else {?>
                       <li><a href="<?php echo $module_id.'/'.$roww9['action_id'].'/'.$row['account_transaction_id'];?>"> 
                    <?php if ($roww9['action_id'] == 'create'){?> 
                    <i class="fa fa-edit"></i> Edit
                            <?php } else{?>
                    <i class="<?php echo $roww9['icon'];?>"></i> 
                       <?php echo ucwords($roww9['desc']);}?>
                </a></li> <?php }}}} else{}?>  



                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </td>
											</tr>
										<?php endforeach;?>
											
											</tbody>
										</table>

								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
				     function deletee()
				      {
                 var account_transaction_id = [];
                  jQuery('.cc:checked').each(function(i,e){
                    account_transaction_id.push(jQuery(this).val());
                  });
                  if(account_transaction_id ==''){
                    alert('SELECT ATLEAST ONE TRANSACTION TO DELETE');
                  }else{
				         if(confirm('Are you sure ????'))
				        {
				          
				          jQuery.post("Savings/delete",
				          {
				             account_transaction_id : account_transaction_id
				          },
				          function(data,status){
				            //if(data){
				              location.href="Savings";
				           // }
				          });
				        }
				      }
            }

              function show_select(){
                 var dd =  $('#tr_type').val();
                 if(dd == 3){
                  $('#staffa').show();
                }
                 if(dd == 2){
                  $('#staffa').hide();
                }

                 if(dd == 1){
                  $('#staffa').hide();
                }
              }



					</script>

  <div id="myModal" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php $attributes = array("name" => "contact_form", "id" => "contact_form");
            echo form_open("Savings/submit", $attributes);?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">SAVINGS ACCOUNT TRANSACTION</h4>
            </div>
            <div class="modal-body" id="myModalBody">
                <div class="form-group">
                    <label for="name">Amount</label>
                    <input class="form-control" id="tr_amount" name="tr_amount" placeholder="Amount" type="text"/>
                </div>

                 <div class="form-group">
                        <label>Transaction type</label>
                          <select class="select" name="tr_type" id="tr_type">
                            <option disabled="">--Transaction type--</option>
                              <option  value="1">Deposit</option>
                              <option  value="2">Withdraw</option>
                          </select>
                   </div>

                 <div class="form-group">
                        <label>Client</label>
                          <select class="select" name="user_id" id="user_id">
                            <option disabled="">--Select staff--</option>
                            <?php 
                            $this->db->where('users.deleted',0);
                            $this->db->join('users','clients.user_id = users.user_id');
                            $query = $this->db->get('clients');
                            foreach ($query->result_array() as $roww) {?>
                              <option  value="<?php echo $roww['user_id'];?>"><?php echo $roww['name'];?></option>
                              <?php }?>
                          </select>
                   </div>
                
               

                <div id="alert-msg"></div>
            </div>
            <div class="modal-footer">
                <button class="btn bg-teal-400" id="submit" name="submit" type="submit"/><i class="fa fa-save"></i> Transact</button>
                <button class="btn bg-grey-600" type="reset" data-dismiss="modal"/><i class="fa fa-close"></i> Cancel</button>
            </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>

<script>

  function do_this(){

        var checkboxes = document.getElementsByName('employee_id[]');
        var button = document.getElementById('toggle');
    $('.ik').show();
        if(button.value == 'select'){
            for (var i in checkboxes){
                checkboxes[i].checked = 'FALSE';
            }
            button.value = 'deselect'
        }else{
            for (var i in checkboxes){
                checkboxes[i].checked = '';
            }
            button.value = 'select';
        }
    }


</script>