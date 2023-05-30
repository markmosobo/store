<template>
    <TheMaster>
        <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
            <div class="row">

                <!-- Clients Card -->
                <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                    <h5 class="card-title">All Products <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                        <h6>
                            9  </h6>
                            <!--  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Clients Card -->

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                    <h5 class="card-title">Checked in <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-check-circle fs-3"></i>

                        </div>
                        <div class="ps-3">
                        <h6>
                            0   
                        </h6>
                        <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>  -->

                        </div>
                    </div>
                    </div>

                </div>
                </div> 
                <!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                    <h5 class="card-title">Checked out <span>| This Month</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-check-circle"></i>

                        </div>
                        <div class="ps-3">
                        <h6>9</h6>
                    <!--   <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                        </div>
                    </div>
                    </div>

                </div>

                </div><!-- End Revenue Card -->

        
            </div>
            <div class="row">
            </div>
            </div><!-- End Left side columns -->
        </div>
        </section>

        <section class="section dashboard">
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
                    <th scope="col">Size</th>
                    <th scope="col">Pieces</th>
                    <th scope="col">B.Price(KES)</th>                
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
                    <td scope="col">{{product.size}}</td>
                    <td scope="col">{{product.pieces}}</td>
                    <td scope="col">{{product.buying_price}}</td>
                    <td scope="col">Global Admin</td>                
                    <td scope="col">{{format_date(product.created_at)}}</td>
                    <td>
                        <button @click="restockProduct(product.id)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal28">
                            Restock</button>
                    </td>
                    </tr>
                </tbody>
                </table>
                </div>
                </div>
            </div>
            <!--End Checked in visitors -->
        </div>
        </section> 

        <section class="section dashboard">
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
                    <th scope="col">Name</th>
                    <th scope="col">Pieces</th>
                    <th scope="col">Price(KES)</th>                
                    <th scope="col">Restocked By</th>
                    <th scope="col">Date In</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  v-for="product in restocked" :key="product.id" >
                    <!-- <th scope="col">{{visit.id}}</th> -->
                    <td scope="col">{{product.name}}</td>
                    <td scope="col">{{product.pieces}}</td>
                    <td scope="col">{{product.buying_price}}</td>
                    <td scope="col">Global Admin</td>                
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
export default({
    data(){
        return {
            products: [],
            restocked: []
        }
    },
    components: {
        TheMaster
    },
    methods: {
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
                this.restocked = response.data.lists.restocked
                console.log(this.products)
                setTimeout(() => {
                 $("#allProductsTable").DataTable();
                }, 10);
                setTimeout(() => {
                 $("#restockedTable").DataTable();
                }, 10);
            })
        },
        restockProduct(id){
            this.$router.push('/restockproduct/'+id)
        }
    },
    mounted(){
        this.loadLists();
    }
})
</script>