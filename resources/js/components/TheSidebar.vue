<template>
    <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <router-link to="/dashboard" custom v-slot="{ href, navigate, isActive }">
                  <a
                    :href="href"
                    :class="{ active: isActive }"
                    class="nav-link"
                    @click="navigate"
                  >
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
        </router-link>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
          <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
          <li>
            <router-link to="/products" custom v-slot="{ href, navigate, isActive }">
                  <a
                    :href="href"
                    :class="{ active: isActive }"
                    class="nav-link"
                    @click="navigate"
                  >
              <i class="bi bi-circle"></i><span>All Products</span>
            </a>
            </router-link>
          </li>
          <li v-show="user.role == 'admin'">
            <router-link to="/restocked" custom v-slot="{ href, navigate, isActive }">
                  <a
                    :href="href"
                    :class="{ active: isActive }"
                    class="nav-link"
                    @click="navigate"
                  >
              <i class="bi bi-circle"></i><span>Restocked</span>
            </a>
            </router-link>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <router-link to="/purchases" custom v-slot="{ href, navigate, isActive }">
                  <a
                    :href="href"
                    :class="{ active: isActive }"
                    class="nav-link"
                    @click="navigate"
                  >
          <i class="bi bi-grid"></i>
          <span>Purchases</span>
        </a>
        </router-link>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <router-link to="/categories" custom v-slot="{ href, navigate, isActive }">
                  <a
                    :href="href"
                    :class="{ active: isActive }"
                    class="nav-link"
                    @click="navigate"
                  >
          <i class="bi bi-grid"></i>
          <span>Categories</span>
        </a>
        </router-link>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <router-link to="/suppliers" custom v-slot="{ href, navigate, isActive }">
                  <a
                    :href="href"
                    :class="{ active: isActive }"
                    class="nav-link"
                    @click="navigate"
                  >
          <i class="bi bi-grid"></i>
          <span>Suppliers</span>
        </a>
        </router-link>
      </li><!-- End Dashboard Nav -->

      <li v-show="user.role == 'admin'" class="nav-item">
        <router-link to="/users" custom v-slot="{ href, navigate, isActive }">
                  <a
                    :href="href"
                    :class="{ active: isActive }"
                    class="nav-link"
                    @click="navigate"
                  >
          <i class="bi bi-grid"></i>
          <span>Users</span>
        </a>
        </router-link>
      </li><!-- End Dashboard Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Manage Properties</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <router-link to="all-properties" custom v-slot="{ href, navigate, isActive }">
                <a
                  :href="href"
                  :class="{ active: isActive }"
                  class="nav-link"
                  @click="navigate"
                >
              <i class="bi bi-circle"></i><span>All Properties</span>
              </a>
            </router-link>
          </li>
          <li>
            <router-link to="all-categories" custom v-slot="{ href, navigate, isActive }">
              <a
                :href="href"
                :class="{ active: isActive }"
                class="nav-link"
                @click="navigate"
              >
            <i class="bi bi-circle"></i><span>Categories</span>
            </a>
            </router-link>
          </li>
          <li>
            <router-link to="all-propertytypes" custom v-slot="{ href, navigate, isActive }">
              <a
                :href="href"
                :class="{ active: isActive }"
                class="nav-link"
                @click="navigate"
              >
            <i class="bi bi-circle"></i><span>Types</span>
            </a>
            </router-link>
          </li>
          <li>
            <router-link to="all-conditions" custom v-slot="{ href, navigate, isActive }">
              <a
                :href="href"
                :class="{ active: isActive }"
                class="nav-link"
                @click="navigate"
              >
              <i class="bi bi-circle"></i><span>Conditions</span>
            </a>
            </router-link>
          </li>  
          <li>
            <router-link to="all-furnishings" custom v-slot="{ href, navigate, isActive }">
              <a
                :href="href"
                :class="{ active: isActive }"
                class="nav-link"
                @click="navigate"
              >
              <i class="bi bi-circle"></i><span>Furnishings</span>
            </a>
            </router-link>
          </li>     
          <li>
            <router-link to="all-locations" custom v-slot="{ href, navigate, isActive }">
              <a
                :href="href"
                :class="{ active: isActive }"
                class="nav-link"
                @click="navigate"
              >
              <i class="bi bi-circle"></i><span>Locations</span>
            </a>
            </router-link>
          </li>                       
        </ul>
      </li> -->
      <!-- End Components Nav -->



    </ul>

  </aside><!-- End Sidebar-->
</template>

<script>
export default {
  name: 'TheSidebar',
  data(){
    return {
      user: []
    }
  },
  mounted(){
    this.user = JSON.parse(localStorage.getItem('user'));

  }
  
}
</script>

<style scoped>

</style>
