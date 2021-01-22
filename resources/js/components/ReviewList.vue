<template>
<div>
      <h6 class="text-uppercase text-dark font-weight-bolder pt-4">Review List</h6>

    <div v-if="loading">Loading...</div>
    <div v-else>
      <div class="border-bottom d-none d-md-block" v-for="number in 3" :key="number">
        <div class="row pt-4">
          <div class="col-md-6">Mr John Smith</div>
          <div class="col-md-6 d-flex justify-content-end">
            Star Rating
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">Created 5 min ago</div>
        </div>
        <div class="row pt-4 pb-4">
          <div class="col-md-12">Review content</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

    data()
    {
        return {
            loading:false
        }
    }

}
</script>

<style>

</style>