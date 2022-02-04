<template>
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Citas Registradas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table  class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Unidad</th>
                                            <th>DNI/RUC</th>
                                            <th>Total</th>
                                            <th>Seleccionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(row, index) in form" :key="index" role="row">
                                            <td>{{index}}</td>
                                            <td>{{row.patient.name}}</td>
                                            <td>{{row.patient.number}}</td>
                                            <td>{{row.monto}}</td>
                                            <td><div class="form-button-action">
                                                <a href="#" title="Seleccionar" class="btn btn-link btn-primary btn-lg" @click.prevent="addRow(index)" data-dismiss="modal"><i class="fa fa-check"></i></a>
                                            </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"  >Agregar</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['showDialogPayments'],
        data(){
            return{
                loading_submit: false,
                resource: 'citas',
                errors: {},
                form: {},
                form2: {},
                unit_types: [],
                currency_types: [],
                affectation_igv_types: [],
                warehouses: [],
            }
        },
        async created() {
            await this.initForm()
            await this.getRecords()
            await this.getItems()
            
        },
        methods: {
            initForm() {
                this.errors = {}
                this.readonly_total = 0,
                this.form = {}
                this.form2 = {}
                this.all_items = {},
                this.exchange_rate_sale = 0,
                this.show_has_igv = true
                this.purchase_show_has_igv = true
                this.enabled_percentage_of_profit = false
                this.items = {}
            },
            getRecords(){
                this.$http.get(`/${this.resource}/table`)
                .then(response => {
                    this.form = response.data.records
                    this.form2 = response.data.records
                    console.log(this.form2)
                })
            },
            getItems(){
                this.$http.get(`/Items/table`)
                .then(response => {
                    this.items = response.data.items
                })
            },
            addRow(add){
                for (let index = 0; index < this.form2[add].items.length; index++) {
                    for (let index2 = 0; index2 < this.items.length; index2++) {
                        console.log(this.form2[add].items[index].item_id , this.items[index2].id)
                        if(this.form2[add].items[index].item_id == this.items[index2].id){
                            this.form2[add].items[index].descripcion = this.items[index2].name
                            this.form2[add].items[index].unit_type_id = this.items[index2].unit_type_id
                        }
                    }
                }
                this.$emit('add', this.form2[add]);
            },
        }
    }
</script>
