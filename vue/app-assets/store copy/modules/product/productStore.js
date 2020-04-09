// import { getters } from './getters'
// import { actions } from './actions'
// import { mutations } from './mutations'

// การแยก File ออกเป็นส่วนๆ
// export default {
//   namesspace: true,
//   state: {
//     items: [],
//     form:{},
//     message:{}
//   },
//   actions,
//   mutations,
//   getters,
// }

export default {
  namesspace: true,
  state: {
    items: [],
    listuser: [],
  },
  mutations: {
    GET_PRODUCT(state, data) {
      state.items = data;
      //  return new Promise((resolve, reject) => {
       
        // resolve(true)
        
      // })
        
    },
    ADD_PRODUCT(state, data) {
      this.$axios.post('products',data);
    },

    UPDATE_PRODUCT(state, data) {
      let key = data.key;
      let item = state.items[key]
    },
    CHANGE_FORM(state, data) {
      state.form = data;
    },
    EDIT_PRODUCT(state, data) {
      let key = data.key
      let item = state.items[key]
      item.name = data.name
      item.price = data.price
    },
  },
  actions: {
    ACTION_GET_PRODUCT({commit},data) {
      this.$axios.get('products').then(res =>{
        commit('GET_PRODUCT',res.data)  
      })
        // console.log(data);
    },
    ACTION_ADD_PRODUCT({ commit }, data) {
      return new Promise((resolve, reject) => {
        commit('ADD_PRODUCT', data)
        resolve(true)
      })
    },

    ACTION_EDIT_PRODUCT({ commit }, data) {
      commit('EDIT_PRODUCT', data)
    },

    ACTION_DELETE_PRODUCT({ commit }, data) {
      commit('DELETE_PRODUCT', data)
    },
    ACTION_CHANGE_FORM({ commit }, data) {
      commit('CHANGE_FORM', data);
    }
  },
  getters: {
    PRODUCTS(state) {
      return state.items;
    }
  }
}


