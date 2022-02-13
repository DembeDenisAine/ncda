
<a href="<?php echo base_url(); ?>project-list" class="btn btn-primary">
    <i class="fa fa-arrow-left"></i> Back to Projects
</a>

<hr>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
        <div class="row " >
            <div class="col-md-12">
                <label>Project:</label>
            <h6><?php echo $project->project_name; ?></h6>
                <label>Description: </label>
                <p><?php echo $project->project_description; ?></p>
                <div class="grid">
                <div><strong><i class="fa fa-calendar text-muted"></i> Started:</strong> <?php echo text_date($project->start_date); ?></div>
                <div><strong><i class="fa fa-calendar text-muted"></i> Ends:</strong> <?php echo text_date($project->end_date); ?></div>
                <div><strong><i class="fa fa-clock text-muted"></i> Duration:</strong> <?php echo $project->duration; ?></div>
                <div><strong><i class="fa fa-check-circle text-muted"></i> Last Updated:</strong> <?php echo time_ago($project->updated_at); ?></div>
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

        <!-- <div class="form-group col-lg-3 col-md-3 col-sm-12">
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
        </div> -->


        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label>Facility</label>
            <select class="form-control select2 required" name="facility" onchange="$('#entryForm').submit()">
                <option value=""> Choose Facility</option>
                <?php 
                     if($facilities):
                     foreach($facilities as $facility):
                ?>
                    <option  <?php echo ($selectedFacility==$facility['id'])?'selected':''; ?> value="<?php echo $facility['id']; ?>"><?php echo $facility['facility_name']; ?></option>
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

    <?php 
    $activityCount = 0;
    foreach($activities as $activity): ?>
    <br>
    <h6><?php echo ($activityCount+1).". ".$activity->activity_name; ?></h6>

    <?php  if(count($activity->parameters)>0): ?>
     
    <!-- <label class="text-info">PARAMETERS / MEASURES: </label> -->
    <form method="post" action="<?php echo base_url()?>submit-data">
        <table width='100%' >
             <input type="hidden" value="<?=$activity->id?>" name="facility">
              <input type="hidden" value="<?=$selectedFacility?>" name="activity[]">
            <thead>
                <tr>
                    <th></th>
                    <th>Target</th>
                    <th>Score</th>
                </tr>
            </thead> 
            <?php
                $count =0; 
                foreach($activity->parameters as $param):
                $count++;
            ?>
            <tr> 
            <td width="50%">
                <label><?php echo $param->parameter_name; ?></label>
                <p> <?php echo truncate($param->parameter_description,150); ?> </p>
            </td>
            <td width="10%">
                 <label><?php echo ($param->target_value)?$param->target_value:'N/A'; ?></label>
            </td>
            <td width="40%">
                <input type="text" name="values[<?=$activityCount?>][]"  required>
                <input type="hidden"  class="input" value="<?=$param->id?>" name="params[<?=$activityCount?>][]">
            </td>
            </tr>

            <?php endforeach; ?>
        </table>

    <?php 

    endif;
    if(count($activity->parameters) == 0): 
    
    ?>

       <div class="text-center">
            <h1 class="text-muted"><i class="fa fa-info-circle"></i></h1>
            <h5 class="text-danger">No Parameters set up under <?=$activity->activity_name?></h5>
        </div> 
        <br>

    <?php  
       endif;
       $activityCount++;
       endforeach;
    ?>

    <input type="hidden" name="project_id" value="<?=$project->id?>" />

     <div class="row">
            <div class="col-sm-12 col-lg-4 col-lg-offset-8 col-sm-offset-0 col-md-6 col-md-offset-6">
                <button type="submit" value="Submit Data" class="btn btn-success">
                    <i class="fa fa-save"></i> Submit Data
                </button>
            </div>
        </div>
    </form>


