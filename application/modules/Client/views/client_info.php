					<?php $currency = $this->db->get('company')->row()->currency;?>

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title"><?php echo $page_title;?></h6>
									<div class="heading-elements">
										
									</div>
								</div>

								<div class="panel-body">
									<div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-bottom custom-border">
											<li class="active"><a href="#bottom-tab1" data-toggle="tab">Basic Information</a></li>
											<li><a href="#bottom-tab2" class="run-charts" data-toggle="tab">Financial Information</a></li>
											<li><a href="#bottom-tab3" data-toggle="tab">Loans</a></li>
										</ul>

										<div class="tab-content">

										<?php
										//$this->db->join('branch','branch.branch_id = users.branch_id');
										$this->db->join('clients','clients.user_id = users.user_id');
										 $info = $this->db->get_where('users',array('users.user_id' =>$user_id))->result_array();
										foreach ($info as $row) {?>
											<div class="tab-pane active" id="bottom-tab1">

												<!-- Contests management -->
												<div class="panel panel-flat">
													<div class="panel-heading">
														<h6 class="panel-title"></h6>
														<div class="heading-elements">
													 <img alt="" id="image" src="<?php echo base_url();?>uploads/client/<?php echo $row['photo'];?>" class="img-responsive img-thumbnail" style="width: 150px; height: 150px; margin-left: 3%; margin-top: -39%;">
														</div>
													</div>

													<div class="table-responsive">
														
													</div>

													<div class="table-responsive">
														<table class="table text-nowrap">
															
															<tbody>
															<tr class="active border-double">
																<td colspan="4">Name : <?php echo $row['name'];?> | National ID <?php echo $row['national_id'];?>
															</td>
																
															</tr>
															<tr>
																<td>
																	<div class="media-left media-middle">
																		<a href="#"><img src="assets/images/brands/facebook.png" class="img-rounded img-xs" alt=""></a>
																	</div>
																	<div class="media-left">
																		<div class=""><a href="#" class="text-default text-semibold">Account Number</a></div>
																		
																	</div>
																</td>
																<td><span class="text-muted"><?php echo $row['account_number'];?>  </span></td>
																
																<td><div class=""><a href="#" class="text-default text-semibold">Balance
																	<?php echo $this->db->get('company')->row()->currency;?>
															<?php echo number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['account_balance'])),2);?></div>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="media-left media-middle">
																		<a href="#"><img src="assets/images/brands/youtube.png" class="img-rounded img-xs" alt=""></a>
																	</div>
																	<div class="media-left">
																		<div class=""><a href="#" class="text-default text-semibold">Contacts</a></div>
																		
																	</div>
																</td>
																<td><span class="text-muted"><?php echo $row['email'];?></span></td>
																<td><span class="text-muted"><?php echo $row['phone'];?></span></td>
																
															</tr>
															<tr>
																<td>
																	<div class="media-left media-middle">
																		<a href="#"><img src="assets/images/brands/spotify.png" class="img-rounded img-xs" alt=""></a>
																	</div>
																	<div class="media-left">
																		<div class=""><a href="#" class="text-default text-semibold">Gender</a></div>
																		
																	</div>
																</td>
																<td><span class="text-muted"><?php echo $row['gender'];?></span></td>
																<td><span class="text-muted"><?php echo $row['marital_status'];?></span></td>
																
															</tr>
															<tr>
																<td>
																	<div class="media-left media-middle">
																		<a href="#"><img src="assets/images/brands/twitter.png" class="img-rounded img-xs" alt=""></a>
																	</div>
																	<div class="media-left">
																		<div class=""><a href="#" class="text-default text-semibold">Addresses</a></div>
																		
																	</div>
																</td>
																<td><span class="text-muted"><?php echo $row['address1'];?></span></td>
																<td><span class="text-muted"><?php echo $row['address2'];?></span></td>
																
															</tr>

															
															</tbody>
														</table>
													</div>
												</div>
												<!-- /contests management -->

											</div>

								<div class="tab-pane" id="bottom-tab2">
									<div class="panel-body">
									 <div class="panel-heading">
                                         <div class="heading-elements">
										  <h4 class="widgettitle" style="padding:0.1%; border: 0px; background-color:transparent; "> 
								<button class="btn btn-sm btn-danger" onclick="delete_income()"> <i class="fa fa-times-circle"></i> Delete</button>
                    <a href ="<?php echo base_url();?>Client/income_create/<?php echo $user_id;?>" class="btn btn-sm btn-info"> <i class="fa fa-plus-circle"></i> New Income</a>
                     <button class="btn btn-sm" onclick="window.print()"> <i class="fa fa-print"></i> PRINT </button>
              </h4>  
          </div></div>
										Total Monthly Income : <?php  $this->db->select_sum('income');
															 $this->db->from('client_finance');
															 $this->db->where('user_id',$user_id);
															 $this->db->where('deleted',0);
														    $query = $this->db->get();?> 
												<span class="label label-info" style="margin-top: 1%;">
													       <?php echo $this->db->get('company')->row()->currency;?>
															<?php echo number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$query->row()->income)),2);?>
														</span>
									<table class="table datatable-selection-single">
										<thead>
										<tr>
											<th><input type="checkbox" class="checkall" /></th>
											<th>Occupation</th>
											<th>Monthly Income</th>
											<th class="text-center">Actions</th>
										</tr>
										</thead>
									
										<tbody>
											<?php 
											$count = 1;
											$income = $this->db->get_where('client_finance',array('user_id' => $user_id,'deleted'=>0))->result_array();
											foreach ($income as $row0) {?>
											
										<tr>
											<td> 
												<span class="center">
                                                     <input type="checkbox" class="cc" name="cfinance_id[]" value="<?php echo $row0['cfinance_id'];?>" />
                                                    </span>  
                                                </td>
											<td><span class="label label-info"><?php echo $row0['occupation'];?></span></td>
											<td><span class="label label-success">
												
													<?php echo $this->db->get('company')->row()->currency;?>
															<?php echo number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row0['income'])),2);?></div>
											
											</span></td>
											<td class="text-center">

												<ul class="icons-list">
													<li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown">
															<i class="icon-menu9"></i>
														</a>

														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="<?php echo base_url();?>Client/income_create/<?php echo $user_id;?>/<?php echo $row0['cfinance_id'];?>"><i class="fa fa-edit"></i> Edit</a></li>
															<li><a href="#" onclick="delete_income(<?php echo $row0['cfinance_id'];?>)"><i class="fa fa-remove"></i> Delete</a></li>
														</ul>
													</li>
												</ul>
											</td>
										</tr>
										<?php }?>
										</tbody>
									</table>
								</div>
												<!-- /quick stats boxes -->
							</div>



							<div class="tab-pane" id="bottom-tab3">
									<div class="panel-body">
									 <div class="panel-heading">
                                         <div class="heading-elements">
										  <h4 class="widgettitle" style="padding:0.1%; border: 0px; background-color:transparent; "> 
								<button class="btn btn-sm btn-danger" onclick="delete_income()"> <i class="fa fa-times-circle"></i> Delete</button>
                    <a href ="<?php echo base_url();?>Loans/create/<?php echo $user_id;?>" class="btn btn-sm btn-info"> <i class="fa fa-plus-circle"></i> New Loan</a>
                     <button class="btn btn-sm" onclick="window.print()"> <i class="fa fa-print"></i> PRINT </button>
              </h4>  
          </div>
      </div>
										Total Loan Balances : <?php  $this->db->select_sum('balance');
															 $this->db->from('loans');
															 $this->db->where('user_id',$user_id);
															 $this->db->where('deleted',0);
														    $query = $this->db->get();?> 
												<span class="label label-info" style="margin-top: 1%;">
													       <?php echo $this->db->get('company')->row()->currency;?>
															<?php echo number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$query->row()->balance)),2);?>
														</span>
									 <table class="table datatable-selection-single">
                                            <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkall" /></th>
                                                <th>Name</th>
                                                <th>Loan Amount</th>
                                                <th>Date Applied</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $count=1;?>
                                            <?php 

                                            $loans = $this->M_Loans->get_client_loans($user_id);
                                            foreach ($loans as $row):

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
                                                <td>
                                                    <span class="center">
                                                     <input type="checkbox" class="cc" name="loan_id[]" value="<?php echo $row['loan_id'];?>" />
                                                    </span>
                                                </td>
                                                <td><?php echo $row['name'];?></td>
                                                <td>
                                                    <span class="label label-success">
                                                    <?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['amount'])),2);?>  
                                                    </span>
                                                </td>
                                                 <td>
                                                    <span class="label label-primary">
                                                        <?php echo date('d F Y H:m', strtotime($row['date_applied']));?>
                                                    </span>
                                                </td>
                                                <td><?php echo $row['desc'];?></td>
                                                <td>

                                                      <?php echo $status;?>
                                                   
                                                </td>
                                                   <td class="text-center">
                                     <ul class="icons-list">

                                                                               <li class="dropdown">
                                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                        <i class="icon-menu9"></i>
                                                                                    </a>

                                                                                    <ul class="dropdown-menu dropdown-menu-right">
                                
                   																	<li><a href=""><i class="fa fa-edit"></i> Edit	</a></li> 
                  
                   																	<li><a href="<?php echo base_url();?>Loans/view/<?php echo $row['loan_id'];?>"><i class="fa fa-info-circle"></i> Details</a></li> 



                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </td>
                                            </tr>
                                        <?php endforeach;?>
                                            
                                            </tbody>
                                        </table>

								</div>
												<!-- /quick stats boxes -->
							</div>

										

											</div>
										</div>
										<?php }?>
									</div>
								</div>
							</div>
						</div>

					<script type="text/javascript">
                     function delete_income()
                      {
   
                          $.post("<?php echo base_url();?>Client/income_delete",
                          {
                                user_id : $('#user_id').val(),
                             occupation : $('#occupation').val(),
                                 income : $('#income').val()
                          },
                          function(data,status){
                           //location.reload();
                          });
                      }

/*
                      function delete_income()
                      {
                         if(confirm('Are you sure ????'))
                        {
                           var cfinance_id = [];
                          jQuery('.cc:checked').each(function(i,e){
                            cfinance_id.push(jQuery(this).val());
                          });

                          jQuery.post("<?php echo base_url();?>Client/income_delete",
                          {
                             cfinance_id : cfinance_id
                          },
                          function(data,status){
                           location.reload();
                          });
                        }
                      }*/

                       function delete_income(id)
						{
						  if(confirm('Are you sure ?????'))
						  {
							// ajax delete data from database
							  $.ajax({
								url : "<?php echo site_url('Client/income_delete')?>/"+id,
								type: "POST",
								dataType: "JSON",
								success: function(data)
								{
								   
								   location.reload();
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alert('Error deleting data');
								}
							});
					 
						  }
						}
                    </script>
				

