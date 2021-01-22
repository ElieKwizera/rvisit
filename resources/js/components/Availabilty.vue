<template>
  <div>
      <h6 class="text-uppercase font-weight-bolder text-secondary">Check availability</h6>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="from">From</label>
              <input type="date" v-model="from" name="from" placeholder="Start date" class="form-control form-control-sm">
          </div>
          <div class="form-group col-md-6">
                <label for="to">To</label>
              <input type="date" v-model="to" name="to" placeholder="End date" class="form-control form-control-sm">
          </div>
      </div>
      <small class="text-danger" v-if="withErrors">Please chek the format of the date input</small>
      <small class="text-success" v-if="isAvailable">The item is available for booking</small>
      <small class="text-info" v-if="isNotAvailable">Item is not avilable</small>
      
        <button class="btn btn-dark rounded-0 btn-block" @click="check" :disabled="loading"> Check </button>

  </div>
</template>

<script>
export default {
 props:{title: String, description: String, price:Number , id:Number},
 data()
 {
     return{
         from:null,
         to:null,
         loading:false,
         errors:null,
         status:null
     }
 },
 methods:
 {
     check()
     {
         this.loading = true;
         this.errors = null;

         axios.get(`/api/bookables/${this.$route.params.id}/availability?start_date=${this.from}&end_date=${this.to}`).then(
             response => {
                 this.status = response.status;
                 this.loading = false;
             }
         ).catch(
             error => {
                 if(error.response.status === 422)
                 {
                     this.errors = error.response.data.errors;
                 }
                 this.status = error.response.status;
                 this.loading = false;
             }
         );
     }
 },
 computed:
 {
     withErrors()
     {
         return this.status === 422;
     },
     isAvailable()
     {
         return this.status === 200;
     },
     isNotAvailable()
     {
         return this.status === 404;
     }
 }
}
</script>

<style>

</style>