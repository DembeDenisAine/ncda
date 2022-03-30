
<div class="btn-group mb-4">
<a href="<?php echo base_url('subscribers');?>" 
    class="btn btn-primary btn-sm pull-right">Back to All Members <i class="fas fa-arrow-left"></i></a>

<a href="#add_membership"  data-toggle="modal"
class="btn btn-success btn-sm pull-right">New Membership Entry <i class="fas fa-plus"></i></a>

</div>

<?php require_once('membership_entry_modal.php'); ?>

<div class="card list-card" style="border-left: 10px solid <?php echo ($subscriber->is_active)?'green':'maroon'; ?>;">
    <div class="card-body">
    <div class="row " >
        <div class="col-md-10">
            <label>Member Organization: </label>
            <h5><?php echo $subscriber->subscriber_name; ?></h5>
            <p><?php echo truncate($subscriber->subscriber_description,500); ?></p>
            <h6 class="text-bold text-info">Membership: <?=number_format($current_membership)?> <small>members</small></h6>
            <div class="grid">
                <div><strong><i class="fa fa-envelope text-muted"></i> Email:</strong> <?php echo $subscriber->email; ?></div>
                <div><strong><i class="fa fa-phone text-muted"></i> Phone Number:</strong> <?php echo $subscriber->phone_no; ?></div>
                <div><strong><i class="fa fa-calendar text-muted"></i> Member since:</strong> <?php echo $subscriber->since; ?></div>
                <div><strong><i class="fa fa-info-circle text-muted"></i>Status:</strong> <?php echo ($subscriber->is_active)?'Active':'Inactive'; ?></div>
            </div>
        </div>
    </div>

  
</div>
</div>


<?php // echo json_encode($membership); ?>

<div class="row mt-5">

 <div id = "container" class="col-md-12" ></div>

</div>

<div class="container mt-5">

<table class="table">
    <thead>
        <tr>
            <th>Period</th>
            <th>Membership</th>
        </tr>
    </thead>
    <?php 
    $i = 0;
    foreach ($membership->membership as $key => $value):
        $period = $membership->periods[$i];
        $i++;
     ?>
    <tr>
        <td><?=$period?> </td>
        <td><?=$value?> <small>members</small></td>
    </tr>
    <?php endforeach; ?>
</table>
</div>


<script type="text/javascript">
var chart_data = JSON.parse('<?php echo json_encode($membership); ?>');
console.log(chart_data);

$(document).ready(function() {

var title = {
   text: 'Organization Membership Trend'   
};

var subtitle = {
   text: 'Source: Member Submission'
};

var xAxis = {
   categories: chart_data.periods
};

var yAxis = {
   title: {
      text: 'Number of Members'
   },
   plotLines: [{
      value: 0,
      width: 1,
      color: '#808080'
   }]
};   

var tooltip = {
   valueSuffix: ' members'
}

var legend = {
   layout: 'vertical',
   align: 'right',
   verticalAlign: 'middle',
   borderWidth: 0
};

var series =  [{
      name: 'Membership',
      data: chart_data.membership
   }];

var json = {};
json.title = title;
json.subtitle = subtitle;
json.xAxis = xAxis;
json.yAxis = yAxis;
json.tooltip = tooltip;
json.legend = legend;
json.series = series;

Highcharts.chart('container',json);

});

</script>

