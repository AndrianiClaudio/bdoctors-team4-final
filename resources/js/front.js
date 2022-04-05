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
import Message from './pages/Message.vue';
import Review from './pages/Review.vue';
import ProvaApi from './pages/ProvaApi.vue';
import FilterSpec from './pages/Filter.vue';
// import Navbar from './components/Navbar.vue';

import Checkout from './view/checkout.vue';
import Subscriptions from './pages/Subscriptions.vue';


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
        {
            path: '/doctor/:slug/message',
            name: 'message',
            props: true,
            component: Message,
            
        },
        {
            path: '/doctor/:slug/review',
            name: 'review',
            props: true,
            component: Review,
            
        },
        {
            path: '/provaApi',
            name: 'ProvaApi',
            props: true,
            component: ProvaApi,
            
        },
        {
            path: '/filter',
            name: 'filter',
            query: true,
            component: FilterSpec,
            
            },
            {
                // se funziona cambierei in dashboard/subscriptions
                path: '/checkout',
                name: 'checkout',
                component: Checkout,
            },
            {
                // se funziona cambierei in dashboard/subscriptions
                path: '/dashboard/subscriptions',
                name: 'subscriptions',
                component: Subscriptions,
            },
        
    ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
