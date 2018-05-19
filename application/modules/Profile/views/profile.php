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
                                  <?php 
                                     $Profile = $this->db->get_where('users',array('user_id' =>$user_id))->result_array();
                                      foreach ($Profile as $row) {?>
                                     
                                                            <form action="<?php echo base_url();?>Profile/submit" method="post" enctype="multipart/form-data">
                                                                 <div class="form-group">
                                                                    <label>Image:</label>

                                                                    <input type="file" class="form-control" name="photo" id="photo">

                                                                    <input type="hidden" class="form-control" value="<?php if (!empty($row['photo'])){echo $row['photo'];}?>" name="photo1" id="photo1">

                                                                    <img alt="" id="image" src="<?php echo base_url();?>uploads/staff/<?php if (!empty($row['photo'])){echo $row['photo'];}?>" class="img-responsive img-thumbnail" style="width: 100px; height: 100px; margin-left: 3%; margin-top: 1%;">

                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Username</label>

                                                                    <input type="text" class="form-control" value="<?php echo $row['username'];?>" name="username" id="username" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input type="password" class="form-control" name="password" id="password">
                                                                </div>


                                                                <div class="form-group">
                                                                    <label>Confirm Password</label>
                                                                    <input type="password" class="form-control" name="cpassword" id="cpassword">
                                                                </div>

                                                               

                                                                <div class="text-right">
                                                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>">
                                                                    <button type="reset" class="btn  bg-grey-600">Reset</button>
                                                                    <button type="submit" class="btn bg-teal-400">Save Changes</button>

                                                                </div>
                                                            </form>
                                                            <?php }?>
                                       
                            </div>
                        </div>
                    </div>
<script>
    
     document.getElementById("photo").onchange = function () {
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById("image").src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
};
    
    
    </script>