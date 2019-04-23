/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.flash = function(message) {
    window.events.$emit('flash',message);
}

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

Vue.component('flash', require('./components/Flash.vue'));

import App from './components/App'
import List from './components/List'
import New from './components/New'
import Edit from './components/Edit'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'list',
            component: List
        },
        {
            path: '/new',
            name: 'new',
            component: New,
        },
        {
            path: '/edit',
            name: 'edit',
            component: Edit,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
