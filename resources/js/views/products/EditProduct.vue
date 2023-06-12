<template lang="">
    <TheMaster>
        <div class="card px-2">
       <div class="card-body">
          <!-- General Form Elements -->
          <form @submit.prevent="">
          <fieldset v-if="step == 1">
             <h5 class="card-title text-center">Edit product</h5>
 
             <div class="row m-auto p-auto justify-content- g-3 needs-validation" novalidate="" autocomplete="off">
                <div class="row  mb-3"></div>
 
                <div class="row mb-3"></div>
                <div class="form-group row">
                   <input
                      type="hidden"
                      id="user_id"
                      name="user_id"
                      value="1"
                      class="form-control"
                   />
                   <div class="col-sm-6">
                     <label for="validationCustom04" class="form-label">Name</label>
                     <div class="col-sm-10">
                        <input type="text" placeholder="Name*" id="title" v-model="form.name" name="title" class="form-control"
                           required="" />
                        <div class="invalid-feedback">Please enter name</div>
                     </div>
                  </div>
                   <div class="col-sm-6">
                      <label for="validationCustom04" class="form-label"
                      >Category</label
                      >
                      <div class="col-sm-10">
                         <select name="category" v-model="form.category_id" class="form-select" id="">
                            <option value="0" selected>Select Category</option>
                            <option v-for="category in categories" :value="category.id"
                            :selected="category.id == form.category_id" :key="category.id">{{ category.name}}</option>
 
                         </select>
 
                      <div class="invalid-feedback">Please enter category!</div>
                      </div>
                   </div>
 
                </div>
                <div class="row mb-3"></div>
                <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="inputPassword" class="form-label">Add Photo</label>
                      <div class="col-sm-10">
                         <!-- <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title=""> -->
                         <input type="file" @change="onChangePhoto" name="image" id="wizard-picture" class="form-control">

                      <div class="invalid-feedback">Please enter photo!</div>
                      </div>
                   </div>
                   <div class="col-sm-6">
                  <label for="validationCustom04" class="form-label">Number of Pieces</label>
                  <div class="col-sm-10">
                     <input type="number" placeholder="No of pieces*" id="address" v-model="form.pieces" name="address" class="form-control"
                        required="" />
                     <div class="invalid-feedback">Please enter no</div>
                  </div>
                  </div>
                </div>
             </div>
             <!--  button -->
             <div class="col-lg-12 felx mt-4 row">
                <div class="col-sm-6 col-lg-6">
                    <!-- <button @click.prevent="prev()" class="btn btn-dark">Previous</button> -->
                </div>
                <div class="col-sm-6 col-lg-6 text-end">
                    <button type="submit" @click.prevent="next()" class="btn btn-primary">Next</button>
                </div>
            </div>
          </fieldset>
 
          <fieldset v-if="step == 2">
             <h5 class="card-title text-center">Product's Detailed Information</h5>
             
             <div class="row flex flex-row justify-content-around g-3 needs-validation" novalidate="" autocomplete="off">
                <div class="row mb-3"></div>
                <div v-if="message" class="alert alert-danger">{{ message }}</div>
                <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>
                <div class="form-group row">
                  <div class="col-sm-6">
                      <label for="inputPassword" class="form-label">Supplier</label>
                      <div class="col-sm-10">
                         <select name="location" v-model="form.supplier_id" class="form-select" id="">
                            <option value="0" disabled selected>Select Supplier</option>
                            <option v-for="supplier in suppliers" :value="supplier.id"
                            :selected="supplier.id == form.supplier_id" :key="supplier.id">{{ supplier.name}}</option>
 
                         </select>
                         <div class="invalid-feedback">Please enter supplier!</div>
                      </div>
                   </div>
                <div class="col-sm-6">
                   <label for="validationCustom04" class="form-label">Size</label>
                   <div class="col-sm-10">
                      <input type="text" placeholder="Size" v-model="form.size" id="location" name="location" class="form-control"
                         required="" />
                      <div class="invalid-feedback">Please enter size!</div>
                   </div>
                </div>
                </div>
                <div class="row mb-3"></div>
 
                <div class="form-group row">
                <div class="col-sm-6">
                   <label for="validationCustom04" class="form-label">Buying Price</label>
                   <div class="col-sm-10">
                      <input type="text" placeholder="Buying Price*" v-model="form.buying_price" id="estate_name" name="estate_name" class="form-control"
                         required="" />
                      <div class="invalid-feedback">Please enter price!</div>
                   </div>
                </div>
                <div class="col-sm-6">
               <label for="validationCustom04" class="form-label">Selling Price</label>
               <div class="col-sm-10">
                  <input type="text" placeholder="Selling Price*" id="address" v-model="form.selling_price" name="address" class="form-control"
                     required="" />
                  <div class="invalid-feedback">Please enter price</div>
               </div>
                </div>
                </div>
                <div class="row mb-3"></div>
 
                <div class="col-lg-12 felx mt-4 row">
                   <div class="col-sm-6 col-lg-6">
                      <button @click.prevent="prev()" class="btn btn-dark">Previous</button>
                   </div>
                   <div class="col-sm-6 col-lg-6 text-end">
                      <button type="submit" @click.prevent="submit()" class="btn btn-primary">Submit</button>
                   </div>
                </div>
             </div>
          </fieldset>
 
 
          </form>
 
 
          <!-- End General Form Elements -->
       </div>
        </div>
    </TheMaster>
  </template>
  <script>
 import TheMaster from "@/components/TheMaster.vue";
 import axios from "axios";
 import Swal from 'sweetalert2';

 const toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 3000
 });
 
 window.toast = toast;
 export default {
    components: {
        TheMaster
    },
    data () {
       return {
          form: {
          category_id: '',
          supplier_id: '',
          size: '',
          pieces: '',
          buying_price: '',
          selling_price: '',
          name: '',
          image: '',
          created_by: '',
          
          },
          message: "",
          successMessage: "",
          loading: false,
          step: 1, 
          categories: [],
          suppliers: [],
       }   
    },
    methods: {
       prev() {
          this.step--;
       },
       next() {
          this.step++;
       },
       loadLists() {
          axios.get('/api/lists').then((response) => {
          this.categories = response.data.lists.categories;
          this.suppliers = response.data.lists.suppliers;
 
          });
       },
       onChangePhoto(e) {
         console.log('loadings');
         let file = e.target.files[0];
         console.log(file)
         let reader = new FileReader();
         reader.onloadend = (file) => {
            // console.log('RESULT', reader.result)
            this.form.image = reader.result;
         }
         reader.readAsDataURL(file);
       },
       getData(){
        axios.get('/api/products/'+this.$route.params.id, {
        }).then((response) => {
            this.form = response.data.product;
            // console.log("data", this.form)
        })
        },
        submit(){
            const payload = {
               id: this.$route.params.id,
               name: this.form.name,
               category_id: this.form.category_id,
               image: this.form.image,
               buying_price: this.form.buying_price,
               selling_price: this.form.selling_price,
               pieces : this.form.pieces,
               size : this.form.size,
               created_by: this.user.id
            };
            axios.put('/api/products/'+this.$route.params.id, payload)
            .then((response) => {

                    toast.fire({
                    title: 'Product Updated',
                    text: "product updated ",
                    icon: 'success',
                })
            }).catch((error) => {
               console.log(error)
            });
            this.$router.push('/products')

        }
 
    },
    mounted() {
       this.loadLists();
       this.getData();
       this.user = JSON.parse(localStorage.getItem('user'));
       this.form.created_by = this.user.id;

    }


  };
  </script>
  <style lang=""></style>
  