<div class="page-header"  style="background-color:#EFF3F8; margin-bottom:0">
	 <h1><i class="menu-icon"><img  src="imagenes/serie.png" style="border:0;"  height="25" width="25" ></i>
								    <span id="Titulo" style="font-size:13px; font-weight:bold">CONFIGURACION DE SERIE</span>

      </h1> 						         
										
 </div>

<table class="table table-responsive table-bordered" style="margin:0" >
       <thead>
          <tr >
             <Th width="5%" class="center">Nro</Th>
             <Th width="10%">Tipo Documento</Th>
             <Th width="85%">Serie</Th>
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
          <td width="100%" >&nbsp;&nbsp; <button type="button"  class="btn btn-primary" onclick="AbrirModalSer()">Nuevo </button>
          &nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-primary" onclick="AbrirModalUpdatePrin()">Editar </button>
          </td>
          
       </tr>
     </table>	               								
 </div>

<div id="IdModalSer" class="modal fade" role="dialog" >
   <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="color:#030">  <img src="imagenes/serie.png" height="30" width="30"  /> 
        &nbsp; INGRESE SERIE </h4>
        
      </div>
    <div class="modal-body">

    <table width="100%">
        <tr style="display:none;">
            <td>Id</td>
            <td><input type="text" id="IdSer" size="5" readonly="readonly" class="form-control"/></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><b>Tipo Documento</b></td>
            <td><select id="TipoDoc" class="form-control" style="height:35px">
                    <option value="BV"> BV </option>
                    <option value="FA"> FA </option>
                    <option value="NC"> NC </option>
                    <option value="TB"> TB </option>
                    <option value="TF"> TF </option>
                 </select>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><b>Serie</b></td>
            <td><input type="text" id="TxtNombreSer"  class="form-control" onkeyup="ValidarSer()" onkeypress="ValidarSer()" style="text-transform: uppercase;" >
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
         
        <!--<tr>
            <td colspan="2" align="center"><button id="id_grabar" onclick="javascript:RegistrarPrincipio()" style="font-size:13px">
            <img src="LIBRERIAS/IMAGENES/guardar.jpg" style="border:0" height="15" width="15" />&nbsp;&nbsp;Grabar</button>
            &nbsp;&nbsp;<button  id="id_delete" onclick="javascript:CerrarModal()" style="font-size:13px">
            <img src="LIBRERIAS/IMAGENES/can.jpg" style="border:0" height="16" width="16" />&nbsp;&nbsp;Cancelar</button></td>
        </tr>-->
    </table>
       </div>
       
       <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <button class="btn btn-white btn-info btn-bold" id='IdGrabarUsu' onclick="RegistrarPrincipio()" ><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Grabar</button>
		<button class="btn btn-white btn-default btn-round " class="close"  data-dismiss="modal"><i class="ace-icon fa fa-times red2"></i>Cancelar</button>										
								
      </div>

       
      </div>
 </div>
 </div>


<script>
	
	$(document).ready(function(){
    $("#IdModalSer").on('shown.bs.modal', function(){
        $(this).find('#TxtNombreSer').focus();
    });
   });		
			   
function LisPrin(){
	var $buscar=$("#IdBuscar").val()
	$("#IdCuerpoUsu").html("<tr><td colspan='2'> Cargando ..</td></tr>");
    $.post('controlador/Cserie.php',{accion:"LISTAR",buscar:$buscar},function(data){
	  $("#IdCuerpoFam").html(data);$("#IdFilaPrin").val('')
     })  
 }

				 
function AbrirModalSer(){
	$("#idvalor").val(1)
	$("#TipoDoc").val('BV')
	$("#IdModalSer").modal()
	limpiar_campos();
	//$("#id_cmb_est option[value="+2+"]").attr("selected",true); 
 }
function CerrarModal(){
	$("#IdModalSer").modal("hide")
	//$("#update_pri").data("kendoWindow").close();
}  

				  
function PintarFila($id){
	 var $idfilaanterior=$("#IdFilaPrin").val()  
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
	$("#IdFilaPrin").val($id)	
	
	//$("#id_area_u").val($id)
	/*$("#txt_descrip_u").val('silva')*/
  }  
			 
			 
 function AbrirModalUpdatePrin(){
	 $("#idvalor").val(2)
	 var $ident = $("#IdFilaPrin").val()
     var $id=$("#"+$ident).attr("IdPrin")
	 var $principio=$("#"+$ident).attr("nom")
	 var $tipo=$("#"+$ident).attr("tipo")
	 //alert($principio)
	if($ident == ''){
		swal("Debe seleccionar un Registro", "Campo Obligatorio", "warning");return false;
	}
	else{
		$("#IdSer").val($id)
		$("#TipoDoc").val($tipo)
		$("#TxtNombreSer").val($principio)			
		$("#IdModalSer").modal()
		
	}	
 }	 
function RegistrarPrincipio(){
	//validar_data();
	
	var $valor=$("#idvalor").val();
	var $id = $("#IdSer").val();
	var $familia = ($("#TxtNombreSer").val()).toUpperCase()
	var $tipo_doc=$("#TipoDoc").val();
	  $primer=($familia.substr(0,1)).toUpperCase()

	  if ($familia == ''){swal('Ingrese Serie ..', "Cuidado", "error");$("#TxtNombreSer").focus();return false;}
	  if($tipo_doc=='BV' ){if($primer!='B'){ swal("La Primera Letra debe ser ( B ) ..", "Cuidado", "error");return false;}}
	  if($tipo_doc=='FA' ){if($primer!='F'){swal("La Primera Letra debe ser ( F ) ..", "Cuidado", "error");return false;}}
	  if($tipo_doc=='NC'){if($primer!='F' && $primer!='B'){swal("La Primera Letra debe ser ( F ) o ( B ) ..", "Cuidado", "error");return false;}}

	
	  $can=$familia.length
	  if($can!=4){swal("La Serie debe tener 4 digitos ..", "Alerta", "error");$("#TxtNombreSer").val($familia.substr(0,3));return false;}
	
	
	$.post("controlador/Cserie.php",{accion:'NUEVO',id:$id,familia:$familia,valor:$valor,tipo:$tipo_doc},function(data){
		if(data==1){$("#IdFilaPrin").val("");swal("Datos registrados Correctamente ..", "Felicitaciones", "success");LisPrin();CerrarModal(); return false;}
		if(data==0){swal("Datos no registrados ..", "Error", "error"); return false;}
		if(data==2){swal("La Serie ya se encuentra registrada ..", "Error", "error"); return false;}
	})
	  
} 

 function ValidarSer(){
	 $valor=$("#TxtNombreSer").val()
	 $can=$valor.length
	 if($valor==''){$("#TxtNombreSer").val('')}
	 if($can>4){$("#TxtNombreSer").val($valor.substr(0,4))}
	 
 }			 	 	
function limpiar_campos(){
	$("#IdSer,#TxtNombreSer,#IdBuscar").val("");
	}			 
LisPrin();
		  
</script>

           
<input type="hidden" id="IdFilaPrin"  />
<input type="hidden" id="idvalor"  />







 <!--<div>
    
    <div align="left" style="margin-top:7px; margin-left:10px;">
     <table width="100%">
       <tr>
       
       <td width="15%" >
       <button  onclick="javascript:AbrirModalSer()" >
       <img src="LIBRERIAS/IMAGENES/nuevo.jpg" style="border:0" height="15" width="15"  />&nbsp;Nuevo</button>&nbsp;&nbsp;
       <button  onclick="javascript:AbrirModalUpdatePrin()">
       <img src="LIBRERIAS/IMAGENES/editar.png" style="border:0" height="15" width="15"  />&nbsp;Editar</button>&nbsp;&nbsp;
      
       </td>
   
      
       </tr>
       </table>
    </div>
            
 </div>-->
        
            
            
            



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

            