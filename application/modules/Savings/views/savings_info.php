                            <?php $currency = $this->db->get('company')->row()->currency;?>

												<div class="panel panel-white">
													<div class="panel-heading">
														<h6 class="panel-title"><?php echo $page_title;?></h6>
														<div class="heading-elements">
															
															<button onclick="window.print();" type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
														</div>
													</div>

													<div class="panel-body no-padding-bottom">
														<div class="row">
															<div class="col-sm-6 content-group">
																<img src="<?php echo base_url();?>uploads/logo/<?php echo $this->db->get('company')->row()->company_logo;?>" class="content-group mt-10" alt="" style="width: 120px;">
																<ul class="list-condensed list-unstyled">
																	<li><?php echo $this->db->get('company')->row()->company_name;?></li>
																	<li><?php echo $this->db->get('company')->row()->company_phone;?></li>
																	<li><?php echo $this->db->get('company')->row()->company_email;?></li>
																</ul>
															</div>

															<div class="col-sm-6 content-group">
																<div class="invoice-details">
																	<h5 class="text-uppercase text-semibold">Transaction #<?php echo $account_transaction_id;?></h5>
																	<ul class="list-condensed list-unstyled">
																		<li>Date: <span class="text-semibold"><?php echo date('d M Y h:m:i',strtotime($this->db->get_where('account_transaction',array('account_transaction_id' =>$account_transaction_id))->row()->tr_date));?></span></li>
																	</ul>
																</div>
															</div>
														</div>
														<hr>
													<?php 
													 $this->db->where('account_transaction_id',$account_transaction_id);
													 $this->db->join('users','users.user_id = account_transaction.user_id');
		    										 $this->db->join('clients','users.user_id = clients.user_id');
													 $all = $this->db->get('account_transaction')->result_array();
													foreach ($all as $row) {?>

														<div class="row">
															<div class="col-md-6 col-lg-9 content-group">
																<span class="text-muted">Client :</span>
																<ul class="list-condensed list-unstyled">
																	<li><h5><?php echo $row['name'];?></h5></li>
																	<li><span class="text-semibold"><?php echo $row['address2'];?></span></li>
																	<li><?php echo $row['phone'];?></li>
																	<li><a href="#"><?php echo $row['email'];?></a></li>
																</ul>
															</div>

												<?php 
												 if($row['tr_type']== 1){
							                           $tr_type = 'Deposit';
							                        }

							                         if($row['tr_type']== 2){
							                           $tr_type = 'Withdraw';
							                        }
								$tr_amount = $this->db->get_where('account_transaction',array('account_transaction_id' => $account_transaction_id))->row()->tr_amount;
										$by = $this->db->get_where('account_transaction',array('account_transaction_id' => $account_transaction_id))->row()->user_id;
													$received_by = $this->db->get_where('users',array('user_id' => $by))->row()->name;
													$teller = $this->db->get_where('users',array('user_id' => $row['teller']))->row()->name;?>

															<div class="col-md-6 col-lg-3 content-group">
																<span class="text-muted">Transaction Details :</span>
																<ul class="list-condensed list-unstyled invoice-payment-details">
																	<li><h5>Amount: <span class="text-right text-semibold">
						<?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$tr_amount)),2);?>  
																		</span></h5></li>
																	<li>Type: <span class="text-semibold"></span> <?php echo $tr_type;?></li>
																	<li>Teller : <span class="text-semibold"></span> <?php echo $teller;?></li>
																
																</ul>
															</div>
														</div>
													</div>

												<?php }?>

													
												</div>
												<!-- /invoice template -->
