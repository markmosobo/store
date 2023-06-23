<template>
    <TheMaster>
        <section v-show="user.role == 'admin'" class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li>
                            <router-link to="/purchasestoday" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            Today</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/purchasesweek" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                                This Week</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/purchasesmonth" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            This Month</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/purchasesyear" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            This Year</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/purchasesall" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            All Time</a>
                            </router-link>
                        </li>
                    </ul>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">Sales <span>| Today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <!--increase-->
                        <h6>{{todaypurchases.length}}</h6>
                        <span v-if="todaypurchases.length > yesterdaypurchases.length" class="text-success small pt-1 fw-bold">{{salespercentage}}%</span>
                        <span v-if="todaypurchases.length > yesterdaypurchases.length" class="text-muted small pt-2 ps-1">increase</span>
                        <!--decrease-->
                        <span v-if="todaypurchases.length < yesterdaypurchases.length" class="text-danger small pt-1 fw-bold">{{salespercentage}}%</span>
                        <span v-if="todaypurchases.length < yesterdaypurchases.length" class="text-muted small pt-2 ps-1">decrease</span>

                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li>
                            <router-link to="/revenuetoday" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            Today</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/revenueweek" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                                This Week</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/revenuemonth" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            This Month</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/revenueyear" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            This Year</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/revenueall" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            All Time</a>
                            </router-link>
                        </li>
                    </ul>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">Revenue <span>| Today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                        <h6>KES. {{todayrevenue.toLocaleString()}}</h6>
                        <span v-if="todayrevenue > yesterdayrevenue" class="text-success small pt-1 fw-bold">{{revenuepercentage}}%</span>
                        <span v-if="todayrevenue > yesterdayrevenue" class="text-muted small pt-2 ps-1">increase</span>
                        <!--decrease-->
                        <span v-if="todayrevenue < yesterdayrevenue" class="text-danger small pt-1 fw-bold">{{revenuepercentage}}%</span>
                        <span v-if="todayrevenue < yesterdayrevenue" class="text-muted small pt-2 ps-1">decrease</span>


                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li>
                            <router-link to="/products" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            All Products</a>
                        </router-link>
                        </li>
                        <li>
                            <router-link to="/restockedtoday" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            Restocked Today</a>
                        </router-link>
                        </li>
                        <li>
                            <router-link to="/restocked" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            All Restocks</a>
                        </router-link>
                        </li>
                    </ul>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">Products <span>| Products in the building today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{products.length}}</h6>
                        <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                        </div>
                    </div>

                    </div>
                </div>

                </div><!-- End Customers Card -->


            </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

            <!-- Recent Activity -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body">
                <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                <div class="activity">

                    <div v-for="activity in activities" :key="activity.id" class="activity-item d-flex">
                    <div class="activite-label">{{dateTime(activity.created_at)}}</div>
                    <i v-if="activity.status == 1" class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                    <i v-if="activity.status == 2" class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
                    <i v-if="activity.status == 3" class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                    <i v-if="activity.status == 4" class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
                    <i v-if="activity.status == 5" class="bi bi-circle-fill activity-badge text-warning align-self-start"></i>
                    <i v-if="activity.status == 6" class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                    <div class="activity-content">
                        <a href="#" class="fw-bold text-dark">{{activity.user['first_name']}} {{activity.user['last_name']}}</a> {{activity.description}}
                    </div>
                    </div><!-- End activity item-->




                </div>

                </div>
            </div><!-- End Recent Activity -->



            </div><!-- End Right side columns -->

        </div>
        </section>

        <section v-show="user.role == 'user'" class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">Sales <span>| Today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{mytodaypurchases.length}}</h6>
                        <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">Revenue <span>|My Collection Today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                        <h6>KES. {{mytodayrevenue}}</h6>
                        <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">Products <span>| Products in the building today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{products.length}}</h6>
                        <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                        </div>
                    </div>

                    </div>
                </div>

                </div><!-- End Customers Card -->


            </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

            <!-- Recent Activity -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body">
                <h5 class="card-title">My Recent Activity <span>| Today</span></h5>

                <div class="activity">

                    <div v-for="activity in activities" :key="activity.id" class="activity-item d-flex">
                    <div class="activite-label">{{dateTime(activity.created_at)}}</div>
                    <i v-if="activity.status == 1" class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                    <i v-if="activity.status == 2" class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
                    <i v-if="activity.status == 3" class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                    <i v-if="activity.status == 4" class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
                    <i v-if="activity.status == 5" class="bi bi-circle-fill activity-badge text-warning align-self-start"></i>
                    <i v-if="activity.status == 6" class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                    <div class="activity-content">
                        <a href="#" class="fw-bold text-dark">{{activity.user['first_name']}} {{activity.user['last_name']}}</a> {{activity.description}}
                    </div>
                    </div><!-- End activity item-->




                </div>

                </div>
            </div><!-- End Recent Activity -->



            </div><!-- End Right side columns -->

        </div>
        </section>

        <section v-show="user.role == 'storekeeper'" class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li>
                            <router-link to="/mypurchasestoday" custom v-slot="{ href, navigate, isActive }">
                            <a
                                :href="href"
                                :class="{ active: isActive }"
                                class="dropdown-item"
                                @click="navigate"
                            >
                            Today</a>
                            </router-link>
                        </li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">My Sales <span>| Today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{mytodaypurchases.length}}</h6>
                        <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">Revenue <span>| My Collection Today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                        <h6>KES. {{mytodayrevenue}}</h6>
                        <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">Products <span>| Products in the building today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                        <h6>{{products.length}}</h6>
                        <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                        </div>
                    </div>

                    </div>
                </div>

                </div><!-- End Customers Card -->


            </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

            <!-- Recent Activity -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body">
                <h5 class="card-title">My Recent Activity <span>| Today</span></h5>

                <div class="activity">

                    <div v-for="activity in activities" :key="activity.id" class="activity-item d-flex">
                    <div class="activite-label">{{dateTime(activity.created_at)}}</div>
                    <i v-if="activity.status == 1" class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                    <i v-if="activity.status == 2" class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
                    <i v-if="activity.status == 3" class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                    <i v-if="activity.status == 4" class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
                    <i v-if="activity.status == 5" class="bi bi-circle-fill activity-badge text-warning align-self-start"></i>
                    <i v-if="activity.status == 6" class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                    <div class="activity-content">
                        <a href="#" class="fw-bold text-dark">{{activity.user['first_name']}} {{activity.user['last_name']}}</a> {{activity.description}}
                    </div>
                    </div><!-- End activity item-->




                </div>

                </div>
            </div><!-- End Recent Activity -->



            </div><!-- End Right side columns -->

        </div>
        </section>

    </TheMaster>
</template>

<script>
import TheMaster from '@/components/TheMaster.vue';
import "jquery/dist/jquery.min.js";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
import moment from 'moment';
  
import axios from 'axios';
import Swal from 'sweetalert2';


const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.toast = toast;
export default({
    data(){
        return {
            products: [],
            restocked: [],
            suppliers: [],
            users: [],
            todayrevenue: [],
            yesterdayrevenue: [],
            todaypurchases: [],
            yesterdaypurchases: [],
            activities: [],
            mytodaypurchases: [],
            myyesterdaypurchases: [],
            mytodayrevenue: [],
            myyesterdayrevenue: [],
            myrevenuepercentage: [],
            mysalespercentage: [],
            myrecentactivities: [],
            user: [],
            salespercentage: [],
            revenuepercentage: []
        }
    },
    components: {
        TheMaster
    },
    methods: {
        dateTime(value) {
        return moment(String(value)).format('LT');
        },
        navigateTo(location){
            this.$router.push(location)
        },
        format_date(value){
          if(value){
            return moment(String(value)).format('MMM Do YYYY')
          }
        },
        getPhoto()
        {
            return "products/";
        },
        getData(){
            axios.get('api/mypurchases').then((response) => {
                this.mytodaypurchases = response.data.lists.mytodaypurchases;
                this.myyesterdaypurchases = response.data.lists.myyesterdaypurchases;
                this.mytodayrevenue = response.data.lists.mytodayrevenue;
                this.myyesterdayrevenue = response.data.lists.myyesterdayrevenue;
                console.log("mytodaypurchases",response)
            }).catch((error) => {
                console.log(error)
            });
            axios.get('api/myrevenue/'+this.user.id).then((response) => {
                this.mytodayrevenue = response.data.mytodayrevenue;
            }).catch((error) => {
                console.log(error)
            });
        },
        loadLists(){
            axios.get('api/lists').then((response) => {
                this.products = response.data.lists.products
                this.restocked = response.data.lists.restocked;
                this.suppliers = response.data.lists.suppliers;
                this.todaypurchases = response.data.lists.todaypurchases;
                this.yesterdaypurchases = response.data.lists.yesterdaypurchases;
                this.todayrevenue = response.data.lists.todayrevenue;
                this.yesterdayrevenue = response.data.lists.yesterdayrevenue;
                this.users = response.data.lists.users;
                this.activities = response.data.lists.activities;
                setTimeout(() => {
                 $("#allProductsTable").DataTable();
                }, 10);
                this.salesdifference = this.todaypurchases.length - this.yesterdaypurchases.length;
                this.salespercentage = 100 * (this.salesdifference/this.yesterdaypurchases.length);
                this.salespercentage = Number(this.salespercentage).toFixed(2);

                this.revenuedifference = this.todayrevenue - this.yesterdayrevenue;
                this.revenuepercentage = 100 * (this.revenuedifference/this.yesterdayrevenue);
                this.revenuepercentage = Number(this.revenuepercentage).toFixed(2);

            }).catch((error) => {
                console.log(error)
            });
        },
    },
    mounted(){
        this.loadLists();
        this.getData();
        this.user = JSON.parse(localStorage.getItem('user'));
    }

})
</script>