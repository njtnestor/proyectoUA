<template>
    <div>
        <div>
            <router-link to="/">Home</router-link>
            <router-link to="/about">About</router-link>
            <router-link to="/dashboard">Dashboard</router-link>
        </div>
        <div v-if="authenticated && user">
            <p>Hello, {{ user.name }}</p>
            <button @click="logout">Logout</button>
            
        </div>
        <div v-else>
            <router-link to="/login" >Login</router-link>
            <router-link to="/registro" >Registro</router-link>
        </div>
        

        <div style="margin-top: 2rem">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                authenticated: auth.check(),
                user: auth.user
            };
        },
        methods: {
            logout(){
                axios.post('/api/logout')
                .then(response=>{
                    auth.logout();
                    //this.authenticated = false;
                    //this.user = null;
                    this.$router.go('/login');
                    console.log(response);
                })            
            }
        },
        mounted() {
            Event.$on('userLoggedIn', () => {
                this.authenticated = true;
                this.user = auth.user;
            });
        },
    }
</script>