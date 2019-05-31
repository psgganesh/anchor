<template>
    <div>  
      <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-white">
        <router-link :to="{ name: user ? 'home' : 'welcome' }" class="navbar-brand">
          <h5 class="font-weight-normal"><img src="~assets/img/brand-sm.png"  width="32" height="32" /> {{ appName }}</h5>
        </router-link>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarsExample01" style="">
          <ul class="navbar-nav mr-auto">
            <locale-dropdown/>
            <li v-if="user" class="nav-item"><router-link :to="{ name: 'home' }" class="nav-link" active-class="active"><fa icon="home" class="fs-initial" /> {{ $t('home') }}</router-link></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">

            <li v-if="user" class="nav-item dropdown user-dropdown">
                <a class="nav-link dropdown-toggle text-dark"
                  href="javascript:void();" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img :src="user.photo_url" class="rounded-circle profile-photo mr-1">
                  {{ user.email }}
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li class="divider"></li>
                    <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
                      <fa icon="cog" fixed-width/>
                      {{ $t('settings') }}
                    </router-link>
                    <div class="dropdown-divider"/>
                    <a class="dropdown-item pl-3" href="#" @click.prevent="logout">
                      <fa icon="sign-out-alt" fixed-width/>
                      {{ $t('logout') }}
                    </a>
                </ul>
            </li>
            
            <template v-else>
              <li class="nav-item">
                <router-link :to="{ name: 'login' }" class="nav-link" active-class="active">
                  {{ $t('login') }}
                </router-link>
              </li>
              <li class="nav-item">
                <router-link :to="{ name: 'register' }" class="nav-link" active-class="active">
                  {{ $t('register') }}
                </router-link>
              </li>
            </template>
          </ul>
        </div>
      </nav>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'
import '@fortawesome/fontawesome-free-solid'

export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
    appName: process.env.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      try {
        // Log out the user.
        await this.$store.dispatch('auth/logout')
        // Redirect to login.
        this.$router.push({ name: 'login' });
      } catch(e) {
        console.log(e.message)
      }
    }
  }
}
</script>

<style scoped>
.navbar {
  font-weight: 400;
}
li.nav-item {
  padding-left: 5px;
  padding-right: 5px;
}
.user-dropdown {
  background: #fff;
  border-radius: 12px;
  border-style: solid;
  border-color: #ccc;
  border-width: 1px;
}
.profile-photo {
  width: 1.5rem;
  height: 1.5rem;
  margin: -.375rem 0;
}
.dropdown-menu {
  right: 0;
  left: auto;
}
.nav-link {
  padding: 0.35rem 1rem;
}
.fs-initial {
  font-size: initial;
}
.navbar-light .navbar-nav .nav-link.active {
  color: #e9311d;
}
</style>
