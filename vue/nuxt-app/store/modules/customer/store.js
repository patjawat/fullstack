export default {
    state :{
        patjawat : 8,
        customerLIst :[]
        
        },
    mutations: {
        GET_CUSTOMER(state,data){
            state.customerLIst = data

                        
        }
    },
    actions: {
        async ACTION_GET_CUSTOMER({commit},data) {
        //         return new Promise((resolve,reject) => {
        //            this.$axios.get('https://jsonplaceholder.typicode.com/users').then((res) => {
        //                commit('GET_CUSTOMER',res.data)
        //                resolve()
        //                window.$nuxt.$root.$loading.finish()
        //             });
        //    })
        try {
            window.$nuxt.$root.$loading.start()
            let res = await this.$axios.get('https://jsonplaceholder.typicode.com/users');
            commit('GET_CUSTOMER',res.data)
            window.$nuxt.$root.$loading.finish()
        }catch(e){
            console.log(e.message);
        }

        }
    },
    getters:{

    }

}