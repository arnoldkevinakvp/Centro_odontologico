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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Listado de Odontólogos</h4>
                                <a href="#" @click.prevent="Nuevo()" class="btn btn-primary btn-round ml-auto">Nuevo</a>
                            </div>
                            <div class="card-tools">
                                <a href="../view/specialty/reporte.php" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                    <span class="btn-label">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    Export
                                </a>
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                    <span class="btn-label">
                                        <i class="fa fa-print"></i>
                                    </span>
                                    Print
                                </a>
                            </div>
                            <div class="card-body">                                                
                                <div class="table-responsive">
                                    <table  class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>DNI</th>
                                                <th>Teléfono</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(row, index) in form.dentist" role="row">
                                                <td>{{index}}</td>
                                                <td>{{row.name}}</td>
                                                <td>{{row.number}}</td>
                                                <td>{{row.telephone}}</td>
                                                <td><div class="form-button-action">
				                                    <a href="#" @click.prevent="Horarios(row.id)" title="Ver Horarios" class="btn btn-link btn-primary btn-lg"><i class="fa fa-eye" aria-hidden="true"></i></a>
								                </div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                                        
                            </div>
                        </div>                                                
                    </div>
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
                resource: 'dentist',
                errors: {},
                form: {},
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
                this.$http.get(`/${this.resource}/tables`).then((response) => {
                    console.log(response)
                    this.form = response.data
                });
            },
            Nuevo(){
                location.href = '/dentist/create'
            },
            Horarios(doctor){
                location.href = `/Horarios/create/${doctor}`
            },
        }
    }
</script>
