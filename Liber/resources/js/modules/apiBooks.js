const state = {
    user: {
        email: "prueba@gmail.com",
        name: "Nose"
    },
    api: {
        isbn: String,
        title: String,
        author: String,
        cover: String,
        rating: Float32Array
    },
    dataBase: []
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

    getApiValues({ state, commit }/*, api*/) {

        //Guardando los resultados de la base de datos en el state
        axios.get("api/books").then((response) => {
            state.dataBase = response.data;
            console.log(state.dataBase);
        });


        axios({
            method: 'get',
            url: 'https://jsonplaceholder.typicode.com/users',
            responseType: 'stream'
        }).then(function (response) {
            let exists = false;

            response.data.forEach(apiBook => {
                //Comprueba si el libro existe en la base de datos
                state.dataBase.forEach(dbBook => {
                    if (dbBook.isbn == apiBook.id) {
                        exists = true;
                        console.log("Existe!");
                    }
                });

                console.log(exists);

                //Si no existe, añade el libro a la base de datos
                if (!exists) {
                    axios.post("api/booksStore", apiBook)
                        .then((response) => {
                            console.log("Guardado el libro con el isbn " + apiBook.id);
                            //console.log(response);
                        });
                }

                exists = false;

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