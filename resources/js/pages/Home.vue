<template>
    <div class="container">
     <Bookables/>
    </div>
</template>

<script>
import Bookables from '../components/Bookables'
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components:
        {
            Bookables
        }
        ,
        data()
        {
            return {
                loading:false
            }
        }
    }
</script>
