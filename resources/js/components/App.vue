<template>

   <div>
      <navbar class="mb-2"></navbar>
     <div class="container">
    <router-view></router-view>
   </div>
   </div>
</template>

<script>
import navbar from './navBar';
export default {
components:{
    navbar,
}
}
</script>

<style scoped>

</style>
