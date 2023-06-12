<template lang="">
    <TheMaster>
        <div class="card px-2">
        <div class="card-body">
        <h5 class="card-title">Add User</h5>
    
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
              >First Name</label
            >
            <div class="col-sm-10">
              <input
                type="text"
                placeholder="First Name"
                v-model="form.first_name"
                id="first_name"
                name="first_name"
                class="form-control"
                required=""
              />
              <div class="invalid-feedback">Please enter first name!</div>
            </div>
          </div>
          <div class="col-sm-4">
            <label for="validationCustom04" class="form-label"
              >Last Name</label
            >
            <div class="col-sm-10">
              <input
                type="text"
                placeholder="Last Name"
                v-model="form.last_name"
                id="first_name"
                name="first_name"
                class="form-control"
                required=""
              />
              <div class="invalid-feedback">Please enter las name!</div>
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

        </div>
 
        <div class="row mb-3"></div>
        <div class="form-group row">
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
          <div class="col-sm-4">
            <label for="inputPassword" class="form-label">Role</label>
            <div class="col-sm-10">
                <select name="category" v-model="form.role" class="form-select" id="">
                    <option value="0" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>

                </select>
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
              first_name: '',
              last_name: '',
              phone: '',
              email: '',
              role: ''
             
             },
          message: "",
          successMessage: "",
       }   
    },
    methods: {
       cancel() {
          this.step--;
       },
       submit() {
          this.step++;
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
        axios.get('/api/users/'+this.$route.params.id, {
        }).then((response) => {
            this.form = response.data.user;
            // console.log("data", this.form)
        })
        },
        submit(){
            const payload = {
               id: this.$route.params.id,
               first_name: this.form.first_name,
               last_name: this.form.last_name,
               email: this.form.email,
               phone: this.form.phone,
               role: this.form.role,
               created_by: this.user.id
            };
            axios.put('/api/users/'+this.$route.params.id, payload)
            .then((response) => {

                    toast.fire({
                    title: 'User Updated',
                    text: "user updated ",
                    icon: 'success',
                })
            }).catch((error) => {
               console.log(error)
            });
            this.$router.push('/users')

        }
 
    },
    mounted() {
       this.getData();
       this.user = JSON.parse(localStorage.getItem('user'));
       this.form.created_by = this.user.id;

    }


  };
  </script>
  <style lang=""></style>
  