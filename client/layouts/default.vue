<template>
  <div class="layout">
    <navbar/>
    <div class="container-fluid mt-67">
      <nuxt/>
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'
export default {
  components: {
    Navbar
  }
}
</script>
