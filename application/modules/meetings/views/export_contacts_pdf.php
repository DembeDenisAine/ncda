


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

<h1>NCDA Contacts</h1>
<hr>

<table border="1">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Organization</th>
            <th>Phone Number</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php  if($contacts): $i=0;  foreach($contacts as $row): $page++; ?>
            <tr>
                <td><?php echo $page; ?></td>
                <td><?php echo $row->first_name." ".$row->last_name; ?></td>
                <td><?php echo $row->represents; ?></td>
                <td><?php echo $row->phone; ?></td>
                <td><?php echo $row->email; ?></td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>


</body>





                