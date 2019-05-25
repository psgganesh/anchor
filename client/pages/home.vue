<template>
  <div>
    <breadcrumbs :name="$t('home')" />
    <div class="row">
      <div class="col-lg-12">
        <div class="text-align-center">
            <img src="~assets/img/undraw_Data_points_ubvs.svg" class="empty-image-placeholder" />
            <h5 class="text-muted">Add analytics, custom vue components; go ahead, create something awesome !</h5>
        </div>
      </div>
    </div>
</template>

<script>
import breadcrumbs from "~/components/Breadcrumbs.vue"

export default {
  middleware: 'auth',
  data: () => ({

  }),
  head () {
    return { title: this.$t('home') }
  },
  components: {
    breadcrumbs
  }
}
</script>
