<template>
    <TheMaster>

        <section class="section dashboard">
        <div class="row">

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style="">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li>
                        <router-link to="/purchasestwentyfour" custom v-slot="{ href, navigate, isActive }">
                        <a
                            :href="href"
                            :class="{ active: isActive }"
                            class="dropdown-item"
                            @click="navigate"
                        >
                        Last 24 Hrs</a>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/purchasesyesterday" custom v-slot="{ href, navigate, isActive }">
                        <a
                            :href="href"
                            :class="{ active: isActive }"
                            class="dropdown-item"
                            @click="navigate"
                        >
                        Yesterday</a>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/purchaseslastseven" custom v-slot="{ href, navigate, isActive }">
                        <a
                            :href="href"
                            :class="{ active: isActive }"
                            class="dropdown-item"
                            @click="navigate"
                        >
                        Last 7 Days</a>
                        </router-link>
                    </li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">My Sales <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                        <!--increase-->
                       <h6>{{mytodaypurchases.length}}</h6>
                      <span v-if="mytodaypurchases.length > myyesterdaypurchases.length" class="text-success small pt-1 fw-bold">{{salespercentage}}%</span>
                      <span v-if="mytodaypurchases.length > myyesterdaypurchases.length" class="text-muted small pt-2 ps-1">increase</span>
                      <!--decrease-->
                      <span v-if="mytodaypurchases.length < myyesterdaypurchases.length" class="text-danger small pt-1 fw-bold">{{salespercentage}}%</span>
                      <span v-if="mytodaypurchases.length < myyesterdaypurchases.length" class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Checked out visitors -->
            <div class="col-12">
            <div class="card top-selling overflow-auto">

            <div class="card-body pb-0">

            <h5 class="card-title">My Sales <span>| Products sold today</span></h5>
            <p class="card-text">
            
            <!-- <a href="visitors.php" class="btn btn-primary" >Add Visitor</a> -->

            </p>
                <table id="checkedoutTable" class="table table-borderless datatable">
                <thead>
                    <tr>
                    <!-- <th scope="col">No</th> -->
                    <th scope="col">Preview</th>
                    <th scope="col">Name</th>
                    <th scope="col">Pieces Sold</th>
                    <!-- <th v-show="user.role == 'admin'" scope="col">Amount Payable(KES)</th> 
                    <th scope="col">Amount Paid</th>                -->
                    <th v-show="user.role == 'admin'" scope="col">Check Out By</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Time Out</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  v-for="product in mytodaypurchases" :key="product.id" >
                    <!-- <th scope="col">{{visit.id}}</th> -->
                    <th scope="row"><a href="#">
                        <img :src="getPhoto() + product.product['image']" />
                    </a></th>
                    <td scope="col">{{product.product['name']}}</td>
                    <td scope="col">{{product.pieces}}</td>
                    <!-- <td v-show="user.role == 'admin'" scope="col">{{product.amount_payable}}</td>
                    <td scope="col">{{product.amount_paid}}</td> -->
                    <td v-show="user.role == 'admin'" scope="col">{{product.user['first_name']}} {{product.user['last_name']}}</td>
                    <td scope="col">{{product.comments ?? 'N/A'}}</td>
                    <td scope="col">{{dateTime(product.created_at)}}</td>
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
  
import axios from 'axios';
import moment  from 'moment';
export default({
    data(){
        return {
            mytodaypurchases: [],
            myyesterdaypurchases: [],
            salespercentage: [],
            user: []
        }
    },
    components: {
        TheMaster
    },
    methods: {
        dateTime(value) {
        return moment(String(value)).format('LT');
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
            axios.get('api/mypurchases/'+ this.user.id).then((response) => {
                this.mytodaypurchases = response.data.lists.mytodaypurchases;
                this.myyesterdaypurchases = response.data.lists.myyesterdaypurchases;
                this.salesdifference = this.mytodaypurchases.length - this.myyesterdaypurchases.length;
                this.salespercentage = 100 * (this.salesdifference/this.myyesterdaypurchases.length);
                this.salespercentage = Number(this.salespercentage).toFixed(2);

                setTimeout(() => {
                    $("#checkedoutTable").DataTable();
                }, 10);
            })
        },
        checkoutProduct(id){
            this.$router.push('/purchaseproduct/'+id)
        }
    },
    mounted(){
        this.loadLists();
        this.user = JSON.parse(localStorage.getItem('user'));

    }
})
</script>