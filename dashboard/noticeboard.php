<section class="content">
          <div class="row">
            <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-arrow-circle-right"></i>
                <h3 class="box-title">Manage Notices</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
                    noticeboard list                    	</a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="fa fa-plus-square"></i>
                    create new notice</a></li>
        </ul>
        <!------CONTROL TABS END------>


        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>notice</th>
                            <th>date</th>
                            <th>Actions</th>
                    </tr>
                    </thead>
<?php 
//`notice_id`, `notice_title`, `notice`, `date`
                    require_once 'connection.php';
                    $strsql = "SELECT MAX(notice_id) nid FROM noticeboard";
                    $result = mysqli_query($con, $strsql);
                    $arr_result = mysqli_fetch_array($result);
                    $intRecordNo = $arr_result['nid'] + 1;
                    echo "<tbody>";
                    $strsql = "SELECT * FROM noticeboard";
                    $result = mysqli_query($con, $strsql);
                            while ($arr_result = mysqli_fetch_array($result)){
                                $dt=$arr_result['notice_date'];
                                echo "<tr><td>".$arr_result['notice_id']."</td>";
                            echo "<td>".$arr_result['notice_title']."</td>";
                            echo "<td class='span5'>".$arr_result['notice_text']."</td>";
                            echo "<td>".$dt."</td><td>";
                            //echo "<a href='#'><i class='fa fa-edit fa-2x'>&nbsp;</i></a>";
                            //echo "<a href='#'><i class='fa fa-eye fa-2x'>&nbsp;</i></a>";
                            echo "<a href="."src/notice_board/save_notice.php?action=delete"."/".$arr_result['notice_id']."><i class='fa fa-trash fa-2x'>&nbsp;</i></a></td></tr>";
                            }
                            echo "</tbody>";
                                
?>                                
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <form action="src/notice_board/save_notice.php?action=new" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8">
<?php 
echo '<div class="form-group"><label class="col-sm-4 control-label required" >Notice Id #</label>';
echo '<div class="col-sm-8"><input type="hidden" name="NoticeId" value="' . $intRecordNo . '" readonly><span class="badge bg-green-gradient">' . $intRecordNo . '</span></div></div>';
?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">title</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="NoticeTitle"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">notice</label>
                            <div class="col-sm-5">
                                <div class="box closable-chat-box">
                                    <div class="box-content padded">
                                        <div class="chat-message-box">
                                            <textarea name="NoticeText" id="ttt" rows="5" placeholder="add notice" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">date</label>
                            <div class="col-sm-5">
                                <input type="date" class="datepicker form-control" name="NoticeDate"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Send Email To All</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="check_email">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                                <br>
                                <span class="badge badge-primary">
                                    Email Service Not Activated                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-success">add notice</button>
                            </div>
                        </div>
                    </form>                
                </div>                
            </div>
            <!----CREATION FORM ENDS-->

        </div>
 
            </div>
        </div>                        

    </div><!-- /.box-body -->

</div><!-- /.box -->
</section>
