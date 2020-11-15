import Vue from 'vue';
import route from "./router";
import App from './components/App';
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import CxltToastr from 'cxlt-vue2-toastr';
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css'
Vue.use(CxltToastr);
var toastrConfigs = {
    position: 'top right',
    showDuration: 2000
};
Vue.use(CxltToastr, toastrConfigs);
require('./bootstrap');

const app = new Vue({
    el: '#app',
    router:route,
    render: h => h(App),
});
