<template>
  <div>
    <div class="row">
      <div class="col-lg-12">
        <breadcrumbs :name="$t('home')">
        </breadcrumbs>
      </div>
    </div>
    <div v-if="viewHasData">
        <h5>Dashboard has data</h5>
    </div>
    <div v-else class="offset-lg-4 col-lg-4 text-align-center">
        <img src="~assets/img/empty.png" class="empty-image-placeholder" />
        <h6><b class="text-muted">There is no data on this page, to display yet!</b></h6>
    </div>
  </div>
</template>

<script>
import breadcrumbs from "~/components/Breadcrumbs.vue"

export default {
  middleware: 'auth',
  data: () => ({
    viewHasData: true
  }),

  head () {
    return { title: this.$t('home') }
  },

  components: {
    breadcrumbs
  }
}
</script>
