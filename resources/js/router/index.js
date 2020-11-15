import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from "../components/ExampleComponent";
import Category from '../category/index';
import Create from '../category/create';
import Edit from '../category/edit';

Vue.use(VueRouter);
const route = new VueRouter({
    mode:'history',
    routes:
    [
        {
            path:'/',
            component:ExampleComponent,
            name:'home',
        },
        {
            path:'/category',
            component:Category,
            name:'category',
        },
        {
            path:'/category/create/',
            component: Create,
            name:'create',
        },
        {
            path:'/category/edit/:id',
            component: Edit,
            name:'edit',
        },

    ]
});

export default route;
