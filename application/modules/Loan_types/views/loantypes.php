			 <?php 
						    $currency = $this->db->get('company')->row()->currency;

				    ?>

			<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title"><span><?php echo $page_title;?></span></h6>
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
            ->order_by('sort','ASC')->group_by('user_sub_module_actions.sub_module_action_id')->get()->result_array();
            if(count($modules_actions) > 0)
              {?>
            
              <h4 class="widgettitle" style="padding:0.1%; border: 0px; background-color:transparent; "> 
                    <?php foreach($modules_actions as $row){ 
                         if($row['sub_module_action_id'] != 'view'){
                         ?>
                      <a  
                      <?php if ($row['sub_module_action_id'] =='delete'){?>
                       onclick="deletee();" <?php }
                      else
                        {?>
                        href ="<?php echo base_url().$sub_module_id.'/'.$row['sub_module_action_id'];?>"
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
                        href ="<?php echo base_url().$module_id.'/'.$row99['action_id'];?>"
                      <?php } ?> 

                      class="<?php echo $row99['class'];?>"> <i class="<?php echo $row99['icon'];?>"></i> 
                    <?php echo strtoupper($row99['desc']);?>
                  </a>
              <?php }}?>               
                     <button class="btn btn-sm" onclick="window.print()"> <i class="fa fa-print"></i> PRINT </button>
              </h4><?php }}?>   



									</div>
								</div>

								<div class="panel-body">

									<table class="table datatable-selection-single">
											<thead>
											<tr>
												<th><input type="checkbox" class="checkall" /></th>
												<th>Category</th>
												<th>Description</th>
												<th>Borrowing Range</th>
												<th>Interest Rate</th>
												<th class="text-center">Actions</th>
											</tr>
											</thead>
											<tbody>
											<?php $count=1;?>
                                			<?php foreach ($type as $row):?>
											<tr>
												<td>	
													<span class="center">
                           							 <input type="checkbox" class="cc" name="loan_type_id[]" value="<?php echo $row['loan_type_id'];?>" />
                          							</span>                          
                          						</td>
												<td><span class="label label-info"><?php echo $row['loan_type'];?></span></td>
                                    			<td><?php echo $row['type_desc'];?></td>
                                    			<td>
                                    				<span class="label label-success">
                                                    <?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",
                                    				$row['type_amount'])),2);?>  
                                                    </span>
												</td>
                                    			<td><span class="label label-default"> 
                                    				<?php echo $row['type_rate'];?>%</span>
                                    			</td>
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
                      <li><a href="<?php echo $sub_module_id.'/'.$roww['sub_module_action_id'].'/'.$row['loan_type_id'];?>"> 
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
                       <li><a href="<?php echo $module_id.'/'.$roww9['action_id'].'/'.$row['loan_type_id'];?>"> 
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

                          var loan_type_id = [];
                          jQuery('.cc:checked').each(function(i,e){
                            loan_type_id.push(jQuery(this).val());
                          });
                          if(loan_type_id ==''){
                            alert('PLEASE SELECT ATLEAST ONE CATEGORY TO DELETE FROM THE LIST!');
                          }else{
                                   if(confirm('Are you sure ????'))
                                  {
                                    jQuery.post("Loan_types/delete",
                                    {
                                       loan_type_id : loan_type_id
                                    },
                                    function(data,status){
                                     location.href="Loan_types"
                                    });
                                  }
                                }
                      }
                    </script>