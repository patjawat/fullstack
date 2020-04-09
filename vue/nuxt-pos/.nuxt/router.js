import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _7977ac8d = () => interopDefault(import('../pages/about.vue' /* webpackChunkName: "pages/about" */))
const _1d69b579 = () => interopDefault(import('../pages/notify.vue' /* webpackChunkName: "pages/notify" */))
const _5cd75950 = () => interopDefault(import('../pages/post.vue' /* webpackChunkName: "pages/post" */))
const _0a95eb97 = () => interopDefault(import('../pages/products/index.vue' /* webpackChunkName: "pages/products/index" */))
const _10b83c1c = () => interopDefault(import('../pages/auth/login.vue' /* webpackChunkName: "pages/auth/login" */))
const _1f7e4eda = () => interopDefault(import('../pages/auth/login copy.vue' /* webpackChunkName: "pages/auth/login copy" */))
const _32f8ccac = () => interopDefault(import('../pages/auth/register.vue' /* webpackChunkName: "pages/auth/register" */))
const _7da73bfd = () => interopDefault(import('../pages/demo1/ex1.vue' /* webpackChunkName: "pages/demo1/ex1" */))
const _6fdbd207 = () => interopDefault(import('../pages/products/create.vue' /* webpackChunkName: "pages/products/create" */))
const _01788a90 = () => interopDefault(import('../pages/products/ProductForm.vue' /* webpackChunkName: "pages/products/ProductForm" */))
const _333ce192 = () => interopDefault(import('../pages/products/ProductList.vue' /* webpackChunkName: "pages/products/ProductList" */))
const _68769cf3 = () => interopDefault(import('../pages/products/ProductList copy.vue' /* webpackChunkName: "pages/products/ProductList copy" */))
const _09811d45 = () => interopDefault(import('../pages/products/ProductList copy 2.vue' /* webpackChunkName: "pages/products/ProductList copy 2" */))
const _0c9bbb54 = () => interopDefault(import('../pages/products/update.vue' /* webpackChunkName: "pages/products/update" */))
const _cda0f15c = () => interopDefault(import('../pages/index.vue' /* webpackChunkName: "pages/index" */))

// TODO: remove in Nuxt 3
const emptyFn = () => {}
const originalPush = Router.prototype.push
Router.prototype.push = function push (location, onComplete = emptyFn, onAbort) {
  return originalPush.call(this, location, onComplete, onAbort)
}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/about",
    component: _7977ac8d,
    name: "about"
  }, {
    path: "/notify",
    component: _1d69b579,
    name: "notify"
  }, {
    path: "/post",
    component: _5cd75950,
    name: "post"
  }, {
    path: "/products",
    component: _0a95eb97,
    name: "products"
  }, {
    path: "/auth/login",
    component: _10b83c1c,
    name: "auth-login"
  }, {
    path: "/auth/login copy",
    component: _1f7e4eda,
    name: "auth-login copy"
  }, {
    path: "/auth/register",
    component: _32f8ccac,
    name: "auth-register"
  }, {
    path: "/demo1/ex1",
    component: _7da73bfd,
    name: "demo1-ex1"
  }, {
    path: "/products/create",
    component: _6fdbd207,
    name: "products-create"
  }, {
    path: "/products/ProductForm",
    component: _01788a90,
    name: "products-ProductForm"
  }, {
    path: "/products/ProductList",
    component: _333ce192,
    name: "products-ProductList"
  }, {
    path: "/products/ProductList copy",
    component: _68769cf3,
    name: "products-ProductList copy"
  }, {
    path: "/products/ProductList copy 2",
    component: _09811d45,
    name: "products-ProductList copy 2"
  }, {
    path: "/products/update",
    component: _0c9bbb54,
    name: "products-update"
  }, {
    path: "/",
    component: _cda0f15c,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
