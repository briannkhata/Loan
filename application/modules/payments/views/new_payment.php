<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?> | <a href="<?php echo base_url();?>Payments">Back</a></h6>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            <hr style="width: 98%;">
                                <div class="panel-body">
                                  <?php if ($this->session->flashdata('message')) { ?>
                                                <?php echo $this->session->flashdata('message'); ?>
                                        <?php } ?>
                                                            <form action="<?php echo base_url();?>Loans/payment_add" method="post" enctype="multipart/form-data">

                                                            <div class="form-group">
                                                                <label>Loan | Client</label>
                                                                  <select class="select" name="loan_id" id="loan_id">
                                                                    <option disabled="">--Select Client--</option>
                                                                    <?php 
                                                                    $this->db->where('loans.deleted',0);
                                                                    $this->db->where('loans.status',2);
                                                                   // $this->db->where('loans.balance >',0);
                                                                    $this->db->join('users','clients.user_id = users.user_id');
                                                                    $this->db->join('loans','loans.user_id = users.user_id');
                                                                    $query = $this->db->get('clients');
                                                                    foreach ($query->result_array() as $roww) {?>
                                                                      <option  value="<?php echo $roww['loan_id'];?>"><?php echo $roww['name'];?> | 
                                                                      	Balance <?php echo $roww['balance'];?>
                                                                      </option>
                                                                      <?php }?>
                                                                  </select>
                                                           </div>

                                                                <div class="form-group">
                                                                    <label>Amount</label>
                                                                    <input type="text" class="form-control" name="payment_amount" id="payment_amount">
                                                                </div>
                                                               
                                                               <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea class="form-control" name="comment" id="comment">
                                                                    </textarea>
                                                                 </div>
                                                                      

                                                               
                                                                <div class="text-right">
                                                                    
                                                                    <button type="reset" class="btn  bg-grey-600">Reset</button>
                                                                    <button type="submit" class="btn bg-teal-400">Add Payment</button>

                                                                </div>
                                                            </form>
                                                    
                                       
                            </div>
                        </div>
                    </div>
