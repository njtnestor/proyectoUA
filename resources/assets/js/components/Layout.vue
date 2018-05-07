<template>
    
    <div>
        <b-navbar toggleable="md" type="light" variant="info">
            <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
            <b-navbar-brand href="#"><router-link class="nav-link hom" to="/">DatFood</router-link></b-navbar-brand>
            <b-collapse is-nav id="nav_collapse">
                <b-navbar-nav>
                  <b-nav-item ><router-link class="nav-link nav-links" to="/dashboard">Dashboard</router-link></b-nav-item>
                  <b-nav-item><router-link class="nav-link nav-links" to="/about">About</router-link></b-nav-item>
                </b-navbar-nav>
                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    <div v-if="authenticated && user">
                        <b-nav-item-dropdown right>
                        <!-- Using button-content slot -->
                            <template slot="button-content">
                                <em>{{ user.name }}</em>
                            </template>
                            <b-dropdown-item href="#">Profile</b-dropdown-item>
                            <b-dropdown-item @click="logout">Signout</b-dropdown-item>
                        </b-nav-item-dropdown>
                    </div>
                    <div v-else>
                        <b-navbar-nav>
                            <b-nav-item><router-link class="nav-link nav-links" to="/login" >Login</router-link></b-nav-item>
                            <b-nav-item ><router-link class="nav-link nav-links" to="/registro" >Registro</router-link></b-nav-item>
                        </b-navbar-nav>
                    </div>
                </b-navbar-nav>

              </b-collapse>
        </b-navbar>
        
        <div>
            <router-view ></router-view>
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
        beforeMount() {
            Event.$on('userLoggedIn', () => {
                this.authenticated = true;
                this.user = auth.user;
            });
        },
    }
</script>
<style>

    .hom{
        color: red;
        font-family: myFirstFont;
        font-size: 29px;
        height: 44px; 
        margin-top: -19px;
    }
    .nav-links{
        color:rgb(161, 161, 161) !important;
        font-size: 15px;
    }
    .bg-info{
        background-color: white !important;;
    }

</style>