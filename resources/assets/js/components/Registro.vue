<template>
    <div class="login">
        <b-form @submit.prevent="validateBeforeSubmit" v-if="!formSubmitted">
            <h1>Register</h1>
            <div class="form-group" :class="{'has-error': errors.has('name') }" >
                <input type="text" v-validate="'required|alpha|min:3'" class="form-control" placeholder="Enter name" name="name" v-model="name">
                <p class="text-danger" v-if="errors.has('name')">{{ errors.first('name') }}</p>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('email') }" >
                <input type="text" v-validate="'required|email'" class="form-control" placeholder="Enter email" name="email" v-model="email">
                <p class="text-danger" v-if="errors.has('email')">{{ errors.first('email') }}</p>
            </div>
            <div class="form-group" :class="{'has-error': errors.has('password') }" >
                <input type="password" v-validate="'required|min:3'" class="form-control" placeholder="Enter password" name="password" v-model="password">
                <p class="text-danger" v-if="errors.has('password')">{{ errors.first('password') }}</p>
            </div> 
            <div class="form-group" :class="{'has-error': errors.has('password_confirmation') }" >   
                <input type="password" v-validate="'required|confirmed:password'" class="form-control" placeholder="Enter password" name="password_confirmation">
                <p class="text-danger" v-if="errors.has('password_confirmation')">{{ "Las contraseñas no coinciden" }}</p>
            </div>
            <button class="btn btn-primary submit" @click="registro()">Sign up</button>
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
                    this.$router.push('/');
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
    h1{
        text-align: center;
        margin-bottom:20px;
    }
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