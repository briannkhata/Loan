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
                                    <form action="<?php echo base_url();?>Loans/collateral_add" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input id="loan_id" name="loan_id" value="<?php echo $loan_id;?>" type="hidden"/>
                                            <input class="form-control" id="name" name="name" type="text"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Type</label>
                                            <input class="form-control" id="type" name="type" type="text"/>
                                        </div>

                                         <div class="form-group">
                                            <label for="name">Make</label>
                                            <input class="form-control" id="make" name="make" type="text"/>
                                        </div>
                                         <div class="form-group">
                                            <label for="name">Model</label>
                                            <input class="form-control" id="model" name="model" type="text"/>
                                        </div>
                                         <div class="form-group">
                                            <label for="name">Serial Number</label>
                                            <input class="form-control" id="s_no" name="s_no" type="text"/>
                                        </div>
                                         <div class="form-group">
                                            <label for="name">Price</label>
                                            <input class="form-control" id="price" name="price" type="text"/>
                                        </div>
                                         <div class="form-group">
                                            <label for="name">Proof of ownership</label>
                                            <input class="form-control" id="proof" name="proof" type="file"/>
                                        </div>
                                         <div class="form-group">
                                            <label for="name">File</label>
                                            <input class="form-control" id="file" name="file" type="file"/>
                                        </div>
                                       <div class="text-right">                                           
                                            <button type="reset" class="btn  bg-grey-600">Reset</button>
                                            <button type="submit" class="btn bg-teal-400">Add Collateral</button>
                                        </div>
                                  </form>         
                                </div>
                            </div>
                        </div>
                    </div>
