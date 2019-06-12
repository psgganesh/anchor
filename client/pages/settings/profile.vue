<template>
  <div class="col-lg-6">

    <div class="row">
      <div class="col-lg-12 p-0">
        <card :title="$t('your_info')">
          <form @submit.prevent="update" @keydown="form.onKeydown($event)">
            <alert-success :form="form" :message="$t('info_updated')"/>

            <!-- Name -->
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
              <div class="col-md-7">
                <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" type="text" name="name"
                      class="form-control">
                <has-error :form="form" field="name"/>
              </div>
            </div>

            <!-- Email -->
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
              <div class="col-md-7">
                <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" type="email" name="email"
                      class="form-control">
                <has-error :form="form" field="email"/>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group row">
              <div class="col-md-9 ml-md-auto">
                <v-button :loading="form.busy" type="success">{{ $t('update') }}</v-button>
              </div>
            </div>
          </form>
        </card>
      </div>
    </div>
    <br/>
    <div class="row">
      <div class="col-lg-12 p-0">
        <card :title="$t('your_password')">
          <form @submit.prevent="changePassword" @keydown="form.onKeydown($event)">
            <alert-success :form="changePasswordForm" :message="$t('password_updated')"/>

            <!-- Password -->
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right">{{ $t('new_password') }}</label>
              <div class="col-md-7">
                <input v-model="changePasswordForm.password" :class="{ 'is-invalid': changePasswordForm.errors.has('password') }" type="password" name="password"
                      class="form-control">
                <has-error :form="form" field="password"/>
              </div>
            </div>

            <!-- Password Confirmation -->
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right">{{ $t('confirm_password') }}</label>
              <div class="col-md-7">
                <input v-model="changePasswordForm.password_confirmation" :class="{ 'is-invalid': changePasswordForm.errors.has('password_confirmation') }" type="password" name="password_confirmation"
                      class="form-control">
                <has-error :form="changePasswordForm" field="password_confirmation"/>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group row">
              <div class="col-md-9 ml-md-auto">
                <v-button :loading="changePasswordForm.busy" type="success">{{ $t('update') }}</v-button>
              </div>
            </div>
          </form>
        </card>
      </div>
    </div>

  </div>
</template>

<script>
import Form from 'vform'
import { mapGetters } from 'vuex'

export default {
  scrollToTop: false,

  head () {
    return { title: this.$t('settings') }
  },

  data: () => ({
    form: new Form({
      name: '',
      email: ''
    }),
    changePasswordForm: new Form({
      password: '',
      password_confirmation: ''
    })
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  created () {
    // Fill the form with user data.
    this.form.keys().forEach(key => {
      this.form[key] = this.user[key]
    })
  },

  methods: {
    async update () {
      const { data } = await this.form.patch('/settings/profile')

      this.$store.dispatch('auth/updateUser', { user: data })
    },
    async changePassword () {
      await this.changePasswordForm.patch('/settings/password')

      this.form.reset()
    }
  }
}
</script>
