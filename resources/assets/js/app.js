
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import router from './routes.js';
import VueRouter from 'vue-router';
import Api from './api.js';
import Auth from './auth.js';


import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue'
import VeeValidate from 'vee-validate';
import Vueclickaway from 'vue-clickaway';


Vue.use(BootstrapVue);
Vue.use(VeeValidate);
Vue.use(Vueclickaway);

window.api = new Api();
require('./bootstrap');
window.Vue = require('vue'); // requiring the Vue

Vue.use(VueRouter);
window.Event = new Vue;




window.auth =  new Auth();

window.Vue = require('vue');




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('vue-layout', require('./components/Layout.vue'));
const app = new Vue({
    el: '#app',
    router
});
