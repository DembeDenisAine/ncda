</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="background: #1d80b9; color:#fff;" >
               
                    <div class="col-m-3">
                   <!--  <img src="https://upload.wikimedia.org/wikipedia/commons/1/17/USAID-Identity.svg" style="width:100px; height:20px; "> -->
                    <div>
                    <div class="col-md-5">
                        <p style="font-size:8px; margin:0 auto;">&copy; <?php  echo date('Y'); ?>, NCDA - Uganda
                     </div>
                    <div class="col-md-3">
                    <!-- <a href="http://health.go.ug" target="_blank"> <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Coat_of_arms_of_Uganda.svg" style="width:50px; height:30px; "> </a> -->
                    </div>
                 </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/dist/js/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notify.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


<div class="control-sidebar-bg"></div>
</div>

<script>

$(document).ready(function() {

    try{
        $('.time').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '08',
            maxTime: '7:00pm',
            defaultTime: '08',
            startTime: '09:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true,
            zindex: 9999999
        });
    }catch(error){
        console.log(error);
    }

try{
    $('.summernote').summernote({height: 80 });
}catch(error){
    console.log(error);
}

try{
    $( "#tabs" ).tabs();
}catch(error){
    console.log(error);
}

$.fn.datepicker.defaults.format = "yyyy-mm-dd";

$('.datepicker').datepicker({
    todayHighlight: true,
    autoclose: true
});



$('.mytable').DataTable( {
    dom: 'Bfrtip',
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    lengthMenu: [
    [ 25, 50, 100,150, -1 ],
    [ '25', '50', '100','150','200', 'Show all' ]
    ],

    buttons: [
    'copyHtml5',
    'excelHtml5',
    'csvHtml5',
    'pageLength',
    ]
} );

$('.simpledata').DataTable( {
    "paging": false,
    "lengthChange": true,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
} );

// $.notify("Hello","success");

var isPassChanged="1";

if(isPassChanged!=1){
 $('#changepass').modal('show');
}

var url="<?php echo $this->uri->segment(2); ?>";

if(url=="tabular" || url=="actuals"||  url=="fetch_report"|| url=="actualsreport"|| url=="tabular#" || url=="timesheet" || url=="attfrom_report"){

$('body').addClass('sidebar-collapse');
$('#sidebar').toggleClass('active');

};


$('.select2').select2()
$('.select2dist').select2({ dropdownParent: "#switch" });

$('.select2bs4').select2({
    theme: 'bootstrap4'
})

});

</script>
 
<!-- ./wrapper -->
<?php

$uri = $_SERVER['REQUEST_URI'];
$uri; // Outputs: URI
 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 $linkquery=$url; // Outputs: Full URL
 // Outputs: Query String
?>

<!-- Modal -->
<div class="modal fade" id="switch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Switch Facility</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form form-horizontal" action="<?php echo base_url(); ?>departments/switchDepartment" method="post">
      <div class="row">
      <div class="col-md-12">
                
                    <label>District</label>
                   
                    
                    <select class="sdistrict form-control select2dist" id="district" name="district" onChange="getFacs($(this).val());"  <?php if(!(in_array('34', $permissions))){ echo "disabled"; }?>>
                    <option value="<?php echo urlencode($_SESSION['district_id'])."_".urlencode($_SESSION['district']); ?>" ><?php echo $_SESSION['district']; ?></option>
                            <?php
                           
                            $districts=Modules::run("districts/getDistricts");
                               foreach ($districts as $district){
                            ?>
                            <option value="<?php echo urlencode($district->district_id)."_".urlencode($district->district); ?>"><?php echo ucwords($district->district); ?></option>
                            <?php }   ?>

                    </select>
                </div>

 
      <div class="col-md-12">
                <div class="form-group" >
                    <label>Facility</label>
                    <select  name="facility" onChange="getDeps($(this).val());" class="sfacility form-control select2dist" required>
                    <option value="" disabled>All</option>
    
                    </select>
                </div>
            </div>
    </div>
    
    <div class="row">
   
            <div class="col-md-12">
                <div class="form-group" >
                    <label>Department</label>
                    <select  name="department" onChange="getDivisions($(this).val());" class="sdepartment form-control select2dist">
                    <option value="">All</option>
                    </select>
                </div>
            </div>
  
            <input type="hidden" name="direct" value="<?php echo $linkquery; ?>" >
           

            <div class="col-md-12" style="display:none;">
                <div class="form-group">
                    <label>Division</label>
                    <select id="division" class="sdivison form-control select2dist" onChange="getUnits($(this).val());" name="division">
                    <option value="">All</option>
                    </select>
              </div>
           </div>
  </div>

  <div class="row" style="display:none;">
  <div class="col-md-6">
                <!-- < needs fixing> -->
                <div class="form-group">
                    <label>Section</label>
                    <select id="section" class="ssection form-control select2dist" onChange="getUnits($(this).val());" name="section">
                    <option value="">All</option>
                    </select>
              </div>
           </div>

          

            <div class="col-md-6">
                  <div class="form-group">
                          <label>Unit</label>
                    <select id="unit" name="unit" onchange="this.form.submit()" class="sunit form-control select2dist">
                    <option value="">All</option>
                         
                    </select>
                </div>
            </div>
  </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info"><i class="fa fa-paper-plane" aria-hidden="true">Switch</i></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times">Close</i></button>
      </div>

        </form>

    </div>

  </div>
</div>


  <!-- change password modal at ones own wish -->
<div class="modal" id="changepassword" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <form method="post" action="<?php echo base_url(); ?>auth/changePass">
                        <div class="modal-header bg-default text-center">
                            <h5>Change Password</h5>
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" class="form-control" name="oldpass">
                            </div>
                            <div class="form-group">
                                <label>New password</i></label>
                                <input type="password" class="form-control" name="newpass">
                            </div>



                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Submit" class="btn btn-primary">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


              <!--change password--modal for first logins (as a MUST)-->

    <div class="modal" id="changepass" data-backdrop="true">

    
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <form method="post" action="<?php echo base_url(); ?>auth/changePass">
                        <div class="modal-header bg-default text-center">
                            <h2>Change  Password</h2>
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Old password</label>
                                <input type="password" class="form-control" name="oldpass">
                            </div>
                            <div class="form-group">
                                <label>New password></label>
                                <input type="password" class="form-control" name="newpass">
                            </div>



                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Submit" class="btn btn-success">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /change password--modal for first logins (as a MUST)-->
        </body>
</html>



