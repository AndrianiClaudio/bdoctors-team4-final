/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Checkout from './view/checkout.vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
        routes: [
        {
            path: '/checkout',
            name: 'checkout',
            component: Checkout,
            
        },
    ]
});

const checkout = new Vue({
    el: '#checkout',
    render: h => h(Checkout),
    router
});
