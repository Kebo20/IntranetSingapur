<div class="page-header"  style="background-color:#EFF3F8; margin:0">
	<h1><i class="menu-icon"><img src="imagenes/Menu/user.svg" style="border:0;"  height="25" width="25" ></i>
					<span id="Titulo" style="font-size:13px; font-weight:bold">CONFIGURACION DE SUCURSALES</span>

    </h1> 						          
										
 </div>
<?php include("cado/ClaseUbigeo.php");?>

           
<input type="hidden" id="IdFilaSuc"  />
<input type="hidden" id="idvalor"  />

    <table class="table table-responsive table-bordered" style="margin:0"  >
       <thead>
          <tr >
             <Th class='center' width='9%'><b>Nro</b></Th>
             <Th class="center" width="9%"><b>Sucursal</b></Th>
             <Th class="center" width="9%"><b>Departamento</b></Th>
             <Th class="center" width="9%"><b>Provincia</b></Th>
             <Th class="center" width="9%"><b>Distrito</b></Th>
             <Th class="center" width="9%"><b>Dirección</b></Th>
             <Th class="center" width="9%"><b>Teléfono</b></Th>
             <Th class="center" width="9%"><b>Representante</b></Th>
             <Th class="center" width="9%"><b>Dni</b></Th>
             <Th class="center" width="9%"><b>Celular</b></Th>
             
             <Th class="center" width="9%"><b>Estado</b></Th>
            
          </tr>
       </thead>
       
    </table>
   <div class="bodycontainer scrollable">
        <table class="table table-bordered table-scrollable">
           <tbody id="IdCuerpoSuc" style="font-size:12px;"></tbody>  
        </table>
   </div>
  
  
  <div class="page-header"  style="background-color:#EFF3F8;padding-left:10px; padding-top:15px">
     <table width="100%">
       <tr>
          <td width="40%"><span class="input-icon" style="width:90%">
           <!--<input type="text" class="form-control" id="IdBuscar" style="width:30%" placeholder="Buscar Usuario .." onkeyup="javascript:LisSuc()"  /> -->
    
						<input type="text" id="IdBuscar" placeholder=" Buscar Usuario" class="form-control" 
                         onkeyup="javascript:LisSuc()" autocomplete="off"  />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span></td>
          <td width="50%"> <button type="button"  class="btn btn-primary" onclick="javascript:AbrirModalSuc()">Nuevo </button>
          &nbsp;&nbsp;<button type="button" id="IdDecJu" class="btn btn-primary" onclick="javascript:AbrirModalUdate()">Editar </button>
          &nbsp;&nbsp;<button type="button" id="IdDecJua" class="btn btn-primary" onclick="javascript:AbrirModalEliminar()">Eliminar </button>
          </td>
       </tr>
     </table>	               								
 </div>
  
  
    <!--<div align="left" style="margin-top:7px; margin-left:10px;">
     <table width="100%">
       <tr>
       
       <td width="15%" >
       <button id="lightness" onclick="javascript:AbrirModalUsu()" >
       <img src="LIBRERIAS/IMAGENES/nuevo.jpg" style="border:0" height="15" width="15"  />&nbsp;Nuevo</button>&nbsp;&nbsp;
       <button id="lightness" onclick="javascript:AbrirModalUdate()">
       <img src="LIBRERIAS/IMAGENES/editar.png" style="border:0" height="15" width="15"  />&nbsp;Editar</button>&nbsp;&nbsp;
     
       </td> 
       </tr>
       </table>
    </div>-->

        
            
            
            
<div id="IdModalSuc" class="modal fade" role="dialog" >
 
   <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="color:#030">  <img src="imagenes/Menu/convenio.png" height="30" width="30"  /> 
        &nbsp; SUCURSAL </h4>
        
      </div>
    <div class="modal-body">
    <table  width="90%" style="font-size:13px; font-weight:bold;">
        <tr style='display:none'>
            <td>Id</td>
            <td><input name ="id_suc" type="text" id="id_suc" size="5" readonly="readonly" class="form-control"/></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><b>Nombre de sucursal</b></td>
            <td><input name ="nombre" type="text" id="nombre" style="text-transform:uppercase" class="form-control" value=""></td>
        </tr>
        <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>Estado</b></td>
            <td> 
            <select id="id_cmb_est" class="form-control" style="height:35px">
                <option value="0" selected="selected"> Activado </option>
                <option value="1"> Desactivado </option>
            </select>
            </td>
        </tr>
         <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>Departamento</b></td>
            <td> 
            <select id="id_cmb_dep" class='chosen-select form-control'   style="height:35px;width:100%">
                <option value=''>Seleccione un departamento</option>
                <?php
                
                $oubigeo=new Ubigeo();
                $lista_departamentos=$oubigeo->Listar_departamento();
                foreach($lista_departamentos as $departamento){
                    
               ?>
               
               <option value='<?=$departamento[0] ?>'><?=$departamento[1] ?></option>
               
               <?php }?>
            </select>
            </td>
        </tr>
           <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>Provincia</b></td>
            <td> 
            <select id="id_cmb_pro" class='chosen-select form-control'   style="height:35px;width:100%">
                <option value=''>Seleccione un provincia</option>
            </select>
            </td>
        </tr>
           <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>Distrito</b></td>
            <td> 
            <select id="id_cmb_dis" class='chosen-select form-control'  style="height:35px;width:100%">
                <option value=''>Seleccione un distrito</option>
            </select>
            </td>
        </tr>
           <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>Dirección</b></td>
            <td> 
            <input id="direccion" class="form-control" style="height:35px">
                
            
            </td>
        </tr>
               <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>Teléfono</b></td>
            <td> 
            <input id="telefono" class="form-control" style="height:35px">
                
            
            </td>
        </tr>
               <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>Representante</b></td>
            <td> 
            <input id="representante" class="form-control" style="height:35px">
                
            
            </td>
        </tr>
               <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>D.N.I</b></td>
            <td> 
            <input id="dni" class="form-control" style="height:35px">
                
            
            </td>
        </tr>
               <tr> <td>&nbsp;</td></tr>
       
        <tr>
            <td><b>Celular(representante)</b></td>
            <td> 
            <input id="cell" class="form-control" style="height:35px">
                
            
            </td>
        </tr>
        
        <tr><td>&nbsp;</td></tr>
    </table>
 </div>
  <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <button class="btn btn-white btn-info btn-bold" id='IdGrabarUsu' onclick="RegistrarUsuario()" ><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Grabar</button>
		<button class="btn btn-white btn-default btn-round"  data-dismiss="modal"><i class="ace-icon fa fa-times red2"></i>Cancelar</button>										
								
      </div>
        </div>
     </div>
 </div>


<!--MODAL ELIMINAR -->                              
        <div class="modal fade" id="IdModalEli" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4  class="modal-title">Eliminar sucursal</h4>
                    </div>
                    <div class="modal-body">
                        <p >¿Está seguro de eliminar este sucursal?</p>
                    </div>

                    <div class="modal-footer">

                            <input type="hidden" name="id" id="IdEliminar">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                            <button onclick="Eliminar()"  class="btn  btn-danger waves-effect">Eliminar</button>
                        
                    </div>

                </div>
            </div>
        </div>

<script>
	$(document).ready(function(){
    $("#IdModalUsu").on('shown.bs.modal', function(){
        $(this).find('#usuario').focus();
    });
    
   // $(".chosen-select").chosen({width:"100%"});
    $(".chosen-select").select2({dropdownParent: $('#IdModalSuc')});
    $(document).on('change', '#id_cmb_dep', function () {
        
        LlenarProvincias($("#id_cmb_dep").val());
        //$("#id_cmb_dis").html("<option value='' >Seleccione un distrito</option>")
        
    })
    $(document).on('change', '#id_cmb_pro', function () {
        
        LlenarDistritos($("#id_cmb_pro").val());
    })
   
    
   });		   
function LisSuc(){
	var $buscar=$("#IdBuscar").val()
	$("#IdCuerpoSuc").html("<tr><td colspan='5'> Cargando ..</td></tr>");
    $.post('controlador/Csucursal.php',{accion:"LISTAR",buscar:$buscar},function(data){
	  $("#IdCuerpoSuc").html(data);$("#IdFilaSuc").val('')
     })  
 }

				 
function AbrirModalSuc(){

	$("#idvalor").val(1)
	$("#IdModalSuc").modal()
	limpiar_campos();
	//$("#id_cmb_est option[value="+2+"]").attr("selected",true); 
  }
  
 function AbrirModalEliminar(){
     
     var $ident = $("#IdFilaSuc").val()
     var $id=$("#"+$ident).attr("idsuc")
     
     	if($ident == ''){
		swal("Debe seleccionar un Registro", "Obligatorio", "warning");
		return false;
	    }
	   else{		
	     $("#IdEliminar").val($id)
	     $("#IdModalEli").modal()
     
	}
 } 
 
 function Eliminar(){
      $.post("controlador/Csucursal.php",{id:$("#IdEliminar").val(),accion:"eliminar"},function(provincias){
         
         
     })
     LisSuc();
     
     
 }
 
function CerrarModal(){
	$("#IdModalSuc").modal("hide");
	
}  

				  
function PintarFila($id){
	 var $idfilaanterior=$("#IdFilaSuc").val()  
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
	$("#IdFilaSuc").val($id)	
	
	//$("#id_area_u").val($id)
	/*$("#txt_descrip_u").val('silva')*/
  }  
			 
			 
 function AbrirModalUdate(){
	 $("#idvalor").val(2)
	 var $ident = $("#IdFilaSuc").val()
     var $id=$("#"+$ident).attr("idsuc")
	 var $nombre=$("#"+$ident).attr("nombre")
	 var $departamento=$("#"+$ident).attr("departamento")
	 var $provincia=$("#"+$ident).attr("provincia")
	 var $distrito=$("#"+$ident).attr("distrito")
	 var $direccion=$("#"+$ident).attr("direccion")
	 var $telefono=$("#"+$ident).attr("telefono")
	 var $representante=$("#"+$ident).attr("representante")
	 var $dni=$("#"+$ident).attr("dni")
	 var $cell=$("#"+$ident).attr("cell")
	
	 
	if($ident == ''){
		swal("Debe seleccionar un Registro", "Obligatorio", "warning");
		return false;
	}
	else{		
	    
		$("#IdModalSuc").modal()	
		$("#id_suc").val($id)
		$("#nombre").val($nombre)
		$("#telefono").val($telefono)
		$("#direccion").val($direccion)
		$("#dni").val($dni)
		$("#representante").val($representante)
	    $("#cell").val($cell)
 
	    $("#id_cmb_dep").val($departamento)
	    $("#id_cmb_dep").change()
	    
	    
	    setTimeout( function() { 
            
        $("#id_cmb_pro").val($provincia)
	    $("#id_cmb_pro").change()
        }, 1000)
	 
        setTimeout( function() { 
            
        
	    $("#id_cmb_dis").val($distrito)
	    $("#id_cmb_dis").change()
        }, 1500)

	}	
    
 }
 
function RegistrarUsuario(){
	//validar_data();
	 var $valor=$("#idvalor").val();
     var $id=$("#id_suc").val()
	 var $nombre=$("#nombre").val()
	 var $departamento= $("#id_cmb_dep").val()
	 var $provincia= $("#id_cmb_pro").val()
	 var $distrito= $("#id_cmb_dis").val()
	 var $direccion=$("#direccion").val()
	 var $telefono=$("#telefono").val()
	 var $representante=$("#representante").val()
	 var $dni=$("#dni").val()
	 var $cell= $("#cell").val()
	
	
	
	if ($departamento == ''){swal("Seleccione un departamento ..", "Campo Obligatorio", "warning");$("#id_cmb_dep").focus();return false;}
	if ($provincia == ''){swal("Seleccione una provincia ..", "Campo Obligatorio", "warning");$("#id_cmb_pro").focus();return false;}
	if ($distrito == ''){swal("Seleccione un distrito ..", "Campo Obligatorio", "warning");$("#id_cmb_dis").focus();return false;}
	if ($nombre == ''){swal("Ingrese nombre de sucursal ..", "Campo Obligatorio", "warning");$("#nombre").focus();return false;}
	if ($representante == ''){swal("Ingrese Representante ..", "Campo Obligatorio", "warning");$("#representante").focus();return false;}
	if ($dni == ''){swal("Ingrese D.N.I del representante ..", "Campo Obligatorio", "warning");$("#dni").focus();return false;}
	if ($direccion == ''){swal("Ingrese dirección ..", "Campo Obligatorio", "warning");$("#direccion").focus();return false;}
	
	
	$.post("controlador/Csucursal.php",{accion:'nuevo',valor:$valor,id:$id,nombre:$nombre,departamento:$departamento,provincia:$provincia,distrito:$distrito,direccion:$direccion,telefono:$telefono,representante:$representante,dni:$dni,cell:$cell},function(data){
		if(data==2){swal("Sucursal ya existe ..", "Error", "error"); return false;}
		if(data==1){$("#IdFilaSuc").val("");swal("Datos registrados Correctamente ..", "Felicitaciones", "success");LisSuc();CerrarModal(); return false;}
		if(data==0){swal("Datos no registrados Correctamente ..", "Error", "error"); return false;}
	})
	  
} 
			 	 
				 

function limpiar_campos(){
	$("#id_suc,#nombre,#dni,#representante,#IdBuscar,#cell,#direccion,#telefono").val("");
	$("#id_cmb_est").val("0");$("#id_cmb_dep").val("");$("#id_cmb_pro").val("");
	$("#id_cmb_dis").val("");
	
	}	

 
 
 function LlenarProvincias($departamento){
    
     $.post("controlador/Cubigeo.php",{departamento:$departamento,accion:"provincias"},function(provincias){
         
         $('#id_cmb_pro').html(provincias);
         $('#id_cmb_dis').html("");
     }).fail(function(error) {
        $('#id_cmb_pro').html("");
        $('#id_cmb_dis').html("");
        console.log(error);
});
     
        
       
     
 }

 
 function LlenarDistritos($provincia){
     
     $.post("controlador/Cubigeo.php",{provincia:$provincia,accion:"distritos"},function(distritos){
         
         $('#id_cmb_dis').html(distritos);
     }).fail(function(error) {
        $('#id_cmb_dis').html("");
        console.log(error);
});
     
     
 }
 
 
 
LisSuc("");



		  
</script>

<style>
  .bodycontainer { max-height: 340px; width: 100%; margin: 0; overflow-y: auto; height:340px; }
.table-scrollable { margin: 0; padding: 0; }
</style>
