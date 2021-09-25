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

        </div><!-- /.content-wrapper -->


        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>HMS Version</b> 2.1.0
            </div>
            <strong>Copyright &copy; 2011-2017 <a href="http://praxisinfotech.com" target="_blank">Praxis Infotech</a>.</strong> All rights reserved.
        </footer>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!--h4 class="modal-title">Bootstrap Modal with Dynamic Content</h4-->
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.min.js"></script>
    <!-- DataTables -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>    
    <!-- AdminLTE App -->
    <script src="assets/js/app.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>        
    <script>
        $(document).ready(function () {
            $('.openPopup').on('click', function () {
                var dataURL = $(this).attr('data-href');
                $('.modal-body').load(dataURL, function () {
                    $('#myModal').modal({show: true});
                });
            });
        });
    </script>
<script src="assets/js/select2.full.min.js"></script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
    </script>
</body>
</html>
