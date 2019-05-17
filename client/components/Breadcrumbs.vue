<template>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><nuxt-link to="/home">Home</nuxt-link></li>
        <li class="breadcrumb-item" v-if="name"><nuxt-link :to="'/'+name">{{ name }}</nuxt-link></li>
        <li class="breadcrumb-item active">All {{ name }}</li>
    </ul>
</template>

<script>
export default {
  name: 'Breadcrumbs',

  props: {
    name: { type: String, default: null }
  }
}
</script>