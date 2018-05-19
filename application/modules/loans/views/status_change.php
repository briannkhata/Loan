                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?> | <a href="<?php echo base_url();?>Loans/view/<?php echo $loan_id;?>">Back</a></h6>
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
                                        echo form_open("Loans/change_status", $attributes);?>
                                            <div class="form-group">
                                                <label>Loan Status</label>
                                                <input id="loan_id" name="loan_id" value="<?php echo $loan_id;?>" type="hidden"/>
                                                 <select  name="status" class="form-control">
                                                    <option disabled="">--Select Status--</option>
                                                    <option value="1">LEAVE ON PENDING PENDING</option>
                                                    <option value="2">APPROVE</option>
                                                    <option value="3">DISAPPROVE</option>
                                                    <option value="3">FINISHED PAYIING</option>

                                                  </select>
                                            </div>
                                             <div class="form-group">
                                                <label for="name">Reason for the action</label>
                                                <input class="form-control" id="reason" name="reason" type="text"/>
                                            </div>
                                         
                                        <div class="text-right">                                           
                                                <button type="reset" class="btn  bg-grey-600">Reset</button>
                                                <button type="submit" class="btn bg-teal-400">Change Status</button>
                                            </div>
                                        <?php echo form_close(); ?>                     
                                 </div>
                            </div>
                        </div>
                    </div>
