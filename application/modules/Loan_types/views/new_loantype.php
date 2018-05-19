<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?> | <a href="<?php echo base_url();?>Loan_types">Back</a></h6>
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
                                                            <form action="<?php echo base_url();?>Loan_types/submit" method="post">
                                                                
                                                                <div class="form-group">
                                                                    <label>Loan type:</label>

                                                                    <input type="text" class="form-control" value="<?php if (!empty($loan_type)){echo $loan_type;}?>" name="loan_type" id="loan_type" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Interest Rate</label>
                                                                    <input type="number" class="form-control" value="<?php if (!empty($type_rate)){echo $type_rate;}?>"  name="type_rate" id="type_rate">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Borrowing Range</label>
                                                                    <input type="text" class="form-control" value="<?php if (!empty($type_amount)){echo $type_amount;}?>"  name="type_amount" id="type_amount">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Details</label>
                                                                    <textarea class="form-control" name="type_desc" id="type_desc">
                                                                        <?php if (!empty($type_desc)){echo $type_desc;}?>

                                                                    </textarea>
                                                                 </div>

                                                                

                                                                <div class="text-right">
                                                                     <?php if (isset($update_id)){?>
                                                                          <input type="hidden" name="update_id" id="update_id" value="<?php echo $update_id;?>">
                                                                     <?php }?>
                                                                    <button type="reset" class="btn  bg-grey-600">Reset</button>
                                                                    <button type="submit" class="btn bg-teal-400">Save Category</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                       
                        </div>
                    </div>
