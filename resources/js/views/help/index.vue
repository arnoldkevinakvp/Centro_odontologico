<template>
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Citas</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="../view/admin/admin.php">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a href="#">Mostrar</a>
                    </li>
                </ul>
            </div>
            <div class="row">						
                <div class="col-md-9">
                <template v-if="enabled_paciente">
                    <template v-if="enabled_primero">
                        <div class="card">
                            <div class="card-header" >
                               <div align="right">
                                   <a href="#" @click.prevent="Siguiente()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                               </div>
                               <p>1. Desplegar paciente</p>
                               <p>2. Dar click en "Mostrar"</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/MostrarPaciente.png" width="100%" height="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_segundo">
                        <div class="card">
                            <div class="card-header" >
                                <div class="wizard-action">
									<div class="pull-left">
										<a href="#" @click.prevent="Atras2()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
									</div>
									<div class="pull-right">
										<a href="#" @click.prevent="Siguiente2()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
									</div>
									<div class="clearfix"></div>
                                    <p>1. Desplegar paciente</p>
                                    <p>2. Dar click en "Nuevo"</p>
								</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <img src="/help/DesplegarPaciente.png" width="100%" height="100%">
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_tercero">
                        <div class="card">
                            <div class="card-header" >
                               <div class="pull-left">
                                    <a href="#" @click.prevent="Atras3()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" @click.prevent="Siguiente3()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                                </div>
                                <div class="clearfix"></div>
                                <p>1. Ingresar número de DNI</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/LlenarPaciente.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_cuarto">
                        <div class="card">
                            <div class="card-header" >
                                <div class="pull-left">
                                    <a href="#" @click.prevent="Atras4()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" @click.prevent="Siguiente4()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                                </div>
                                <div class="clearfix"></div>
                                <p>1. Darle click en "RENIEC"</p>
                                    <p>2. Se mostrará los datos encontrados</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/Reniec.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_quinto">
                        <div class="card">
                            <div class="card-header" >
                               <div class="pull-left">
                                    <a href="#" @click.prevent="Atras5()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" @click.prevent="Siguiente5()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                                </div>
                                <div class="clearfix"></div>
                                <p>Llenar todos los datos</p>
                                <p>Dar click en "Guardar Registro"</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/LlenarDatos.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_sexto">
                        <div class="card">
                            <div class="card-header" >
                               <div class="pull-left">
                                    <a href="#" @click.prevent="Atras6()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="clearfix"></div>
                                <p>Registro exitoso</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/RegistroPaciente.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                </template>
                <template v-if="enabled_odontologo">
                </template>
                <template v-if="enabled_productos">
                    <template v-if="enabled_primero">
                        <div class="card">
                            <div class="card-header" >
                               <div align="right">
                                   <a href="#" @click.prevent="Siguiente()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                               </div>
                               <p>1. Desplegar Productos</p>
                                    <p>2. Dar click en "Mostrar"</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/ProductoIndex.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_segundo">
                        <div class="card">
                            <div class="card-header" >
                                <div class="wizard-action">
									<div class="pull-left">
										<a href="#" @click.prevent="Atras2()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
									</div>
									<div class="pull-right">
										<a href="#" @click.prevent="Siguiente2()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
									</div>
									<div class="clearfix"></div>
                                    <p>Llenar datos de los Productos</p>
								</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <img src="/help/NombreProducto.png" width="100%" height="100%">
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_tercero">
                        <div class="card">
                            <div class="card-header" >
                               <div class="pull-left">
                                    <a href="#" @click.prevent="Atras3()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" @click.prevent="Siguiente3()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                                </div>
                                <div class="clearfix"></div>
                                    <p>Seleccionar unidad</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/Unidad.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_cuarto">
                        <div class="card">
                            <div class="card-header" >
                                <div class="pull-left">
                                    <a href="#" @click.prevent="Atras4()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" @click.prevent="Siguiente4()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                                </div>
                                <div class="clearfix"></div>
                                    <p>1. Seleccionar Moneda</p>
                                    <p>2. Ingresar Precio Unitario</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/Moneda.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_quinto">
                        <div class="card">
                            <div class="card-header" >
                               <div class="pull-left">
                                    <a href="#" @click.prevent="Atras5()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" @click.prevent="Siguiente5()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                                </div>
                                <div class="clearfix"></div>
                                    <p>1. Seleccionar Tipo de Afectación</p>
                                    <p>2. Marcar incluye IGV</p>
                                    <p>3. Dar click en "Guardar Registro"</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/Guardar.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_sexto">
                        <div class="card">
                            <div class="card-header" >
                               <div class="pull-left">
                                    <a href="#" @click.prevent="Atras6()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="clearfix"></div>
                                    <p>Registrado exitosamente</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/Guardado.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                </template>
                <template v-if="enabled_cita">
                    <div class="card">
                        <div class="card-header" >
                            <p >Diagnósticos</p>
                        </div>
                        <div class="card-footer">
                            <div class="form">
                                <div class="form-group from-show-notify row">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <button @click.prevent="ClickDiag()" id="displayNotif" class="btn btn-success">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Fecha</th>
                                            <th>CodigoDiente</th>
                                            <th>Diagnóstico</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row">
                                            <td>2022/01/4</td>
                                            <td>L03-8</td>
                                            <td>Dolor de muela y sensibilidad</td>
                                        </tr>
                                        <tr role="row">
                                            <td>2022/01/4</td>
                                            <td>K02-8</td>
                                            <td>Carie de superficie blanda</td>
                                        </tr>
                                        <tr role="row">
                                            <td>2022/01/6</td>
                                            <td>F05-8</td>
                                            <td>Mal aliento</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </template>
                <template v-if="enabled_pagos">
                    <template v-if="enabled_primero">
                        <div class="card">
                            <div class="card-header" >
                               <div align="right">
                                   <a href="#" @click.prevent="Siguiente()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                               </div>
                               <p>1. Desplegar Productos</p>
                                    <p>2. Dar click en "Mostrar"</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/Pago1.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_segundo">
                        <div class="card">
                            <div class="card-header" >
                                <div class="wizard-action">
									<div class="pull-left">
										<a href="#" @click.prevent="Atras2()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
									</div>
									<div class="pull-right">
										<a href="#" @click.prevent="Siguiente2()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
									</div>
									<div class="clearfix"></div>
                                    <p>Llenar datos de los Productos</p>
								</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <img src="/help/Pago2.png" width="100%" height="100%">
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_tercero">
                        <div class="card">
                            <div class="card-header" >
                               <div class="pull-left">
                                    <a href="#" @click.prevent="Atras3()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" @click.prevent="Siguiente3()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                                </div>
                                <div class="clearfix"></div>
                                    <p>Seleccionar unidad</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/Pago3.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_cuarto">
                        <div class="card">
                            <div class="card-header" >
                                <div class="pull-left">
                                    <a href="#" @click.prevent="Atras4()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" @click.prevent="Siguiente4()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                                </div>
                                <div class="clearfix"></div>
                                    <p>1. Seleccionar Moneda</p>
                                    <p>2. Ingresar Precio Unitario</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/Pago4.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_quinto">
                        <div class="card">
                            <div class="card-header" >
                               <div class="pull-left">
                                    <a href="#" @click.prevent="Atras5()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" @click.prevent="Siguiente5()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Siguiente</a>
                                </div>
                                <div class="clearfix"></div>
                                    <p>1. Seleccionar Tipo de Afectación</p>
                                    <p>2. Marcar incluye IGV</p>
                                    <p>3. Dar click en "Guardar Registro"</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/Pago6.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                    <template v-if="enabled_sexto">
                        <div class="card">
                            <div class="card-header" >
                               <div class="pull-left">
                                    <a href="#" @click.prevent="Atras6()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Atrás</a>
                                </div>
                                <div class="clearfix"></div>
                                    <p>Registrado exitosamente</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/help/Pago7.png" width="100%" height="100%">
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                    </template>
                </template>
                <template v-if="enabled_historia">
                </template>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <div align="center">
                                
                            </div>
                            <div align="center">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="nav flex-column nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a @click.prevent="clickPaciente()" class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Módulo Paciente</a>
                                        <a @click.prevent="clickExploración()" class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Módulo Odontòlogo</a>
                                        <a @click.prevent="clickOdontograma()" class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Módulo Productos</a>
                                        <a @click.prevent="clickDiagnóstico()" class="nav-link " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Módulo Citas</a>
                                        <a @click.prevent="clickTratamiento()" class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Módulo de Pagos</a>
                                        <a @click.prevent="clickCitas()" class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Módulo Historia Clínicas</a>
                                    </div>                                                                        
                                </div>
                                <div class="col-12 col-md-12">
                                    <a href="#" @click.prevent="descargar()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Descargar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <iframe src="https://arnoldkevinakvp.github.io/ayuda-linea/" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    
</template>
<script>
    export default {
        data(){
            return{
                loading_submit: false,
                resource: 'historia',
                errors: {},
                form: {},
                form2:{},
                enabled_odontologo: false,
                enabled_paciente: true,
                enabled_primero: true,
                enabled_segundo: false,
                enabled_tercero: false,
                enabled_cuarto: false,
                enabled_quinto: false,
                enabled_sexto: false,
                enabled_productos : false,
                enabled_cita : false,
                enabled_pagos : false,
                enabled_historia : false,
                diagnostic: false,
                showDialogAddItem: false,
            }
        },
        async created() {
            await this.initForm()
        },
        methods:{
            initForm() {
                this.errors = {}
                this.form = {
                    id: null,
                    number: '',
                    name: null,
                    address: null,
                    telephone: null,
                    nacimiento: null,
                    email: null,
                    sexo: null,
                    
                }
            },
            
            Nuevo(){
                location.href = '/patients/create'
            },
            addRow(){

            },
            ClickDiag(){
                this.enabled_productos = true
                this.showDialogAddItem = true
                console.log(this.showDialogAddItem)
            },
            Siguiente(){
                this.enabled_primero= false
                this.enabled_segundo= true
                this.enabled_tercero= false
                this.enabled_cuarto= false
                this.enabled_quinto= false
                this.enabled_sexto= false
            },
            Atras2(){
                this.enabled_primero= true
                this.enabled_segundo= false
                this.enabled_tercero= false
                this.enabled_cuarto= false
                this.enabled_quinto= false
                this.enabled_sexto= false
            },
            Siguiente2(){
                this.enabled_primero= false
                this.enabled_segundo= false
                this.enabled_tercero= true
                this.enabled_cuarto= false
                this.enabled_quinto= false
                this.enabled_sexto= false
            },
            Atras3(){
                this.enabled_primero= false
                this.enabled_segundo= true
                this.enabled_tercero= false
                this.enabled_cuarto= false
                this.enabled_quinto= false
                this.enabled_sexto= false
            },
            Siguiente3(){
                this.enabled_primero= false
                this.enabled_segundo= false
                this.enabled_tercero= false
                this.enabled_cuarto= true
                this.enabled_quinto= false
                this.enabled_sexto= false
            },
            Atras4(){
                this.enabled_primero= false
                this.enabled_segundo= false
                this.enabled_tercero= true
                this.enabled_cuarto= false
                this.enabled_quinto= false
                this.enabled_sexto= false
            },
            Siguiente4(){
                this.enabled_primero= false
                this.enabled_segundo= false
                this.enabled_tercero= false
                this.enabled_cuarto= false
                this.enabled_quinto= true
                this.enabled_sexto= false
            },
            Atras5(){
                this.enabled_primero= false
                this.enabled_segundo= false
                this.enabled_tercero= false
                this.enabled_cuarto= true
                this.enabled_quinto= false
                this.enabled_sexto= false
            },
            Siguiente5(){
                this.enabled_primero= false
                this.enabled_segundo= false
                this.enabled_tercero= false
                this.enabled_cuarto= false
                this.enabled_quinto= false
                this.enabled_sexto= true
            },
            Atras6(){
                this.enabled_primero= false
                this.enabled_segundo= false
                this.enabled_tercero= false
                this.enabled_cuarto= false
                this.enabled_quinto= true
                this.enabled_sexto= false
            },
            Siguiente6(){
                this.enabled_primero= false
                this.enabled_segundo= false
                this.enabled_tercero= false
                this.enabled_cuarto= false
                this.enabled_quinto= false
                this.enabled_sexto= true
            },
            clickExploración(){
                this.enabled_odontologo = true
                this.enabled_paciente =false
                this.enabled_productos = false
                this.enabled_cita = false
                this.enabled_pagos = false
                this.enabled_historia = false
            },
            clickPaciente(){
                this.enabled_odontologo = false
                this.enabled_paciente =true
                this.enabled_productos = false
                this.enabled_cita = false
                this.enabled_pagos = false
                this.enabled_historia = false
                this.enabled_sexto = false
                this.enabled_primero = true
            },
            clickDiagnóstico(){
                this.enabled_odontologo = false
                this.enabled_paciente =false
                this.enabled_productos = false
                this.enabled_cita = true
                this.enabled_pagos = false
                this.enabled_historia = false
            },
            clickOdontograma(){
                this.enabled_odontologo = false
                this.enabled_paciente =false
                this.enabled_productos = true
                this.enabled_cita = false
                this.enabled_pagos = false
                this.enabled_historia = false
                this.enabled_primero = true
                this.enabled_sexto = false
            },
            clickTratamiento(){
                this.enabled_odontologo = false
                this.enabled_paciente =false
                this.enabled_productos = false
                this.enabled_cita = false
                this.enabled_pagos = true
                this.enabled_historia = false
                this.enabled_primero = true
                this.enabled_sexto = false
            },
            clickCitas(){
                this.enabled_odontologo = false
                this.enabled_paciente =false
                this.enabled_productos = false
                this.enabled_cita = false
                this.enabled_pagos = false
                this.enabled_historia = true
            },
            descargar(){

            },
        }
    }
</script>
