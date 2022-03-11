
<?php include('includes/projects_context_menu.php'); ?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th class="cell-header">Activity</th>
            <th class="cell-header">Indicator(s)</th>
            <th class="cell-header">Target</th>
            <th class="cell-header">Score</th>
        </tr>
    </thead>
       <?php 
         $rows = 0;
         foreach($objectives as $objective):
          $activities = activities($objective->id);
        ?>
       
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
                        $meetsTarget = ($value && is_numeric($value->target_value) && $value->parameter_value>=$param->target_value)?true:false;
                     ?>
                        <tr style="background-color:<?=(($rows%2)>0)?'#eee':''?>"> 
                            <td> <?=$param->parameter_name?></td>
                            <td> <?=$param->target_value?></td>
                            <td  style="background-color:<?=($meetsTarget)?'#3bc92e':'#f79797'?>"> <?=($value)?$value->parameter_value:'N/A'?></td>
                        </tr>
                    <?php endforeach; ?>

            <?php 
                $rows++; endif; endforeach; ?>
        
            <?php  endforeach; ?>

</table>

<script src="<?php echo base_url()?>assets/plugins/context-menu/context-menu.js"></script>

