<template>
  <div v-if="bookable">
      <div class="row">
          <div class="col-md-8">
              <div class="card rounded-0">
                  <div class="card-body">
                      <h2>{{bookable.title}}</h2>
                      <hr>
                      <article>{{bookable.description}}</article>
                  </div>
              </div>
               <review-list/>
          </div>
          <div class="col-md-4">
            <Availability v-bind="bookable"/>
          

          </div>
      </div>
       
  </div>
</template>

<script>

import Availability from '../components/Availabilty.vue';

import ReviewList from '../components/ReviewList.vue';
export default {

   

    components:
    {
        Availability,
        ReviewList,

    },
    data()
    {
        return {
            bookable:null
        }
    },
    created()
    {
        const bookableId = this.$route.params.id;
        axios.get(`/api/bookables/${bookableId}`).then(res => {
            this.bookable = res.data.data;
        });
    }

}
</script>

<style>

</style>