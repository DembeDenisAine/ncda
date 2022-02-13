

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