
<a href="<?php echo base_url(); ?>project-list" class="btn btn-primary">
    <i class="fa fa-arrow-left"></i> Back to Projects
</a>

<hr>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
        <div class="row " >
            <div class="col-md-12">
                <label>Project:</label>
                <h5><?php echo $project->project_name; ?></h5>
                <label>Description: </label>
                <p><?php echo $project->project_description; ?></p>
                <div class="grid">
                    <div><strong><i class="fa fa-calendar"></i> Started:</strong> <?php echo text_date($project->start_date); ?></div>
                    <div><strong><i class="fa fa-calendar"></i> Ends:</strong> <?php echo text_date($project->end_date); ?></div>
                    <div><strong><i class="fa fa-clock"></i> Duration:</strong> <?php echo $project->duration; ?></div>
                    <div><strong><i class="fa fa-check-circle"></i> Last Updated:</strong> <?php echo time_ago($project->updated_at); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<h5 class="text-muted">Select Objective & Activity</h5>

<?php if(!empty($selectedObjective)): ?>
    <label class="text-info">Selected Objective: </label>
    <h5><?php echo $selectedObjective->objective_name; ?></h5>
<?php endif; ?>

<hr>

<?php if(count($objectives)>0){ ?>

    <form class="row" method="post" id="entryForm">
        <div class="form-group col-lg-5 col-md-12 col-sm-12">
            <label>Objective</label>
            <select class="form-control select2" name="objective_id" onchange="$('#entryForm').submit()">
                <option>Choose Objective</option>
                <?php foreach($objectives as $obj): 
                    $selected = (!empty($selectedObjective))?$selectedObjective->id:null;
                ?>
                    <option <?php echo ($selected == $obj->id)?'selected':''; ?> value="<?php echo $obj->id; ?>"><?php echo $obj->objective_name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-3 col-sm-12">
            <label>Activity</label>
            <select class="form-control select2" name="activity_id" onchange="$('#entryForm').submit()">
                <option>Choose Activity</option>
                <?php 
                     if($activities):
                     foreach($activities as $act):
                        $selectedAct = (!empty($selectedActivity))?$selectedActivity->id:null;
                ?>
                    <option <?php echo ($selectedAct == $act->id)?'selected':''; ?>  value="<?php echo $act->id; ?>"><?php echo $act->activity_name; ?></option>
                <?php 
                    endforeach;
                    endif; 
                ?>
            </select>
        </div>


        <div class="form-group col-lg-3 col-md-3 col-sm-12">
            <label>District</label>
            <select class="form-control select2">
                <option>Choose District</option>
                <?php 
                     if($districts):
                     foreach($districts as $dist):
                ?>
                    <option  value="<?php echo $dist->id; ?>"><?php echo $dist->district_name; ?></option>
                <?php 
                    endforeach;
                    endif; 
                ?>
            </select>
        </div>
    </form>
    
    <br>

    <?php } else{//No Objectives  ?>

        <div class="text-center">
            <h1 class="text-muted"><i class="fa fa-info-circle"></i></h1>
            <p class="text-danger">No Objectives were set up under project</p>
        </div> 
        <br>

    <?php } //ends check for Objectives ?>

    <?php if(!empty($selectedActivity)): ?>
        <label class="text-info">Selected Activity: </label>
        <h5><?php echo $selectedActivity->activity_name; ?></h5>
    <?php endif; ?>


    <?php if(count($parameters)>0): ?>
     
    <br>
    <label class="text-info">PARAMETERS / MEASURES: </label>
    <form method="post" action="<?php echo base_url()?>submit-data">
        <table width='100%'>

            <input type="hidden" value="<?=$selectedActivity->id?>" name="activity">

            <?php 
                foreach($parameters as $param):
            ?>
            <tr> 
                <td>
                    <label><?php echo $param->parameter_name; ?></label>
            </td>
            <td>
                <p> <?php echo $param->parameter_name; ?> </p>
                    <input type="text" name="params[]" required>
                    <input type="hidden" value="<?=$param->id?>" name="ids[]">
            </td>
            </tr>

            <?php endforeach; ?>
        </table>
        <div class="row">
            <div class="col-sm-12 col-lg-4 col-lg-offset-8 col-sm-offset-0 col-md-6 col-md-offset-6">
                <button type="submit" value="Submit Data" class="btn btn-success">
                    <i class="fa fa-save"></i> Submit Data
                </button>
            </div>
        </div>
    </form>

    <?php else:
        if($parameters){
    ?>
       <div class="text-center">
            <h1 class="text-muted"><i class="fa fa-info-circle"></i></h1>
            <h5 class="text-danger">No Parameters set up under <?=$selectedActivity->activity_name?></h5>
        </div> 
        <br>
   <?php } endif; ?>

