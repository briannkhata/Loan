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
                                                            <form action="<?php echo base_url();?>Email_setting/save_email_setting" method="post">
                                                                <?php foreach ($email_setting as $row){?>
                                                                
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <input type="hidden" value="<?php echo $row['settings_id'];?>" name="settings_id">

                                                                    <input type="email" class="form-control" value="<?php echo $row['email'];?>" name="email" id="email" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['password'];?>"  name="password" id="password">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Port</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['port'];?>"  name="port" id="port">
                                                                </div>

                                                                 <div class="form-group">
                                                                    <label>Host</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['host'];?>"  name="host" id="host">
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
