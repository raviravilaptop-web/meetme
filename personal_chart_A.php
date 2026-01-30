<!DOCTYPE html><?php
//=======================================1 chart=============================================
include_once('./login_system/_inc/config.php');
$sense5[] = 0;
$sense4[]  = 0;
$sense3[]  = 0;
$sense2[]  = 0;
$sense1[]  = 0;

$sqld = "SELECT `meeto_id`,sum(`sensecode`) AS sense5 FROM `me_client_sense` WHERE `inst_id` = '67' GROUP BY `meeto_id`";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $productname[] = $erow2['meeto_id'];
 
    }
}

$sqld5 = "SELECT `sensecode`,sum(`sensecode`) AS sense5 FROM `me_client_sense` WHERE `inst_id` = '67' AND `sensecode` = '5' GROUP BY `meeto_id` , `sensecode`";
if ($db->getresultset($sqld5)) {
    $result = $db->getresultset($sqld5);
    while ($erow2 = $result->fetch_assoc()) {
        if($erow2['sensecode']==null){

        }else{
        $sense5[] = $erow2['sense5'];
    }
    }
}
        echo json_encode($sense5); 
$sqld4 = "SELECT `sensecode`,sum(`sensecode`) AS sense4 FROM `me_client_sense` WHERE `inst_id` = '67' AND `sensecode` = '4' GROUP BY `meeto_id` , `sensecode`ORDER BY sum(`sensecode`) ";
if ($db->getresultset($sqld4)) {
    $result = $db->getresultset($sqld4);
        if(isset($result)){
    while ($erow2 = $result->fetch_assoc()) {
        $sense4[] = $erow2['sense4'];
    }
        }
}

$sqld3 = "SELECT `sensecode`,sum(`sensecode`) AS sense3 FROM `me_client_sense` WHERE `inst_id` = '67' AND `sensecode` = '3' GROUP BY `meeto_id` , `sensecode` ORDER BY sum(`sensecode`) ";
if ($db->getresultset($sqld3)) {
    $result = $db->getresultset($sqld3);
    if(isset($result)){
    while ($erow2 = $result->fetch_assoc()) {
        $sense3[] = $erow2['sense3'];
    }
}
}
$sqld2 = "SELECT `sensecode`,sum(`sensecode`) AS sense2 FROM `me_client_sense` WHERE `inst_id` = '67' AND `sensecode` = '2' GROUP BY `meeto_id` , `sensecode`";
if ($db->getresultset($sqld2)) {
    $result = $db->getresultset($sqld2);
    if(isset($result)){
    while ($erow2 = $result->fetch_assoc()) {
        $sense2[] = $erow2['sense2'];
    }
}
}
$sqld1 = "SELECT `sensecode`,sum(`sensecode`) AS sense1 FROM `me_client_sense` WHERE `inst_id` = '67' AND `sensecode` = '1' GROUP BY `meeto_id` , `sensecode`";
if ($db->getresultset($sqld1)) {
    $result = $db->getresultset($sqld1);
    if(isset($result)){
    while ($erow2 = $result->fetch_assoc()) {
        $sense1[] = $erow2['sense1'];
    }
}
}



//for ($x = 1; $x <= 40; $x++) {
//      $sqldp = "SELECT `roomNo`,sum(`qty`) AS pqntyp FROM `postalpck_info` WHERE `roomNo`= '$x' GROUP BY `roomNo` ORDER by`roomNo`";
//    $RecData = $db->select($sqldp);
//    $status = $RecData[0]['pqntyp'];
//    $salesp[] = $status;
//}
//=======================================2 chart=============================================

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">


        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="./image/logowithoutbg.png" rel="icon">
       

        <!--<script src="http://www.fonts2u.com/solaimanlipi.font"></script>-->

          <link href="https://fonts.gstatic.com" rel="preconnect">
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<!--        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/chart.js/chart.umd.js"></script>
        <script src="assets/vendor/echarts/echarts.min.js"></script>-->
<!--        <script src="assets/vendor/quill/quill.min.js"></script>
        <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>-->

        <!-- Template Main JS File -->
        <!--<script src="assets/js/main.js"></script>-->


    </head>

    <body >


<!--        <select type="text" class="form-control-sm " id="zoomc" name="zoomc"style="width: 100px;">
            <option value="100"> 100</option>
            <option value="200" >200</option>
            <option value="300">300</option>
            <option value="400"  >400</option>
        </select>-->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Column Chart -->
                    <!--<div id ="responddtls"></div>-->
                    <div id="columnChart"></div>

                    <!-- End Column Chart -->
                </div>
            </div>
        </div>
    </body>
</html>

<script>
//    var zooms = document.getElementById("zoomc").value;

                document.addEventListener("DOMContentLoaded", () => {
    new ApexCharts(document.querySelector("#columnChart"), {
        series: [{
                name: '5',
                data:<?php echo json_encode($sense5); ?>,
                  color:'#33ff00',
            }, {
                name: '4',
                data:<?php echo json_encode($sense4); ?>,
                color:'#99ff00',
            }, {
                name: '3',
                data:<?php echo json_encode($sense3); ?>,
                color:'#cccc00',
            },{
                name: '2',
                data:<?php echo json_encode($sense2); ?>,
                color:'#f67f12',
            },{
                name: '1',
                data:<?php echo json_encode($sense1); ?>,
                color:'#f60016',
            },],
        chart: {
            type: 'bar',
            height: 250
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: <?php echo json_encode($productname); ?>
        },
        yaxis: {
            title: {
                text: '(Sense)'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return  val + "Votes Complited "
                }
            }
        }
    }).render();

    });



</script>

<script type="application/json" data-for="mag">{
  "values": [4, 4, 4, 4, 4.1, 4.1, 4.1, 4.1, 4.1, 4.2, 4.2, 4.2, 4.2, 4.2, 4.3, 4.3, 4.3, 4.3, 4.3, 4.3, 4.3, 4.3, 4.3, 4.4, 4.4, 4.4, 4.4, 4.4, 4.4, 4.4, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.6, 4.6, 4.6, 4.6, 4.6, 4.6, 4.6, 4.6, 4.6, 4.7, 4.7, 4.7, 4.7, 4.7, 4.7, 4.7, 4.7, 4.7, 4.7, 4.8, 4.8, 4.8, 4.8, 4.8, 4.8, 4.9, 4.9, 4.9, 4.9, 4.9, 4.9, 4.9, 4.9, 4.9, 4.9, 5, 5, 5, 5, 5, 5, 5, 5.1, 5.1, 5.1, 5.1, 5.2, 5.2, 5.3, 5.3, 5.3, 5.3, 5.3, 5.4, 5.5, 5.5, 5.7],
  "keys": ["202", "900", "85", "826", "482", "174", "423", "671", "353", "394", "751", "224", "217", "845", "619", "859", "923", "199", "436", "305", "551", "407", "979", "467", "696", "607", "417", "716", "529", "326", "57", "368", "543", "659", "526", "411", "270", "198", "560", "634", "578", "35", "228", "527", "534", "830", "577", "293", "189", "426", "647", "532", "258", "808", "169", "732", "973", "470", "613", "957", "769", "822", "552", "678", "240", "669", "468", "114", "308", "873", "352", "672", "792", "958", "315", "563", "608", "897", "277", "474", "745", "843", "902", "229", "384", "126", "261", "335", "416", "938", "28", "752", "168", "318", "117", "191", "338", "354", "952", "275"],
  "group": ["SharedData53630a5c"]
}</script>


