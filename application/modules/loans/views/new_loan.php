<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?> <a href="<?php echo base_url();?>Loans">Back</a></h6>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            <hr style="width: 98%;">
                                <div class="panel-body">
                                  
                                                <div class="col-md-12">
                                                            <form action="<?php echo base_url();?>Loans/create_loan" method="post" enctype="multipart/form-data">
                                                                
                                                            <?php if($user_ido !=''){
                                                                $name = $this->db->get_where('users',array('user_id' =>$user_ido))->row()->name;
                                                                ?>

                                                                <div class="form-group">
                                                                    <label>Client</label>
                                                                    <input type="hidden" name="user_id"  id="user_id" value="<?php echo $user_ido;?>">
                                                                    <input type="text" class="form-control" value="<?php echo $name;?>" readonly>

                                                                </div>
                                                           <?php  }else{?>
                                                            <div class="form-group">
                                                                <label>Client</label>
                                                                  <select class="select" name="user_id" id="user_id">
                                                                    <option disabled="">--Select Client--</option>
                                                                    <?php 
                                                                    $this->db->where('users.deleted',0);
                                                                    $this->db->join('users','clients.user_id = users.user_id');
                                                                    $query = $this->db->get('clients');
                                                                    foreach ($query->result_array() as $roww) {?>
                                                                      <option  value="<?php echo $roww['user_id'];?>"><?php echo $roww['name'];?></option>
                                                                      <?php }?>
                                                                  </select>
                                                           </div>
                                                            <?php }?>

                                                               <div class="form-group">
                                                                <label>Loan Category</label>
                                                                  <select class="select" name="loan_type_id" id="loan_type_id">
                                                                     <option disabled="">--Select Category--</option>
                                                                    <?php 
                                                                    
                                                                    $query = $this->M_Loantype->get_loantype();
                                                                    foreach ($query as $roww) {?>
                                                                      <option  value="<?php echo $roww['loan_type_id'];?>"><?php echo $roww['loan_type'];?> | Rate -
                                                                          <?php echo $roww['type_rate'];?> %
                                                                      </option>
                                                                      <?php }?>
                                                                  </select>
                                                           </div>
                                                                <div class="form-group">
                                                                    <label>Amount</label>
                                                                    <input type="text" class="form-control" name="amount" id="amount">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label>Agent</label>
                                                                    <input type="text" class="form-control" name="agent" id="agent">
                                                                </div>
                                                               <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea class="form-control" name="desc" id="desc">
                                                                    </textarea>
                                                                 </div>
                                                                        <div class="form-group"  style="background-color: red; border-radius: 3px; padding: 5px;">
                                                                            GUARANTOR INFORMATION
                                                                        </div>

                                                                <div class="form-group">
                                                                    <label>Passport:</label>

                                                                    <input type="file" class="form-control" value="" name="g_photo" id="g_photo">
                                                                    <img alt="" id="image" src="#" class="img-responsive img-thumbnail" style="width: 100px; height: 100px; margin-left: 3%; margin-top: 1%;">
                                                                </div>


                                                                 <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control" name="g_name" id="g_name">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Relationship</label>
                                                                    <input type="text" class="form-control" name="relationship" id="relationship">
                                                                </div>


                                                                 <div class="form-group">
                                                                    <label>Valid ID</label>
                                                                    <input type="text" class="form-control" name="g_id" id="g_id">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input type="tel" class="form-control" name="g_phone" id="g_phone">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" class="form-control" name="g_email" id="g_email">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <textarea class="form-control" name="g_address" id="g_address">
                                                                    </textarea>
                                                                 </div>

                                                                 <div class="form-group">
                                                                    <label>Remarks</label>
                                                                    <textarea class="form-control" name="remarks" id="remarks">
                                                                    </textarea>
                                                                 </div>

                                                                 <div class="form-group"  style="background-color: red; border-radius: 3px; padding: 5px;">
                                                                            PAYMENT INFORMATION
                                                                        </div>

                                                               


                                                                 <div class="form-group">
                                                                    <label>Payment Date</label>
                                                                    <input type="date" class="form-control" name="payment_date" id="payment_date">
                                                                </div>

                                                                 <!--div class="form-group">
                                                                    <label>Total Amount to Pay</label>
                                                                    <input type="text" class="form-control" name="total_amount" id="total_amount">
                                                                </div-->

                                                              

                                                               
                                                                <div class="text-right">
                                                                    
                                                                    <button type="reset" class="btn  bg-grey-600">Reset</button>
                                                                    <button type="submit" class="btn bg-teal-400">Save Loan</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                       
                            </div>
                        </div>
                    </div>
<script>
    
     document.getElementById("g_photo").onchange = function () {
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById("image").src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
};
    
    
    </script>