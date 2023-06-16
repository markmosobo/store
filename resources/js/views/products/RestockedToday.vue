<template>
    <TheMaster>

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
                    <th scope="col">B.Price(KES)</th> 
                    <th scope="col">Supplier</th>               
                    <th scope="col">Restocked By</th>
                    <th scope="col">Date In</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  v-for="product in restockedtoday" :key="product.id" >
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
            restockedtoday: [],
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
                this.restockedtoday = response.data.lists.restockedtoday;
                setTimeout(() => {
                 $("#restockedTable").DataTable();
                }, 10);
            }).catch((error) => {
                console.log(error)
            });
        },
    },
    mounted(){
        this.loadLists();
        this.user = JSON.parse(localStorage.getItem('user'));
    }
})
</script>