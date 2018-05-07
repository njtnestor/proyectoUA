import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./components/Home.vue')
    },
    {
        path: '/about',
        component: require('./components/About.vue')
    },
    {
        path: '/login',
        component: require('./components/Login.vue')
    },
    {
        path: '/registro',
        component: require('./components/Registro.vue')
    },
    {
        path: '/dashboard',
        component: require('./components/Dashboard.vue'),
        meta: { middlewareAuth: true }
    }    

];

/*export default new VueRouter({
    routes
});*/
const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.middlewareAuth)) {                
        if (!auth.check()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            });

            return;
        }
    }

    next();
})

export default router;
