<template>
  <div class="col-lg-12 p-0">
    <breadcrumbs :name="$t('pages')"></breadcrumbs>
    <div class="row">
      <div class="col-md-2">
        <card :title="$t('settings')" class="settings-card">
          <ul class="nav flex-column nav-pills">
            <li v-for="tab in tabs" :key="tab.route" class="nav-item">
              <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
                <fa :icon="tab.icon" fixed-width/>
                {{ tab.name }}
              </router-link>
            </li>
          </ul>
        </card>
      </div>

      <div class="col-md-10">
        <transition name="fade" mode="out-in">
          <router-view/>
        </transition>
      </div>
    </div>
  </div>
</template>

<script>
import breadcrumbs from "~/components/Breadcrumbs.vue"

export default {
  middleware: 'auth',

  components: {
    breadcrumbs
  },

  computed: {
    tabs () {
      return [
        {
          icon: 'user',
          name: this.$t('profile'),
          route: 'settings.profile'
        }
      ]
    }
  }
}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
.nav-pills .nav-link.active {
  background: #eb412f;
}
</style>
