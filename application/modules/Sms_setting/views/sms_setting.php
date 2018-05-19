<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><?php echo $page_title;?></h6>
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
                                                            <form action="<?php echo base_url();?>Sms_setting/save_sms_setting" method="post">
                                                                <?php foreach ($sms_setting as $row) 



                                                                {?>
                                                                
                                                                <div class="form-group">
                                                                    <label>Account SID:</label>
                                                                    <input type="hidden" value="<?php echo $row['settings_id'];?>" name="settings_id">

                                                                    <input type="text" class="form-control" value="<?php echo $row['twilio_account_sid'];?>" name="twilio_account_sid" id="twilio_account_sid" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Account Authentication token</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['twilio_auth_token'];?>"  name="twilio_auth_token" id="twilio_auth_token">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Sending number</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['twilio_sender_phone_number'];?>"  name="twilio_sender_phone_number" id="twilio_sender_phone_number">
                                                                </div>

                                                                

                                                                <div class="text-right">
                                                                    <button type="submit" class="btn bg-teal-400">Save Settings</button>
                                                                </div>
                                                                <?php }?>
                                                            </form>
                                                        </div>
                                       
                            </div>
                        </div>
                    </div>
