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
                <template v-if="enabled_datos">
                    <div class="card">
                        <div class="card-header" >
                            <p >Datos del paciente</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Paciente</label>
                                        <input v-model="form.name" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>F. de Nac</label>
                                        <input v-model="form.nacimiento" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Edad</label>
                                        <input v-model="form.edad" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>DNI</label>
                                        <input v-model="form.number" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Género</label>
                                        <input v-model="form.sexo" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ocupación</label>
                                        <input v-model="form.ocupation" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estado Civil</label>
                                        <input v-model="form.estado" type="text" required class="form-control">
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input v-model="form.address" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input v-model="form.email" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input v-model="form.description" type="text" required class="form-control">
                                    </div>
                                </div>
                            </div>                                                        
                        </div>
                    </div>
                </template>
                <template v-if="enabled_exploración">
                </template>
                <template v-if="enabled_odontograma">
                    
                        <div class="modal-dialog">                        
                            <div class="modal-content">
                                <div class="modal-header">
               
                                    <center><h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4></center>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
					                    <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </template>
                <template v-if="enabled_diagnóstico">
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
                <template v-if="enabled_tratamiento">
                </template>
                <template v-if="enabled_citas">
                </template>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <div align="center">
                                <div class="input-file input-file-image">
                                    <img class="img-upload-preview img-circle" width="100" height="100" src="/Atlantis/img/mujer.png" alt="preview">
                                </div>
                            </div>
                            <div align="center">
                                <label> {{form.name}}</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="nav flex-column nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a @click.prevent="clickPaciente()" class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Datos del paciente</a>
                                        <a @click.prevent="clickExploración()" class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Exploración Física</a>
                                        <a @click.prevent="clickOdontograma()" class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Odontograma</a>
                                        <a @click.prevent="clickDiagnóstico()" class="nav-link " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Diagnóstico</a>
                                        <a @click.prevent="clickTratamiento()" class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tratamientos realizados</a>
                                        <a @click.prevent="clickCitas()" class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Citas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <diagnostic :showDialog="showDialogAddItem"/>            
        </div>
    </div>
    
</template>
<script>
import Diagnostic from './form/diagnostic.vue'
    export default {
        props: {
            'records': {
                required: true,
            
                default: 0
            },
        },
        components:{Diagnostic},
        data(){
            return{
                loading_submit: false,
                resource: 'historia',
                errors: {},
                form: {},
                form2:{},
                enabled_exploración: false,
                enabled_datos: true,
                enabled_odontograma : false,
                enabled_diagnóstico : false,
                enabled_tratamiento : false,
                enabled_citas : false,
                diagnostic: false,
                showDialogAddItem: false,
            }
        },
        async created() {
            await this.initForm()
            await this.getRecords()
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
            getRecords(){
                console.log(this.records)
                this.$http.get(`/Historia/patient/${this.records}` )
                 .then(response => {
                     this.form= response.data.records[0]
                     console.log(this.form)
                })
            },
            Nuevo(){
                location.href = '/patients/create'
            },
            addRow(){

            },
            ClickDiag(){
                this.enabled_odontograma = true
                this.showDialogAddItem = true
                console.log(this.showDialogAddItem)
            },
            clickExploración(){
                this.enabled_exploración = true
                this.enabled_datos =false
                this.enabled_odontograma = false
                this.enabled_diagnóstico = false
                this.enabled_tratamiento = false
                this.enabled_citas = false
            },
            clickPaciente(){
                this.enabled_exploración = false
                this.enabled_datos =true
                this.enabled_odontograma = false
                this.enabled_diagnóstico = false
                this.enabled_tratamiento = false
                this.enabled_citas = false
            },
            clickDiagnóstico(){
                this.enabled_exploración = false
                this.enabled_datos =false
                this.enabled_odontograma = false
                this.enabled_diagnóstico = true
                this.enabled_tratamiento = false
                this.enabled_citas = false
                this.$http.get(`/Historia/diagnostic/${this.records}` )
                 .then(response => {
                     this.form2= response.data.records2
                     console.log(this.form2)
                })
                
            },
            clickOdontograma(){
                this.enabled_exploración = false
                this.enabled_datos =false
                this.enabled_odontograma = true
                this.enabled_diagnóstico = false
                this.enabled_tratamiento = false
                this.enabled_citas = false
            },
            clickTratamiento(){
                this.enabled_exploración = false
                this.enabled_datos =false
                this.enabled_odontograma = true
                this.enabled_diagnóstico = false
                this.enabled_tratamiento = false
                this.enabled_citas = false
            },
            clickCitas(){
                this.enabled_exploración = false
                this.enabled_datos =false
                this.enabled_odontograma = false
                this.enabled_diagnóstico = false
                this.enabled_tratamiento = false
                this.enabled_citas = true
            },
        }
    }
</script>
