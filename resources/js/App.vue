<template>
  <div id="app-component">
    <router-view>
    </router-view>
  </div>

</template>
<script type="application/javascript">
  import { mapState } from 'vuex'
  
  export default {
    name: 'app',
    computed: Object.assign({}, 
      mapState(['isAuthenticated', 'userApiToken']))
  }
</script>
