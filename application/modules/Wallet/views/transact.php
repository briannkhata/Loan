					<?php $currency = $this->db->get('company')->row()->currency;?>

          <div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title"><span><?php echo $page_title;?> | Total Balance  <span class="label label-default">
                    <?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$total_amount)),2);?></span>
                </span> | <a href="<?php echo base_url();?>Wallet">Back</a></h6>
								</div>
							<hr style="width: 98%;">
								<div class="panel-body" style="margin-top:%; ">
                        <?php if ($this->session->flashdata('message')) { ?>
                                                <?php echo $this->session->flashdata('message'); ?>
                                        <?php } ?>
			<?php $attributes = array("name" => "contact_form", "id" => "contact_form");
            echo form_open("Wallet/submit", $attributes);?>
                <div class="form-group">
                    <label for="name">Amount</label>
                    <input class="form-control" id="tr_amount" name="tr_amount" placeholder="Amount" type="text"/>
                </div>

                 <div class="form-group">
                        <label>Transaction type</label>
                          <select class="select" name="tr_type" id="tr_type" onchange="show_select();">
                            <option disabled="">--Transaction type--</option>
                              <option  value="1">Credit</option>
                              <option  value="2">Debit</option>
                              <option  value="3">Transfer</option>
                          </select>
                   </div>

                 <div class="form-group" id="staffa" style="display: none;">
                        <label>Staff</label>
                          <select class="select" name="user_id" id="user_id">
                            <option disabled="">--Select staff wallet--</option>
                            <?php 
                            $this->db->where('wallet.deleted',0);
                            $this->db->where('users.user_id !=',$this->session->userdata('user_id'));
                            $this->db->join('users','wallet.user_id = users.user_id');
                            $query = $this->db->get('wallet');
                            foreach ($query->result_array() as $roww) {?>
                              <option  value="<?php echo $roww['user_id'];?>"><?php echo $roww['name'];?></option>
                              <?php }?>
                          </select>
                   </div>
                
                <div class="form-group">
                    <label for="message">Description</label>
                    <textarea class="form-control" id="tr_desc" name="tr_desc" rows="4" placeholder="Description"></textarea>
                </div>


                                                               
             <div class="text-right">
                <button class="btn bg-teal-400" id="submit" name="submit" type="submit"/><i class="fa fa-save"></i> Add Transaction</button>
                <button class="btn bg-grey-600" type="reset"/><i class="fa fa-close"></i> Cancel</button>
            </div>
            <?php echo form_close(); ?>  

								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
				     function deletee()
				      {
                  var wallet_transaction_id = [];
                  jQuery('.cc:checked').each(function(i,e){
                    wallet_transaction_id.push(jQuery(this).val());
                  });
                  if(wallet_transaction_id == ''){
                    alert('SELECT ATLEAST ONE TRANSACTION TO DELETE');
                  }else{
				         if(confirm('Are you sure ????'))
				        {

				          jQuery.post("Wallet/delete",
				          {
				             wallet_transaction_id : wallet_transaction_id
				          },
				          function(data,status){
                    location.href="wallet";
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

  