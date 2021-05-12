const state = {
    user: {
        email: "prueba@gmail.com",
        name: "Nose"
    },
};
const getters = {};
const actions = {
    loginUser({ state, commit }, user) {
        axios.get("api/books").then((response) => {
            response.data.forEach(u => {
                if (u.author == user.name) {
                    console.log(u);

                    state.user.name = u.author;

                    console.log("En el storage hay: " + state.user.name);

                    localStorage.setItem(
                        "book_title",
                        u.title
                    )

                    window.location.replace("/dhernandez/ProyectoFinal/Liber/public/")
                }
            });
        });
    },
};
const mutations = {};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}