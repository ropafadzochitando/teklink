
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// importing vueRouter 
import VueRouter from 'vue-router'

import {Stretch} from 'vue-loading-spinner'
window.Stretch = Stretch;

Vue.use(VueRouter)
// defining routes
let routes = [
    { path: '/movies', component: require('./components/movies/Movies.vue').default },
  //  { path: '/movies', component: require('./components/movies/Search.vue').default },
    { path: '/movie/:id', component: require('./components/movies/Movie.vue').default },
    { path: '/login', component: require('./components/auth/Login.vue').default },
    { path: '/signup', component: require('./components/auth/Signup.vue').default },
  ]
//creating vue router instance and giving it the routs
const router = new VueRouter({
    mode:'history',
    routes
})

require('./imports/filters');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
