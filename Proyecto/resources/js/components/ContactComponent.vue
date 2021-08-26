<template>
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="onSubmit" class="contact">
                    <BaseInput label="Nombre" v-model="$v.form.name.$model" :validator="$v.form.name"></BaseInput>
                    <BaseInput label="Email" type="email" v-model="$v.form.email.$model" :validator="$v.form.email"></BaseInput>
                    <BaseInput label="Telefono" v-model="$v.form.phone.$model" :validator="$v.form.phone"></BaseInput>
                    <div class="form-group">
                    <label>Contenido</label>
                    <textarea 
                    v-model="$v.form.content.$model" 
                    class="form-control" 
                    :class="{
                        'is-valid':!$v.form.content.$error && $v.form.content.$dirty,
                        'is-invalid':$v.form.content.$error
                    }"
                    rows="3"></textarea>
                    </div>
                    <button 
                    :disabled="!formValid"
                    type="submit" 
                    class="btn btn-primary">Enviar</button>
                    <button class="btn btn-danger bnt-sm" @click="resetForm">Clear</button>
                </form>
            </div>
        </div>
        
    </div>
</template>
<script>
import BaseInput from "../components/BaseInput.vue";
import { required, minLength, email, numeric} from 'vuelidate/lib/validators';
export default {
    components: {BaseInput},
    data() {
        return {
            form:{
                name:"",
                email:"",
                phone:"",
                content:""
            }
        };
    },
    validations:{
        form:{
            name:{
                required,
                minLength: minLength(2)
            },
            email:{
                required,
                email
            },
            phone:{
                required,
                numeric,
                minLength: minLength(10)
            },
            content:{
                required
            }
        }
    },
    methods: {
        resetForm(){
            this.$v.form.name.$model = ""
            this.$v.form.phone.$model = ""
            this.$v.form.email.$model = ""
            this.$v.form.content.$model = ""
            this.$v.$reset()
            document.querySelectorAll("form.contact input, form.contact textarea").forEach(e => e.value="")
        },
        onSubmit(){
            if(!this.formValid){
                return
            }

            axios.post('/api/contact',{
                name:       this.$v.form.name.$model,
                email:      this.$v.form.email.$model,
                commentary: this.$v.form.content.$model,
            }).then(function(response){
                console.log(response.data);
            })
        }
    },
    computed:{
        formValid(){
            return !this.$v.$invalid;
        }
    }
};
</script>