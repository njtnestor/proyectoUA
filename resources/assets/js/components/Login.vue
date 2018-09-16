<template>
    <div class="login">
        <h1>Login</h1>
        <input type="text" class="form-control" placeholder="Enter email" name="username" v-model="username">
        <input type="password" class="form-control" placeholder="Enter contraseña" name="password" v-model="password">
        <button-spinner v-on:click.native="login" class="btn btn-primary submit"
	        :is-loading="isLoading" 
	        :status="status">
            Lets go!
	        
        </button-spinner>
        <h7><router-link to="/registro"> Create an account</router-link></h7>

    </div>
</template>

<script>

import ButtonSpinner from 'vue-button-spinner';
export default {
    components: {
        ButtonSpinner
    },
    data() {
        return {
            username: '',
            password: '',
            isLoading: false,
			status: '',
        };
    },
    methods: {
        login() {
            this.isLoading=true
            let data = {
                username: this.username,
                password: this.password
            };

            axios.post('/api/login', data)
                .then(({data}) => {
                    
                    //this.status=false
                    auth.login(data.token, data.user);
                    this.$router.push('/');
                })
                .catch(({response}) => {   
                    this.isLoading= false,                 
                    alert(response.data.message);
                });
        }
    },

}
</script>
<style scoped>
    .form-control{
        margin-bottom:20px;
    }
    .login{
        box-shadow: 0 0 0 1px #eaeaea;
        padding: 32px;
        max-width: 340px;
        margin: 0 auto;
        margin-top: 50px;
        text-align: center;
    }
    .submit{
        width: 100%;
        color: #fff !important;
        background-color: #007bff !important;
        border-color: #007bff !important;
    }
</style>

