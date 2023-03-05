@extends('base2')
@section('content')
<div class="container">
<div id="container"  style="background-color: red"></div>
</div>


@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
var datas=<?php echo json_encode($datas) ?>;
  Highcharts.chart('container',{
    title:{
      text:"Vue Generale sur l'evolution du marrché"
    },
    subtitle:{
      text:'source:surfside Media'
    }
    ,
    xAxis:{
      categories:['Janvier','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec']
    },
    yAxis:{
      title:{
        text:'Number of order'
      }
    },
    legend:{
      layout:'vertical',
      align:'right',
      verticalAlign:'middle'

    },
  
    series:[{
      name:'New Order',
      data:datas
    }],

    responsive:{
      rules:[
        {
          condition:{
            maxWidth:1000
          },
          chartOptions:{
            legend:{
              layout:'horizontal',
              align:'center',
              verticalAlign:'bottoom'
            }
          }
        }
      ]
    },

  })
</script>
@endsection
@endsection