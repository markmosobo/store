import {  createRouter, createWebHistory  } from 'vue-router';
import Index from '../views/Index.vue'
import Categories from '../views/categories/Categories.vue'
import Suppliers from '../views/suppliers/Suppliers.vue'
import Purchases from '../views/purchases/Purchases.vue'
import Users from '../views/users/Users.vue'
import Products from '../views/products/Products.vue'
import Restocked from '../views/products/Restocked.vue'
import AddCategory from '../views/categories/AddCategory.vue'
import AddSupplier from '../views/suppliers/AddSupplier.vue'
import AddProduct from '../views/products/AddProduct.vue'
import AddPurchase from '../views/purchases/AddPurchase.vue'
import RestockProduct from '../views/products/RestockProduct.vue'
import ViewProduct from '../views/products/ViewProduct.vue'
import EditProduct from '../views/products/EditProduct.vue'
import EditCategory from '../views/categories/EditCategory.vue'
import EditSupplier from '../views/suppliers/EditSupplier.vue'
import AddUser from '../views/users/AddUser.vue'
import EditUser from '../views/users/EditUser.vue'
import ViewUser from '../views/users/ViewUser.vue'
import Login from '../views/Login.vue'
import Profile from '../views/Profile.vue'


const routes = [
    {
        path:'/dashboard',
        name: 'index',
        component: Index
    },
    {
        path:'/login',
        name: 'login',
        component: Login
    },
    {
        path:'/profile',
        name: 'profile',
        component: Profile
    },
    {
        path:'/products',
        name: 'products',
        component: Products
    },
    {
        path:'/restocked',
        name: 'restocked',
        component: Restocked
    },
    {
        path:'/add-product',
        name: 'add-product',
        component: AddProduct
    },
    {
        path:'/categories',
        name: 'categories',
        component: Categories
    },
    {
        path:'/add-category',
        name: 'add-category',
        component: AddCategory
    },
    {
        path:'/add-user',
        name: 'add-user',
        component: AddUser
    },
    {
        path:'/suppliers',
        name: 'suppliers',
        component: Suppliers
    },
    {
        path:'/users',
        name: 'users',
        component: Users
    },
    {
        path:'/add-supplier',
        name: 'add-supplier',
        component: AddSupplier
    },
    {
        path:'/purchases',
        name: 'purchases',
        component: Purchases
    },
    {
        path:'/purchaseproduct/:id',
        name: 'purchase-product',
        component: AddPurchase
    },
    {
        path:'/restockproduct/:id',
        name: 'restock-product',
        component: RestockProduct
    },
    {
        path:'/viewproduct/:id',
        name: 'view-product',
        component: ViewProduct
    },
    {
        path:'/editproduct/:id',
        name: 'edit-product',
        component: EditProduct
    },
    {
        path:'/editcategory/:id',
        name: 'edit-category',
        component: EditCategory
    },
    {
        path:'/editsupplier/:id',
        name: 'edit-supplier',
        component: EditSupplier
    },
    {
        path:'/viewuser/:id',
        name: 'view-user',
        component: ViewUser
    },
    {
        path:'/edituser/:id',
        name: 'edit-user',
        component: EditUser
    },

];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

export default router;