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
                        <h6>{{purchases.length}}</h6>
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
                    <h5 class="card-title">Revenue <span>| Today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                        <h6>KES. {{salestotal}}</h6>
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
                <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                <div class="activity">

                    <div v-for="activity in activities" :key="activity.id" class="activity-item d-flex">
                    <div class="activite-label">{{activity.created_at - new Date()}}</div>
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
            <!-- Checked in visitors -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">

                <h5 class="card-title">All Products <span>| Products in the building today</span></h5>
                <p class="card-text">
                
                <!-- <a href="visitors.php" class="btn btn-primary" >Add Visitor</a> -->
                <router-link to="/add-product" custom v-slot="{ href, navigate, isActive }">
                        <a
                        :href="href"
                        :class="{ active: isActive }"
                        class="btn btn-primary"
                        @click="navigate"
                        >
                        Add Product
                        </a>
                    </router-link>
                </p>
                <table id="allProductsTable" class="table table-borderless datatable">
                <thead>
                    <tr>
                    <th scope="col">Preview</th>
                    <th scope="col">Name</th>
                    <!-- <th scope="col">Size</th> -->
                    <th scope="col">Pieces</th>
                    <th scope="col">B.Price(KES)</th>                
                    <th scope="col">S.Price(KES)</th>                
                    <th scope="col">Added By</th>
                    <th scope="col">Date In</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  v-for="product in products" :key="product.id" >
                    <!-- <th scope="col">{{visit.id}}</th> -->
                    <th scope="row"><a href="#">
                        <img :src="getPhoto() + product.image" />
                    </a></th>
                    <td scope="col">{{product.name}}</td>
                    <!-- <td scope="col">{{product.size}}</td> -->
                    <td scope="col">{{product.pieces}}</td>
                    <td scope="col">{{product.buying_price}}</td>
                    <td scope="col">{{product.selling_price}}</td>
                    <td scope="col">{{product.user['first_name']}} {{product.user['last_name']}}</td>                
                    <td scope="col">{{format_date(product.created_at)}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary rounded-pill dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                <a @click="navigateTo('/viewproduct/'+product.id )" class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                <a @click="navigateTo('/editproduct/'+product.id )" class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                <a @click="restockProduct(product.id)" class="dropdown-item" href="#"><i class="ri-add-fill mr-2"></i>Restock</a>   
                                <a @click="deleteProduct(product.id)" class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>   
                            </div>
                        </div>
                    </td>
                    </tr>
                </tbody>
                </table>
                </div>
                </div>
            </div>
            <!--End Products visitors -->
        </div>
        </section> 

        <section v-show="user.role == 'user'" class="section dashboard">
        <div class="row">

            <!-- Checked out visitors -->
            <div class="col-12">
            <div class="card top-selling overflow-auto">

            <div class="card-body pb-0">

            <h5 class="card-title">Restocked <span>| Products restocked today</span></h5>
            <p class="card-text">
            
            <!-- <a href="visitors.php" class="btn btn-primary" >Add Visitor</a> -->

            </p>
                <table id="restockedTable" class="table table-borderless datatable">
                <thead>
                    <tr>
                    <!-- <th scope="col">No</th> -->
                    <th scope="col">Preview</th>
                    <th scope="col">Name</th>
                    <th scope="col">Pieces</th>
                    <th scope="col">Price(KES)</th> 
                    <th scope="col">Supplier</th>               
                    <th scope="col">Restocked By</th>
                    <th scope="col">Time In</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  v-for="product in restocked" :key="product.id" >
                    <!-- <th scope="col">{{visit.id}}</th> -->
                    <th scope="row"><a href="#">
                        <img :src="getPhoto() + product.product['image']" />
                    </a></th>
                    <td scope="col">{{product.product['name']}}</td>
                    <td scope="col">{{product.pieces}}</td>
                    <td scope="col">{{product.buying_price}}</td>
                    <td scope="col">{{product.supplier['name']}}</td>
                    <td scope="col">{{product.user['first_name']}} {{product.user['last_name']}}</td>                
                    <td scope="col">{{format_date(product.created_at)}}</td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
            </div>
            <!--End Checked out visitors -->
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
            salestotal: [],
            purchases: [],
            activities: [],
            user: []
        }
    },
    components: {
        TheMaster
    },
    methods: {
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
        loadLists(){
            axios.get('api/lists').then((response) => {
                this.products = response.data.lists.products
                this.restocked = response.data.lists.restocked;
                this.suppliers = response.data.lists.suppliers;
                this.purchases = response.data.lists.purchases;
                this.users = response.data.lists.users;
                this.activities = response.data.lists.activities;
                console.log("data" ,this.purchases)
                setTimeout(() => {
                 $("#allProductsTable").DataTable();
                }, 10);
                setTimeout(() => {
                 $("#restockedTable").DataTable();
                }, 10);
            }).catch((error) => {
                console.log(error)
            });
            axios.get('api/salestotal').then((response) => {
                this.salestotal = response.data.total;
                console.log('total',response)
            })
        },
        restockProduct(id){
            this.$router.push('/restockproduct/'+id)
        },
        deleteProduct(id){
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                axios.delete('/api/products/' + id).then(() => {
                    this.loadLists();
                })
                //api goes here
                toast.fire(
                    'Deleted!',
                    'Product has been deleted.',
                    'success'
                )
                setTimeout(() => {
                    this.loadLists();
                    $("#allProductsTable").DataTable();
                }, 2000)
                }
            })
        }
    },
    mounted(){
        this.loadLists();
        this.user = JSON.parse(localStorage.getItem('user'));
    }

})
</script>