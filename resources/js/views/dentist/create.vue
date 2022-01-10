<template>
    <form autocomplete="off" @submit.prevent="submit">
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
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Registrar Odontólogo
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group form-group-default">
                                            <label>DNI</label>
                                            <input v-model="form.number" name="dnipa" type="text" required class="form-control" maxlength="8" placeholder="Ingrese dni" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group form-group-default">
                                            <label>Nombre</label>
                                            <input v-model="form.name" name="nombrep" type="text" class="form-control" required placeholder="Ingrese nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Dirección</label>
                                            <input v-model="form.address" name="apellidop" type="text" class="form-control" required placeholder="Ingrese dirección">
                                        </div>
                                    </div>                                
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Fecha de nacimiento</label>
                                            <div class="input-group">
                                                <input v-model="form.nacimiento" type="date" class="form-control" id="datepicker" name="datepicker">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar-check"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Teléfono</label>
                                            <input v-model="form.telephone" name="tele" type="text" class="form-control" required maxlength="9" placeholder="Ingrese teléfono" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Sexo</label>
                                            <select v-model="form.sexo" class="form-control" name="sexo">
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input v-model="form.email" name="email" type="text" class="form-control" required placeholder="Ingrese email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Password</label>
                                            <input name="clave" type="password" class="form-control" required placeholder="Ingrese contraseña">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Descripción</label>
                                            <input v-model="form.description" type="text" class="form-control">
                                        </div>
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
                resource: 'dentist',
                errors: {},
                form: {},
            }
        },
        async created() {
            await this.initForm()
        },
        methods: {
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
                    description: null,
                }
            },
            async submit() {
                this.loading_submit = true
                console.log(this.form)
                await this.$http.post(`/${this.resource}`, this.form)
                    .then(response => {
                        console.log(response)
                        this.close()
                        this.$swal("Odontòlogo registrado exitosamente")
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
