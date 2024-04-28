<template>
  
  <SubscriberList msg="Welcome to Your Vue.js App"/>
</template>

<script>
import SubscriberList from './components/SubscriberList.vue'

export default {
  name: 'App',
  components: {
    SubscriberList
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

</style>
