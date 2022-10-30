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
                                
                            </div>
                            <div class="card-tools">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Periodo</label>
                                            <select v-model="form.period" @change="changePeriod" class="form-control">
                                                <option key="month" value="month" label="Por mes"></option>
                                                <option key="between_months" value="between_months" label="Entre meses"></option>
                                                <option key="date" value="date" label="Por fecha"></option>
                                                <option key="between_dates" value="between_dates" label="Entre fechas"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <template v-if="form.period === 'month' || form.period === 'between_months'">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Mes de</label>
                                                <input v-model="form.month_start" type="month" class="form-control"
                                                                @change="changeDisabledMonths"
                                                                value-format="yyyy-MM" format="MM/yyyy" :clearable="false">
                                            </div>
                                        </div>
                                    </template>
                                    <template v-if="form.period === 'between_months'">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Mes al</label>
                                                <input v-model="form.month_end" type="month" class="form-control"
                                                                :picker-options="pickerOptionsMonths"
                                                                value-format="yyyy-MM" format="MM/yyyy" :clearable="false">
                                            </div>    
                                        </div>
                                    </template>
                                    <template v-if="form.period === 'date' || form.period === 'between_dates'">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fecha del</label>
                                                <input v-model="form.date_start" type="date" class="form-group"
                                                                @change="changeDisabledDates"
                                                                value-format="yyyy-MM-dd" format="dd/MM/yyyy" :clearable="false">
                                            </div>
                                        </div>
                                    </template>
                                    <template v-if="form.period === 'between_dates'">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label>Fecha al</label>
                                            <input v-model="form.date_end" type="date" class="form-group"
                                                            :picker-options="pickerOptionsDates"
                                                            value-format="yyyy-MM-dd" format="dd/MM/yyyy" :clearable="false">
                                            </div>
                                        </div>
                                    </template>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label></label>
                                            <button type="primary" name="agregar"  class="btn btn-primary form-control" @click.prevent="getRecordsByFilter"><span class="glyphicon glyphicon-floppy-disk"></span> Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">                                                
                                <div class="table-responsive">
                                    <div class="card-body">
                                        <div class="widget-summary">
                                            <div class="summary">
                                                <h4 class="title">
                                                    Total Citas : 5
                                                </h4>
                                                
                                            </div>
                                            <div class="widget-summary-col" >
                                                <div class="row no-gutters">
                                                    <x-graph-line :all-data="sale_note.graph"></x-graph-line>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
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
    import moment from 'moment'
    import LoaderGraph from "../../components/loaders/l-graph.vue";

    export default {
        components: { LoaderGraph },
        data(){
            return{
                loading_submit: false,
                resource: 'orders',
                errors: {},
                form: {},
                end: null,
                pickerOptionsDates: {
                    disabledDate: (time) => {
                        time = moment(time).format('YYYY-MM-DD')
                        return this.form.date_start > time
                    }
                },
                sale_note: {
                    totals: {},
                    graph: {}
                },
            }
        },
        async created() {
            await this.initForm()
            await this.getRecords()
            await this.getDashboard()
            await this.getTime()
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
            getTime(){
                this.time = moment().format('DD/MM/YYYY HH:mm:ss')
                
                console.log(this.time)
            },
            changePeriod(){

            },
            changeDisabledMonths(){

            },
            pickerOptionsMonths(){

            },
            changeDisabledDates(){

            },
            getRecordsByFilter(){

            },
            getRecords(){
                this.$http.get(`/${this.resource}/tables`).then((response) => {
                    this.form = response.data
                });
            },
            getDashboard(){
                this.$http.get('/dashboard/tables').then((response)=>{
                    console.log(response)
                    this.sale_note = response.data;
                });
            },
            PDF(type){
                this.end =moment().format('DD/MM/YYYY HH:mm:ss')
                this.tiempo = moment(this.end).diff(moment(this.time), 'DD/MM/YYYY HH:mm:ss')
                this.TiempoSegundos = this.tiempo/1000
                console.log(this.end)
                console.log(this.TiempoSegundos)
                window.open(`/Report/${this.resource}/${type}`, '_blank');
            },
        }
    }
</script>
