
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <iframe src="https://arnoldkevinakvp.github.io/ayuda-linea/" width="100%" height="600px"></iframe>
                                    </div>
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
        }
    }
</script>
