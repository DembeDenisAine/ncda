


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php //echo (!empty($setting->title))?:$setting->title; ?> <?php echo (!empty($title)?$title:null) ?></title>
  <style type="text/css">


        table{
            width: 100%;
            border-collapse: collapse;
        }

        p{
            text-align: justify;
            text-align: 12pt;
        }
        h1,h2{
            color: #108bde;
        }

        td {
            padding: 5px!important;
        }
        
        tr:nth-child(even) {
          background-color: #f1f8ff;
        }


  </style>
  </head>
<body>

<?php  $this->load->view($module."/".$view);  ?>

</body>





                