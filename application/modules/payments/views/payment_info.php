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
																	<h5 class="text-uppercase text-semibold">Payment #<?php echo $payment_id;?></h5>
																	<ul class="list-condensed list-unstyled">
																		<li>Date: <span class="text-semibold"><?php echo date('d M Y h:m:i',strtotime($this->db->get_where('payments',array('payment_id' =>$payment_id))->row()->payment_date));?></span></li>
																	</ul>
																</div>
															</div>
														</div>
													<?php 
													$user_id = $this->db->get_where('loans',array('loan_id' => $loan_id))->row()->user_id;
													$name = $this->db->get_where('users',array('user_id' => $user_id))->row()->name;
													$address1 = $this->db->get_where('users',array('user_id' => $user_id))->row()->address1;
													$address2 = $this->db->get_where('users',array('user_id' => $user_id))->row()->address2;
													$phone = $this->db->get_where('users',array('user_id' => $user_id))->row()->phone;
													$email = $this->db->get_where('users',array('user_id' => $user_id))->row()->email;
													?>
														<div class="row">
															<div class="col-md-6 col-lg-9 content-group">
																<span class="text-muted">Payment From:</span>
																<ul class="list-condensed list-unstyled">
																	<li><h5><?php echo $name;?></h5></li>
																	<li><span class="text-semibold"><?php echo $address2;?></span></li>
																	<li><?php echo $phone;?></li>
																	<li><a href="#"><?php echo $email;?></a></li>
																</ul>
															</div>

												<?php 
													$payment_amount = $this->db->get_where('payments',array('payment_id' => $payment_id))->row()->payment_amount;
													$by = $this->db->get_where('payments',array('payment_id' => $payment_id))->row()->received_by;
													$received_by = $this->db->get_where('users',array('user_id' => $by))->row()->name;?>
															<div class="col-md-6 col-lg-3 content-group">
																<span class="text-muted">Payment Details:</span>
																<ul class="list-condensed list-unstyled invoice-payment-details">
																	<li><h5>Payment: <span class="text-right text-semibold">
						<?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$payment_amount)),2);?>  
																		</span></h5></li>
																	<li>Received by: <span class="text-semibold"></span> <?php echo $received_by;?></li>
																
																</ul>
															</div>
														</div>
													</div>

													<div class="table-responsive">
														<table class="table table-lg">
														
															<tbody>
															<?php $dd = $this->db->get_where('loans',array('loan_id' =>$loan_id))->result_array();
															foreach ($dd as $row) {?>
															<tr>
																<td>
																	<h6 class="no-margin">Amount Applied</h6>
																</td>
																<td>
                                                    <?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['amount'])),2);?>  
                                                
																	</td>
															</tr>
															<tr>
																<td>
																	<h6 class="no-margin">Amount to Pay</h6>
																</td>
																<td>
														<?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['total_amount'])),2);?>  
</td>
															</tr>
															<tr>
																<td>
																	<h6 class="no-margin">Total Paid</h6>
																</td>
																<td>
																		
								<?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['cash_in'])),2);?>  

																	</td>
															</tr>
															<tr>
																<td>
																	<h6 class="no-margin">Balance</h6>
																</td>
																<td>
                                                    <?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$row['balance'])),2);?>  
					</td>
															</tr>
															<?php }?>
															
															</tbody>
														</table>
													</div>

													
												</div>
												<!-- /invoice template -->
