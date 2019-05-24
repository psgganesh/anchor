require('dotenv').config()

const polyfills = [
  'Promise',
  'Object.assign',
  'Object.values',
  'Array.prototype.find',
  'Array.prototype.findIndex',
  'Array.prototype.includes',
  'String.prototype.includes',
  'String.prototype.startsWith',
  'String.prototype.endsWith'
]

export default {
  mode: 'spa',

  srcDir: 'client/',

  env: {
    apiUrl: process.env.APP_URL +'/'+process.env.API_VERSION || 'http://localhost/api',
    appName: process.env.APP_NAME || 'Anchor',
    appLocale: process.env.APP_LOCALE || 'en'
  },

  /*
  ** Headers of the page
  */
 head: {
    title: process.env.APP_NAME,
    titleTemplate: '%s - ' + process.env.APP_NAME,
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: 'Nuxt.js project' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ],
    script: [
      { src: `https://cdn.polyfill.io/v2/polyfill.min.js?features=${polyfills.join(',')}` }
    ]
  },

  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#004cff' },

  router: {
    base: '/',
    middleware: ['locale', 'check-auth']
  },

  /*
  ** Global CSS
  */
  css: [
    { src: '~assets/sass/app.scss', lang: 'scss' },
    { src: '@fortawesome/fontawesome/styles.css', lang: 'css' }
  ],

  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~components/global',
    '~plugins/helloworld',
    '~plugins/i18n',
    '~plugins/axios',
    '~plugins/vform',
    '~plugins/fontawesome',
    '~plugins/nuxt-client-init',
    { src: '~plugins/bootstrap', ssr: false }
  ],

  /*
  ** Nuxt.js modules
  */
  modules: [
    '@nuxtjs/router',
    '~/modules/spa'
  ],

  /*
  ** Build configuration
  */
  build: {
    extractCSS: true,
    /*
    ** You can extend webpack config here
    */
    extend(config, ctx) {
    }
  }
}
