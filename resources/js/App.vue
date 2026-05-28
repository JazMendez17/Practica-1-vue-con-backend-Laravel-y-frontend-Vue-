<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <span class="navbar-brand">Mi Aplicación Vue</span>
      </div>
    </nav>
    
    <CardList />
  </div>
</template>

<script>
import CardList from './components/CardList.vue'

export default {
  name: 'App',
  components: {
    CardList
  }
}
</script>

<style>
body {
  background-color: #f5f5f5;
}

.container {
  max-width: 1200px;
}
</style>