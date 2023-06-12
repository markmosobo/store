<template>
    <TheMaster>

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
                    <!-- <th scope="col">Size</th> -->
                    <th scope="col">Pieces</th>
                    <th scope="col">B.Price(KES)</th>                
                    <th scope="col">S.Price(KES)</th>                
                    <th v-show="user.role == 'admin'" scope="col">Added By</th>
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
                    <td v-show="user.role == 'admin'" scope="col">{{product.user['first_name']}} {{product.user['last_name']}}</td>                
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
                    <th scope="col">Preview</th>
                    <th scope="col">Name</th>
                    <th scope="col">Pieces</th>
                    <th scope="col">Price(KES)</th> 
                    <th scope="col">Supplier</th>               
                    <th v-show="user.role == 'admin'" scope="col">Restocked By</th>
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
                    <td v-show="user.role == 'admin'" scope="col">{{product.user['first_name']}} {{product.user['last_name']}}</td>                
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
                console.log("data" ,this.products)
                setTimeout(() => {
                 $("#allProductsTable").DataTable();
                }, 10);
                setTimeout(() => {
                 $("#restockedTable").DataTable();
                }, 10);
            }).catch((error) => {
                console.log(error)
            });
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