<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo $description;?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input class="form-control" type="text" name="fname">
                                        </div>
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input class="form-control" type="text" name="lname">
                                        </div>

                                         <div class="form-group">
                                            <label>Date Referred</label>
                                            <input class="form-control" type="date" name="ref_date">
                                        </div>

                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="optionsRadios1" value="Male" checked>Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="optionsRadios2" value="Female">Female
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Payment Mode</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="p_mode" id="optionsRadios1" value="1" checked>Cash
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="p_mode" id="optionsRadios2" value="2">Scheme
                                                </label>
                                            </div>
                                        </div>

                                      
                                        <div class="form-group">
                                            <label>Category</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="p_category" id="optionsRadios1" value="1" checked>General
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="p_category" id="optionsRadios2" value="2">Dental
                                                </label>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Clinic</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                     
                                        <button type="submit" class="btn btn-default">Add Patient</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </form>
                                </div>
                                                      
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>