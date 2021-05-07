const state = {
    user: {
        email: "prueba@gmail.com",
        name: "Nose"
    },
    allApi: [],
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

    getApiValues({ state, commit }, { searchString, booksDB }) {

        //Guardando los resultados de la base de datos en el state
        state.dataBase = booksDB;

        let booksToStore = { "books": [] };

        console.log(state.dataBase);

        console.log("El libro buscado es: " + searchString);

        //ESTO ES EL RAINFOREST QUE GUARDA COSAS NUEVAS EN LA BASE DE DATOSd
        const axios = require('axios');

        // Parametros de Rainforest
        const params = {
            api_key: "5FFFD5CD73DA47BBA702957211E0B82D",
            amazon_domain: "amazon.com",
            type: "search",
            search_term: searchString
        }

        // Haz the http GET request a la API de Rainforest
        axios.get('https://api.rainforestapi.com/request', { params })
            .then(response => {
                let exists = false;

                console.log(response.data.search_results);

                //Por cada cosa encontrada en rainforest...
                response.data.search_results.forEach(apiBook => {

                    console.log("Esto es un apiBook: " + apiBook.asin);

                    //Comprueba si el libro existe en la base de datos
                    state.dataBase.forEach(dbBook => {
                        if (dbBook.isbn == apiBook.asin) {
                            exists = true;
                            console.log("Existe!");
                        }
                    });

                    //Si no existe, añade el libro a la base de datos
                    if (!exists) {
                        //booksToStoreObj = JSON.parse(booksToStore);
                        booksToStore['books'].push(apiBook);

                        //axios.post("api/booksStore", booksToStore);
                    }

                    exists = false;

                });
                console.log("El Axios de Rainforest ha terminado");
            });

        //let booksToStoreString = JSON.stringify(booksToStore);
        //console.log(booksToStoreString);
        axios.post("api/booksStore", booksToStore).then(() => {
            axios.get("api/books").then((response) => {
                return response;
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