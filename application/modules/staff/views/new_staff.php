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
                                                            <form action="<?php echo base_url();?>Staff/submit" method="post" enctype="multipart/form-data">
                                                                 <div class="form-group">
                                                                    <label>Image:</label>

                                                                    <input type="file" class="form-control" value="<?php if (!empty($photo)){echo $photo;}?>" name="photo" id="photo">

                                                                    <input type="hidden" class="form-control" value="<?php if (!empty($photo)){echo $photo;}?>" name="photo1" id="photo1">

                                                                    <img alt="" id="image" src="<?php echo base_url();?>uploads/staff/<?php if (!empty($photo)){echo $photo;}?>" class="img-responsive img-thumbnail" style="width: 100px; height: 100px; margin-left: 3%; margin-top: 1%;">

                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Name</label>

                                                                    <input type="text" class="form-control" value="<?php if (!empty($name)){echo $name;}?>" name="name" id="name" placeholder="">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" class="form-control" value="<?php if (!empty($email)){echo $email;}?>"  name="email" id="email">
                                                                </div>


                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input type="tel" class="form-control" value="<?php if (!empty($phone)){echo $phone;}?>"  name="phone" id="phone">
                                                                </div>

                                                                 <div class="form-group">
                                                                    <label>Nantional ID</label>

                                                                    <input type="text" class="form-control" value="<?php if (!empty($national_id)){echo $national_id;}?>" name="national_id" id="national_id" placeholder="">
                                                                </div>

                                                                 <div class="form-group">
                                                                    <label>Gender:</label>
                                                                        <select class="select" name="gender">
                                                                            <option disabled="">--Select Gender--</option>
                                                                             <option <?php if(!empty($gender) && $gender == 'Male') {echo 'selected';}?> value="Male">Male</option>
                                                                             <option <?php if(!empty($gender) && $gender == 'Female') {echo 'selected';}?> value="Female">Female</option>
                                                                        </select>
                                                                    </div>

                                                                 <div class="form-group">
                                                                    <label>Job Title</label>
                                                                    <input type="text" class="form-control" value="<?php if (!empty($jobtitle)){echo $jobtitle;}?>"  name="jobtitle" id="jobtitle">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Branch:</label>
                                                                        <select class="select" name="branch_id>
                                                                            <option disabled="">--Select Branch--</option>
                                                                            <?php $dep = $this->M_Branch->get_branch();
                                                                            foreach ($dep as $row) {?>
                                                                            <option <?php if(!empty($branch_id) && $branch_id == $row['branch_id']) {echo 'selected';}?> value="<?php echo $row['branch_id'];?>"><?php echo $row['branch_name'];?></option>
                                                                          <?php }?>
                                                                        </select>
                                                                    </div>

                                                                <div class="form-group">
                                                                    <label>Department:</label>
                                                                        <select class="select" name="department">
                                                                            <option disabled="">--Select Department--</option>
                                                                            <?php $dep = $this->M_Department->get_departments();
                                                                            foreach ($dep->result_array() as $row) {?>
                                                                            <option <?php if(!empty($department) && $department == $row['department_name']) {echo 'selected';}?> value="<?php echo $row['department_name'];?>"><?php echo $row['department_name'];?></option>
                                                                          <?php }?>
                                                                        </select>
                                                                    </div>

                                                                <div class="form-group">
                                                                    <label>Address 1</label>
                                                                    <textarea class="form-control" name="address1" id="address1">
                                                                        <?php if (!empty($address1)){echo $address1;}?>

                                                                    </textarea>
                                                                 </div>

                                                                 <div class="form-group">
                                                                    <label>Address 2</label>
                                                                    <textarea class="form-control" name="address2" id="address2">
                                                                        <?php if (!empty($address2)){echo $address2;}?>

                                                                    </textarea>
                                                                 </div>
                                                                 <br>

                                                               

                                                                

                                                                <div class="text-right">
                                                                     <?php if (isset($update_id)){?>
                                                                          <input type="hidden" name="update_id" id="update_id" value="<?php echo $update_id;?>">
                                                                     <?php }?>
                                                                    <button type="reset" class="btn  bg-grey-600">Reset</button>
                                                                    <button type="submit" class="btn bg-teal-400">Save</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                       
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