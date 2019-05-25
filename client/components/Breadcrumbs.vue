<template>
  <div class="row">
    <div class="col-lg-12 p-0">
      <ul class="breadcrumb">
          <li class="breadcrumb-item"><nuxt-link to="/home">{{ $t('home') }}</nuxt-link></li>
          <li class="breadcrumb-item" v-if="showBreadcrumItem && name"><nuxt-link :to="'/'+name">{{ name }}</nuxt-link></li>
      </ul>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'Breadcrumbs',
  data: () => {
    showBreadcrumItem: $nuxt.$route.name !== 'home'
  },
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
