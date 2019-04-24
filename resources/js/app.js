require('./bootstrap');

window.Vue = require('vue');

window.flash = function(message) {
  window.events.$emit('flash',message);
};

import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import DatePicker from 'vuejs-datepicker'
Vue.component('date-picker', DatePicker);

import StarRating from 'vue-star-rating'
Vue.component('star-rating', StarRating);

import BeerCard from './components/Beer.vue';
Vue.component('beer-card', BeerCard);

import BeerForm from './components/Form.vue';
Vue.component('beer-form', BeerForm);

import App from './views/App';
import List from './views/List';
import New from './views/New';
import Edit from './views/Edit';

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
      path: '/beers/:id',
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
