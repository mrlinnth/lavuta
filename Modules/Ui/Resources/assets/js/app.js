require('./bootstrap');

window.Vue = require('vue');

Vue.component('ui-example-component', require('./components/UiExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});