<section class="content"> 
    <div class="col-xs-12"> 
        <div class="col-lg-4 col-sm-6 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> Change User Password</h3>
        <p class="note">Fields with <span class="required"></span> are required.</p>
        </div> 
    </div>
    <div class="col-xs-12 col-lg-12"> 
        <div class="box-info box view-item col-xs-12 col-lg-12"> 
            <div class="form"> 
                <form id="change-password-form" action="proc_changepwd.php" method="post"> 
                    <!--<input type="hidden" name="_csrf" value="TzcuaDdfWXAuQF0ZTREJPARkbSwDLmAcH2FBOmMJMwE/TWVZeHJrNg==">--> 
                    <div class="form-group field-user-current_pass"> 
                        <label class="control-label  required" for="user-current_pass">Current Password</label>
                        <input type="password" id="user-current_pass" class="form-control" name="current_pass" maxlength="60" placeholder="Current Password" required="required">
                        <div class="help-block"></div> 
                    </div> 
                    <div class="form-group field-user-new_pass"> 
                        <label class="control-label required" for="user-new_pass">New Password</label>
                        <input type="password" id="user-new_pass" class="form-control" name="new_pass" maxlength="60" placeholder="New Password" required="required">
                        <div class="help-block"></div> 
                    </div> 
                    <div class="form-group field-user-retype_pass"> 
                        <label class="control-label  required" for="user-retype_pass">Retype Password</label>
                        <input type="password" id="user-retype_pass" class="form-control" name="retype_pass" maxlength="60" placeholder="Retype Password" required="required">
                        <div class="help-block"></div> 
                    </div> 
                    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding"> 
                        <div class="col-xs-6"> 
                            <button type="submit" class="btn btn-block btn-info">Save</button>	
                        </div> 
                        <div class="col-xs-6"> 
                            <a class="btn btn-default btn-block" href="dashboard.php">Cancel</a>	
                        </div> 
                    </div> 
                </form>    
            </div> 
        </div> 
    </div> 
</section> 

