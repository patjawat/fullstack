export const actions = {
    ACTION_ADD_ITEM({ commit }, data) {
        return new Promise((resolve, reject) => {
          commit('ADD_ITEM', data)
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
          // console.log(data);
      }
}