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
                        <a href="#">Listado de citas</a>
                    </li>
                </ul>
            </div>
            <div class="row">						
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Listado de Historias Clìnicas</h4>
                                <a href="#" @click.prevent="Nuevo()" class="btn btn-primary btn-round ml-auto">Nuevo</a>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Filtrar por: </label>
                                        <select v-model="filtros" @change="changeFiltro" class="form-control">
                                            <option key="nombre" value="nombre" label="Por Nombre"></option>
                                            <option key="dni" value="dni" label="Por DNI"></option>
                                        </select>
                                    </div>
                                </div>
                                <template v-if="filtros === 'nombre'">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Busqueda</label>
                                        <input v-model="filtro" @input="busqueda" ref="inputQuantity" class="form-control">
                                        </input>
                                        </div>
                                    </div>
                                </template>
                                <template v-if="filtros === 'dni'">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Busqueda</label>
                                            <input v-model="filtro2" @input="busquedaDNI" maxlength="8"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control">
                                            </input>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div class="card-body">                                                
                                <div class="table-responsive">
                                    <table  class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Nombre Paciente</th>
                                                <th>DNI</th>
                                                <th>Teléfono</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(row, index) in form.patients" role="row">
                                                <td>{{index}}</td>
                                                <td>{{row.name}}</td>
                                                <td>{{row.number}}</td>
                                                <td>{{row.telephone}}</td>
                                                <td v-if="row.historia==0"><div class="form-button-action">
													<button @click.prevent="Aperturar(row.id)" type="button" class="btn btn-link btn-black btn-lg" title="Aperturar Historia"><i class="fa fa-id-card" aria-hidden="true"></i></button>
								                </div></td>
                                                <td v-else>
                                                    <button @click.prevent="Actualizar(row.id)" href="#" class="btn btn-link btn-lg" title="Actualizar Historia" data-original-title="Delete Task"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                                        
                            </div>
                        </div>                                                
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
    export default {
        data(){
            return{
                loading_submit: false,
                resource: 'Historia',
                errors: {},
                form: {},
                form2: {},
                filtros: null,
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
                this.form2 = {
                    FechaApertura: null,
                    Description: null,
                    patient_id: null,
                    odontogram_id: null,
                }
                this.filtro = null
                this.filtro2 = null
            },
            getRecords(){
                this.$http.get(`/patients/tables`).then((response) => {
                    console.log(response)
                    this.form = response.data
                });
            },
            Nuevo(){
                location.href = '/patients/create'
            },
            busqueda(){
                if(this.filtro){
                    this.$http.get(`/patients/buscador/${this.filtro}`).then((response) => {
                    this.form = response.data
                });
                }
                else{
                    this.getRecords()
                }
                
            },
            busquedaDNI(){
                if(this.filtro2){
                    this.$http.get(`/patients/buscadores/${this.filtro2}`).then((response) => {
                    this.form = response.data
                });
                }
                else{
                    this.getRecords()
                }
            },
            Aperturar(patient){
                this.form2.FechaApertura = moment().format("DD/MM/YYYY");
                this.form2.Description = "historia clìnica";
                this.form2.patient_id = patient;
                this.$http.post(`/${this.resource}/create/historia`, this.form2)
                    .then(response => {
                        this.$swal("Aperturado","Historia Clínica aperturada")
                    })
                    .catch(error => {
                        console.log(error)
                    });
                this.getRecords();
            },
            changeFiltro(){

            },
            Actualizar(patient){
                console.log(patient)
                location.href = `/Historia/create/${patient}`
            },
        }
    }
</script>
