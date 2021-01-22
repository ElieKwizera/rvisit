<template>
  <div>
    <nav class="navbar bg-white border-bottom navbar-light">
      <router-link class="navbar-brand mr-auto" :to="{name:'Home'}">RVisit</router-link>
      <router-link class="btn nav-button" :to="{name:'cart'}">Cart</router-link>
    </nav>
    
    <div class="container mt-4">
      <router-view></router-view>
    </div>

  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>