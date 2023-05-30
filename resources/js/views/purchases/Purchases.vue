<template>
    <TheMaster>
        <section class="section dashboard">
        <div class="row">
            <!-- Checked in visitors -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">

                <h5 class="card-title">All Products <span>| Products in the building today</span></h5>

                <table id="allProductsTable" class="table table-borderless datatable">
                <thead>
                    <tr>
                    <!-- <th scope="col">No</th> -->
                    <th scope="col">Name</th>
                    <th scope="col">Size</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>                
                    <th scope="col">Check In By</th>
                    <th scope="col">Time In</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  v-for="product in products" :key="product.id" >
                    <!-- <th scope="col">{{visit.id}}</th> -->
                    <td scope="col">{{product.name}}</td>
                    <td scope="col">{{product.size}}</td>
                    <td scope="col">{{product.quantity}}</td>
                    <td scope="col">{{product.price}}</td>
                    <td scope="col">Global Admin</td>                
                    <td scope="col">{{product.updated_at}}</td>
                    <td>
                        <button @click="checkoutProduct(product.id)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal28">
                            Checkout</button>
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
    </TheMaster>
</template>
<script>
import TheMaster from '@/components/TheMaster.vue';
import "jquery/dist/jquery.min.js";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
  
import axios from 'axios';
export default({
    data(){
        return {
            products: [],
            checkedout: []
        }
    },
    components: {
        TheMaster
    },
    methods: {
        loadLists(){
            axios.get('api/lists').then((response) => {
                this.products = response.data.lists.products
                console.log(this.products)
                setTimeout(() => {
              $("#allProductsTable").DataTable();
          }, 10);
            })
        },
        checkoutProduct(id){
            this.$router.push('/purchases/'+id)
        }
    },
    mounted(){
        this.loadLists();
    }
})
</script>