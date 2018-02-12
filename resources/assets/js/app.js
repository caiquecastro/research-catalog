
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import Vue from 'vue';
import VueTheMask from 'vue-the-mask'
import TableComponent from 'vue-table-component';

/**
 * Install the plugins for Vue. And attach the Vue instance to the page.
 */
Vue.use(TableComponent, {
    filterNoResults: 'Não foram encontrados resultados...',
});
Vue.use(VueTheMask);

const app = new Vue({
    el: '#app'
});
