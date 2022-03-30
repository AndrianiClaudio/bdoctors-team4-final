/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


// IMPORT COMPONENTS
import App from './view/App.vue';
import Home from './pages/Home.vue';
import Doctor from './pages/Doctor.vue';
// IMPORT ROUTER ... NEXT
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
        routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            
        },
        {
            path: '/doctor/:slug',
            name: 'doctor',
            props: true,
            component: Doctor,
            
        },
        
    ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
