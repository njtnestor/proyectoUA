class Auth {
    constructor() {
        this.token = window.localStorage.getItem('token');
        console.log("constructor")
        console.log(this.token)
        let userData = window.localStorage.getItem('user');
        this.user = userData ? JSON.parse(userData) : null;
        console.log("usuario->")
        console.log(this.user)
        console.log("<-usuario")
            if (this.token) {
                console.log("entraif")
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;
                this.getUser();
            }
    }
    reloadLoged(){
        let userData = window.localStorage.getItem('user');
        this.user = userData ? JSON.parse(userData) : null;
    }
    login (token, user) {        
        window.localStorage.setItem('token', token);
        window.localStorage.setItem('user', JSON.stringify(user));

        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
        
        this.token = token;
        this.user = user;

        Event.$emit('userLoggedIn');
    }
    
    
    logout(){
        window.localStorage.clear();
        
    }
    check () {
        return !! this.token;
    }
    

    getUser() {

        api.call('get', '/api/get-user')
            .then(({user}) => {
                this.user = user;
                console.log("holaname");
                console.log(user);
                console.log("holaname");
            },({error}) => {
                console.log("error")
            })
    }
    

}

export default Auth;