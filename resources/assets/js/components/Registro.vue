<template>
    <div>
        <h1>Registro</h1>
        

        
        <p>
            <label for="name">Nombre</label>

            <input type="text" name="name" v-model="name">
        </p>
        <p>
            <label for="re">Email</label>

            <input type="text" name="email" v-model="email">
        </p>
        <p>
            <label for="password">Password</label>

            <input type="password" name="password" v-model="password">
        </p>

        <button @click="registro">Crear cuenta</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
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
        }
    }
}
</script>