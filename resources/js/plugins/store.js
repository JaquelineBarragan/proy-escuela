import Vue from 'vue'
import Vuex from 'vuex'

import user from "../modules/user";
import users from "../modules/users";
import filters from "../modules/filters";

Vue.use(Vuex)
export default new Vuex.Store({
    modules: {
        user,
        users,
        filters
    }
})
