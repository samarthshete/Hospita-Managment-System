<?php

/* Copyrights by Praxis Infotech (c)2017,2018
 * Product Name: MSHMS V1.0
 * File Name:
 * File Path:
 * Description:
 * //Purpose :
 * First Created By: Sr. Tech Leader, Praxis Infotech
 * First Created On: Jan 4, 2018 @15:05
 * Modified By:
 * Modified On:
 * Reason for Modifications:
 * 1.
 * Latest Version Label:
 */

// Start Typing from Here ....
?>
<section class="content">
    <div class="col-xs-12">
        <div class="col-lg-12 col-sm-12 col-xs-12 no-padding">
            <h3 class="box-title"><i class="fa fa-plus"></i> Register New Patient</h3>
        </div> 
    </div> 


    <div class="stu-master-create">
        <div class="col-xs-12 col-lg-12">
            <div class="box-success box view-item col-xs-12 col-lg-12">
                <div class="patinet-master-form">
                    <p class="note">Fields with <span class="required"> <b style=color:red;>*</b></span> are required.</p>
                    <form id="new-user-form" action="proc_queue.php" method="post">
                        <input type="hidden" name="_csrf" value="">
                        <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding"> 
                            <div class="box-header with-border"> 
                                <h4 class="box-title"><i class="fa fa-info-circle"></i> Patient Information</h4> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-12 no-padding"> 
                            <div class="col-xs-9 col-sm-2 col-lg-2"> 
                                <div class="form-group required"> 
                                    <label class="control-label" >Patient Code</label>
                                    <input type="text" id="users-userid" class="form-control" name="PatientCode"  >
                                    <div class="help-block"></div>
                                </div>
                            </div> 


                        <div class="col-xs-12 col-sm-2 col-lg-2"> 
                            <div class="form-group field-stuinfo-stu_middle_name"> 
                                <label class="control-label" >Card No.</label>
                                <input type="text"  class="form-control" name="CardNo">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group field-stuinfo-stu_last_name required"> 
                                <label class="control-label" >Card Validity</label>
                                <input type="date" class="form-control" name="CardValidity">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        </div>                       
                        <div class="col-xs-12 col-sm-1 col-lg-1"> 
                            <div class="form-group field-stumaster-stu_master_category_id"> 
                                <label class="control-label" >Title</label>
                                <select class="form-control" name="title"> 
                                    <option value="">---  Select Title ---</option> 
                                    <option value="Mr."> Mr.</option> 
                                    <option value="Mrs."> Mrs.</option>  
                                    <option value="Miss.">  Miss </option> 
                                    <option value="Dr.">  Dr.</option>
                                    <option value="Prof."> Prof.</option> 
                                </select>
                                <div class="help-block"></div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-lg-3"> 
                            <div class="form-group"> 
                                <label class="control-label">First Name</label>
                                <input type="text" class="form-control" name="FirstName" maxlength="60">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-3 col-lg-3"> 
                            <div class="form-group field-stuinfo-stu_mobile_no"> 
                                <label class="control-label" >Middle Name</label>
                                <input type="text"  class="form-control" name="MiddleName" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-3 col-lg-3"> 
                            <div class="form-group field-stuinfo-stu_mobile_no"> 
                                <label class="control-label" >Last Name</label>
                                <input type="text"  class="form-control" name="LastName" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-2 col-lg-2"> 
                            <div class="form-group field-stumaster-stu_master_category_id"> 
                                <label class="control-label" >Gender</label>
                                <select class="form-control" name="gender"> 
                                    <option value="">---  Select ---</option> 
                                    <option value="Male"> Male</option> 
                                    <option value="Female"> Female</option>  
                                    <option value="ND"> ND</option> 
                                </select>
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group field-stuinfo-stu_mobile_no"> 
                                <label class="control-label" >Gardian Name</label>
                                <input type="text"  class="form-control" name="GardianName" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group field-stumaster-stu_master_category_id"> 
                                <label class="control-label" >Status</label>
                                <select class="form-control" name="status"> 
                                    <option value="">---  Select ---</option> 
                                    <option value="Married"> Married</option> 
                                    <option value="Unmarried"> Unmarried</option>  
                                </select>
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group"> 
                                <label class="control-label" >Landline No</label>
                                <input type="text"  class="form-control" name="LandlineNo" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group "> 
                                <label class="control-label" >Mobile No</label>
                                <input type="text"  class="form-control" name="MobileNo" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group "> 
                                <label class="control-label" >Other Phone No</label>
                                <input type="text"  class="form-control" name="OtherPhoneNo" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group "> 
                                <label class="control-label" >Referred By</label>
                                <input type="text"  class="form-control" name="ReferredBy" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group "> 
                                <label class="control-label" >Address 1</label>
                                <input type="text"  class="form-control" name="Address1" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group "> 
                                <label class="control-label" >Address 2</label>
                                <input type="text"  class="form-control" name="Address2" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group "> 
                                <label class="control-label" >City</label>
                                <input type="text"  class="form-control" name="City" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group "> 
                                <label class="control-label" >Pincode</label>
                                <input type="text"  class="form-control" name="Pincode" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group field-stuinfo-stu_mobile_no"> 
                                <label class="control-label" for="stuinfo-stu_mobile_no">State</label>
                                <input type="text"  class="form-control" name="state" maxlength="20">
                                <div class="help-block"></div> 
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group field-stuinfo-stu_mobile_no"> 
                                <label class="control-label" for="stuinfo-stu_language">Language</label>
                                <select class="form-control" name="language"> 
                                    <option value="">---  Select ---</option> 
                                    <option value="English"> English</option> 
                                    <option value="Marathi"> Marathi</option> 
                                    <option value="Hindi"> Hindi</option> 
                                    <option value="Kanada"> Kanada</option> 
                                    <option value="Other1"> Other1</option> 
                                    <option value="Other2"> Other2</option> 
                                </select>
                                <div class="help-block"></div> 
                            </div>
                        </div> 

                        <div class="col-xs-12 col-sm-4 col-lg-4"> 
                            <div class="form-group field-stuinfo-stu_mobile_no"> 
                                <label class="control-label" >Doctor Assigned</label>
                                <select class="form-control" name="docassign"> 
                                    <option value="">---  Select ---</option> 
                                    <?php
                                        $res = mysqli_query($con, "SELECT username,userid FROM users WHERE role_id = '4'");
                                        while ($r = mysqli_fetch_array($res))
                                        {
                                            echo "<option value=\"".$r['userid']."\">".$r['username']."</option>";
                                        }
                                    ?>
                                </select>
                                <div class="help-block"></div> 
                            </div>
                        </div> 

                        <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding edusecArLangCss"> 
                            <div class="col-xs-6"> 
                                <button type="submit" class="btn btn-block btn-success">Create</button>	</div> 
                            <div class="col-xs-6"> 
                                <a class="btn btn-default btn-block" href="dashboard.php">Cancel</a>	</div> 
                        </div> 

                    </form>

                </div> 

            </div>

        </div>

    </div>
</section>

