<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?> | <a href="<?php echo base_url();?>Income/view/<?php echo $loan_id;?>">Back</a></h6>
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
                                  
                                                            <form action="<?php echo base_url();?>Client/income_add" method="post" enctype="multipart/form-data">

                                                                <div class="form-group">
                                                                    <label>Occupation</label>

                                                                    <input type="text" class="form-control" value="<?php if (!empty($occupation)){echo $occupation;}?>" name="occupation" id="occupation" placeholder="">
                                                                </div>

                                                                
                                                                 <div class="form-group">
                                                                    <label>Monthly Income</label>
                                                                    <input type="text" class="form-control" value="<?php if (!empty($income)){echo $income;}?>"  name="income" id="income">
                                                                </div>

                                                                <div class="text-right">
                                                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>">
                                                                     <?php if (isset($update_id)){?>
                                                                          <input type="hidden" name="update_id" id="update_id" value="<?php echo $update_id;?>">
                                                                     <?php }?>
                                                                    <button type="reset" class="btn  bg-grey-600">Reset</button>
                                                                    <button type="submit" class="btn bg-teal-400">Save Income</button>

                                                                </div>
                                                            </form>
                                       
                            </div>
                        </div>
                    </div>
