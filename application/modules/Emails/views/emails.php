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
                      else
                        {?>
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
                    <?php if ($this->session->flashdata('email_sent')) { echo $this->session->flashdata('email_sent');}?> 
									<table class="table datatable-selection-single">
											<thead>
											<tr>
												<th><input type="checkbox" class="checkall" /></th>
												<th>Sending Email</th>
												<th>Receiver Email</th>
												<th>Subject</th>
												<th>Message</th>
												<th>Date Created</th>
											</tr>
											</thead>
											<tbody>
											<?php $count=1;?>
                                			<?php foreach ($emails as $row):?>
											<tr>
												<td>
													<span class="center">
                           							 <input type="checkbox" class="cc" name="email_id[]" value="<?php echo $row['email_id'];?>" />
                          							</span>                          </td>
                                    			<td><?php echo $row['sending_email'];?></td>
                                    			<td><?php echo $row['receiver_email'];?></td>
                                    			<td><?php echo $row['subject'];?></td>
                                    			<td><?php echo $row['message'];?></td>
												<td><?php echo date('Y F d h:m',$row['date_sent']);?></td>
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
                 var email_id = [];
                  jQuery('.cc:checked').each(function(i,e){
                    email_id.push(jQuery(this).val());
                  });
                  if(email_id ==''){
                     alert('PLEASE SELECT ATLEATS ONE EMAIL TO DELETE FROM THE LIST!');
                  }else{
				         if(confirm('Are you sure ????'))
				        {
				          jQuery.post("<?php echo base_url().$module_id;?>/delete",
				          {
				             email_id : email_id
				          },
				          function(data,status){
				            location.href="Emails"

				          });
				        }
				        }
				      }
					</script>