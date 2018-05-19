					<?php $currency = $this->db->get('company')->row()->currency;?>

          <div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title"><span><?php echo $page_title;?> |
                      
                    </span>
                </span></h6>

								</div>
							<hr style="width: 98%;">
								<div class="panel-body" style="margin-top:%; ">

									<?php $attributes = array("name" => "contact_form", "id" => "contact_form");
						            echo form_open("Savings/submit", $attributes);?>

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

  