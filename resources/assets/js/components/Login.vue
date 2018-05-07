<template>
    <div class="login">
        <h1>Inicia sesion</h1>
        <input type="text" class="form-control" placeholder="Introduce email" name="username" v-model="username">
        <input type="password" class="form-control" placeholder="Introduce contraseña" name="password" v-model="password">
        <button @click="login" class="btn btn-primary submit">Iniciar sesión</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            username: '',
            password: '',
        };
    },

    methods: {
        login() {
            let data = {
                username: this.username,
                password: this.password
            };

            axios.post('/api/login', data)
                .then(({data}) => {
                    auth.login(data.token, data.user);
                    this.$router.push('/dashboard');
                })
                .catch(({response}) => {                    
                    alert(response.data.message);
                });
        }
    }
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
    }
</style>

