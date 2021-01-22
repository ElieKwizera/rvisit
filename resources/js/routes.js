import VueRouter from 'vue-router';
import HomeComponent from './pages/Home';
import Cart from './pages/Cart'
import BookablePage from './pages/BookablePage'
const routes  = [

    {
        path:"/",
        component:HomeComponent,
        name: "Home"
    },
    {
        path:"/cart",
        component:Cart,
        name:"cart"
    },
    {
        path:"/bookables/:id",
        component:BookablePage,
        name:"BookablePage"
    }
];

const router = new VueRouter(
    {
        routes,
        mode:"history"
    }
)
export default router;