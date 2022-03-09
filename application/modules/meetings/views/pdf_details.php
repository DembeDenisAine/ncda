
<div class="row">

    <div class="col-md-6">

        <div class="form-group">
            <label>Meeting Title</label>
            <h5><?php echo $meeting->meeting_name; ?></h5>
        </div>

        <div class="form-group">
            <label>Meeting Date</label>
            <h5><?php echo $meeting->meeting_date; ?></h5>
        </div>

        <div class="form-group">
            <label>Meeting Venue</label>
            <h5><?php echo $meeting->venue; ?></h5>
        </div>
    </div>

    <div class="col-md-6">

       <div class="form-group">
            <label>Starting Time</label>
            <h5><?php echo $meeting->start_at; ?></h5>
        </div>

        <div class="form-group">
            <label>End Time</label>
            <h5><?php echo $meeting->end_at; ?></h5>
        </div>

        <div class="form-group">
            <label>Description</label>
            <p><?php echo $meeting->meeting_description; ?></p>
        </div>
    </div>
</div>

<div id="row">

  <?php require_once('meeting_participants.php'); ?>

  <?php require_once('meeting_discussions.php'); ?>

  <?php require_once('meeting_actions.php'); ?>

</div>





                