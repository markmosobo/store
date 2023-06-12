<template>
    <TheMaster>
        <div class="container mt-3">
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">User Details</h5>
                    <p class="card-text">
                      User ID: <strong>{{ user.id }} </strong><br>
                      Full Name: <strong> {{ user.first_name }} {{ user.last_name }} </strong><br>
                      Phone No: <strong>  {{ user.phone ?? 'N/A' }}</strong><br>
                      Email Address: <strong>  {{ user.email ?? 'N/A' }}</strong> <br>
                      Role: <strong> {{ user.role }}</strong> <br>
                      Added On: <strong> {{ format_date(user.created_at) }}</strong> <br>
                    </p>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Photo</h5>
                    <!-- <img :src="getPhoto() + product.image" class="img-thumbnail avatar"  alt="Product Image"> -->

                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                    <ul class="list-group">
                     <li v-for="activity in activities" :key="activity.id" class="list-group-item"> {{activity.description}} at {{activity.created_at}} </li>
    
                    </ul>
                  </div>
                </div>
              </div> 
              
              
            </div>
        </div>
    </TheMaster>
</template>

<script>
import TheMaster from "@/components/TheMaster.vue";
import axios from "axios";
import moment from 'moment';

export default {
   components : {
       TheMaster,
   },
   data() {
    return {
        user: [],
        activities: []
    }
   },
   methods: {
    format_date(value){
        if(value){
          return moment(String(value)).format('MMM Do YYYY')
        }
      },
    getPhoto()
    {
        return "/products/";
    },
    getData(){
      axios.get('/api/users/'+this.$route.params.id, {
      }).then((response) => {
          this.user = response.data.user
          console.log("data", response)
      })
    },
    loadLists(){
        axios.get('/api/activities/'+this.$route.params.id,{

        }).then((response) => {
            this.activities = response.data.activities;
            console.log("activities",response)
        })
    }
   },
   mounted(){
    this.getData();
    this.loadLists();
   }
}
</script>