<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?> | <a href="<?php echo base_url();?>Branch">Back</a></h6>
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
                                            <form action="<?php echo base_url();?>Branch/submit" method="post">
                                                                
                                                                <div class="form-group">
                                                                    <label>Branch Name:</label>

                                                                    <input type="text" class="form-control" value="<?php if (!empty($branch_name)){echo $branch_name;}?>" name="branch_name" id="branch_name" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input type="text" class="form-control" value="<?php if (!empty($branch_phone)){echo $branch_phone;}?>"  name="branch_phone" id="branch_phone">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="text" class="form-control" value="<?php if (!empty($branch_email)){echo $branch_email;}?>"  name="branch_email" id="branch_email">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <textarea class="form-control" name="branch_address" id="branch_address">
                                                                        <?php if (!empty($branch_address)){echo $branch_address;}?>

                                                                    </textarea>
                                                                 </div>

                                                                

                                                                <div class="text-right">
                                                                     <?php if (isset($update_id)){?>
                                                                          <input type="hidden" name="update_id" id="update_id" value="<?php echo $update_id;?>">
                                                                     <?php }?>
                                                                    <button type="reset" class="btn  bg-grey-600">Reset</button>
                                                                    <button type="submit" class="btn bg-teal-400">Save Branch</button>
                                                                </div>
                                                            </form>
                                       
                            </div>
                        </div>
                    </div>
