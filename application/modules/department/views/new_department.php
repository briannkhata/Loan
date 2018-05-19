<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?> | <a href="<?php echo base_url();?>Department">Back</a></h6>
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
                                                            <form action="<?php echo base_url();?>Department/submit" method="post">
                                                                
                                                                <div class="form-group">
                                                                    <label>Department Name:</label>

                                                                    <input type="text" class="form-control" value="<?php if (!empty($department_name)){echo $department_name;}?>" name="department_name" id="department_name" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Department Head</label>
                                                                    <input type="text" class="form-control" value="<?php if (!empty($department_name)){echo $department_name;}?>"  name="department_head" id="department_head">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Details</label>
                                                                    <textarea class="form-control" name="department_details" id="department_details">
                                                                        <?php if (!empty($department_details)){echo $department_details;}?>

                                                                    </textarea>
                                                                 </div>

                                                                

                                                                <div class="text-right">
                                                                     <?php if (isset($update_id)){?>
                                                                          <input type="hidden" name="update_id" id="update_id" value="<?php echo $update_id;?>">
                                                                     <?php }?>
                                                                    <button type="reset" class="btn  bg-grey-600">Reset</button>
                                                                    <button type="submit" class="btn bg-teal-400">Save Department</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                       
                        </div>
                    </div>
