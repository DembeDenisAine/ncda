

<br>
<h5 class="text-muted">Select Objective & Facility</h5>

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


    <?php } else{ //No Activities  ?>

        <div class="text-center">
            <h1 class="text-muted"><i class="fa fa-info-circle"></i></h1>
            <p class="text-danger">No branch Activities</p>
        </div> 
        <br>

    <?php } //ends check for Activities ?>

    <?php 
    $activityCount = 0;
    foreach($activities as $activity): ?>
    <br>
    <h6><?php echo ($activityCount+1).". ".$activity->activity_name; ?></h6>

    <?php  if(count($activity->parameters)>0): ?>
     
    <!-- <label class="text-info">PARAMETERS / MEASURES: </label> -->
    <form method="post" action="<?php echo base_url()?>branch/savedata">
        <table width='100%' >
              <input type="hidden" value="<?=$activity->id?>" name="activity[]">
              <input type="hidden" value="<?=$selectedFacility?>" name="facility">
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
                <!-- <p> <?php echo truncate($param->parameter_description,150); ?> </p> -->
            </td>
            <td width="10%">
                 <label><?php echo ($param->target_value)?$param->target_value:'N/A'; ?></label>
            </td>
            <td width="40%">
                <input type="text" name="values[<?=$activityCount?>][]" value="<?=branch_parameter_score($param->id,$selectedFacility)?>"  required>
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


     <div class="row">
            <div class="col-lg-4 col-lg-offset-8">
                <button type="submit" value="Submit Data" class="btn btn-success">
                    <i class="fa fa-save"></i> Submit Data
                </button>
            </div>
        </div>
    </form>


