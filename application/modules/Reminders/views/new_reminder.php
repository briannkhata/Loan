<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?> | <a href="<?php echo base_url();?>Reminders">Back</a></h6>
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
                                                            <form action="<?php echo base_url();?>Reminders/submit" method="post">
                                                                
                                                                <div class="form-group">
                                                                    <label>Reminder Name:</label>

                                                                    <input type="text" class="form-control" value="<?php if (!empty($reminder_name)){echo $reminder_name;}?>" name="reminder_name" id="reminder_name" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Days before reminder</label>
                                                                    <input type="number" class="form-control" value="<?php if (!empty($days_before)){echo $days_before;}?>"  name="days_before" id="days_before">
                                                                </div>


                                                                <div class="form-group">
                                                                    <label>Message</label>
                                                                    <textarea class="form-control" name="message" id="message">
                                                                        <?php if (!empty($message)){echo $message;}?>

                                                                    </textarea>
                                                                 </div>

                                                                

                                                                <div class="text-right">
                                                                     <?php if (isset($update_id)){?>
                                                                          <input type="hidden" name="update_id" id="update_id" value="<?php echo $update_id;?>">
                                                                     <?php }?>
                                                                    <button type="reset" class="btn  bg-grey-600">Reset</button>
                                                                    <button type="submit" class="btn bg-teal-400">Save Reminder</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                       
                        </div>
                    </div>
