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
                                            <input v-model="form.date_of_issue" type="date" class="form-control" id="datepicker" name="datepicker" @change="RateByDate">
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Moneda</label>
                                            <select v-model="form.currency_type_id" @change="changeCurrencyType" class="form-control" id="select2">
                                                <option v-for="option in currency_types" :key="option.id" :value="option.id" :label="option.description"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tipo de cambio</label>
                                            <input v-model="form.exchange_rate_sale" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input v-model="form.direction" class="form-control" >
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
                                        <tbody v-if="form.items.length > 0">
                                            <tr v-for="(row, index) in form.items" :key="index">
                                                <td>{{index + 1}}</td>
                                                <td>{{row.descripcion}}</td>
                                                <td>{{row.unit_type_id}}</td>
                                                <td>{{row.quantity}}</td>
                                                <td>{{row.unit_value}}</td>
                                                <td>{{row.unit_price}}</td>
                                                <td>{{row.total_value}}</td>
                                                <td>{{row.total}}</td>
                                                
                                            </tr>
                                            
                                            <template v-if="form.total > 0">
                                                <tr v-if="form.total_igv > 0" >
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td >IGV</td>
                                                    <td>:</td>
                                                    <td class="text-right"> {{ form.total_igv }}</td>
                                                </tr>
                                                <tr v-if="form.total_igv > 0" >
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td >TOTAL A PAGAR</td>
                                                    <td>:</td>
                                                    <td class="text-right"> {{ form.total }}</td>
                                                </tr>
                                            </template>
                                        </tbody>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="form-group">
                                                    <button type="button" class="btn waves-effect waves-light btn-primary" data-toggle="modal" data-target="#exampleModal"  @click.prevent="ClickAddItem">
                                                        + Buscar Pagos
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <button type="button" class="btn btn-default" @click.prevent="close()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="primary"  class="btn btn-primary" :loading="loading_submit"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
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
    import DocumentFormPerson from './pagos/pagos.vue'
    import {functions, exchangeRate} from '../../mixins/functions'
    import moment from 'moment'
    import items from './pagos/items.vue'
    import VueSweetalert2 from 'vue-sweetalert2';

    export default {
        components: {DocumentFormPerson,items},
        mixins: [functions, exchangeRate],
        data(){
            return{
                loading_submit: false,
                resource: 'documents',
                errors: {},
                form: {},
                document_types: [],
                series: [],
                currency_types: [],
                all_series: [],
                payment_method_types: [],
                method_types: [],
                customers: [],
                showDialogPayments: false,
            }
        },
        async created() {
            await this.initForm()
            await this.getRecords()
        },
        methods: {
            initForm() {
                this.errors = {}
                this.items = {}
                this.form = {
                    items: {},
                    series_id: null,
                    method_types_id: null,
                    document_type_id: null,
                    date_of_issue: moment().format('YYYY-MM-DD'),
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
                    date_of_due: moment().format('YYYY-MM-DD'),
                    date_of_payment: null,
                    payments: [],
                    payments2: [],
                    payment_method_type_id:null,
                    method_type_id:null,
                    direction: null,
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
                    this.currency_types = response.data.currency_types

                    this.form.currency_type_id = (this.currency_types.length > 0)?this.currency_types[0].id:null;
                    this.form.document_type_id = (this.document_types.length > 0)?this.document_types[1].id:null;
                    this.filterSeries();
                    this.RateByDate();
                });
            },
            ClickAddItem(){
                this.showDialogPayments = true
            },
            changeCurrencyType(){

            },
            async RateByDate() {
              
                let response = await this.$http.get(`/Service/exchange_rate/${this.form.date_of_issue}`)
                this.form.exchange_rate_sale = response.data.exchange.venta
            },
            calculateTotal() {
                let total_discount = 0
                let total_charge = 0
                let total_exportation = 0
                let total_taxed = 0
                let total_exonerated = 0
                let total_unaffected = 0
                let total_free = 0
                let total_igv = 0
                let total_value = 0
                let total = 0
                let total_plastic_bag_taxes = 0
                this.form.items.forEach((row) => {
                    total_discount += parseFloat(row.total_discount)
                    total_charge += parseFloat(row.total_charge)

                    if (row.affectation_igv_type_id === '10') {
                        total_taxed += parseFloat(row.total_value)
                    }
                    if (row.affectation_igv_type_id === '20') {
                        total_exonerated += parseFloat(row.total_value)
                    }
                    if (row.affectation_igv_type_id === '30') {
                        total_unaffected += parseFloat(row.total_value)
                    }
                    if (row.affectation_igv_type_id === '40') {
                        total_exportation += parseFloat(row.total_value)
                    }
                    if (['10', '20', '30', '40'].indexOf(row.affectation_igv_type_id) < 0) {
                        total_free += parseFloat(row.total_value)
                    }
                    if (['10', '20', '30', '40'].indexOf(row.affectation_igv_type_id) > -1) {
                        total_igv += parseFloat(row.total_igv)
                        total += parseFloat(row.total)
                    }
                    total_value += parseFloat(row.total_value)
                    total_plastic_bag_taxes += parseFloat(row.total_plastic_bag_taxes)
                    if (['13', '14', '15'].includes(row.affectation_igv_type_id)) {

                        let unit_value = (row.total_value/row.quantity) / (1 + row.percentage_igv / 100)
                        let total_value_partial = unit_value * row.quantity
                        row.total_taxes = row.total_value - total_value_partial
                        row.total_igv = row.total_value - total_value_partial
                        row.total_base_igv = total_value_partial
                        total_value -= row.total_value

                    }
                });

                this.form.total_exportation = _.round(total_exportation, 2)
                this.form.total_taxed = _.round(total_taxed, 2)
                this.form.total_exonerated = _.round(total_exonerated, 2)
                this.form.total_unaffected = _.round(total_unaffected, 2)
                this.form.total_free = _.round(total_free, 2)
                this.form.total_igv = _.round(total_igv, 2)
                this.form.total_value = _.round(total_value, 2)
                this.form.total_taxes = _.round(total_igv, 2)
                this.form.total_plastic_bag_taxes = _.round(total_plastic_bag_taxes, 2)
                // this.form.total = _.round(total, 2)
                this.form.total = _.round(total + this.form.total_plastic_bag_taxes, 2)
            },
            addPayments(){
                
            },
            addRow(row){
                console.log(row)
                this.form.items = row.items
                this.form.customer_id = row.patient_id
                this.calculateTotal()
            },
            filterSeries() {
                this.form.serie_id = null
                this.series = _.filter(this.all_series, {'document_type_id': this.form.document_type_id});
                this.form.serie_id = (this.series.length > 0)?this.series[0].id:null
            },
            changeDocumentType() {
                this.filterSeries();
            },
            clickAddItemInvoice(){
                this.showDialogPayments = true
            },
            async submit() {
                this.loading_submit = true
                // await this.$http.post(`/${this.resource}`, this.form)
                //     .then(response => {
                //         if (response.data.success) {
                //             this.$message.success(response.data.message)
                //             this.close()
                //         } else {
                //             this.$message.error(response.data.message)
                //         }
                //     })
                //     .catch(error => {
                //         console.log(error)
                //     })
                //     .then(() => {
                //         this.loading_submit = false
                //     })
                this.$swal("Pago registrado")
                this.initForm()
            },
            close() {
                this.initForm()
            },
        }
    }
</script>
