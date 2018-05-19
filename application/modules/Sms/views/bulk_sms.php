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

                                <div class="panel-body">
                                  

                                                <div class="panel panel-flat">
                                                   
                                                    <div class="panel-body">

                                                        <form action="<?php echo base_url();?>Sms/sms_bulk_send" method="post">
                                                            <div class="form-group">
                                                                    <label>Receiver Category:</label>
																		<select class="select" name="receiver">
																			<option disabled="">--Select Category--</option>
																			<option value="1">Staff</option>
																			<option value="2">Clients</option>
																		</select>
																	</div>

                                                                <!--div class="form-group">
                                                                    <label>Title</label>
                                                                    <input type="text" class="form-control" id="title" name="title"  placeholder="">
                                                                </div-->
                                                            <div class="form-group">
                                                                  <label>Message</label>
                                                                <textarea cols="18" rows="18" class="wysihtml5 wysihtml5-default form-control"
                                                                          placeholder="Enter text ..." name="message" id="message">
                                                                </textarea>
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="reset" class="btn bg-grey-600">Cancel
                                                                </button>
                                                                <button type="submit" class="btn bg-teal-400">Send
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                           

                                       
                            </div>
                        </div>
                    </div>
