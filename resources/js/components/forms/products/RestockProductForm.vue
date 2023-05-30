<template>
    <div class="container mt-3">
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Product Details</h5>
                    <p class="card-text">
                      <strong>Product Name: </strong>{{ product.name }} <br>
                      <strong>Available Pieces:</strong> {{ product.pieces }} <br>
                      <strong>Current Price:</strong>KES.  {{ product.buying_price }}<br>
                      <!-- <strong>Checked in by:</strong>  {{ product.user_first_name }} {{ product.user_last_name }}<br> -->
                      <strong>Date In:</strong>  {{ format_date(product.created_at) }} <br>
                      <form @submit.prevent="submit()">
                      <div class="row-mb-3">
                        <label for="inputPassword" class="form-label"><strong>Buying Price:</strong></label>
                        <div class="col-sm-10">
                          <input type="number" v-model="form.buying_price" class="form-control" id="inputNanme4">
                          <div class="invalid-feedback">Please enter destination!</div>
                        </div>
                      </div>
                      <div class="row-mb-3">
                        <label for="inputPassword" class="form-label"><strong>Choose Supplier:</strong></label>
                        <div class="col-sm-10">
                          <select name="gate" v-model="form.supplier_id" class="form-select" id="">
                              <option value="" selected>{{product.supplier_id ?? 'Select Supplier'}}</option>
                              <option v-for="supplier in suppliers" :key="supplier.id"
                              :value="product.id"
                              :selected="product.id == form.supplier_id">{{supplier.name}}</option>

                          </select>
                          <div class="invalid-feedback">Please enter destination!</div>
                        </div>
                      </div>
                      <div class="row-mb-3">
                        <label for="inputPassword" class="form-label"><strong>No. of Pieces:</strong></label>
                        <div class="col-sm-10">
                          <input type="number" v-model="form.pieces" class="form-control" id="inputNanme4">
                          <div class="invalid-feedback">Please enter destination!</div>
                        </div>
                      </div>
                      <div class="row mb-3"></div>
                      <div class="col-lg-12 felx mt-4 row">
                          <div class="col-sm-6 col-lg-6">
                          <button @click.prevent="cancel()" class="btn btn-dark">Back</button>
                          </div>
                          <div class="col-sm-6 col-lg-6 text-end">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </div>
                      </form>

                    </p>
                  </div>
                </div>

              </div>
              <div class="col-lg-6">
                <div class="card mt-3">
                  <div class="card-body">
                    <h5 class="card-title">User Details</h5>
                    <p class="card-text">
                      <strong>Name:</strong> {{ product.first_name }} {{ product.last_name }} <br>
                      <strong>Phone Number:</strong> {{ product.phone_number }} <br>
                      <strong>ID Number:</strong>  {{ product.id_no}} <br>
                    </p>
                   


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
              supplier_id: ''
            }
        }
    },
    methods: {
        format_date(value){
          if(value){
            return moment(String(value)).format('MMM Do YYYY')
          }
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
            newpieces : this.form.pieces
          };
          axios.post('/api/restockproducts/'+this.$route.params.id, payload).then((response) => {
            toast.fire(
                'Success!',
                'Product restocked!',
                'success'
             )
            console.log(response)
          })
        },
        cancel(){

        }
    },
    mounted(){
        this.getData();
        this.loadSuppliers();
    }
}
</script>