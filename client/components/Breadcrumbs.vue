<template>
  <div class="row">
    <div class="col-lg-12 p-0">
      <ul class="breadcrumb">
          <li class="breadcrumb-item"><nuxt-link to="/home">Home</nuxt-link></li>
          <li class="breadcrumb-item" v-if="name & name !== breadcrumbHomeLinkText"><nuxt-link :to="'/'+name">{{ name }}</nuxt-link></li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Breadcrumbs',
  data: () => ({
    breadcrumbHomeLinkText: this.$t('home')
  }),
  props: {
    name: { type: String, default: null }
  }
}
</script>

<style scoped>
.breadcrumb a {
  color: #e9311d;
}
</style>
