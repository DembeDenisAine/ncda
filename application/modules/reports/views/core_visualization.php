
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script type="text/javascript">
  
   function renderChart(paramData){

    console.log(paramData);

    var data = JSON.parse(paramData);


    var currentValue = (data.param_value)?parseInt(data.param_value):0;
    var targetValue = (data.parameter_target)?parseInt(data.parameter_target):100;


    console.log(data.id);
    console.log(currentValue);
    console.log(targetValue);

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

       <?php 

         $rows = 0;
         $count = 0;

         foreach($objectives as $objective):
            $count++;

                 $activities = core_activities($objective->id); //activities($objective->id);

         ?>

    <h3><?=$count.". ".$objective->objective_name?></h3>
    <hr>
               
         <?php   
                  foreach($activities as $activty):

                    $paramData = parameters($activty->id,false,true);

                    if($paramData):
                 ?>

             <!--     
             <h5><?=$activty->activity_name?></h5>
 -->
           
            <div class="row">
                    <?php 

                       foreach($paramData as $param):

                        $value = param_data($param->id);
                        $meetsTarget = ($value &&  (!empty($value->target_value)) && is_numeric($value->target_value) && $value->parameter_value>=$param->target_value)?true:false;

                        $json = (Object) array(
                            'id'=>$param->id,
                            'paramenter_name'=>trim($param->parameter_name),
                            'paramenter_target'=>(!empty($param->target_value))?$param->target_value:null
                        );

                        $json->param_value = ($value)?$value->parameter_value:0;

                     ?>

                    <div class="col-md-4 card" style="padding:40px;">
                    <figure class="highcharts-figure">

                        <!-- <p class="highcharts-description text-">
                            <?=$param->parameter_name?>
                        </p> -->
                        <div id="container<?=$param->id?>"></div>
                    </figure>
                    </div>

                    <script type="text/javascript">
                        
                        renderChart('<?=json_encode($json)?>');

                    </script>

     
      
<?php 

    endforeach; 
    $rows++;

?>
 

</div>


<?php if( count($paramData)<1): ?>
    <h1 class="text-danger"> No indicators attached to objective</h1>
<?php endif; ?>


<?php 

    endif; 
    endforeach; 
    endforeach;

?>

