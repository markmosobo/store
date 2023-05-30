import {  createRouter, createWebHistory  } from 'vue-router';
import Index from '../views/Index.vue'
import Categories from '../views/categories/Categories.vue'
import Suppliers from '../views/suppliers/Suppliers.vue'
import Purchases from '../views/purchases/Purchases.vue'
import AddCategory from '../views/categories/AddCategory.vue'
import AddSupplier from '../views/suppliers/AddSupplier.vue'
import AddProduct from '../views/products/AddProduct.vue'
import AddPurchase from '../views/purchases/AddPurchase.vue'
import RestockProduct from '../views/products/RestockProduct.vue'


const routes = [
    {
        path:'/',
        name: 'index',
        component: Index
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
        path:'/suppliers',
        name: 'suppliers',
        component: Suppliers
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
        path:'/purchases/:id',
        name: 'add-purchases',
        component: AddPurchase
    },
    {
        path:'/restockproduct/:id',
        name: 'restock-product',
        component: RestockProduct
    },

];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

export default router;