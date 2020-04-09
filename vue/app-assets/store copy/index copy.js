import Vuex from 'vuex'
import MODULE_PRODUCT from './modules/product/productStore'
import MODULE_CUSTOMER from './modules/customer/store'
import MODULE_AUTH from './modules/auth'

const createStore = () => {
  return new Vuex.Store({
    state: () => ({
      counter: 0
    }),
    mutations: {
      
    },
    modules:{
      MODULE_PRODUCT,
      MODULE_CUSTOMER,
      MODULE_AUTH
    }
  })
}

export default createStore

export const getters = {
  isAuthenticated(state) {
    return state.auth.loggedIn
  },

  loggedInUser(state) {
    return state.auth.user
  }
}