<template>
    <div class="login">
        <b-form @submit.prevent="validateBeforeSubmit" v-if="!formSubmitted">
            <h1>Registro</h1>
            <div class="form-group" :class="{'has-error': errors.has('name') }" >
                <input type="text" v-validate="'required|alpha|min:3'" class="form-control" placeholder="Introduce nombre" name="name" v-model="name">
                <p class="text-danger" v-if="errors.has('name')">{{ errors.first('name') }}</p>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('email') }" >
                <input type="text" v-validate="'required|email'" class="form-control" placeholder="Introduce email" name="email" v-model="email">
                <p class="text-danger" v-if="errors.has('email')">{{ errors.first('email') }}</p>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('password') }" >
                <input type="password" v-validate="'required|min:3'" class="form-control" placeholder="Introduce constraseña" name="password" v-model="password">
                <p class="text-danger" v-if="errors.has('password')">{{ errors.first('password') }}</p>
            </div> 
            <div class="form-group" :class="{'has-error': errors.has('password_confirmation') }" >   
                <input type="password" v-validate="'required|confirmed:password'" class="form-control" placeholder="Confirma constraseña" name="password_confirmation">
                <p class="text-danger" v-if="errors.has('password_confirmation')">{{ "Las contraseñas no coinciden" }}</p>
            </div>
            <button class="btn btn-primary submit" @click="registro()">Crear cuenta</button>
        </b-form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            formSubmitted: false
        };
    },

    methods: {
        registro() {
            let data = {
                name: this.name,
                email: this.email,
                password: this.password
            };

            axios.post('/api/register', data)
                .then(({data}) => {
                    auth.login(data.token, data.user);
                    this.$router.push('/dashboard');
                })
                .catch(({response}) => {                    
                    alert(response.data.message);
                });
        },
        validateBeforeSubmit(e) {
            this.$validator.validateAll();
            if (!this.errors.any()) {
                this.submitForm()
            }
        },
        submitForm(){
            this.formSubmitted = true
        }
    }
}
</script>
<style>
    .form-control{
        margin-bottom:20px;
    }
    .login{
        box-shadow: 0 0 0 1px #eaeaea;
        padding: 32px;
        max-width: 340px;
        margin: 0 auto;
        margin-top: 50px;
    }
    .submit{
        width: 100%;
    }
</style>