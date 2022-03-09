


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php //echo (!empty($setting->title))?:$setting->title; ?> <?php echo (!empty($title)?$title:null) ?></title>
  <style type="text/css">

        .row{
            display: flex;
            flex-direction: row;
            min-width: 100%;
        }

        .col-md-6{
            width:45%;
            padding: 2%;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        .detail tr td div{
            padding: 5px!important;
        }
        p{
            text-align: justify;
            text-align: 12pt;
        }
        h1,h2{
            color: #108bde;
        }


  </style>
  </head>
<body>
<div class="wrapper">

<h1><?=$meeting->meeting_name?></h1>
<hr>

<table class="detail">
    <tr>
    <td>

        <div class="form-group">
            <label>Meeting Date</label>
            <h5><?php echo $meeting->meeting_date; ?></h5>
            <br>
        </div>

        <div class="form-group">
            <label>Meeting Venue</label>
            <h5><?php echo $meeting->venue; ?></h5>
            <br>
        </div>
    </td>
    <td>

       <div class="form-group">
            <label>Starting Time</label>
            <h5><?php echo $meeting->start_at; ?></h5>
            <br>
        </div>

        <div class="form-group">
            <label>End Time</label>
            <h5><?php echo $meeting->end_at; ?></h5>
            <br>
        </div>
    </td>
    </tr>
    <tr>
        <td colspan="2">
            <br>
            <h3>Description</h3>
            <p><?php echo $meeting->meeting_description; ?></p>
            </br>
            </br>
         </td>
    </tr>
</table>
    

<div id="tabs">
  <div class="tab-content" id="participants">
    <h2>Participants</h2>
    <?php require_once('includes/export_participants.php'); ?>
    </br>
    </br>
   </div>
  <div class="tab-content" id="discussions">
    <h2>Meeting Discussions</h2>
    <?php require_once('includes/export_discussions.php'); ?>
    </br>
    </br>
    </div>
  <div class="tab-content" id="action-points">
    <h2>MeetingActions</h2>
    <?php require_once('includes/export_actions.php'); ?>
    </br>
    </br>
    </div>
</div>

</div>
</body>





                