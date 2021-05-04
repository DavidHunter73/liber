import Vue from "vue";
import Vuex from "vuex";

import apiBooks from "../modules/apiBooks"
Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        apiBooks
    }
})