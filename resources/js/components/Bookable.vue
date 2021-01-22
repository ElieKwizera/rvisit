<template>
  <div class="items-center">
      <div class="card w-100" @click="goToDetails">
          <div class="card-body">
              <div class="card-title">
                 <router-link :to="{ name: 'BookablePage' , params: {id}}">
                      <h4>{{title}}</h4>
                 </router-link>
              </div>
              <div class="card-text">
                <p>{{description}}</p>
                <small class="text-info font-weight-bold"> $ {{price}}</small>
              </div>
          </div>
      </div>
     
      
  </div>
</template>

<script>
export default {
    props:{title: String, description: String, price:Number , id:Number},
    methods:
    {
        goToDetails()
        {

        }
    }
}
</script>

<style>

</style>