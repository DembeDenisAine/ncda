

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
                 
                     <h3><?=$activty->activity_name?></h3>

                    <?php 

                       foreach($paramData as $param):

                        $value = param_data($param->id);
                        $meetsTarget = ($value && is_numeric($value->target_value) && $value->parameter_value>=$param->target_value)?true:false;
                     ?>

                        <ul> 
                            <li> <?=$param->parameter_name?></li>
                            <li> <?=$param->target_value?></li>
                            <li  style="background-color:<?=($meetsTarget)?'#3bc92e':'#f79797'?>"> <?=($value)?$value->parameter_value:'N/A'?></li>
                        </ul>
                        
                    <?php 

                endforeach; 
                $rows++;

                 endif; 
                 endforeach; 
                endforeach;

            ?>
