
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script type="text/javascript">
  
   function renderChart(paramData){

    var data = JSON.parse(paramData);

    console.log(data);

    var currentValue = (data.param_value)?parseInt(data.param_value):0;
    var targetValue = (data.parameter_target)?parseInt(data.parameter_target):100;
    
        Highcharts.chart('container'+data.id, {

        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },

        title: {
            text: data.paramenter_name
        },

        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
            min: 0,
            max: targetValue,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: ''//data.parameter_name
            },
            plotBands: [{
                from: 0,
                to: (targetValue>40)?40:targetValue,
                color: '#DF5353' // green
            }, {
                from: (targetValue>40)?40:targetValue,
                to: (targetValue>70)?70:targetValue,
                color: (targetValue>70)?'#DDDF0D':'#55BF3B' // yellow
            }, {
                from: (targetValue>=70)?70:targetValue,
                to: (targetValue<=100)?100:targetValue,
                color: '#55BF3B' // red
            }]
        },

    series: [{
        name: 'Current Value',
        data: [currentValue],
        tooltip: {
            valueSuffix: ''
        }
    }]

});

}

</script>


<h4><?php echo $project->project_name; ?></h4>
<p><?php echo nl2br($project->project_description); ?></p>
<hr>
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

           
            <div class="row">
                    <?php 

                       foreach($paramData as $param):

                        $value = param_data($param->id);
                        $meetsTarget = ($value && is_numeric($value->target_value) && $value->parameter_value>=$param->target_value)?true:false;

                        $param->param_value = ($value)?$value->parameter_value:0;

                     ?>

                        <!--<ul> 
                            <li> <?=$param->parameter_name?></li>
                            <li> <?=$param->target_value?></li>
                            <li  style="background-color:<?=($meetsTarget)?'#3bc92e':'#f79797'?>"> <?=($value)?$value->parameter_value:'N/A'?></li>
                        </ul>-->

<div class="col-md-4">
<figure class="highcharts-figure">

    <p class="highcharts-description text-">
        <?=$param->parameter_name?>
    </p>
    <div id="container<?=$param->id?>"></div>
</figure>
</div>

<script type="text/javascript">
    
    renderChart('<?=json_encode($param)?>');

</script>

             
<?php 

    endforeach; 
    $rows++;

    ?>


</div>

<?php 

    endif; 
    endforeach; 
    endforeach;

?>

