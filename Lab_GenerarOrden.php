<?php require_once('cado/ClaseGrupo.php'); $ogrupo=new Grupos()?>

<div class="row">
   <div class="col-xs-9 topi">
		
    <div class="modal-dialog topi" style="box-shadow:5px 5px 20px #000; width:100% ">
      <div class="modal-content">
      <div class="modal-header">
       <!-- <button type="button" class="close">&times;</button>-->
       <table width="100%">
          <tr>
             <td width="40%"><h4 class="modal-title" style="color:#2679B5;font-size:14px">
             <img src="imagenes/orden.png" height="25" width="25"  /> 
       <b> &nbsp;GENERAR ORDEN &nbsp;&nbsp;  
       <i class="ace-icon glyphicon glyphicon-refresh bigger-120 blue" style="cursor:pointer" onclick="Refrescar('0')"></i></b> </h4></td>
             <td width="30%">
             <h4 class="modal-title" style="color:#2679B5;font-size:14px; font-weight:bold">
       &nbsp;Nro Orden :&nbsp;<span id="IdOrden" style="font-size:14px; font-weight:bold"></span></b> </h4>
             </td>
             <td width="30%"> <h4 class="modal-title" style="color:#2679B5;font-size:14px;font-weight:bold"> 
       <b> &nbsp;Estado : &nbsp;<span id="IdEstado" style="font-size:14px; font-weight:bold"></span> </b> </h4> 
      </td>
          </tr>
       </table>
      <!--<h4 class="modal-title" style="color:#2679B5;font-size:14px">  <img src="imagenes/orden.png" height="25" width="25"  /> 
       <b> &nbsp;GENERAR ORDEN &nbsp;&nbsp;  
       <i class="ace-icon glyphicon glyphicon-refresh bigger-120 blue" style="cursor:pointer" onclick="Refrescar()"></i> 
        NRO ORDEN : <label id="IdOrden"></label>
       
       </b> </h4>-->
        
      </div>
    <div class="modal-body">
     <!-- id="form-field-select-3" -->
     <table width="100%">
       <tr>
         <td colspan="2">
           <label for="IdPrecisa">
           <input type="radio" name="TipoEmpresa"  id="IdPrecisa" checked="checked" value="P" onclick="TipoEmp();LisExamen(); Refrescar('0')" />
           <b>PRECISA</b></label>
          &nbsp;&nbsp;&nbsp;
           <label for="IdInnova"><input type="radio" name="TipoEmpresa"  id="IdInnova" value="I" onclick="TipoEmp();LisExamen(); Refrescar('1')" /><b>INNOVA</b></label>
         </td>
       </tr>
       <tr><td>&nbsp;</td></tr>
       <tr>
        <td colspan="2">
           <B>Empresa</B><br />
         <select id="IdEmpresa" class="chosen-select form-control"  onchange="Habilitar()" style="width:95%">
            <option value="0"></option>
           <?php  $listar=$ogrupo->ListarConvOrden();
		       while($fila=$listar->fetch()){?>
               <option value='<?=$fila[0]?>'  tipo='<?=$fila[4]?>' >
			   <?=$fila[1]?></option>
           <?php }?>
         </select></td>
     <td > <b >Dni</b>
      <input type="number" class="form-control" disabled="disabled" id="TxtDni"  style="width:90%" maxlength="8"  />												
        </td>
     </tr>
     <tr><td>&nbsp;</td></tr>
       <tr>
        <!-- <td>
         <B>Empresa</B><br />
         <select id="IdEmpresa" class="form-control" style="width:90%" onchange="Habilitar()"></select></td>
         <td > <b onclick="HabilitarPaciente()" style="cursor:pointer">Paciente</b>
      <input type="text" class="form-control" id="pac1" style="width:90%" disabled="disabled"  onkeyup="javascript:LisPac1()"/>
         </td>-->
         <td width="30%" > <b onclick="HabilitarPaciente()" style="cursor:pointer">Paciente</b>
      <input type="text" class="form-control" id="pac1" style="width:90%" disabled="disabled"  onkeyup="javascript:LisPac1()"/>												
        </td>
         <td width="30%"> 
      <!--<input type="text" class="form-control" disabled="disabled" id="med" style="width:90%" onkeyup="javascript:LisMed()"/>-->
      <b>M&eacute;dico</b>
       <select id="med" class="chosen-select form-control" onchange="SelMedico()"  style="width:90%;">
            <option value="0"></option>
           <?php  $listar=$ogrupo->ListarMedicoAuto();
		       while($fila=$listar->fetch()){?>
               <option value='<?=$fila[0]?>' por='<?=$fila[2]?>' ><?=$fila[1]?></option>
           <?php }?>
     </select>
         </td>
         <td width="40%"><b>Ex&aacute;men</b> 
<input type="text" class="form-control" disabled="disabled" id="deta1" style="width:90%"  />
         </td>
      <!--<td>
      <input type="text" class="form-control" id="TxtIdMuestra" style="width:90%" placeholder="Nombre Exámen .." readonly="readonly" /> 
      </td>-->
       </tr>
       <tr><td>&nbsp;</td></tr>
     </table>
     <table class="table table-responsive table-bordered" style="margin:0" >
               <thead>  
                  <tr>
                     <th width="50%"><span style="font-size:13px">Ex&aacute;men</span></th>
                     <th width="15%"><span style="font-size:13px">Precio</span></th>
                     <th width="25%"><span style="font-size:13px">Muestra</span></th>
                     <th width="10%"><span style="font-size:13px">Quitar</span></th>
                  </tr>
               </thead>
                <!--<tbody id="IdTblCuExaRe1" style="font-size:12px;"></tbody>-->                
       </table>
       <div class="bodycontainer scrollable">
          <table class="table table-bordered table-scrollable">
             <tbody id="IdTblCuExaRe1" style='font-size:10px;'></tbody>    
          </table>
        </div>
    
    </div>
    
    <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <table width="100%">
           <tr>
             <td align="left">
               <button type="button"  class="btn btn-primary" onclick="GrabarReceta()" id="BtnOrden">  <b>Generar Orden</b></button>
               &nbsp;&nbsp;
               <button type="button"  class="btn btn-primary" onclick="EnviarProcesos()" id="BtnProcesos">  <b>Enviar Procesos</b></button>
               <button type="button"  class="btn btn-primary" onclick="EnviarImagenes()" id="BtnImagenes" style="display:none">  <b>Enviar Imagenes</b></button>
               &nbsp;&nbsp;
               <button type="button"  class="btn btn-primary" onclick="AbrirModalBuscar()">  <b>Buscar</b></button>
               &nbsp;&nbsp;
               <button type="button"  class="btn btn-primary" onclick="AnularOrden()" id="BtnAnular">  <b>Anular</b></button>
               &nbsp;&nbsp;
               <button type="button"  class="btn btn-primary" onclick="Reimprimir()" id="BtnReimprimir" style="display:none" >  <b>Reimprimir</b></button>
               <!--<button type="button"  class="btn btn-primary" onclick="Imprimir()" >  <b>Probando ticket</b></button>-->
               
             </td>
           </tr>
        </table>									
								
      </div>
     </div>
   </div>
  </div>
        
 <!-- comienza la 3 ultimas columnas -->   
  <div class="col-xs-3">
 
 <div class="row"> 
  <div class="modal-dialog topi" style="box-shadow:5px 5px 20px #000; width:100% ">
      <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" style="color:#2679B5; font-size:14px">  <img src="imagenes/medico.png" height="25" width="25"  /> 
       <b> &nbsp;MONTO MEDICO </b> </h4>
        
      </div>
    <div class="modal-body">  
          <table width="100%"  >             
                   <tr  >
                   <td height="43"><b>% M&eacute;dico</b>
        <input type="number" class="form-control" id="por_medico" style="width:90%" onkeyup="MontoDoc()"  value=0 min="0"  step="0.01" />
                   </td>
                   <td><b>Total en S/.</b>
        <input type="number" class="form-control" id="monto_medico" style="width:90%" readonly="readonly"  value=0 min="0"  step="0.01" />
                   </td>
                   </tr>                             
             </table>
        </tr>
       </table>
    
    </div>
  
     </div>
   </div> 
  </div>
 
<div class="row">
  <div class="modal-dialog topi" style="box-shadow:5px 5px 20px #000; width:100% ">
      <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
      <h4 class="modal-title" style="color:#2679B5;font-size:14px">  <img src="imagenes/caja.png" height="25" width="25"  /> 
       <b> &nbsp;MONTO ORDEN </b> </h4>
        
      </div>
    <div class="modal-body">
     
     <table width="100%"  >             
                   <tr style="display:none" ><td  ><b>Subtotal</b><br />
        <input type="number" class="form-control" id="Subtotal1" style="width:90%"  value=0 min="0" readonly="readonly" step="0.01" />
                   </td><td><b>Descuento</b><br />
         <input type="number" class="form-control" id="Descuento1" style="width:90%"  value=0 min='0' step="0.01" 
         onkeyup="javascript:CalcularMonto();MontoDoc()" />
                   </td></tr>
                   <!--<tr><td>&nbsp;&nbsp;</td></tr>-->
                   <tr ><td ><b style="font-size:16px">Total</b><br />
       <input type="text"  class="form-control" id="Total1" value=0  style="width:95%; height:45px;  font-size:16px; font-weight:bold; color:#000" readonly="readonly"  />
                   </td></tr>                             
             </table>
        </tr>
       </table>
    
    </div>
    
    <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <table width="100%" >
           <tr>
             <td align="left">
                 <button class="btn btn-white btn-info btn-bold"  id="BtnGenDoc" style="display:none" onclick="AbrirModalDocumento()" >
                  <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Generar Documento</button>
                  <span id="DocEmitido" style="display:none; color:#8C0000; font-weight:bold; font-size:14px">DOCUMENTO EMITIDO</span>
             </td>
           </tr>
        </table>					
      </div>
     </div>
   </div>
  </div>

</div>  
 <!-- finaliza la 3 ultimas columnas -->
 

</div>
  
 
 <div id="IdModalBuscar" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="color:#2679B5">  <img src="imagenes/examen.png" height="30" width="30"  /> 
         BUSCAR ORDEN  </h4>
      </div>
    <div class="modal-body">

  <table width="95%">
     <tr><td><b>Nro Orden :</b>
     <input type="text" id="TxtOrden" class="form-control" onkeypress="return validaNum(event)" autocomplete="off" /></td></tr>
     <tr><td>&nbsp;</td></tr> 
   </table>
    </div>
    
    <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <button class="btn btn-white btn-info btn-bold"  id="BtnBusOrden" onclick="BuscarOrden()" >
        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Aceptar</button>
		<button class="btn btn-white btn-default btn-round"  data-dismiss="modal"><i class="ace-icon fa fa-times red2"></i>Cancelar</button>										
								
      </div>
    
   </div>

 </div>
</div>
  
  
 <div id="IdModalDocumento" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:70%" >
      <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="color:#2679B5">  <img src="imagenes/dinero.png" height="30" width="30"  /> 
         GENERAR DOCUMENTO DE VENTA  </h4>
      </div>
    <div class="modal-body">

  <table class="table table-bordered">
      <thead>
         <tr>
            <th colspan="3">DATOS DE PAGO</th>
         </tr>
         
      </thead>

   </table>
   <table width="100%" >
     <tbody>
        <tr>
          <td width="15%"><b>Condicion de Pago</b><br />
            <label for="IdContado" ><input type="radio" name="CondicionPago" id="IdContado"  value="CONTADO" checked="checked" 
            onclick="CondicionPago()" /> Contado  &nbsp;&nbsp;</label>
            <label for="IdCredito" ><input type="radio" name="CondicionPago" id="IdCredito"  value="CREDITO" 
            onclick="CondicionPago()" /> Cr&eacute;dito  &nbsp;&nbsp;</label>
           </td>
          <td colspan="2" id="TdIdTipoPago"><b>Tipo Pago</b><br />
            <label for="IdEfectivo" ><input type="radio" name="TipoPago" id="IdEfectivo"  value="E" checked="checked" onclick="OpcionPago()" /> Efectivo  &nbsp;&nbsp;</label>
            <label for="IdTarjeta" ><input type="radio" name="TipoPago" id="IdTarjeta"  value="T" onclick="OpcionPago()" /> Tarjeta  &nbsp;&nbsp;</label>
            <label for="IdMixto" ><input type="radio" name="TipoPago" id="IdMixto"  value="M" onclick="OpcionPago()" /> Mixto</label>
           </td>
           <tr><td>&nbsp;</td></tr>
        <tr id="TrDoc">
           <td width="15%"><b>Tipo Documento</b>

                     <select class="form-control" id="CboTipoDoc" style="width:90%" onchange="GenerarCorrelativo()" >
                           <option value="BV"  >BOLETA</option>
                           <option value="FA">FACTURA</option>
                           <!--<option value="00">TK</option>-->
                     </select>
                     <select class="form-control" id="CboTipoDoc2" style="width:90%; display:none" onchange="GenerarCorrelativo()"  >
                           <option value="TB"  >TICKET BOLETA</option>
                           <option value="TF">TICKET FACTURA</option>
                           <!--<option value="00">TK</option>-->
                     </select>
           </td>
           <td width="30%"><b>Serie</b><input type="text" id="TxtSer" class="form-control" style="width:95%" readonly="readonly" /> </td>
           <td width="30%"> <b>Correlativo</b><input type="text" id="TxtCorrelativo" class="form-control" style="width:95%" readonly="readonly"  /></td>
                     
        </tr>
         <tr id="TrFact">
           <td><b>Ruc</b><input type="text" id="TxtRuc" class="form-control" onkeypress="return validaNum(event)" style="width:95%" /></td>
           <td><b>Raz&oacute;n Social</b>
           <input type="text" id="TxtRazon" class="form-control" style="width:95%" onkeyup="javascript:LisLab()" /></td>
           <td><b>Direcci&oacute;n</b><input type="text" id="TxtDirRazon" class="form-control" style="width:95%"  /></td>
         </tr> 
            <tr><td>&nbsp;</td></tr>
        <tr> 
             <td  ><b>TOTAL</b>
             <input type="text" id="TxtTotal" class="form-control" style="width:95%; color:#000; font-weight:bold; size:16px;" readonly="readonly" /> </td>
             <td id="TrIngreso"><input type="checkbox" id="ChekIngreso" onclick="VerCaja()"  />&nbsp; <b>Ingresar Monto</b>
              <input type="number" id="TxtMontoIngreso" class="form-control" style="width:95%;" disabled="disabled"/> </td>
             <td  width="30%" style="display:none"><b>IGV</b><input type="text" id="TxtIgv" class="form-control" style="width:95%" readonly="readonly" /> </td>
             <td width="30%" style="display:none"><b>SUBTOTAL</b><input type="text" id="TxtSubtotal" class="form-control" style="width:95%" readonly="readonly" /> </td>
           </tr>
           <tr><td>&nbsp;</td></tr>
           <tr id="OpcionEfectivo"> 
             <td  ><b>Monto Pagado</b>
             <input type="number" id="TxtMontoPagado" min="0" class="form-control" style="width:95%; color:#000; font-weight:bold; size:20px;" onkeyup="Vuelto()" /> </td>
             <td width="30%"><b>Vuelto</b>
             <input type="text" id="TxtVuelto" class="form-control" style="width:95%; color:#000; font-weight:bold; size:16px;"
              readonly="readonly" /> </td>
             <td width="30%">&nbsp;</td>
           </tr>
           <tr id="OpcionMixto" style="display:none"> 
             <td ><b>Monto Efectivo</b>
            <input type="number" id="TxtEfectivo" class="form-control" style="width:95%; color:#000; font-weight:bold; size:16px;" 
            onkeyup="MontoMixto()" /> </td>
             <td ><b>Monto Tarjeta</b><input type="text" id="TxtTarjeta" class="form-control" style="width:95%" readonly="readonly" /></td>
             <!--<td width="30%" style="display:none"><b>Nro Voucher</b><input type="text" id="TxtMixtoVoucher" class="form-control" style="width:95%; color:#000; font-weight:bold; size:16px;" /> </td>-->
           </tr>
           <tr id="OpcionTarjeta" style="display:none"> 
             <td  ><b>Visa (Nro Voucher) </b>
             <input type="text" id="TxtVouVisa" class="form-control" style="width:95%; color:#000; font-weight:bold; size:16px;" /> </td>
             <td  ><b>Mastercard (Nro Voucher) </b>
             <input type="text" id="TxtVouMas" class="form-control" style="width:95%; color:#000; font-weight:bold; size:16px;" /> </td>
             <td  ><b>Otros (Nro Voucher) </b>
             <input type="text" id="TxtVouOtros" class="form-control" style="width:95%; color:#000; font-weight:bold; size:16px;" /> </td> 
           </tr>
        </tr>
      </tbody>
   </table>
    </div>
    
    <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <button class="btn btn-white btn-info btn-bold"  id="id_grabar" onclick="GrabarDocumento()" >
        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Aceptar</button>
		<button class="btn btn-white btn-default btn-round"  data-dismiss="modal" onclick="javascript:$('#IdCargando').hide();">
        <i class="ace-icon fa fa-times red2"></i>Cancelar</button>										
								
      </div>
    
   </div>

 </div>
</div>



<!-- Inicio Modal generar pago -->

<!-- Fin Modal Generar Pago -->
 
        
 <script>            
   
   
  $(document).ready(function() {
	 if(!ace.vars['touch']) {$('.chosen-select').chosen({allow_single_deselect:true});}	
	  $('#med').prop('disabled', true).trigger("chosen:updated");	
     $("#pac1").focus()	
	 $("#IdModalBuscar").on('shown.bs.modal', function(){$(this).find('#TxtOrden').focus();});
	 $("#IdModalDocumento").on('shown.bs.modal', function(){$(this).find('#TxtMontoPagado').focus();});	
	 
	 $("#TxtRuc").keypress(function(e) {
	   if(e.which==13) {
          ConsultaRucOrden();
       }
    })
	 $("#TxtDni").keypress(function(e) {
	   if(e.which==13) {
		  ConsultaDniXOrden()
       }
    })
	 
	 $("#TxtOrden").keydown(function(e) {  
	   if(e.which==13) {
          BuscarOrden(); return false;
       }
    })
	$("#TxtMixtoVoucher").keydown(function(e) {  
	   if(e.which==13) {
		  $voucher=$("#TxtMixtoVoucher").val()
		  $efectivo=$("#TxtEfectivo").val()
		  if($efectivo==''){$efectivo=0;}
		  if($efectivo==0){swal("Ingrese Monto Efectivo",'Observacion','warning');return false;}
		  if($voucher==''){swal("Ingrese Voucher",'Observacion - Minimo 4 Digitos','warning');return false;}
		  $("#id_grabar").focus()
		  return false;
       }
    })
	$("#TxtMontoPagado").keydown(function(e) {  
	   if(e.which==13) {
		  $montopag=$("#TxtMontoPagado").val();
		  if($montopag==''){swal("Ingrese Monto Pagado ..",'Observacion','warning');return false}
		  $vuelto=$("#TxtVuelto").val()
		  if($vuelto<0){$("#TxtVuelto").val('');$("#TxtMontoPagado").val('');
		     swal("El Vuelto no puede ser Negativo",'Observacion','warning');return false}
          $("#id_grabar").focus(); return false;
       }
    }) 
	$("#TxtVouVisa").keydown(function(e) {  
	   if(e.which==13) {
		  $voucher=$("#TxtVouVisa").val()
		  if($voucher==''){swal("Ingrese Nro Voucher Visa",'Observacion - Minimo 4 Digitos','warning');return false}
		  $("#id_grabar").focus(); return false;
       }
    })
	$("#TxtVouMas").keydown(function(e) {  
	   if(e.which==13) {
		  $voucher=$("#TxtVouMas").val()
		  if($voucher==''){swal("Ingrese Nro Voucher Mastercard",'Observacion - Minimo 4 Digitos','warning');return false}
		  $("#id_grabar").focus(); return false;
       }
    })
	$("#TxtVouOtros").keydown(function(e) {  
	   if(e.which==13) {
		  $voucher=$("#TxtVouOtros").val()
		  if($voucher==''){swal("Ingrese Nro Voucher ",'Observacion - Minimo 4 Digitos','warning');return false}
		  $("#id_grabar").focus(); return false;
       }
    }) 
	$("#TxtEfectivo").keydown(function(e) {  
	   if(e.which==13) {
		 // $voucher=$("#TxtMixtoVoucher").val()
		  $efectivo=$("#TxtEfectivo").val()
		  $total=$("#TxtTotal").val()
		  if($efectivo==''){$efectivo=0;}
		  if($efectivo<=0){$("#TxtTarjeta,#TxtEfectivo").val('');swal("Monto Efectivo Mayor que cero",'Observacion','warning');return false}
		  if($efectivo>=$total){$("#TxtTarjeta,#TxtEfectivo").val('');
		    swal("Monto Efectivo menor que el monto Total",'Observacion','warning');return false      }   
		   return false;
       }
    }) 
	//CMONTENEGRO
	$("#id_grabar").keydown(function(e) {  
	   if(e.which==13) {
		 // alert('hola')
       }
    })
							
  })
    function VerCaja(){
	  $total=$("#TxtTotal").val()
	  if ($("#ChekIngreso").is(":checked")) {$("#TxtMontoIngreso").val($total)}else{$("#TxtMontoIngreso").val("")}   
	}
	function TipoEmp(){
	  var $empresa=$('input:radio[name=TipoEmpresa]:checked').val()
	  if($empresa=='P'){$("#BtnProcesos,#CboTipoDoc").show();$("#CboTipoDoc2").hide()}
	  if($empresa=='I'){$("#BtnProcesos,#CboTipoDoc").hide();$("#CboTipoDoc2").show()}
	}
	function Reimprimir(){
       var $orden=$("#IdOrden").text()
	   $.post('controlador/Creporte.php',{accion:"REIMPRIMIR",orden:$orden},function(data){
		   $data=data.split("**%%")
	       Imprimir($data[0],$data[1],$orden,$data[2]);
	   })
	 }
    function ConsultaRucOrden(){
         
		var $ruc = $('#TxtRuc').val();
		
		$("#IdCargando").show();
		$.ajax({
		type:'POST',
		url:'controlador/Cgrupo.php',
		data:{accion:'CONSULTA_RUC',ruc:$ruc},
		dataType:"JSON",
		success: function(datos){
			  if(datos==0){limpiar_campos();swal("RUC no se encuentra en la Busqueda ..", "Error", "error");$("#IdCargando").hide();return false;}
			  //$('#nombre').val(datos[1]);$('#Dire').val(datos[2]);$("#IdCargando").hide();
			  $('#TxtRazon').val(datos[1]);$('#TxtDirRazon').val(datos[2]);$("#IdCargando").hide();
		}
	});
  
   }
   function Imprimir($iddoc,$cod,$orden,$empresa){
	  
	    /* if($empresa=='P'){$url="http://localhost:8082/Lab/Documento.php"}
		 if($empresa=='I'){$url="http://localhost:8082/Lab/Ticket.php"}*/
		 if($empresa=='P'){$url="http://localhost/Lab/Documento.php"}
		 if($empresa=='I'){$url="http://localhost/Lab/Ticket.php"}
	 $.ajax({
		type:'POST',
		url:$url,
		data:{iddoc:$iddoc,cod:$cod,orden:$orden},
		success: function(datos){	   
		 }
	    });
	
	}
   
    function ConsultaDniXOrden(){
	    $("#IdCargando").show()
        var $dni = $('#TxtDni').val();
		var url = 'controlador/Cpaciente.php';
		$.ajax({
		type:'POST',
		url:url,
		data:{accion:'RENIEC2',dni:$dni},
		success: function(datos_dni){
			    //alert(datos_dni);exit;
			   if(datos_dni=='NO'){$("#IdCargando").hide();swal("Dni no Existe en Reniec ..",'Error','error');return false;}
			    datos=datos_dni.split('**++')
			   $("#IdHiPac").val(datos[0]);$("#pac1").val(datos[1])
			   $("#pac1,#TxtDni").prop("disabled",true);$("#med").focus() 
			   $("#IdCargando").hide();
		}
	    });
	
   }
    function Limpiar(){
	 $("#TrFact").hide();
     $("#TxtRuc,#TxtRazon,#TxtDirRazon,#TxtMontoPagado,#TxtVuelto,#TxtEfectivo,#TxtTarjeta,#TxtVouVisa,#TxtVouMas,#TxtVouOtros").val('')
    }
    function GrabarDocumento(){
	   $("#id_grabar").prop("disabled",true)
	   var $total=$("#TxtTotal").val();
	   //var $subtotal=$("#TxtSubtotal").val();
	   //var $igv=$("#TxtIgv").val();
	   var $orden=$("#IdOrden").text()
	   var $serie=$("#TxtSer").val() 
	   var $documento=$("#TxtCorrelativo").val()
	   var $condicion_pago=$('input:radio[name=CondicionPago]:checked').val()
	   var $ruc=$("#TxtRuc").val()
	   var $razon=$("#TxtRazon").val()
	   var $dir=$("#TxtDirRazon").val()
	   var $tipo_pago=$('input:radio[name=TipoPago]:checked').val()
	   var $dni=$("#TxtDni").val()
	   var $idcliente=$("#IdHiPac").val()
	   var $cliente=$("#pac1").val()
	   var $empresa=$('input:radio[name=TipoEmpresa]:checked').val()
	   
	     if($empresa=='P'){var $tipo_doc=$("#CboTipoDoc").val()}
		 if($empresa=='I'){var $tipo_doc=$("#CboTipoDoc2").val()}
		 
		 
	   if($tipo_doc=='FA' || $tipo_doc=='TF' ){
		   if($ruc==''){$("#id_grabar").prop("disabled",false);swal("RUC Obligatorio",'Observacion','warning');return false;}
		   if($razon==''){$("#id_grabar").prop("disabled",false);swal("Razon Social Obligatorio",'Observacion','warning');return false;}
		   if($dir==''){$("#id_grabar").prop("disabled",false);swal("Direccion Obligatorio",'Observacion','warning');return false;}
		}
		   
	   
	  if($condicion_pago=='CONTADO'){
	    
	   if($tipo_pago=='E'){$monto_efectivo=$total;$vou_visa='';$vou_mas='';$vou_otros='';$monto_tarjeta='';
	   var $monto_pagado=$("#TxtMontoPagado").val()
	   var $monto_vuelto=$("#TxtVuelto").val()
	   }
	   if($tipo_pago=='T'){$vou_visa=$("#TxtVouVisa").val();$vou_mas=$("#TxtVouMas").val();$vou_otros=$("#TxtVouOtros").val();
	   $monto_efectivo=0;$monto_tarjeta=$total;$monto_pagado=0;$monto_vuelto=0}
	   if($tipo_pago=='M'){$monto_efectivo=$("#TxtEfectivo").val();
	   $vou_visa=$("#TxtVouVisa").val();$vou_mas=$("#TxtVouMas").val();$vou_otros=$("#TxtVouOtros").val();$monto_tarjeta=$("#TxtTarjeta").val()
	   $monto_pagado=0;$monto_vuelto=0
	   }
	   
	  
	   
	   // Validación 
	   if($tipo_pago=='E'){
		  if($monto_pagado==''){$("#id_grabar").prop("disabled",false);swal("Ingrese Monto Pagado por Paciente",'Observacion','warning');return false;}
		  if($monto_pagado<=0){$("#TxtMontoPagado,#TxtVuelto").val('');
		    $("#id_grabar").prop("disabled",false);
			swal("El monto Pagado tiene que ser mayor que cero",'Observacion','warning');return false;}
		  if($monto_vuelto<0){$("#TxtMontoPagado,#TxtVuelto").val('');
		   $("#id_grabar").prop("disabled",false); swal("El Vuelto no puede ser negativo",'Observacion','warning');return false;}
	   }
	   if($tipo_pago=='T'){
		   $lon_visa=$vou_visa.length;$lon_mas=$vou_mas.length;$lon_otros=$vou_otros.length
		  if($lon_visa=='' && $lon_mas=='' && $lon_otros==''){
			  $("#id_grabar").prop("disabled",false);swal("Ingrese Nro de Voucher ",'Observacion - Minimo 4 Digitos','warning');return false;}
	   }
	   if($tipo_pago=='M'){
		   $lon_visa=$vou_visa.length;$lon_mas=$vou_mas.length;$lon_otros=$vou_otros.length
		  if($monto_efectivo==''){$("#id_grabar").prop("disabled",false);
		  swal("Ingrese Monto en Efectivo",'Observacion','warning');return false;}
		  if($monto_efectivo<=0){$("#id_grabar").prop("disabled",false);
		  swal("Monto en Efectivo Mayor que cero",'Observacion','warning');return false;}
		  if($lon_visa=='' && $lon_mas=='' && $lon_otros==''){
			$("#id_grabar").prop("disabled",false);  swal("Ingrese Nro de Voucher ",'Observacion - Minimo 4 Digitos','warning');return false;}
	   }
	 }
	   //TxtRuc,#TxtRazon,#TxtDirRazon,#TxtMontoPagado,#TxtVuelto,#TxtEfectivo,#TxtTarjeta,#TxtVouVisa,#TxtVouMas,#TxtVouOtros
	   swal({
  title: "Confirmacion",
  text: "Está seguro de Generar Documento",
  icon: "warning",
  buttons: true,
  dangerMode: true}).then((willDelete) => {
            if (willDelete) {
				if($condicion_pago=='CONTADO'){
					
   $.post('controlador/Creceta.php',{accion:"GRABAR_DOCUMENTO",total:$total,orden:$orden,tipo_doc:$tipo_doc,serie:$serie,documento:$documento,condicion_pago:$condicion_pago,tipo_pago:$tipo_pago,monto_efectivo:$monto_efectivo,monto_tarjeta:$monto_tarjeta,monto_pagado:$monto_pagado,monto_vuelto:$monto_vuelto,ruc:$ruc,razon:$razon,dir:$dir,visa:$vou_visa,mastercard:$vou_mas,otros:$vou_otros,dni:$dni,idcliente:$idcliente,cliente:$cliente,emp:$empresa},function(data){
	       //alert(data)
	       if(data=='ERRORDNI'){swal("Dni Incorrecto",'Verfique de Reniec','error');return false;}
		   if(data==0){$("#id_grabar").prop("disabled",false);swal("No se Generó Documento",'Error','error');return false;}
		   else{
			  $data=data.split("*****")
		     $("#BtnGenDoc").hide();$("#DocEmitido").show();$("#BtnAnular").prop("disabled",true);$("#id_grabar").prop("disabled",false);
		     $("#IdModalDocumento").modal("hide");swal("Documento Generado",'Felicitaciones','success');
			 Imprimir($data[0],$data[1],$data[2],$empresa);return false;
			 }
        })
		 }else{
			 var $monto_ingreso=$("#TxtMontoIngreso").val()
			 if($monto_ingreso==''){$monto_ingreso='0.00';}
			  if ($("#ChekIngreso").is(":checked")) {$check=1;}else{$check=0;}
		$.post('controlador/Creceta.php',{accion:"GRABAR_DOCUMENTO",orden:$orden,condicion_pago:$condicion_pago,monto_ingreso:$monto_ingreso,emp:$empresa,check:$check},function(data){
			//alert(data)
		   if(data==0){swal("No se Generó Credito",'Error','error');return false;}
		   if(data==1){$("#IdModalDocumento").modal("hide");swal("Orden Almacenada al Credito",'Felicitaciones','success');return false;}
        })	
		  
		  }
	} else{$("#id_grabar").prop("disabled",false)}
       });
     
	} 
	
  
   function AbrirModalBuscar(){$("#TxtOrden").val('');$("#IdModalBuscar").modal()}
   
   function AbrirModalDocumento(){
	   
	  // var $tipo=$("#IdEmpresa option:selected" ).attr("tipo");
      /*if($tipo=='P'){$("#CboTipoDoc" ).val("BV");$("#IdContado").prop("checked","checked");$("#CboTipoDoc").prop("disabled",false);
           $("#IdEfectivo").prop("checked",true);CondicionPago();}*/
      //if($tipo=='C'){$("#CboTipoDoc" ).val("FA");$("#IdCredito").prop("checked","checked");$("#CboTipoDoc").prop("disabled",true);
           //CondicionPago()} var $empresa=$('input:radio[name=TipoEmpresa]:checked').val()
	  var $empresa=$('input:radio[name=TipoEmpresa]:checked').val()
	  if($empresa=='P'){$("#CboTipoDoc").val('BV');$("#IdContado").prop("checked",true);}
	  if($empresa=='I'){$("#CboTipoDoc2").val('TB');$("#IdContado").prop("checked",true);}
		
		
	    GenerarCorrelativo();CondicionPago();
       var $total=$("#Total1").val()
	   var $igv=($total/1.18).toFixed(2);
	   var $subtotal=($total-$igv).toFixed(2)
	   $("#TxtTotal").val($total);$("#TxtIgv").val($igv);$("#TxtSubtotal").val($subtotal)
	   $("#IdModalDocumento").modal();
	   $("#id_grabar").prop("disabled",false)
	}
   	function Vuelto(){
	   var $monto=$("#TxtMontoPagado").val();
	   if($monto==''){$("#TxtVuelto").val('');return false;}
	   var $total=$("#TxtTotal").val();
	   var $vuelto=($monto-$total).toFixed(2)
	   $("#TxtVuelto").val($vuelto)
	}
	function MontoMixto(){
	   var $efectivo=$("#TxtEfectivo").val();
	   var $total=$("#TxtTotal").val();
	   if($efectivo==''){ $("#TxtTarjeta").val('');return false;}
	   var $voucher=($total-$efectivo).toFixed(2)
	   $("#TxtTarjeta").val($voucher)
	}
	function OpcionPago(){
	   
	   $tipo_pago=$('input:radio[name=TipoPago]:checked').val() 
	   if ($tipo_pago=='E'){$("#TxtVouVisa,#TxtVouMas,#TxtVouOtros,#TxtEfectivo,#TxtTarjeta").val('');
	       $("#OpcionEfectivo").show();$("#OpcionTarjeta,#OpcionMixto").hide();$("#TxtMontoPagado").focus()}
       if ($tipo_pago=='T'){$("#TxtMontoPagado,#TxtVuelto,#TxtEfectivo,#TxtTarjeta").val('');
        $("#OpcionTarjeta").show();$("#OpcionEfectivo,#OpcionMixto").hide();$("#TxtVouVisa").focus()}
	   if ($tipo_pago=='M'){$("#TxtMontoPagado,#TxtVuelto,#TxtVouVisa,#TxtVouMas,#TxtVouOtros").val('');
	   $("#OpcionMixto").show();$("#OpcionEfectivo").hide();$("#OpcionTarjeta").show();$("#TxtEfectivo").focus()}      
	}
	
	function GenerarCorrelativo(){
		
		$("#TxtRuc,#TxtRazon,#TxtDirRazon").val('')
	  var $empresa=$('input:radio[name=TipoEmpresa]:checked').val()
	  if($empresa=='P'){$tipo_doc=$("#CboTipoDoc").val()}
	  if($empresa=='I'){$tipo_doc=$("#CboTipoDoc2").val()}
	    
		if($tipo_doc=='FA' || $tipo_doc=='TF'){$("#TrFact").show();$("#TxtRuc").focus()}else{$("#TrFact").hide()}
	  $.post('controlador/Cserie.php',{accion:"CORRE",tipo_doc:$tipo_doc},function(data){
		 $data=data.split("///")
	     $("#TxtSer").val($data[0]);$("#TxtCorrelativo").val($data[1]);
		 //LisExamen()
     })
   }
   
   function CondicionPago(){
	    Limpiar();$("#TxtMontoIngreso").val('');
		var $empresa=$('input:radio[name=TipoEmpresa]:checked').val()
	    if($empresa=='P'){$("#CboTipoDoc").val('BV');}
	    if($empresa=='I'){$("#CboTipoDoc2").val('TB');}
	    $condicion=$('input:radio[name=CondicionPago]:checked').val()
		if($condicion=='CONTADO'){$("#IdEfectivo").prop("checked",true);$("#TdIdTipoPago").show();$("#TrDoc").show();
		$("#TrIngreso").hide();GenerarCorrelativo();OpcionPago();}
		else{$("#TdIdTipoPago").hide();$("#OpcionEfectivo,#OpcionTarjeta,#OpcionMixto").hide();$("#TrDoc").hide();$("#TrIngreso").show();
		  $("#TxtMontoIngreso").prop("disabled",true);$("#ChekIngreso").prop("checked",false);
		}
		//TrIngreso,ChekIngreso,TxtMontoIngreso
   }
	
   function LisExamen(){
	      
		  var $idconv=$("#IdEmpresa").val()
		  var $empresa=$('input:radio[name=TipoEmpresa]:checked').val()
		  if($empresa=='P'){$cod_tipo='02'}
	      if($empresa=='I'){$cod_tipo='03'}
		  var $datos=''
	     $.post('controlador/Cexamen.php',{accion:"LIS_EXA_AUTO",idconv:$idconv,cod_tipo:$cod_tipo},function(data){
			
	       $datos=eval(data)
		  
		 $( "#deta1" ).autocomplete({
			max:10,
			source: $datos,
			minLength: 3,
			select:function(event,ui){
			   $id=ui.item.id
			   $examen=ui.item.value
			   $precio=ui.item.precio
			   $muestra=ui.item.muestra	
			  if($precio>0){
			   $.post("controlador/Creceta.php",{accion:'LIMPIAR'},function(data){
				   AgregarCarrito($id,$examen,$precio,$muestra);MontoDoc();$("#deta1").val("").focus()
				})
			  }else{
				  swal({
                  title: "Examen no tiene Precio Asignado",
                  text: "Sin Precio",
				  icon: "warning",
                  closeModal: false
                  }).then(function() {
                      swal.close();
                      $('#deta1').val('').focus();
                     });
				
				}
			}
		 })
	  })
	}
	function LLenarEmpresa(){
	  $.post('controlador/Cgrupo.php',{accion:"LLE_CONV"},function(data){
	     $("#IdEmpresa").html(data);//LisExamen()
     })
   }
   	
   function LisPac1(){
	    // var $pac=$("#pac1").val()
		 var $datos='';
		 $.post('controlador/Cpaciente.php',{accion:"AUTOPAC"},function(data){
	       $datos=eval(data)
		 $( "#pac1" ).autocomplete({
			max:10,
			source: $datos,
			minLength: 3,
			select:function(event,ui){
			   $("#IdHiPac").val(ui.item.id)
			   $("#TxtDni").val(ui.item.dni)
			   $("#pac1,#TxtDni").prop("disabled",true); 
			   $('#med .chzn-drop .chzn-search input[type="text"]').focus();  
			 }
		   });
		 })	   
	 }
	
	function LisLab(){
	    // var $pac=$("#pac1").val()
		
		 var $datos='';
		 $.post('controlador/Cpaciente.php',{accion:"AUTOLAB"},function(data){
	       $datos=eval(data)
		   
		 $( "#TxtRazon" ).autocomplete({
			max:10,
			source: $datos,
			minLength: 3,
			select:function(event,ui){
			   $("#TxtRuc").val(ui.item.ruc) 
			   $("#TxtDirRazon").val(ui.item.direccion)
			   $("#TxtMontoPagado").focus()
			 }
		   });
		 })	   
	 }
	
    function HabilitarPaciente(){
	   $("#IdHiPac").val(0);$("#pac1").val('');
	   $("#pac1").prop("disabled",false);$("#pac1").focus()
	 } 
	function LisMed(){
		 var $datos='';
		 $.post('controlador/Cpaciente.php',{accion:"AUTOMED"},function(data){
	       $datos=eval(data)
		 $( "#med" ).autocomplete({
			max:10,
			source: $datos,
			minLength: 3,
			select:function(event,ui){
			   $("#IdHiMed").val(ui.item.id)
			   $("#por_medico").val(ui.item.porcentaje_comision);MontoDoc();$("#deta1").focus()       
			 }
		   });
		 })
	}
	function SelMedico(){
	   $por=$('#med option:selected').attr("por")
	   $tip_emp=$('#IdEmpresa option:selected').attr("tipo")
	   if($tip_emp=='P'){
	      $("#por_medico").attr("disabled",false)
		  $("#por_medico").val($por);MontoDoc();
		}else{
		  $("#por_medico,#monto_medico").val(0.00); $("#por_medico,#monto_medico").attr("disabled",true)
		  
		}
	   $("#deta1").focus()
	   
	 }
    var carrito=new Array();
			   
	 function AgregarCarrito($idproducto,$producto,$precio,$muestra){   
				 var ArrayBidi=new Array();
				     ArrayBidi.push($idproducto);
					 ArrayBidi.push($producto);
					 ArrayBidi.push($precio);
					 ArrayBidi.push($muestra);
					 carrito.push(ArrayBidi);
				     ListarCarrito();			 
	 }
	 
	 function EliminarCesta(index){
   	  carrito.splice(index,1);
	  ListarCarrito();MontoDoc();
	}
	 	 
	 function ListarCarrito(){
		 
				$("#IdTblCuExaRe1").html(""); $i=0;$total=0;
				$.each(carrito,function(index,columna){$i++;
				   
				   $total=parseFloat($total)+parseFloat(columna[2]);
				   $("#IdTblCuExaRe1").append("<tr height='30px'><td width='50%' style='font-size:10px;' >&nbsp;"+columna[1]+"</td><td align='center' width='15%' style='font-size:10px;'>"+parseFloat(columna[2])+"</td><td width='25%' style='font-size:10px;'>&nbsp;"+columna[3]+"</td><td align='center' width='10%' style='font-size:10px;'><img src='imagenes/delete.png' height='20' width='20' border='0' onclick=\"javascript:EliminarCesta('"+index+"');\"  /></td></tr>"); 
				})
				  $("#Subtotal1").val($total);
				  $dscto=parseFloat($("#Descuento1").val())
				  $to_final=$total-$dscto
				  $("#Total1").val($to_final);		  
	 }	 
	function Habilitar(){
     $("#pac1,#TxtDni").prop("disabled",false);$("#med").prop("disabled",false);
     $("#deta1").prop("disabled",false);LisExamen();$("#pac1").focus();$("#IdEmpresa").prop("disabled",true);
	 $("#IdEmpresa").prop('disabled', true).trigger("chosen:updated")
	 $('#med').prop('disabled', false).trigger("chosen:updated");
	}
	function Refrescar($tipo){
	 $("#IdInnova,#IdPrecisa").prop("disabled",false);$("#IdPrecisa").prop("checked",true);$("#BtnReimprimir").hide()
     $("#IdEmpresa").prop("disabled",false);$("#deta1,#pac1,#med,#TxtDni").prop("disabled",true);
     $("#IdTblCuExaRe1").html("");$("#pac1,#med,#deta1,#TxtDni").val('');$("#IdOrden,#IdEstado").text('');
	 $("#Subtotal1,#Total1,#Descuento1,#por_medico,#monto_medico").val(0.00);$("#DocEmitido").hide();
	 $("#IdEmpresa").val(0); $("#BtnOrden,#BtnAnular,#BtnProcesos").prop("disabled",false);$("#BtnGenDoc").hide()
	 //$(".chosen-select").attr('disabled', false).trigger("chosen:updated")
	 $("#IdEmpresa").prop('disabled', false).trigger("chosen:updated")
	 $('#med').prop('disabled', true).trigger("chosen:updated");
	 carrito.length=0;
	 if($tipo==0){$("#IdPrecisa").prop("checked",true);$("#BtnProcesos").show();$("#BtnImagenes").hide()}
	 if($tipo==1){$("#IdInnova").prop("checked",true);$("#BtnProcesos").hide();$("#BtnImagenes").show()}	 
		
	}
	
	function CalcularMonto(){ 
	   var $subtotal=$("#Subtotal1").val()
	   var $descuento=$("#Descuento1").val()
	   if($descuento==''){$descuento=0;}	
	   $total=parseFloat($subtotal)-parseFloat($descuento)
	   if(parseFloat($descuento)>parseFloat($subtotal)){
		 swal("El descuento no puede ser Mayor al Subtotal ..", "Alerta", "warning"); 
		 $("#Descuento1").val(0);$("#Total1").val(0);return false;
		 }
	   $("#Total1").val($total)
	 }
	 function MontoDoc(){ 
	   var $total=$("#Total1").val()
	   var $porcentaje=$("#por_medico").val()
	   if($porcentaje==''){$porcentaje=0;}
	   var $monto_medico=($total*$porcentaje/100).toFixed(2)
	   
	   	$("#monto_medico").val($monto_medico);$("#det1").focus()
	 }
	 
function GrabarReceta(){
	  
	  $can_filas=$("#IdTblCuExaRe1 tr").length
	  var $idpaciente=$("#IdHiPac").val()
	  var $nom_pac=$("#pac1").val()
	  if($nom_pac==''){$idpaciente=0;}
	 // alert($can_filas); exit;
	  if($idpaciente<=0){swal("Ingrese Paciente ..", "Campo Obligatorio", "warning"); return false;}
	  if($can_filas==0){swal("Ingrese Examen ..", "Campo Obligatorio", "warning"); return false;} 
	  var $paciente=$("#pac1").val();
	  if($paciente==""){swal("Ingrese Paciente ..", "Campo Obligatorio", "warning");return false;}
	  var $idmedico=$("#med").val()
	  var $empresa=$('input:radio[name=TipoEmpresa]:checked').val()
	  
	  //var $subtotal=$("#Subtotal1").val()
	 // var $descuento=$("#Descuento1").val()
	  var $subtotal=$("#Total1").val()
	  var $descuento=0.00
	  var $total=$("#Total1").val()
	  var $medico=$('#med option:selected').text()

	  var $porcentaje=$("#por_medico").val()
	  var $monto_medico=$("#monto_medico").val()
	   var $idconv=$("#IdEmpresa").val()
	 // var $muestra=$("#TxtIdMuestra").val()
	  if($idmedico==""){$idmedico=0}
	  if($porcentaje==""){$porcentaje=0}
	  if($monto_medico==""){$monto_medico=0}
	  //alert($idmedico);exit;
	  $.post("controlador/Creceta.php",{accion:'INSERTAR',idpac:$idpaciente,idmed:$idmedico,subtotal:$subtotal,descuento:$descuento,total:$total,car:carrito,medico:$medico,porcentaje:$porcentaje,monto_medico:$monto_medico,idconv:$idconv,emp:$empresa},function(data){
		   $data=data.split("**++");
		   $("#DocEmitido").hide()
		 if($data[0]==0){swal("Tiene Orden Pendiente ..", $data[1], "warning");return false;}
		 if($data[0]==1){swal("Paciente no existe ..", 'Debe Registrar Paciente', "warning");return false;}
		 if($data[0]==3){BuscarOrdenGenerar($data[1]);$("#IdOrden").text($data[1]);$("#IdEstado").text('PENDIENTE');
		   $("#BtnOrden").prop('disabled',true);$("#BtnGenDoc").show()
		   swal("Se Registró Correctamente ..", 'Felicitaciones' , "success");return false;}
		 if($data[0]==2){
			 $("#IdInnova,#IdPrecisa").prop("disabled",true);
			 swal("No se Registró ..", 'Error' , "error");return false;}
	   })	
	   	
    } 	 
	 
	 function AnularOrden(){ 
	   var $orden=$("#IdOrden").text() 
	   if($orden==''){swal("Seleccione Orden ..", "Alerta", "warning"); return false;}  
swal({
  title: "Confirmacion",
  text: "Está seguro de Anular Orden",
  icon: "warning",
  buttons: true,
  dangerMode: true}).then((willDelete) => {
  if (willDelete) {
    $.post("controlador/Creceta.php",{accion:'ELIMINAR',orden:$orden},function(data){
		   //$data=data.split('**++')
		   if(data==1){$("#BtnProcesos,#BtnAnular").prop('disabled',true);$("#IdEstado").text('ANULADO');
		   $("#BtnGenDoc").hide(); $("#IdInnova,#IdPrecisa").prop("disabled",true);
		   swal("Orden Anulada",'Anulado','success');return false;}
		   if(data==0){swal("No se pudo Anular",'Error','error');return false;}
		   if(data==2){swal("La orden tiene documento Emitido ..",'No se puede Anular','error');return false;}
	     })
        } 
      });
	}
	
	
	
	function EnviarProcesos(){
		var $orden=$("#IdOrden").text();
		 // alert($orden)
	    if($orden==''){swal("Seleccione Orden ..", "Alerta", "warning"); return false;}
		   
		swal({
  title: "Confirmacion",
  text: "Está seguro de Guardar la Receta",
  icon: "warning",
  buttons: true,
  dangerMode: true}).then((willDelete) => {
  if (willDelete) {
   $.post("controlador/Creceta.php",{accion:'RESULTADO',orden:$orden},function(data){ 
		      //alert(data)
			 if(data==1){$("#IdEstado").text('GENERADO');$("#BtnProcesos").prop("disabled",true);
			   swal("Orden Enviada A Procesos",'Felicitaciones','success');return false;}
			 if(data==0){swal("No se pudo Generar Orden",'Error','error');return false;}
	       })
        } 
      });	 
	}
	
	function EnviarImagenes(){
		var $orden=$("#IdOrden").text();
		 // alert($orden)
	    if($orden==''){swal("Seleccione Orden ..", "Alerta", "warning"); return false;}
		   
		swal({
  title: "Confirmacion",
  text: "Está seguro de Guardar la Orden",
  icon: "warning",
  buttons: true,
  dangerMode: true}).then((willDelete) => {
  if (willDelete) {
   $.post("controlador/Creceta.php",{accion:'RESULTADO_IMAGEN',orden:$orden},function(data){ 
		      //alert(data)
			 if(data==1){$("#IdEstado").text('GENERADO');$("#BtnImagenes").prop("disabled",true);
			   swal("Orden Enviada A Imagenes",'Felicitaciones','success');return false;}
			 if(data==0){swal("No se pudo Generar Orden",'Error','error');return false;}
	       })
        } 
      });	 
	}
	
	 
	 function BuscarOrden(){ 
	    var $orden =parseInt($("#TxtOrden").val());
	    $.post("controlador/Creceta.php",{accion:'BUS_ORDEN',orden:$orden},function(data){
			
		   if(data==0){swal("Orden no Existe",'Error','error');return false;}
		   $data=data.split('///')
		    $("#IdInnova,#IdPrecisa").prop("disabled",true);
		   if($data[6]=='PENDIENTE'){$("#BtnAnular,#BtnProcesos,#BtnImagenes").prop("disabled",false);$("#DocEmitido,#BtnReimprimir").hide()}
		   else{$("#BtnAnular,#BtnProcesos,#BtnImagenes").prop("disabled",true);$("#DocEmitido").hide()}
		   $("#IdOrden").text($data[0]);$("#por_medico").val($data[1]);$("#monto_medico").val($data[2]);
		   $("#Total1").val($data[5]);$("#IdEstado").text($data[6]);$("#IdTblCuExaRe1").html($data[7]);
		   $("#BtnOrden").prop("disabled",true);$("#pac1").val($data[8]);
		   $("#TxtDni").val($data[11]);$("#IdHiPac").val($data[12])
		   $("#IdEmpresa,#pac1,#pac1,#deta1").prop("disabled",true)
		   $("#IdEmpresa").attr('disabled', true).val($data[10]).trigger("chosen:updated")
		   $("#med").val($data[9]).trigger("chosen:updated")
		   $("#IdModalBuscar").modal('hide');
		   if($data[6]=='ANULADO'){$("#BtnGenDoc,#DocEmitido").hide()}else{$("#BtnGenDoc").show()}
		   if($data[13]==1){$("#BtnGenDoc").hide();$("#DocEmitido,#BtnReimprimir").show();$("#BtnAnular").prop("disabled",true)}
		   if($data[14]=='P'){$("#BtnProcesos").show();$("#BtnImagenes").hide();$("#IdPrecisa").prop("checked",true)}
		   if($data[14]=='I'){$("#BtnProcesos").hide();$("#BtnImagenes").show();$("#IdInnova").prop("checked",true)}
			   
		   
		  /* if(data==1){swal("Orden Anulada",'Anulado','success');return false;}
		   if(data==0){swal("No se pudo Anular",'Error','error');return false;}*/
	    })
	 }
	 function BuscarOrdenGenerar($orden){ 
	    var $orden =parseInt($orden)
	    $.post("controlador/Creceta.php",{accion:'BUS_ORDEN',orden:$orden},function(data){
		   if(data==0){swal("Orden no Existe",'Error','error');return false;}
		    $("#IdInnova,#IdPrecisa").prop("disabled",true);
		   $data=data.split('///')
		   if($data[6]=='PENDIENTE'){$("#BtnAnular,#BtnProcesos,#BtnImagenes").prop("disabled",false)}
		   else{$("#BtnAnular,#BtnProcesos,#BtnImagenes").prop("disabled",true)}
		   $("#IdOrden").text($data[0]);$("#por_medico").val($data[1]);$("#monto_medico").val($data[2]);$("#Subtotal1").val($data[3]);
		   $("#Descuento1").val($data[4]);$("#Total1").val($data[5]);$("#IdEstado").text($data[6]);$("#IdTblCuExaRe1").html($data[7]);
		   $("#BtnOrden").prop("disabled",true);$("#pac1").val($data[8]);
		   $("#TxtDni").val($data[11]);$("#IdHiPac").val($data[12])
		   $("#IdEmpresa,#pac1,#pac1,#deta1").prop("disabled",true)
		   $(".chosen-select").attr('disabled', true).val($data[10]).trigger("chosen:updated")
		   $("#med").val($data[9]).trigger("chosen:updated")
		   $("#IdModalBuscar").modal('hide');
		   if($data[6]=='ANULADO'){$("#BtnGenDoc,#DocEmitido").hide()}else{$("#BtnGenDoc").show()}
		   if($data[13]==1){$("#BtnGenDoc").hide();$("#DocEmitido").show();$("#BtnAnular").prop("disabled",true)}
		   if($data[14]=='P'){$("#BtnProcesos").show();$("#BtnImagenes").hide();$("#IdPrecisa").prop("checked",true)}
		   if($data[14]=='I'){$("#BtnProcesos").hide();$("#BtnImagenes").show();$("#IdInnova").prop("checked",true)}
		  /* if(data==1){swal("Orden Anulada",'Anulado','success');return false;}
		   if(data==0){swal("No se pudo Anular",'Error','error');return false;}*/
	    })
	 }
    LisPac1()
	//LisMed()	
	/*LLenarEmpresa()	 */
   
   
   
	/*function Regresar(){
	   $("#IdCuRe").html("");$("#IdPaci").val("");$("#IdTblCuExaRe").html("");$("#deta").val();$("#Subtotal").val("");$("#Descuento").val("")
	   $("#Total").val("")
	   $("#IdHiPac").val("")
	   $("#IdGenerarRe").hide()
	   $("#IdBusRe").show(300) 
	 }*/
   /*function CalcularMonto1(){
	   var $subtotal=$("#Subtotal_p").val()
	   var $descuento=$("#Descuento_p").val()	
	   $total=parseFloat($subtotal)-parseFloat($descuento)
	   if(parseFloat($descuento)>parseFloat($subtotal)){
		 alert("El descuento no puede ser Mayor al Subtotal ..");$("#Descuento_p").val(0);$("#Total_p").val(0);return false;
		 }
	   $("#Total_p").val($total)
	   
	 } */  
   
   

 /* function PintarFila($id,$estado){
	  if($estado==0){$("#deta").attr("disabled",false)}else{$("#deta").attr("disabled",true)}
	 var $idfilaanterior=$("#IdHiRe").val()  
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
		   "background-color": "#004000",
		   "color": "#FFFFFF"
		 })
		llenar($id)
		$id_caja_an=$("#IdHiCaja").val();$id_href_an=$("#IdHiHref").val();$id_btn_an=$("#IdHiBtn").val()
		$("#"+$id_caja_an).hide();$("#"+$id_btn_an).hide();;$("#"+$id_href_an).show();
		$("#IdHiRe").val($id)	
  } */
    /*function EliminarRe($id,$idpac){
	  if(confirm('Está seguro de Eliminar La Receta ')){
	   $.post("CONTROLADOR/Creceta.php",{accion:'ELIMINAR',id:$id},function(data){
		   alert(data)
		   LisRePac($idpac)
	    })
	  }
	 }*/
	/*function llenar($id){
		$examen=$("#"+$id).attr("examen")
		$estado=$("#"+$id).attr("estado")
		//alert($examen)
		$subtotal=$("#"+$id).attr("subtotal")
		$total=$("#"+$id).attr("total")
		$descuento=$("#"+$id).attr("descuento")
		$.post("CONTROLADOR/Creceta.php",{accion:'LLENAR',examen:$examen,estado:$estado},function(data){
		  // alert(data)
		   $("#IdTblCuExaRe").html(data)
		   $("#Subtotal").val( $subtotal)
		   $("#Descuento").val( $descuento)
		   $("#Total").val( $total)
	    })
	 }
  
     function LisRePac($idpac){
		 $idre=$("#IdHiRe").val()
		 $estado=$("#"+$idre).attr("estado")
	  $.post("controlador/Creceta.php",{accion:'LISRE',idpac:$idpac},function(data){
		           $("#IdCuRe").html(data)
				    PintarFila("IdtblReceta_1",$estado)
	            })
	  }*/
   
	/* function EliminarDetRe($idexamen,$id){
		 //alert($id);exit;
		 $idreceta=$("#IdHiRe").val()
		 $id_receta=$("#"+$idreceta).attr("idreceta")
		 $idpac=$("#"+$idreceta).attr("id_paciente")
	 	 $.post("controlador/Creceta.php",{accion:'QUITAR',id_examen:$idexamen,idreceta:$id_receta},function(data){
		   $data=data.split("***")
		   //alert($id)
		   $("#IdTblCuExaRe").html($data[0])
		   $("#Subtotal").val( $data[1])
		   $("#Descuento").val( $data[2])
		   $("#Total").val( $data[3])
		   LisRePac($idpac)
		    //alert($idreceta)
		   // if(data==1){llenar($idreceta);}
	     }) 
	  }*/
	 /* function AgregarDetRe($idexamen){
		 //alert($idexamen)
		 $idreceta=$("#IdHiRe").val()
		 $id_receta=$("#"+$idreceta).attr("idreceta")
		 $idpac=$("#"+$idreceta).attr("id_paciente")
		
	 	 $.post("controlador/Creceta.php",{accion:'AGREGARDET',id_examen:$idexamen,idreceta:$id_receta},function(data){
		   alert(data);exit
		   $data=data.split("***")
		   $("#IdTblCuExaRe").html($data[0])
		   $("#Subtotal").val( $data[1])
		   $("#Descuento").val( $data[2])
		   $("#Total").val( $data[3])
		   LisRePac($idpac) 
	     }) 
	  }
	  */
	 /* function Editar($idmedico,$subtotal,$descuento,$total){
		   //$("#IdMedico").val( $idmedico)
		   $("#Subtotal_p").val( $subtotal)
		   $("#Descuento_p").val( $descuento)
		   $("#Total_p").val( $total)
		   $("#IdEditar").data("kendoWindow").center().open() 
	   }*/
	  
	  /*function GrabarEditar(){
		 $idreceta=$("#IdHiRe").val()
		 $id_receta=$("#"+$idreceta).attr("idreceta")
		 $idpac=$("#"+$idreceta).attr("id_paciente")
		 $des=$("#Descuento_p").val()
		 $tot=$("#Total_p").val()
		 //$med=$("#IdMedico").val()
		 $.post("controlador/Creceta.php",{accion:'GRA_EDITAR',idreceta:$id_receta,des:$des,tot:$tot},function(data){
		   LisRePac($idpac) 
		   $("#IdEditar").data("kendoWindow").close();
	     }) 
	   }*/
	   
	   
		/*function ActualizarAcuenta($id_caja,$href,$id_btn,$monto){
			 $id_caja_an=$("#IdHiCaja").val();$id_href_an=$("#IdHiHref").val();$id_btn_an=$("#IdHiBtn").val()
			 $("#"+$id_caja_an).hide();$("#"+$id_btn_an).hide();$("#"+$id_href_an).show();
		   	 $("#"+$id_caja).val($monto);$("#"+$id_caja).show();$("#"+$id_btn).show();$("#"+$href).hide();$("#"+$id_caja).focus()
			 $("#IdHiCaja").val($id_caja);$("#IdHiHref").val($href);$("#IdHiBtn").val($id_btn)
		 }
		
		function UpdateAcuenta($id_receta,$idcaja,$idhref,$idbtn,$total){
			$idre=$("#IdHiRe").val()
			$idpac=$("#"+$idre).attr("id_paciente")
			$acuenta=$("#"+$idcaja).val()
			if(parseFloat($acuenta)>parseFloat($total)){alert("Monto no puede ser Mayor al Total ..");exit;}
			if(parseFloat($acuenta)<0){alert("Monto no puede ser Menor a Cero ..");exit;}
			$.post("CONTROLADOR/Creceta.php",{accion:'UPDA_ACUENTA',idreceta:$id_receta,acuenta:$acuenta},function(data){
			    LisRePac($idpac) 
				$("#"+$idcaja).hide();$("#"+$idbtn).hide();$("#"+$idhref).show();
			  })  
     
		 } 
		function HabilitarDetalle(){
		  var $muestra=$("#TxtIdMuestra").val()
		   if($muestra==0){
			  $("#deta1").attr("disabled",true)
			}else{$("#deta1").attr("disabled",false);}
			$("#deta1").focus()
		    
		}*/

 </script>
           
  
  <input type="hidden" id="IdHiRe" value="0"  /> 
  <input type="hidden" id="IdHiPac"  />
  <input type="hidden" id="IdHiMed"  /> 
  <input type="hidden" id="IdHiCaja"  /> 
  <input type="hidden" id="IdHiHref"  /> 
  <input type="hidden" id="IdHiBtn"  /> 
     
      
     <!-- <br />-->
      <!-- <button id="lightness" onclick="javascript:AbrirModalRec()" style="margin-left:15px" >
       <img src="LIBRERIAS/IMAGENES/nuevo.jpg" style="border:0" height="15" width="15"  />&nbsp;Nuevo</button>-->
        

  
   
 <!-- comienza lo anterior --> 
    <div id="IdGenerarRe" style="background-color:#FFF; padding-left:25px; display:none"  >
      <div style="border-radius:10px;height:40px;width:95%;box-shadow:3px 3px 3px #000; padding-left:15px; background-color:#060">
      <br /><h2 style="color:#FFF">Generar Receta</h2></div>
      <br />
      <!-- <table border="0">-->
      <!-- <tr>
         <td > 
      <input type="text" class="form-control" id="pac1" style="width:90%" placeholder="Ingrese Paciente .." onkeyup="javascript:LisPac1()"/>
         </td>
         <td > 
      <input type="text" class="form-control" id="med" style="width:90%" placeholder="Ingrese Medico .." onkeyup="javascript:LisMed()"/>
         </td></tr>
       <tr>
         
         <td > 
<input type="text" class="form-control" id="deta1" style="width:90%" placeholder="Nombre Exámen .." 
onkeyup="javascript:LisDetaReceta1()" />
         </td>
      
       </tr>-->
      <!-- <tr><td>&nbsp;</td></tr>
       <tr>
          <td colspan="2">
             <table id="IdTblExaRe1" border="1" bordercolor="#cccccc" >
               <thead>  
                  <tr>
                     <th><span style="font-size:13px">Ex&aacute;men</span></th>
                     <th><span style="font-size:13px">Precio</span></th>
                     <th><span style="font-size:13px">Muestra</span></th>
                     <th><span style="font-size:13px">Quitar</span></th>
                  </tr>
               </thead>
                <tbody id="IdTblCuExaRe1" style="font-size:12px;"></tbody>                
             </table>
          </td> 
          <td width="20px">&nbsp;</td> 
          <td>
            <table id="IdTblxx">             
                   <tr style="height:78px; margin-top:30px; font-size:14px" align="center"><td><b>Subtotal</b><br />
        <input type="number" class="form-control" id="Subtotal1" style="width:80%; height:30px; padding-left:7px" value=0 min="0" readonly="readonly" />
                   </td></tr>
                   <tr style="height:78px; margin-top:30px; font-size:14px" align="center"><td><b>Descuento</b><br />
         <input type="number" class="form-control" id="Descuento1" style="width:80%; height:30px; padding-left:7px" value=0 min='0'
                   onkeyup="javascript:CalcularMonto()" />
                   </td></tr>
                   <tr style="height:78px; margin-top:30px; font-size:14px" align="center"><td><b>Total</b><br />
        <input type="number"  class="form-control" id="Total1" style="width:80%; height:30px; padding-left:7px" value=0 min="0" readonly="readonly"  />
                   </td></tr>                             
             </table>
          </td>   
        </tr>
       </table>-->
       <br /><br />
       <button id="IdGra"  onclick="javascript:GrabarReceta()" >
       <img src="LIBRERIAS/IMAGENES/guardar.jpg" style="border:0" height="15" width="15"  />&nbsp;Grabar Receta</button>&nbsp;&nbsp;
       <button  id="id_delete" onclick="javascript:Regresar()" style="font-size:13px">
            <img src="LIBRERIAS/IMAGENES/can.jpg" style="border:0" height="16" width="16" />&nbsp;&nbsp;Cancelar</button>
       </div>
            

<!--<div id="IdEditar">
  <table align="center">
     <tr><td>Subtotal</td>
     <td><input type="number" class="form-control" id="Subtotal_p" style="width:100%; height:25px" value=" 0.00" readonly="readonly" /></td></tr>
     <tr><td>&nbsp;</td></tr>
     <tr><td>Descuento</td>
     <td><input type="number" class="form-control" id="Descuento_p" style="width:100%; height:25px" value=" 0.00" 
                   onkeyup="javascript:CalcularMonto1()" min="0" /></td></tr>
     <tr><td>&nbsp;</td></tr>
     <tr><td>Total</td>
     <td><input type="number" class="form-control" id="Total_p" style="width:100%; height:25px" value=" 0.00" readonly="readonly" /></td>
   </tr>
     <tr><td>&nbsp;</td></tr> 
     <tr>   
       <td colspan="2" align="center"><button  onclick="javascript:GrabarEditar()" style="font-size:13px" >
            <img src="LIBRERIAS/IMAGENES/guardar.jpg" style="border:0" height="16" width="16" />&nbsp;&nbsp;Guardar</button></td>
     </tr>
  </table>
  <br />
</div>-->
<style>
.topi{
  margin-top:0!important;
 }
.bodycontainer { max-height: 208px; width: 100%; margin: 0; overflow-y: auto; height:208px; }
.table-scrollable { margin: 0; padding: 0; }
.ui-autocomplete { height: 200px; overflow-y: scroll; overflow-x: hidden; }
ul.ui-autocomplete{z-index: 1100;}

</style>
