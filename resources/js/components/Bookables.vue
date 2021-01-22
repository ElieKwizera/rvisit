<template>
<div>

    <div v-if="loading">
        <h5>Data loading ....</h5>
    </div>
    <div v-else>
        <div class="row mb-4" v-for="row in rows" :key="row">
            <div class="col d-flex align-items-stretch" v-for="(bookable, column) in bookables.slice((row-1)*columns , row * columns)" :key="row+column">
            <Bookable
            v-bind="bookable"
            />
            </div>

             <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder' + row + p"></div>
            </div>
          
        </div>
        
    </div>
 
</template>

<script>
import Bookable from './Bookable'
export default {
    components:
    {
        Bookable
    },
    data()
    {
        return {
            bookables:null,
            loading:true,
            columns:3
        }
    },
    computed:
    {
        rows()
        {
            return this.bookables === null ? 0:Math.ceil(this.bookables.length / this.columns);
        },
        placeHolders()
        {
            return  this.bookables === null ? 0 : this.bookables.length % this.columns;
        }
    },
    methods:
    {
        bookablesInRow(row) {
            return this.bookables.slice((row - 1) * this.columns, row * this.columns);
            },
        placeholdersInRow(row) {
         return this.columns - this.bookablesInRow(row).length;
        }
    },
  
   created()
   {
       axios.get('/api/bookables').then(res => {
           this.bookables = res.data.data;
           this.loading = false;
       })
   }

}
</script>

<style>


</style>