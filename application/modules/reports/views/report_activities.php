
<form class="row" action="" class="form-horizontal" >

   
    <div class="input-group col-md-4 mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
      </div>
      <input type="text" class="form-control datepicker" name="from" placeholder="From Date" autocomplete="off" value="<?=isset($_GET['from'])?$_GET['from']:''?>">
    </div>

    <div class="input-group col-md-4 mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
      </div>
      <input type="text" class="form-control datepicker" name="to" placeholder="To Date" autocomplete="off" value="<?=isset($_GET['to'])?$_GET['to']:''?>">
    </div>

    <div class="form-group col-md-3">
        <button class="btn btn-success" type="submit">Apply Filter</button>
    </div>
</form>

<?php include('includes/activities_context_menu.php'); ?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th class="cell-header">Activity</th>
            <th class="cell-header">Indicator(s)</th>
            <th class="cell-header">Target</th>
            <th class="cell-header">Status</th>
        </tr>
    </thead>
       <?php 
         $rows = 0;
         foreach($objectives as $objective):
          $activities = activities($objective->id,true);
          if(count($activities)>0):
        ?>
             <tr>
                 <td class="text-bold" colspan="4"><?=$objective->objective_name?></td>
             </tr>
            
            <?php 
                  
                  foreach($activities as $activty):
                    $paramData = parameters($activty->id,true);

                    if($paramData):
                 ?>
                 
                    <tr style="background-color:<?=(($rows%2)>0)?'#eee':''?>">

                    <td  rowspan="<?=($paramData)?count($paramData)+1:1;?>"> 
                        <?=$activty->activity_name?>
                    </td>
                    
                    </tr>

                    <?php foreach($paramData as $param):

                        $value = param_data($param->id,true);
                        $meetsTarget = ( $value && (!empty($value->target_value)) && is_numeric($value->target_value) && $value->parameter_value>=$param->target_value)?true:false;
                     ?>
                        <tr style="background-color:<?=(($rows%2)>0)?'#eee':''?>"> 
                            <td> <?=$param->parameter_name?></td>
                            <td> <?=($param->target_value)?$param->target_value:''?></td>
                            <td  style="background-color:<?=($meetsTarget)?'#3bc92e':'#f79797'?>"> 
                                <?=($value)?$value->parameter_value:'N/A'?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

            <?php 
                $rows++; 
                 endif; 
                 endforeach;

                 endif;
                 endforeach; 
             ?>

</table>

<script src="<?php echo base_url()?>assets/plugins/context-menu/context-menu.js"></script>

