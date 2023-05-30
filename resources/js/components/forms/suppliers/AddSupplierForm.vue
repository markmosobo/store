<template>
    <div class="card px-2">
        <div class="card-body">
        <h5 class="card-title">Add Supplier</h5>
    
        <form
        class="row g-3 needs-validation"
        novalidate=""
        method="post"
        autocomplete="off"
        @submit.prevent="submit()"
        >
        <div class="row mb-3"></div>
        <div class="form-group row">
          <input
            type="hidden"
            id="user_id"
            name="user_id"
            value="1"
            class="form-control"
          />
          <div class="col-sm-4">
            <label for="validationCustom04" class="form-label"
              >Name</label
            >
            <div class="col-sm-10">
              <input
                type="text"
                placeholder="Supplier Number"
                v-model="form.name"
                id="first_name"
                name="first_name"
                class="form-control"
                required=""
              />
              <div class="invalid-feedback">Please enter flight number!</div>
            </div>
          </div>
          <div class="col-sm-4">
            <label for="validationCustom04" class="form-label"
              >Phone</label
            >
            <div class="col-sm-10">
              <input
                type="text"
                placeholder="Phone Number"
                v-model="form.phone"
                id="first_name"
                name="first_name"
                class="form-control"
                required=""
              />
              <div class="invalid-feedback">Please enter phone number!</div>
            </div>
          </div>
          <div class="col-sm-4">
            <label for="inputPassword" class="form-label">Email</label>
            <div class="col-sm-10">
              <input
                type="decimal"
                placeholder="Email"
                v-model="form.email"
                id="phone_number"
                name="phone_number"
                class="form-control"
                required=""
              />
              <div class="invalid-feedback">Please enter exit gate!</div>
            </div>
          </div>
        </div>
 
        <div class="row mb-3"></div>
        <div class="form-group row">
          <div class="col-sm-4">
            <label for="inputPassword" class="form-label">Address</label>
            <div class="col-sm-10">
              <input
                type="decimal"
                placeholder="Address"
                v-model="form.address"
                id="phone_number"
                name="phone_number"
                class="form-control"
                required=""
              />
              <div class="invalid-feedback">Please enter address!</div>
            </div>
          </div>
        </div>
        <div class="row mb-3"></div>
        <div class="col-lg-12 felx mt-4 row">
            <div class="col-sm-6 col-lg-6">
            <button @click.prevent="cancel()" class="btn btn-dark">Cancel</button>
            </div>
            <div class="col-sm-6 col-lg-6 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </form>
    
        </div>
    </div>
    </template>
    
    <script>
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
       data () {
          return {
             form: {
              name: '',
              phone: '',
              email: '',
              address: ''
             
             },
             message: "",
             successMessage: "",
             loading: false,
          }   
       },
       methods: {
         cancel(){
            this.$router.push('/suppliers')
         },
          submit(){
             axios.post("api/suppliers", this.form)
             .then(function (response) {
                console.log(response);
                // this.step = 1;
                toast.fire(
                   'Success!',
                   'Supplier added!',
                   'success'
                )
                // this.$router.push('/categories')
             })
             .catch(function (error) {
                console.log(error);
                // Swal.fire(
                //    'error!',
                //    // phone_error + id_error + pass_number,
                //    'error'
                // )
             });
    
          }
    
       },
       mounted() {
       }
    
    }
    </script>