<template>
    <form autocomplete="off" @submit.prevent="submit">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Nueva Cita</h4>
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
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Nueva Cita
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Médico-Odontólogo</label>
                                            <select v-model="form.dentist_id" class="form-control">
                                                <option v-for="option in dentist" :key="option.id" :value="option.id" :label="option.name"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha de tratamiento</label>
                                            <input v-model="form.date_of_treatment" type="date" class="form-control" id="datepicker" name="datepicker">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Hora Inicio</label>
                                            <input v-model="form.start_time" type="time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Hora Fin</label>
                                            <input v-model="form.end_time" type="time" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Paciente</label>
                                            <select v-model="form.patient_id" class="form-control" id="select2">
                                                <option v-for="option in patient" :key="option.id" :value="option.id" :label="option.name"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Monto</label>
                                            <input v-model="form.monto" type="text" required class="form-control" maxlength="8" placeholder="Ingrese monto" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-action">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table  class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Unidad</th>
                                                    <th>Producto/Servicio</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                </tr>
                                            </thead>
                                            <tbody v-if="form.item.length > 0">
                                                <tr v-for="(row, index) in form.item" :key="index">
                                                    <td>{{index + 1}}</td>
                                                    <td>{{row.item[0].unit_type_id}}</td>
                                                    <td>{{row.item[0].name}}</td>
                                                    <td class="text-right">{{row.quantity}}</td>
                                                    <td class="text-right">{{row.total}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="button" class="btn waves-effect waves-light btn-primary" data-toggle="modal" data-target="#exampleModal"  @click.prevent="ClickAddItem">
                                            + Agregar Servicio
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <button type="button" class="btn btn-default" @click.prevent="close()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="primary" name="agregar" class="btn btn-primary" :loading="loading_submit"><span class="glyphicon glyphicon-floppy-disk"></span> Generar Cita</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <items :showDialogPayments="showDialogPayments"
                           @add="addRow"></items>
    </form>
</template>
<script>
    import items from './item/items.vue'
    import VueSweetalert2 from 'vue-sweetalert2';
    import moment from 'moment';

    export default {
        components: {items},
        data(){
            return{
                loading_submit: false,
                resource: 'citas',
                errors: {},
                form: {},
                dentist: [],
                showDialogPayments: false,
                customers: [],
            }
        },
        async created() {
            await this.initForm()
            await this.getRecords()
            await this.getTime()
        },
        methods: {
            initForm() {
                this.errors = {}
                this.form = {
                    id: null,
                    dentist_id: null,
                    patient_id: null,
                    date_of_treatment: null,
                    start_time: null,
                    end_time: null,
                    description: null,
                    monto: 0,
                    item: [],
                }
                this.orders= {
                    id : null,
                    patient_id: null,
                    description: null,
                    monto: null,
                },
                this.patient = null
                this.dentist = null
            },
            getRecords(){
                this.$http.get(`/${this.resource}/tables`).then((response) => {
                    this.patient = response.data.customers
                    this.dentist = response.data.dentist
                });
            },
            addPayments(){
            },
            getTime(){
                this.time = moment().format('DD/MM/YYYY HH:mm:ss')
                
                console.log(this.time)
            },
            ClickAddItem(){
                
                this.showDialogPayments = true
            },
            addRow(row){
                this.showDialogPayments = false
                this.form.item.push(JSON.parse(JSON.stringify(row)));
                this.form.monto = this.form.monto + row.total
            },
            async submit() {
                this.orders.patient_id = this.form.patient_id
                this.orders.description = this.form.description
                this.orders.monto = this.form.monto
                this.loading_submit = true
                this.$http.post(`/${this.resource}`, this.form)
                    .then(response => {
                        console.log(response)
                        this.saveOrder();
                        this.$swal("Registrado","Se registrò la cita")
                        this.ended()
                        this.close()
                    })
                    .catch(error => {
                        this.$swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Verifique bien los datos',
                        })
                        console.log(error)
                    });
            },
            ended(){
                this.end =moment().format('DD/MM/YYYY HH:mm:ss')
                this.tiempo = moment(this.end).diff(moment(this.time), 'DD/MM/YYYY HH:mm:ss')
                this.TiempoSegundos = this.tiempo/1000
                console.log(this.end)
                console.log(this.TiempoSegundos)
            },
            saveOrder(){
                this.$http.post(`/orders`, this.orders)
                    .then(response => {
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            close() {
                this.initForm()
            },
        }
    }
</script>
