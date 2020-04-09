
import serveStatic from 'serve-static'
export default {
  mode: 'spa',
  server: {
    port: 3000, // default: 3000
    host: '0.0.0.0' // default: localhost
  },
  /*
  ** Headers of the page
  */
//  serverMiddleware: [
//   '~/api/user'
// ],
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', 
      // href: 'https://fonts.googleapis.com/css?family=Kanit|Mitr|Prompt|Roboto&display=swap:300,400,500,700|Material+Icons'
      href: 'https://fonts.googleapis.com/css?family=Kanit|Mitr|Prompt|Roboto:300,400,500,700|Material+Icons'
    },
    ]
  },
  /*
  ** Customize the progress-bar color
  */
  // loading: { color: '#fff' },
  loading: '~/components/loading.vue',
  /*
  ** Global CSS
  */
  css: [
    {src:'~/assets/style.css',rss:false},
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    {src:'~/plugins/vue-notification',rss:false},
    {src:'~/plugins/vue-modal',rss:false},
    {src:'~/plugins/vuex-orm-axios',rss:false},
    // '~/plugins/vuex-orm-axios'
  ],
  // plugins: ['~/plugins/vue-notification'],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
    '@nuxtjs/vuetify'
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [ 
    // Doc: https://bootstrap-vue.js.org
    'bootstrap-vue/nuxt',
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    '@nuxtjs/auth'
  ],
  /*
  ** Axios module configuration
  ** See https://axios.nuxtjs.org/options
  */
  axios: {
    baseURL: 'http://localhost:4000'
  },
  auth: {
    redirect: {
      login: '/auth/login',
      logout: '/',
      callback: '/auth/login',
      home: '/'
    },
    strategies: {
      local: {
        endpoints: {
          login: { url: '/users-pg/authenticate', method: 'post', propertyName: 'token' },
          logout: { url: '/api/auth/logout', method: 'post', propertyName: false },
          user: { url: '/users-pg', method: 'get', propertyName: false }
        },
        // tokenRequired: true,
        // tokenType: true
      }
    },
    // localStorage: true
  },
  
  /*
  ** Build configuration
  */
  build: {
    transpile: ['vue-notifications'],
    transpile: ['vue-modal'],
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  }
}
