         <?php $currency = $this->db->get('company')->row()->currency;?>

                   <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?> | <a href="<?php echo base_url();?>Loans/view/<?php echo $loan_id;?>">Back</a>
                                        <br>
                                      <span class="label label-default">
                                         Balance :<?php echo $currency.' '.number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "",$balance)),2);?>  
                                     </span>

                                    </h6>
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
                                <?php $attributes = array("name" => "contact_form", "id" => "contact_formm");
                                echo form_open("Loans/payment_add", $attributes);?>
                                    <div class="form-group">
                                        <label for="name">Amount</label>
                                        <input id="loan_id" name="loan_id" value="<?php echo $loan_id;?>" type="hidden"/>
                                        <input class="form-control" id="payment_amount" name="payment_amount" type="text" value="<?php echo $balance;?>" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name">Comment</label>
                                        <textarea class="form-control" id="comment" name="comment"></textarea>
                                    </div>

                             
                                 <div class="text-right">                                           
                                        <button type="reset" class="btn  bg-grey-600">Reset</button>
                                        <button type="submit" class="btn bg-teal-400">Add Payment</button>
                                    </div>
                                <?php echo form_close(); ?>         
                                 </div>
                            </div>
                        </div>
                    </div>
