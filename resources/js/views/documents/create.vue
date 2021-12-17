<template>
    <form autocomplete="off" @submit.prevent="submit">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Nuevo comprobante electrónico</h4>
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
                                    Nuevo comprobante electrónico
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tipo de comprobante</label>
                                            <select v-model="form.document_type_id" @change="changeDocumentType" class="form-control">
                                                <option v-for="option in document_types" :key="option.id" :value="option.id" :label="option.description"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Serie</label>
                                            <select v-model="form.serie_id" class="form-control">
                                                <option v-for="option in series" :key="option.id" :value="option.id" :label="option.number"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha de emisión</label>
                                            <input v-model="form.date_of_issue" type="date" class="form-control" id="datepicker" name="datepicker">
                                        </div>
                                    </div>                                
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha de vencimiento</label>
                                            <div class="input-group">
                                                <input v-model="form.date_of_due" type="date" class="form-control" id="datepicker" name="datepicker">
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Paciente</label>
                                            <select v-model="form.customer_id" class="form-control" id="select2">
                                                <option v-for="option in customers" :key="option.id" :value="option.id" :label="option.name"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="30%" >Descripción</th>
                                                <th width="15%">Unidad</th>
                                                <th width="10%">Cantidad</th>
                                                <th width="15%">Valor Unitario</th>
                                                <th width="15%">Precio Unitario</th>
                                                <th width="10%">Subtotal</th>
                                                <!--<th class="text-right font-weight-bold">Cargo</th>-->
                                                <th width="10%">Total</th>
                                                <th width="10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <div class="form-group">
                                                    <button type="button" class="btn waves-effect waves-light btn-primary" @click.prevent="clickAddItemInvoice">+ Buscar Pagos</button>
                                                </div>
                                            </tr> 
                                        </tbody>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <button type="button" class="btn btn-default" @click.prevent="close()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="primary" name="agregar" class="btn btn-primary" :loading="loading_submit"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </form>
</template>
<script>
    
    export default {
        data(){
            return{
                loading_submit: false,
                resource: 'documents',
                errors: {},
                form: {},
                document_types: [],
                series: [],
                all_series: [],
                payment_method_types: [],
                method_types: [],
                customers: [],
            }
        },
        async created() {
            await this.initForm()
            await this.getRecords()
        },
        methods: {
            initForm() {
                this.errors = {}
                this.form = {
                    series_id: null,
                    method_types_id: null,
                    document_type_id: null,
                    date_of_issue: null,
                    time_of_issue: null,
                    customer_id: null,
                    currency_type_id: null,
                    purchase_order: null,
                    exchange_rate_sale: 0,
                    total_prepayment: 0,
                    total_charge: 0,
                    total_discount: 0,
                    total_exportation: 0,
                    total_free: 0,
                    total_taxed: 0,
                    total_unaffected: 0,
                    total_exonerated: 0,
                    total_igv: 0,
                    total_base_isc: 0,
                    total_isc: 0,
                    total_base_other_taxes: 0,
                    total_other_taxes: 0,
                    total_plastic_bag_taxes: 0,
                    total_taxes: 0,
                    total_value: 0,
                    total: 0,
                    operation_type_id: null,
                    date_of_due: null,
                    date_of_payment: null,
                    payments: [],
                    payments2: [],
                    payment_method_type_id:null,
                    method_type_id:null,
                }
            },
            getRecords(){
                this.$http.get(`/${this.resource}/tables`).then((response) => {
                    console.log(response)
                    this.customers = response.data.customers
                    this.all_series = response.data.series
                    this.payment_method_types = response.data.payment_method_types
                    this.method_types = response.data.method_types
                    this.document_types = response.data.document_types
                });
            },
            filterSeries() {
                this.form.series_id = null
                this.series = _.filter(this.all_series, {'document_type_id': this.form.document_type_id});
                this.form.series_id = (this.series.length > 0)?this.series[0].id:null
            },
            changeDocumentType() {
                this.filterSeries();
            },
            async submit() {
                this.loading_submit = true
                console.log(this.form)
                await this.$http.post(`/${this.resource}`, this.form)
                    .then(response => {
                        if (response.data.success) {
                            this.$message.success(response.data.message)
                            this.close()
                        } else {
                            this.$message.error(response.data.message)
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .then(() => {
                        this.loading_submit = false
                    })
            },
            close() {
                console.log("xddd")
                this.initForm()
            },
        }
    }
</script>
