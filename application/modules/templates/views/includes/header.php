
<?php 
$userdata=$this->session->get_userdata(); 

if   (!isset($userdata['names'])){
  redirect('auth');
}

$permissions=$userdata['permissions'];


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php //echo (!empty($setting->title))?:$setting->title; ?> <?php echo (!empty($title)?$title:null) ?></title>
        <!-- Favicon and touch icons -->
  <link rel="shortcut icon" href="<?php echo base_url(!empty($settings->favicon)?$settings->favicon:"assets/images/icons/favicon.png"); ?>">
       
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/responsive2.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
 
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@latest/dist/avatar.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>assets/css/fullcalendar.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>assets/plugins/summernote/summernote.min.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?> assets/plugins/toastr/toastr.min.css" rel="stylesheet">
 
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE App -->
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<link href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.theme.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style/custom_tabs.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/js/list/list.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>

<!--timepicker-->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script src="<?php echo base_url()?>assets/js/ddslick/jquery.ddslick.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/blockui/jquery.blockUI.js"></script>

<script src="<?php echo base_url(); ?>assets/js/app/custom.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/context-menu/context-menu.css">
<script src="<?php echo base_url()?>assets/plugins/context-menu/context-menu.js"></script>




<style>
 @media (max-width: 767px) {
    .hidden-mobile {
      display: none;
    }
  }
 body {
    font-family:  'Arial', 'Cambria', 'Helvetica Neue', 'Source Sans Pro' ,'Helvetica', 'sans-serif';
    overflow-x: hidden;
    overflow-y: auto;
}
.callout.callout-success {
    border-left-color: #207597 !important;
}
  
  page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #1d80b9;
    border-color: #1d80b9;
  }

.select2-close-mask{
    z-index: 2099;
}
.select2-dropdown{
    z-index: 3051;
}

.dash-icon{
color:#37989d;
font-size:15px;
margin-right:4px;
}
.fa-circle{
color:#37989d;
font-size:6px !important;
}
.nav-drop{
 font-size:10px;
 font-weight:560;
 text-overflow: ellipsis;
 overflow: hidden; 
 

}
.nav-item{
  font-weight:570;
}


body::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
   box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3); 
	background-color: #F5F5F5;
}

body::-webkit-scrollbar
{
	width: 0.5em;
	background-color: #F5F5F5;
}

body::-webkit-scrollbar-thumb
{
	background-color: #d2d4dc; 
  height:70%;
	border: 1px solid #555555;
  border-radius:4px;
}
.sido{
  clear:both;
  overflow:auto;
}
.sido::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3) !important;
       box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3); 
	background-color: #F5F5F5;
}
  .btn{
    font-size: 12px !important;
  }

  .buttons-html5 {
    font-size: 12px !important;
    background:#343a40!important;
    margin:6px;
    border-radius:4px;

  }
  .buttons-page-length {
    font-size: 12px !important;
    background:#343a40!important;
    margin:6px;
    border-radius:4px;

  }
  .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
}
.sido::-webkit-scrollbar
{
	width: 0.5em;
	background-color: #F5F5F5 !important;
}

.sido::-webkit-scrollbar-thumb
{
	background-color: #d2d4dc; 
	border: 1px solid #555555 !important;
  border-radius:4px;
}
.btnkey{
  min-width:98px;;
  color:#fff !important;
  margin:2px;
  border-radius:2px;

  }
  .rbtnkey{
  min-width:148px;;
  color:#fff !important;
  margin:2px;
  border-radius:2px;

  }
  .fc-content {
    color:#fff !important;

  }

  .nav-tabs li{
    padding:10px!important;
  }

  .nav-tabs>li>.active {
    background-color:blue!important;
    padding:10px!important;
    color:white;
  }

.tab-content{
  padding:10px;
}

.tab-content>.active{
  display: block!important;;
}

  td{
    padding: 5px!important;
    vertical-align: middle;
  }
  a .btn{
    color:white!important;
  }
  .page-link{
    text-transform: capitalize;
  }
 .table tr:nth-child(even) {
  background-color: #f2f2f2;
}

.grid{
  display: flex;
  flex-direction: row;
}

.grid div{
  padding: 10px;
}

.flexed{
  display: flex;
  flex-direction: row;
  justify-items: flex-end;
  align-items: center;
  text-align: right;
}

.list-card{
  border-radius:0; 
  margin-top:5px; 
  margin-bottom:5px;
}
.selection{
  min-width: 100%!important;
}

./*dropdown-menu>li{
  min-width: 100%;
  margin-bottom: 5px!important;
  padding-bottom: 5px!important;
  border-bottom: 1px solid #939596;
}
.dropdown-menu>li>a{
  color:#565757!important;
}

.dropdown-menu>li>a:hover{
  color:#2084ba!important;
}*/

.cell-header{
  padding:8px;

}
.flat{
  border-radius: 0px;
}



#container {
    height: 400px;
}


.highcharts-data-table table {
    min-width: 310px;
    max-width: 500px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

  .highcharts-data-table tr:hover {
      background: #f1f7ff;
  }

  #ppreloader {
      position: fixed;
      top:0;
      left:0;
      right:0;
      bottom:0;
      background-color:#E4E5E5; 
      z-index:200;
  }
  #sstatus {
      width:50px;
      height:50px;
      position:absolute;
      left:60%; 
      top:50%; 
      background-image:url("<?php echo base_url()?>assets/images/loader.gif");
      z-index:9999; 
      background-repeat:no-repeat;
      background-position:center;
      background-size: cover;
      margin:-50px 0 0 -50px; 
  }

</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed sidebar-closed">
<!-- Site wrapper -->
<div class="wrapper">
