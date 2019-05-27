<template>
  <div class="container-fluid">
    <div class="row full-height">
        <div class="col-lg-5 full-height mt-180 text-align-center">
            <img id="logo" class="img-thumbnail logo" src="~assets/img/brand-lg.png"  alt="sph" name="logo">
            <h1 class="font-weight-normal">
                {{ appName }}
            </h1>
            <br/>
            <form @submit.prevent="login" @keydown="form.onKeydown($event)">
              <!-- Email -->
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
                <div class="col-md-7">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" type="email" name="email"
                        class="form-control">
                  <has-error :form="form" field="email"/>
                </div>
              </div>

              <!-- Password -->
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
                <div class="col-md-7">
                  <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" type="password" name="password"
                        class="form-control">
                  <has-error :form="form" field="password"/>
                </div>
              </div>

              <!-- Remember Me -->
              <div class="form-group row">
                <div class="col-md-3"/>
                <div class="col-md-7 d-flex">
                  <checkbox v-model="remember" name="remember">
                    {{ $t('remember_me') }}
                  </checkbox>

                  <router-link :to="{ name: 'password.request' }" class="small ml-auto my-auto">
                    {{ $t('forgot_password') }}
                  </router-link>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-7 offset-md-3 d-flex">
                  <!-- Submit Button -->
                  <v-button :loading="form.busy">
                    {{ $t('login') }}
                  </v-button>
                </div>
              </div>
            </form>
        </div>
    <div class="col-lg-7 full-height" id="banner-bg">
        <h6 class="credits">Image credits: 
          <a href="http://tomclohosycole.co.uk/" target="_blank">Tom Clohosy Cole</a>
        </h6>
    </div>
    </div>
</div>
</template>


<script>
import Form from 'vform'

export default {

  layout: 'auth',

  head () {
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      email: 'psgganesh@gmail.com',
      password: 'secret'
    }),
    remember: false,
    appName: process.env.appName
  }),
  
  methods: {
    async login () {
      try {
        // Submit the form.
        const { data } = await this.form.post('/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', {
          token: data.token,
          remember: this.remember
        })

        // Fetch the user.
        await this.$store.dispatch('auth/fetchUser')

        // Redirect home.
        this.$router.push({ name: 'home' })

      }catch (e) {
        console.log(e.response) 
      }
    }
  }

}
</script>


<style scoped>
#banner-bg {
  background: #000 url('~assets/img/bg.jpg') no-repeat;background-size: cover;
}

#logo {
  display:inline-block;
  max-width: 300px;
  margin: 0 auto;
  width: 20%;
  border:none;
}

body {
  padding-top: 0px;
}

.full-height {
    height: -webkit-fill-available;
    height: -moz-available;
    height: stretch;
}

.credits {
    bottom: 0px;
    right: 0px;
    position: absolute;
    color: #ffffff;
}

</style>