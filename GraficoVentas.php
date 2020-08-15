<?php require_once('cado/ClaseReceta.php'); 
$oreceta=new Recetas();
$a=$_POST['anio'];
$m=$_POST['mes'];
$mes=$m.','.$oreceta->VerMes($m); 

?>

 <!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SISLAB</title>

		<style type="text/css">
#container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
		</style>
	</head>
	<body>
<script src="Librerias/graficos/code/highcharts.js"></script>
<script src="Librerias/graficos/code/modules/series-label.js"></script>
<script src="Librerias/graficos/code/modules/exporting.js"></script>
<script src="Librerias/graficos/code/modules/export-data.js"></script>
<div class="row">
 <div class="col-lg-12 col-xs-12">
   <div class="page-header"  style="background-color:#EFF3F8; margin:0">
	<h1><i class="menu-icon"><img src="imagenes/Menu/estadistica.png" style="border:0;"  height="25" width="25" ></i>
					<span id="Titulo" style="font-size:13px; font-weight:bold">PRECISA DIAGNOSTICA</span>

    </h1> 						          									
   </div>
 
  </div>
</div>
<div class="row">
   <div class="col-lg-5 col-xs-12">
      
      <table class="table table-responsive table-bordered" style="margin:0" >
       <thead> 
          <tr >
             <th class='center' width='20%'>Fecha</th>
             <th class="center" width="10%">Dia</th>
             <th  width="15%">Efectivo</th>
             <th  width="20%">Cr&eacute;dito</th>
             <th  width="15%">Egresos</th>
             <th  width="20%">Total</th>
          </tr>
       </thead>
       
    </table>
    <div class="bodycontainer scrollable">
     <table class="table table-bordered table-scrollable">
       <tbody id="IdGraficoDash"  ></tbody>
     </table>                                                	
    </div>
    <table class="table table-bordered table-scrollable">
       <thead id="IdFooterVenta"  >
         <tr>
          <th width="30%" class="center" >TOTAL DEL MES EN SOLES  </th>
          <th width="15%" id="ThIngresos" > </th>
          <th width="20%" id="ThCredito" > </th>
          <th width="15%" id="ThEgresos" >   </th>
          <th width="20%" id="ThTotal" >  </th>
        </tr>
       </thead>
     </table>
      
   </div>
   <!--<div class="col-lg-1"></div>-->
   <div class="col-lg-7 col-xs-12">
      <div id="container"></div>
   </div>
</div>

<div class="row"><div class="col-lg-12 col-xs-12" style="height:50px"></div></div>

<div class="row">
 <div class="col-lg-12 col-xs-12">
   <div class="page-header"  style="background-color:#EFF3F8; margin:0">
	<h1><i class="menu-icon"><img src="imagenes/Menu/estadistica.png" style="border:0;"  height="25" width="25" ></i>
					<span id="Titulo" style="font-size:13px; font-weight:bold">INNOVA</span>

    </h1> 						          									
   </div>
 
  </div>
</div>
<div class="row">
   <div class="col-lg-5 col-xs-12">
      
      <table class="table table-responsive table-bordered" style="margin:0" >
       <thead> 
          <tr >
             <th class='center' width='20%'>Fecha</th>
             <th class="center" width="20%">Dia</th>
             <th  width="20%">Efectivo</th>
             <th  width="20%">Egresos</th>
             <th  width="20%">Total</th>
          </tr>
       </thead>
       
    </table>
    <div class="bodycontainer scrollable">
     <table class="table table-bordered table-scrollable">
       <tbody id="IdGraficoDashIn"  ></tbody>
     </table>                                                	
    </div>
    <table class="table table-bordered table-scrollable">
       <thead id="IdFooterVenta"  >
         <tr>
          <th width="40%" class="center" >TOTAL DEL MES EN SOLES  </th>
          <th width="20%" id="ThIngresosIn" > </th>
          <th width="20%" id="ThEgresosIn" >   </th>
          <th width="20%" id="ThTotalIn" >  </th>
        </tr>
       </thead>
     </table>
      
   </div>
   <!--<div class="col-lg-1"></div>-->
   <div class="col-lg-7 col-xs-12">
      <div id="container2"></div>
   </div>
</div>

<input type="hidden" id="IdHiMes" value="<?=$mes?>" >
<input type="hidden" id="IdHiAnio" value="<?=$a?>" >

<script type="text/javascript">

function GraficoVentasDia($dias,$importe){
  var $anio=$("#IdHiAnio").val()
  var $mes=$("#IdHiMes").val()
      $mes=$mes.split(',');
  
  var $texto='VENTAS DEL MES DE '+$mes[1]+' DEL '+$anio+' POR DIA'
  var chart;
  chart = new Highcharts.chart('container', {
 // Highcharts.chart('container', {
    title: {
        text: $texto
    },

    subtitle: {
        text: 'PRECISA DIAGNOSTICA'
    },
    
	 xAxis: {
                categories: $dias
                    
            },
	
    yAxis: {
		labels: {
        formatter: function() {
          if (this.value >= 0) {
            return 'S/. ' + this.value
          } 
         }
        },
        title: {
            text: "<b style='color:#004F9D; font-size:16px'>  </b>",
			//color: '#080800',
		    
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        '<b>'+this.x +': </b> S/.'+ this.y ;
                }
            },
    /*plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0
        }
    },*/

    series: [{
        name: 'Total',
        data: $importe
    }],

    responsive: {
        rules: [{
            /*condition: {
                maxWidth: 1000
            },*/
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
}

function GraficoVentasDiaInnova($dias,$importe){
  var $anio=$("#IdHiAnio").val()
  var $mes=$("#IdHiMes").val()
      $mes=$mes.split(',');
  var $texto='VENTAS DEL MES DE '+$mes[1]+' DEL '+$anio+' POR DIA'
  var chart;
  chart = new Highcharts.chart('container2', {
 // Highcharts.chart('container', {
    title: {
        text: $texto
    },

    subtitle: {
        text: 'INNOVA'
    },
    
	 xAxis: {
                categories: $dias
                    
            },
	
    yAxis: {
		labels: {
        formatter: function() {
          if (this.value >= 0) {
            return 'S/. ' + this.value
          } 
         }
        },
        title: {
            text: "<b style='color:#004F9D; font-size:16px'>  </b>",
			//color: '#080800',
		    
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        '<b>'+this.x +': </b> S/.'+ this.y ;
                }
            },
    /*plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0
        }
    },*/

    series: [{
        name: 'Total',
        data: $importe
    }],

    responsive: {
        rules: [{
            /*condition: {
                maxWidth: 1000
            },*/
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
}
/*function GraficoVentasDia($fecha,$array,$dias){
		//alert('ok');
		var chart;
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'IdDivCuadroFact',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'TENDENCIA DE FACTURACION POR DIA',
                x: -20 //center
            },
            subtitle: {
                text: 'Clipac',
                x: -20
            },
            xAxis: {
                categories: eval('['+$dias+']')
                    
            },
            yAxis: {
                title: {
                    text: 'Tendencia de Facturacion'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': S/.'+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
			series: [{
                name: 'Fact',
                data: eval('['+$array+']')
            }]
        });
		
		}*/
	
   function ReporVenta(){
	   var $anio=$("#IdHiAnio").val()
       var $mes=$("#IdHiMes").val()
           $mes=$mes.split(',');
      $.post('controlador/Creporte.php',{accion:"DASHBOARD",emp:'P',a:$anio,m:$mes[0]},function(data){
		   
		        var monto=new Array();
				var dias=new Array();
				$.each(data,function(index,columna){
					dias.push(columna.dia);
					monto.push(parseFloat(columna.total));
			     });
	      GraficoVentasDia(dias,monto)
      },'JSON')
    }
	
	function ReporVentaInnova(){
	   var $anio=$("#IdHiAnio").val()
       var $mes=$("#IdHiMes").val()
           $mes=$mes.split(',');
		   
      $.post('controlador/Creporte.php',{accion:"DASHBOARD_IN",emp:'I',a:$anio,m:$mes[0]},function(data){
		       //console.log(data)
		        var monto=new Array();
				var dias=new Array();
				$.each(data,function(index,columna){
					dias.push(columna.dia);
					monto.push(parseFloat(columna.total));
			     });
	      GraficoVentasDiaInnova(dias,monto)
      },'JSON')
    }
	
	function ListarReporVenta(){ 
	     var $anio=$("#IdHiAnio").val()
         var $mes=$("#IdHiMes").val()
             $mes=$mes.split(',');
      $.post('controlador/Creporte.php',{accion:"DASHBOARD_TABLA",emp:'P',a:$anio,m:$mes[0]},function(data){
		  $data=data.split('***')
		  $("#IdGraficoDash").html($data[0]) 
		  $("#ThIngresos").html($data[1])
		  $("#ThCredito").html($data[2])
		  $("#ThEgresos").html($data[3])
		  $("#ThTotal").html($data[4])
      })
    }
	function ListarReporVentaInnova(){ 
	    var $anio=$("#IdHiAnio").val()
        var $mes=$("#IdHiMes").val()
            $mes=$mes.split(','); 
      $.post('controlador/Creporte.php',{accion:"DASHBOARD_TABLA_IN",emp:'I',a:$anio,m:$mes[0]},function(data){
		  $data=data.split('***')
		  $("#IdGraficoDashIn").html($data[0]) 
		  $("#ThIngresosIn").html($data[1])
		  $("#ThEgresosIn").html($data[2])
		  $("#ThTotalIn").html($data[3])
      })
    }
	
ListarReporVenta();ListarReporVentaInnova()
ReporVenta();ReporVentaInnova();
		</script>
	</body>
 <style>
.bodycontainer { max-height: 340px; width: 100%; margin: 0; overflow-y: auto; height:340px; }
.table-scrollable { margin: 0; padding: 0; }
</style>
    
</html>
