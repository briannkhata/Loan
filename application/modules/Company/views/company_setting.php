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
                                      <?php if ($this->session->flashdata('message')) { ?>
                                                <?php echo $this->session->flashdata('message'); ?>
                                        <?php } ?>
                                  
                                                            <form action="<?php echo base_url();?>Company/save_company_setting" method="post" enctype="multipart/form-data">
                                                                <?php foreach ($company_setting as $row){?>
                                                                
                                                                <div class="form-group">
                                                                    <label>Company Name:</label>
                                                                    <input type="hidden" value="<?php echo $row['company_id'];?>" name="company_id">

                                                                    <input type="text" class="form-control" value="<?php echo $row['company_name'];?>" name="company_name" id="company_name" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Company Email</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['company_email'];?>"  name="company_email" id="company_email">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Company Phone</label>
                                                                    <input type="text" class="form-control" value="<?php echo $row['company_phone'];?>"  name="company_phone" id="company_phone">
                                                                </div>
                                                                 
                                                                 <div class="form-group">
                                                                    <label>Logo</label>
                                                                    <input type="file" class="form-control"  name="company_logo" id="company_logo">                                                              
                                                                </div>

                                                                   <input type="hidden" class="form-control" value="<?php if (!empty($row['company_logo'])){echo $row['company_logo'];}?>" name="logo" id="logo">

                                                                    <img alt="" id="image" src="<?php echo base_url();?>uploads/logo/<?php echo $row['company_logo'];?>" class="img-responsive img-thumbnail" style="width: 100px; height: 100px; margin-left: 3%; margin-top: 0%;">

                                                                    <div class="form-group">
                                                                    <label>Stamp</label>
                                                                    <input type="file" class="form-control"  name="stamp" id="stamp">
                                                                    <input type="hidden"   name="stampa" id="stampa" value="<?php echo $row['stamp'];?>">
                                                                    
                                                                </div>

                                                                    <img alt="" id="imagee" src="<?php echo base_url();?>uploads/logo/<?php echo $row['stamp'];?>" class="img-responsive img-thumbnail" style="width: 100px; height: 100px; margin-left: 3%; margin-top: 0%;">
                                                                

                                                                <div class="text-right">
                                                                    <button type="submit" class="btn bg-teal-400">Save Settings</button>
                                                                </div>
                                                                <?php }?>
                                                            </form>
                                                        </div>
                           
                        </div>
                    </div>

                    <script>
    
     document.getElementById("company_logo").onchange = function () {
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById("image").src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
};


 document.getElementById("stamp").onchange = function () {
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById("imagee").src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
};
    
    
    </script>
