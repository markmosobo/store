import {  createRouter, createWebHistory  } from 'vue-router';
import Index from '../views/Index.vue'
import Categories from '../views/categories/Categories.vue'
import Suppliers from '../views/suppliers/Suppliers.vue'
import Purchases from '../views/purchases/Purchases.vue'
import Users from '../views/users/Users.vue'
import Products from '../views/products/Products.vue'
import Restocked from '../views/products/Restocked.vue'
import RestockedToday from '../views/products/RestockedToday.vue'
import AddCategory from '../views/categories/AddCategory.vue'
import AddSupplier from '../views/suppliers/AddSupplier.vue'
import AddProduct from '../views/products/AddProduct.vue'
import AddPurchase from '../views/purchases/AddPurchase.vue'
import RestockProduct from '../views/products/RestockProduct.vue'
import ViewProduct from '../views/products/ViewProduct.vue'
import ViewProductHistory from '../views/products/ViewProductHistory.vue'
import EditProduct from '../views/products/EditProduct.vue'
import EditCategory from '../views/categories/EditCategory.vue'
import EditSupplier from '../views/suppliers/EditSupplier.vue'
import AddUser from '../views/users/AddUser.vue'
import EditUser from '../views/users/EditUser.vue'
import ViewUser from '../views/users/ViewUser.vue'
import ViewUserActivity from '../views/users/ViewUserActivity.vue'
import Login from '../views/Login.vue'
import Profile from '../views/Profile.vue'
import TodayPurchases from '../views/purchases/TodayPurchases.vue'
import WeekPurchases from '../views/purchases/WeekPurchases.vue'
import MonthPurchases from '../views/purchases/MonthPurchases.vue'
import YearPurchases from '../views/purchases/YearPurchases.vue'
import QuarterlyPurchases from '../views/purchases/QuarterlyPurchases.vue'
import AllPurchases from '../views/purchases/AllPurchases.vue'
import TwentyFourPurchases from '../views/purchases/TwentyFourPurchases.vue'
import YesterdayPurchases from '../views/purchases/YesterdayPurchases.vue'
import LastSevenPurchases from '../views/purchases/LastSevenPurchases.vue'
import LastThirtyPurchases from '../views/purchases/LastThirtyPurchases.vue'
import LastNinetyPurchases from '../views/purchases/LastNinetyPurchases.vue'
import LastMonthPurchases from '../views/purchases/LastMonthPurchases.vue'
import LastYearPurchases from '../views/purchases/LastYearPurchases.vue'
import TodayRevenue from '../views/purchases/TodayRevenue.vue'
import WeekRevenue from '../views/purchases/WeekRevenue.vue'
import MonthRevenue from '../views/purchases/MonthRevenue.vue'
import YearRevenue from '../views/purchases/YearRevenue.vue'
import QuarterlyRevenue from '../views/purchases/QuarterlyRevenue.vue'
import AllRevenue from '../views/purchases/AllRevenue.vue'
import TwentyFourRevenue from '../views/purchases/TwentyFourRevenue.vue'
import YesterdayRevenue from '../views/purchases/YesterdayRevenue.vue'
import LastSevenRevenue from '../views/purchases/LastSevenRevenue.vue'
import LastThirtyRevenue from '../views/purchases/LastThirtyRevenue.vue'
import LastNinetyRevenue from '../views/purchases/LastNinetyRevenue.vue'
import LastMonthRevenue from '../views/purchases/LastMonthRevenue.vue'
import LastYearRevenue from '../views/purchases/LastYearRevenue.vue'
import MyTodayPurchases from '../views/purchases/MyTodayPurchases.vue'

const routes = [
    {
        path:'/',
        name: 'welcome',
        component: Login
    },
    {
        path:'/dashboard',
        name: 'dashboard',
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
        path:'/restockedtoday',
        name: 'restockedtoday',
        component: RestockedToday
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
        path:'/viewproducthistory/:id',
        name: 'view-producthistory',
        component: ViewProductHistory
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
        path:'/viewuseractivity/:id',
        name: 'view-useractivity',
        component: ViewUserActivity
    },
    {
        path:'/edituser/:id',
        name: 'edit-user',
        component: EditUser
    },
    {
        path:'/purchasestoday',
        name: 'purchasestoday',
        component: TodayPurchases
    },
    {
        path:'/purchasesweek',
        name: 'purchasesweek',
        component: WeekPurchases
    },
    {
        path:'/purchasesmonth',
        name: 'purchasesmonth',
        component: MonthPurchases
    },
    {
        path:'/purchasesyear',
        name: 'purchasesyear',
        component: YearPurchases
    },
    {
        path:'/purchasesquarter',
        name: 'purchasesquarter',
        component: QuarterlyPurchases
    },
    {
        path:'/purchasesall',
        name: 'purchasesall',
        component: AllPurchases
    },
    {
        path:'/purchasestwentyfour',
        name: 'purchasestwentyfour',
        component: TwentyFourPurchases
    },
    {
        path:'/purchasesyesterday',
        name: 'purchasesyesterday',
        component: YesterdayPurchases
    },
    {
        path:'/purchaseslastseven',
        name: 'purchaseslastseven',
        component: LastSevenPurchases
    },
    {
        path:'/purchaseslastthirty',
        name: 'purchaseslastthirty',
        component: LastThirtyPurchases
    },
    {
        path:'/purchaseslastninety',
        name: 'purchaseslastninety',
        component: LastNinetyPurchases
    },
    {
        path:'/purchaseslastmonth',
        name: 'purchaseslastmonth',
        component: LastMonthPurchases
    },
    {
        path:'/purchaseslastyear',
        name: 'purchaseslastyear',
        component: LastYearPurchases
    },

    {
        path:'/revenuetoday',
        name: 'revenuetoday',
        component: TodayRevenue
    },
    {
        path:'/revenueweek',
        name: 'revenueweek',
        component: WeekRevenue
    },
    {
        path:'/revenuemonth',
        name: 'revenuemonth',
        component: MonthRevenue
    },
    {
        path:'/revenueyear',
        name: 'revenueyear',
        component: YearRevenue
    },
    {
        path:'/revenuequarter',
        name: 'revenuequarter',
        component: QuarterlyRevenue
    },
    {
        path:'/revenueall',
        name: 'revenueall',
        component: AllRevenue
    },
    {
        path:'/revenuetwentyfour',
        name: 'revenuetwentyfour',
        component: TwentyFourRevenue
    },
    {
        path:'/revenueyesterday',
        name: 'revenueyesterday',
        component: YesterdayRevenue
    },
    {
        path:'/revenuelastseven',
        name: 'revenuelastseven',
        component: LastSevenRevenue
    },
    {
        path:'/revenuelastthirty',
        name: 'revenuelastthirty',
        component: LastThirtyRevenue
    },
    {
        path:'/revenuelastninety',
        name: 'revenuelastninety',
        component: LastNinetyRevenue
    },
    {
        path:'/revenuelastmonth',
        name: 'revenuelastmonth',
        component: LastMonthRevenue
    },
    {
        path:'/revenuelastyear',
        name: 'revenuelastyear',
        component: LastYearRevenue
    },

    {
        path:'/mypurchasestoday',
        name: 'mypurchasestoday',
        component: MyTodayPurchases
    },

];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

export default router;