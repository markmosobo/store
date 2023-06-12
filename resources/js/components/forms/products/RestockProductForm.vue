<template>
    <div class="container mt-3">
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Product Details</h5>
                    <p class="card-text">
                      Product Name: <strong>{{ product.name }} </strong><br>
                      Available Pieces: <strong> {{ product.pieces }}</strong> <br>
                      Current Price: <strong>KES.  {{ product.buying_price }}</strong><br>
                      <!-- <strong>Checked in by:</strong>  {{ product.user_first_name }} {{ product.user_last_name }}<br> -->
                      Date In: <strong>  {{ format_date(product.created_at) }}</strong> <br>
                      <h5 class="card-title">Restock Details</h5>
                      <form @submit.prevent="submit()" class="row g-3">
                        <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">Pieces Bought</label>
                        <input type="number" v-model="form.pieces" class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Buying Price</label><br>
                        <input type="number" v-model="form.buying_price" class="form-control" id="inputEmail5">
                        </div>
                        <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">Supplier</label>
                        <select name="location" v-model="form.supplier_id" class="form-select" id="">
                            <option value="0" disabled selected>Select Supplier</option>
                            <option v-for="supplier in suppliers" :value="supplier.id"
                            :selected="supplier.id == form.supplier_id" :key="supplier.id">{{ supplier.name}}</option>
 
                         </select>
                        </div>
                        <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Comments</label>
                        <input type="text" v-model="form.comments" class="form-control" id="inputPassword5" placeholder="Comments(optional)">
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" @click="reset()" class="btn btn-secondary">Reset</button>
                        </div>
                      </form>

                    </p>
                  </div>
                </div>

              </div>
              <div class="col-lg-6">
                <div class="card mt-3">
                  <div class="card-body">
                    <h5 class="card-title">Product Photo</h5>
                    <img :src="getPhoto() + product.image" class="img-thumbnail avatar"  alt="Product Image">                 


                  </div>
                </div>
              </div>
              


              
            </div>
    </div>
</template>

<script>
import moment from 'moment';
  
import axios from 'axios';
export default {
    data(){
        return {
            product: [],
            suppliers: [],
            form: {
              buying_price: '',
              pieces: '',
              supplier_id: '',
              created_by: ''
            }
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
            axios.get('/api/products/'+this.$route.params.id).then((response) => {
                this.product = response.data.product
                this.current_bp = this.product.buying_price;
                this.form.buying_price=this.current_bp;
                this.pieces = this.product.pieces;
                // this.supplier = this.product.supplier
                console.log(this.pieces)
            })
        },
        loadSuppliers(){
          axios.get('/api/suppliers').then((response) => {
            this.suppliers = response.data.data
            console.log(response)
          })
        },
        submit(){
          const payload = {
            id: this.$route.params.id,
            buying_price: this.form.buying_price,
            supplier_id: this.form.supplier_id,
            pieces : this.product.pieces + this.form.pieces,
            newpieces : this.form.pieces,
            created_by: this.user.id
          };
          axios.post('/api/restockproducts/'+this.$route.params.id, payload).then((response) => {
            toast.fire(
                'Success!',
                'Product restocked!',
                'success'
             )
          }).catch((error) => {
            console.log(error)
          });
          this.$router.push('/products')

        },
        cancel(){

        }
    },
    mounted(){
        this.getData();
        this.loadSuppliers();
        this.user = JSON.parse(localStorage.getItem('user'));
        console.log("user",this.user)
        this.form.created_by = this.user.id;

    }
}
</script>