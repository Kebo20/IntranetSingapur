<div class="page-header"  style="background-color:#EFF3F8; margin:0">
	<h1><i class="menu-icon"><img src="imagenes/grupo_user.png" style="border:0;"  height="25" width="25" ></i>
					<span id="Titulo" style="font-size:13px; font-weight:bold">CONFIGURACION DE GRUPOS DE USUARIOS</span>

    </h1> 						          
										
 </div>


           
<input type="hidden" id="IdFilaUsu"  />
<input type="hidden" id="idvalor"  />

    <table class="table table-responsive table-bordered" style="margin:0" >
       <thead> 
          <tr >
             <Th class='center' width='10%'>Nro</Th>
             <Th class="center" width="40%">Nombre Grupo</Th>
             <Th class="center" width="10%">Tipo Grupo</Th>
          </tr>
       </thead>
       
    </table>
   <div class="bodycontainer scrollable">
        <table class="table table-bordered table-scrollable">
           <tbody id="IdCuGruUsu" style="font-size:12px;"></tbody>  
        </table>
   </div>
  
  
  <div class="page-header"  style="background-color:#EFF3F8;padding-left:10px; padding-top:15px">
     <table width="100%">
       <tr>
          <td width="40%"><span class="input-icon" style="width:90%">
	<input type="text" id="IdBuscar" placeholder=" Buscar Grupo" class="form-control"
                         onkeyup="javascript:LisGruUsu()" autocomplete="off"  />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span></td>
          <td width="50%"> <button type="button"  class="btn btn-primary" onclick="javascript:AbrirModalUsu()">Nuevo </button>
          &nbsp;&nbsp;<button type="button" id="IdDecJu" class="btn btn-primary" onclick="javascript:AbrirModalUdate()">Editar </button>
          </td>
       </tr>
     </table>	               								
 </div>           
<div id="IdModalUsu" class="modal fade" role="dialog" >
 
   <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="color:#030">  <img src="imagenes/grupo_user.png" height="30" width="30"  /> 
        &nbsp; INGRESE GRUPO DE USUARIO </h4>
        
      </div>
    <div class="modal-body">
    <table  width="90%" style="font-size:13px; font-weight:bold;">
        <tr style='display:none'>
            <td>Id</td>
            <td><input name ="id_gru" type="text" id="id_gru" size="5" readonly="readonly" class="form-control"/></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>Nombre</td>
            <td><input name ="nombre" type="text" id="nombre" style="text-transform:uppercase" class="form-control" value=""
            autocomplete="off" ></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>Vista</td>
            <td>
               <label for="IdSist"><input type="radio" name="IdTipGru" id="IdSist" value="0" checked="checked"  /> Sistema 
               &nbsp;&nbsp;&nbsp;</label>
               <label for="IdPag"> <input type="radio" name="IdTipGru" id="IdPag" value="1"  /> P&aacute;gina </label>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
    </table>
 </div>
  <div class="modal-footer" >
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <button class="btn btn-white btn-info btn-bold" id='IdGrabarUsu' onclick="RegistrarGrupo()" >
        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Grabar</button>
		<button class="btn btn-white btn-default btn-round"  data-dismiss="modal" onclick="$(this).modal('hide')">
        <i class="ace-icon fa fa-times red2"></i>Cancelar</button>										
								
      </div>
        </div>
     </div>
 </div>


<script>
	$(document).ready(function(){
    $("#IdModalUsu").on('shown.bs.modal', function(){
        $(this).find('#nombre').focus();
    });
   });		   
function LisGruUsu(){
	var $buscar=$("#IdBuscar").val()
	$("#IdCargando").show();
    $.post('controlador/Cusuario.php',{accion:"LIS_GRUPO",buscar:$buscar},function(data){
	  $("#IdCuGruUsu").html(data);$("#IdFilaUsu").val('');$("#IdCargando").hide();
     })  
 }

				 
function AbrirModalUsu(){
	$("#idvalor").val(1)
	$("#IdModalUsu").modal()
	limpiar_campos();
	//$("#id_cmb_est option[value="+2+"]").attr("selected",true); 
  }
function CerrarModal(){
	$("#IdModalUsu").modal("hide");
	
}  

				  
function PintarFila($id){
	 var $idfilaanterior=$("#IdFilaUsu").val()  
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
	$("#IdFilaUsu").val($id)	
	
	//$("#id_area_u").val($id)
	/*$("#txt_descrip_u").val('silva')*/
  }  
			 
			 
 function AbrirModalUdate(){
	 $("#idvalor").val(2)
	 var $ident = $("#IdFilaUsu").val()
     var $id=$("#"+$ident).attr("idusu")
	 var $nombre=$("#"+$ident).attr("nombre")
     var $tip=$("#"+$ident).attr("tip")
	 
	if($ident == ''){
		swal("Debe seleccionar un Registro", "Obligatorio", "warning");
		return false;
	}
	else{			
		$("#IdModalUsu").modal()	
		$("#id_gru").val($id)
		$("#nombre").val($nombre)
		if($tip==0){$("#IdSist").prop("checked",true)}if($tip==1){$("#IdPag").prop("checked",true)}	
	}	
 }
 

function RegistrarGrupo(){
	//validar_data();
	var $valor=$("#idvalor").val();
	var $id = $("#id_gru").val();
	var $nombre = $("#nombre").val().toUpperCase();
	var $tip=$("input[name='IdTipGru']:checked").val()

	if ($nombre == ''){swal("Ingrese Nombre de Grupo ..", "Campo Obligatorio", "warning");$("#usuario").focus();return false;}
	
	$.post("controlador/Cusuario.php",{accion:'NUEVO_GRUPO',id:$id,nombre:$nombre,valor:$valor,tip:$tip},function(data){
		if(data==2){swal("Nombre Grupo ya existe ..", "Error", "error"); return false;}
		if(data==1){$("#IdFilaUsu").val("");swal("Datos registrados Correctamente ..", "Felicitaciones", "success");
		LisGruUsu();CerrarModal(); return false;}
		if(data==0){swal("Datos no registrados Correctamente ..", "Error", "error"); return false;}
	})
	  
} 
			 	 
 function limpiar_campos(){
	$("#id_gru,#nombre,#IdBuscar").val("");
 }	
		 
LisGruUsu("");
	  
</script>
            

            
            
<style>
.bodycontainer { max-height: 340px; width: 100%; margin: 0; overflow-y: auto; height:340px; }
.table-scrollable { margin: 0; padding: 0; }
</style>
