<div class="page-header"  style="background-color:#EFF3F8; margin-bottom:0">
		<h1><i class="menu-icon"><img id="IdImgEdificacion" src="imagenes/caja.png" style="border:0;"  height="25" width="25" ></i>
			<span id="Titulo" style="font-size:13px; font-weight:bold">CONFIGURACION DE CAJAS</span>
        </h1> 								
</div>

<table class="table table-responsive table-bordered" style="margin:0" >
       <thead>
          <tr >
             <Th width='5%' class="center"><b>Nro</b></Th>
             <Th width="5%" class="center"><b>Series</b></Th>
             <Th width="35%" class="center"><b>Caja</b></Th>
             <Th width="10%" class="center"><b>Fecha crea</b></Th>
             <Th width="10%" class="center"><b>User crea</b></Th>
             <Th width="10%" class="center"><b>Estado</b></Th>
             <Th width="10%" class="center"><b>Asignar Serie</b></Th>
          </tr>
   </thead>
        
    </table>
<div class="bodycontainer scrollable">
        <table class="table table-bordered table-scrollable">
           <tbody id="IdCuerpoFam" style="font-size:12px;"></tbody>    
        </table>
</div>
<div class="page-header"  style="background-color:#EFF3F8;padding-left:10px; padding-top:15px">
     <table width="100%">
       <tr>
          <td width="100%" >&nbsp;&nbsp; <button type="button"  class="btn btn-primary" onclick="AbrirModalFam()">Nuevo </button>
          &nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-primary" onclick="AbrirModalUdate()">Editar </button>
          </td>
          
       </tr>
     </table>	               								
 </div>
 
 <div id="IdModalFam" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="color:#030">  <img src="imagenes/caja.png" height="30" width="30"  /> 
        &nbsp; INGRESE CAJA </h4>
        
      </div>
    <div class="modal-body">

    <table width="100%">
        <tr style="display:none;">
            <td><b>Id</b></td>
            <td><input type="text" id="IdFam" size="5" readonly="readonly" class="form-control"/></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><b>Caja</b></td>
            <td><input type="text" id="TxtNombre" style="text-transform:uppercase" class="form-control">
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><b>Estado</b></td>
            <td><select id="TxtEstado" class="form-control" style="height:35px" >
                   <option value="0">Habilitado</option>
                   <option value="1">Dehabilitado</option>
                </select>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
    </table>
    </div>
    
    <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <button class="btn btn-white btn-info btn-bold"  id="id_grabar" onclick="RegistrarCaja()" >
        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Grabar</button>
		<button class="btn btn-white btn-default btn-round" class="close" data-dismiss="modal"><i class="ace-icon fa fa-times red2"></i>Cancelar</button>										
								
      </div>
    
   </div>

 </div>
</div>
 
 
 <div id="IdModalAsignar" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="color:#030">  <img src="imagenes/asignar.png" height="30" width="30"  /> 
        &nbsp; ASIGNAR SERIES A <span id="Titu"></span> </h4>
        
      </div>
    <div class="modal-body">
     
     <table class="table table-responsive table-bordered" style="margin:0" >
       <thead>
          <tr >
             <Th width='15%' class="center">Tipo Documento</Th>
             <Th width="70%" class="center">Serie</Th>
             <Th width="15%" class="center">Asignar</Th>
          </tr>
       </thead>
    </table>
    <div class="bodycontainer scrollable">
        <table class="table table-bordered table-scrollable">
           <tbody id="IdCuSeLi" style="font-size:12px;"></tbody>    
        </table>
    </div>
    
    </div>
    
    <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <button class="btn btn-white btn-info btn-bold"  id="id_grabar" onclick="RegistrarSeriesCaja()" >
        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Grabar</button>
		<button class="btn btn-white btn-default btn-round" class="close" data-dismiss="modal"><i class="ace-icon fa fa-times red2"></i>Cancelar</button>										
								
      </div>
     </div>
   </div>
  </div>
  
 
 
<script>
$(document).ready(function(){
    $("#IdModalFam").on('shown.bs.modal', function(){
        $(this).find('#TxtNombre').focus();
    });
   });
   
 function LisCaja(){
	var $buscar=$("#IdBuscar").val()
	 $("#IdCuerpoFam").html("")
		$.ajax({
                      url:'controlador/Ccaja.php',
                      type:'POST',
					  //dataType:"JSON",
					  data:{accion:'LISTAR',buscar:$buscar},
                      beforeSend:function(){
                          $('#IdCargando').show()
                  },
                  success:function(data){ 
			          $("#IdCuerpoFam").html(data);$('#IdCargando').hide()
					  $('.show-details-btn').on('click', function(e) {
					          e.preventDefault();
					          $(this).closest('tr').next().toggleClass('open');
					          $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				        });
                  }
                }); 
 }
   				   
/*function LisCaja(){
	var $buscar=$("#IdBuscar").val()
	$("#IdCargando").show()
    $.post('controlador/Ccaja.php',{accion:"LISTAR",buscar:$buscar},function(data){
		 alert(data)
	  $("#IdCuerpoFam").html(data);$("#IdCargando").hide()
     })  
 }
*/
function LisSeries(){
    $.post('controlador/Cserie.php',{accion:"LIS_LIBRE"},function(data){
	  $("#IdCuSeLi").html(data);
     })  
 }
				 
function AbrirModalFam(){
	 limpiar_campos();$("#IdModalFam").modal();$("#idvalor").val(1)
}
function AbrirModalAsignar($idcaja,$caja){
	$("#Titu").text($caja);LisSeries();$("#Idcaja").val($idcaja)
	$("#IdModalAsignar").modal('show');
}

function CerrarModal(){
	$("#IdModalFam").modal("hide")
	$("#IdModalAsignar").modal("hide")
}  

				  
function PintarFila($id){
	 var $idfilaanterior=$("#IdFilaFam").val()  
	 var $par=$idfilaanterior.split('_')
	 var $par_int=parseInt($par[1])
	// alert($par_int)
   if($par_int%2==0){
	   // alert("hola")
	  $("#"+$idfilaanterior).css({ 
		   "background-color":"#f5f5f5",
		   "color": "#000000"
		})
	}else{
	   $("#"+$idfilaanterior).css({
		   "background-color":"#FFFFFF",
		   "color": "#000000"
		})					   
	}
	$("#"+$id).css({
	   "background-color": "#438EB9",
	   "color": "#FFFFFF"
	 })
	$("#IdFilaFam").val($id)	
	
	//$("#id_area_u").val($id)
	/*$("#txt_descrip_u").val('silva')*/
  }  

function PintarFila1(){
	 $('input[type=checkbox]').each(function(){
		   $idtr=$(this).attr("idtr")		 
         if (this.checked) { 
			$("#"+$idtr).css({
		      "background-color":"#438EB9",
		      "color": "#FFFFFF"
		     })	  
         }else{
		     $("#"+$idtr).css({
		       "background-color":"#FFFFFF",
		       "color": "#000000"
		      })
		  }
      });
  }  
			 
			 
 function AbrirModalUdate(){
	 $("#idvalor").val(2)
	 var $ident = $("#IdFilaFam").val()
     var $id=$("#"+$ident).attr("idFam")
	 var $familia=$("#"+$ident).attr("nombre")
	 var $est=$("#"+$ident).attr("est")

	if($ident == ''){
		//alert("Debe seleccionar un Registro");
		swal("Debe seleccionar un Registro", "Seleccione Registro", "warning");return false;
	}
	else{
		$("#IdFam").val($id)
		$("#TxtNombre").val($familia)		
		$("#TxtEstado").val($est)						
		$("#IdModalFam").modal();
		
	}	
 }	 
function RegistrarCaja(){
	//validar_data();
	var $valor=$("#idvalor").val();
	var $id = $("#IdFam").val();
	var $familia = $("#TxtNombre").val().toUpperCase()
	var $estado=$("#TxtEstado").val()
	
	if ($familia == ''){swal("Ingrese Caja ..", "Campo Obligatorio", "warning");$("#TxtNombre").focus();return false;}
	 
	$.post("controlador/Ccaja.php",{accion:'NUEVO',id:$id,familia:$familia,valor:$valor,est:$estado},function(data){
		 //alert(data)
		if(data==1){$("#IdFilaFam").val("");swal("Datos registrados Correctamente ..", "Felicitaciones", "success");
		              LisCaja();CerrarModal(); return false;}
		if(data==0){swal("Datos no registrados ..", "Error", "error"); return false;}
	})
	  
}

  $Arreglo=new Array();
  
function RegistrarSeriesCaja(){
	  $Arreglo.length=0
	  $idcaja=$("#Idcaja").val();$can=0
	 $('input[type=checkbox]').each(function(){		 
         if (this.checked) { 
		    $Ar=new Array();
			$Ar.length=0
			$Ar[0]=$idcaja
			$Ar[1]=$(this).val()
			$Arreglo.push($Ar);
			$can=$can+1;
			//alert($Arreglo[0]);
          }
      });
    if($can==0){swal("Seleccionar alguna Serie", "Campo Obligatorio", "warning"); return false;}	 
	$.post("controlador/Ccaja.php",{accion:'GRA_SE_CA',arreglo:$Arreglo},function(data){
		if(data==1){$("#Idcaja").val("");LisCaja();swal("Series Asignadas Correctamente ..", "Felicitaciones", "success");
		 CerrarModal(); return false;}             
		if(data==0){swal("Datos no registrados ..", "Error", "error"); return false;}
	})
	  
} 
 			 	 	
function limpiar_campos(){
	$("#IdFam,#TxtNombre,#IdBuscar").val("");
	}			 
LisCaja("");


/* function ValidarCanCajas(){
   	$.post("CONTROLADOR/Ccaja.php",{accion:'VALSER'},function(data){
		if(data==2){swal("Solo se aceptan 5 Cajas Activas", "Comuniquese al Número 992780507", "success");return false;}
	})
  }*/
		  
</script>

           
<input type="hidden" id="IdFilaFam"  />
<input type="hidden" id="idvalor"  />
<input type="hidden" id="Idcaja"  />


<style>
.bodycontainer { max-height: 340px; width: 100%; margin: 0; overflow-y: auto; height:340px; }
.table-scrollable { margin: 0; padding: 0; }
</style>

            

            
            
            
<!--<div class="demo-section">
     <br><br>
    <h3>Configuraci&oacute;n de Areas</h3>
    <br><br>
    <div id="rowSelection"></div>
</div>-->

            