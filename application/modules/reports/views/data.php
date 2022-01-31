

<div class="container">


<form action="<?php echo base_url(); ?>project_report" method="post" id="report_form">
    <h6 class="text-muted">Choose Project</h6>

      <?php require_once('project_select.php'); ?>

    </form>

<div>

<hr>


<table border="1" width="100%">
    <thead>
        <tr>
            <th>Activity</th>
            <th>Indicator(s)</th>
            <th>Target</th>
            <th>Score</th>
        </tr>
    </thead>
       <?php 
         $rows = 0;
         foreach($objectives as $objective):
          $activities = activities($objective->id);
        ?>

        <!-- <tr>
            <td rowspan="<?=($activities)?count($activities):1;?>">
                <?=$objective->objective_name?>
            </td>
        </tr> -->
       
       
            <?php 
                  
                  foreach($activities as $activty):
                    $paramData = parameters($activty->id);

                    if($paramData):
                 ?>
                 
                    <tr style="background-color:<?=(($rows%2)>0)?'#eee':''?>">

                    <td  rowspan="<?=($paramData)?count($paramData)+1:1;?>"> 
                        <?=$activty->activity_name?>
                    </td>
                    
                    </tr>

                    <?php foreach($paramData as $param):
                        $value = param_data($param->id);
                     ?>
                        <tr style="background-color:<?=(($rows%2)>0)?'#eee':''?>"> 
                            <td> <?=$param->parameter_name?></td>
                            <td> <?=$param->target_value?></td>
                            <td> <?=($value)?$value->parameter_value:'N/A'?></td>
                        </tr>
                    <?php endforeach; ?>

            <?php 
                    $rows++; endif; endforeach; ?>
        
    <?php  endforeach; ?>

</table>
</div>

<!-- data-imagesrc="<?php echo base_url();?>assets/images/project.png" -->

<script>
    $("#example").ddslick({
    selectText: "Select Project",
    width: '100%',
    background:'#ffffff',
    imagePosition: "left",
    height:200,
    onSelected: function(selectedData){
       $('#report_form').submit()
    }
    } );
</script>

