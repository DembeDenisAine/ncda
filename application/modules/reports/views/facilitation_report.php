
<form class="row" action="" class="form-horizontal" >

   
    <div class="input-group col-md-3 mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
      </div>
      <input type="text" class="form-control datepicker" name="from" placeholder="From Date" autocomplete="off" value="<?=isset($_GET['from'])?$_GET['from']:''?>">
    </div>

    <div class="input-group col-md-3 mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
      </div>
      <input type="text" class="form-control datepicker" name="to" placeholder="To Date" autocomplete="off" value="<?=isset($_GET['to'])?$_GET['to']:''?>">
    </div>

    <div class="input-group col-md-4 mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon2"><i class="fa fa-hospital"></i></span>
        </div>
            <select class="form-control" name="facility_id" required>
                <option value="">Choose Facility</option>
                <?php foreach($facilities as $facility): ?>
                    <option <?=($facility['id']==@$row->id)?'selected':''?> value="<?=$facility['id']?>"><?=$facility['facility_name']?></option>
                 <?php endforeach; ?>
            </select>
    </div>

    <div class="form-group col-md-2">
        <button class="btn btn-success" type="submit">Apply Filter</button>
    </div>
</form>

<?php include('includes/facilitation_context_menu.php'); ?>


<table class="table table-bordered">
<thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Description</th>
        <th>Facility</th>
        <th>Value</th>
    </tr>
</thead>
<tbody>
    <?php  
           if($transactions): $i=0;  
           foreach($transactions as $row): 
           $i++; 

    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row->description; ?></td>
            <td><?php echo $row->facility_name; ?></td>
            <td><?php echo ($row->item_value)?'UGX '.number_format($row->item_value):''; ?></td> 
        </tr>
    <?php endforeach; endif; ?>

</tbody>
</table>