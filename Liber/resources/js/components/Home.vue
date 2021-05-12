<template>
  <html lang="es">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Liber</title>
    </head>

    <body>
      <h1>PÁGINA PRINCIPAL FUNCIONA?</h1>
      <div>AQUI VA EL CARRUSEL</div>

      <form @submit.prevent="SearchBooks">
        <input
          type="text"
          v-model="preSearch"
          name="search"
          placeholder="Busca un libro"
        />
        <button type="submit" id="search_button">Buscar</button>
      </form>

      <div id="books_searched">
        <div v-for="b in booksFilter" :key="b.isbn" id="book_container">
          <h3 @click="BookInformation(b.isbn)">Titulo: {{ b.title }}</h3>
          <p @click="BookInformation(b.isbn)">Autor: {{ b.author }}</p>
          <img
            v-bind:src="'../storage/app/' + b.cover"
            @click="BookInformation(b.isbn)"
          />
          <star-rating
            v-model="b.rating"
            v-bind:rating="b.rating"
            v-bind:read-only="true"
            v-bind:show-rating="false"
          ></star-rating>
        </div>
      </div>
    </body>
  </html>
</template>

<script>
import StarRating from "vue-star-rating";

export default {
  data() {
    return {
      preSearch: "",
      postSearch: "",
      books: [],
    };
  },
  computed: {
    booksFilter: function () {
      let search = this.postSearch.toLowerCase();

      return this.books.filter(
        (b) =>
          b.title.toLowerCase().includes(search) ||
          b.author.toLowerCase().includes(search)
      );
    },
  },
  mounted() {},
  methods: {
    SearchBooks() {
      //Actualiza la variable postSearch, que será usada a continuación
      this.postSearch = this.preSearch;

      //Saca información de la base de datos
      /*axios.get("api/books").then((booksDB) => {
        //Variable que guardará los libros que no estén en la base de datos
        let booksToStore = { books: [] };

        console.log(booksDB);
        console.log("El libro buscado es: " + this.postSearch);

        //ESTO ES EL RAINFOREST QUE GUARDA COSAS NUEVAS EN LA BASE DE DATOS
        const axios = require("axios");

        // Parametros de Rainforest
        const params = {
          api_key: "B7E49921BBA24B8F8CD4335965DB8DA5",
          amazon_domain: "amazon.com",
          type: "search",
          search_term: this.postSearch,
        };

        // Haz el GET request a la API de Rainforest
        axios
          .get("https://api.rainforestapi.com/request", { params })
          .then((response) => {
            let exists = false;

            console.log(response.data.search_results);

            //Por cada cosa encontrada en rainforest...
            response.data.search_results.forEach((apiBook) => {
              console.log("Esto es un apiBook: " + apiBook.asin);

              //Comprueba si el libro existe en la base de datos
              booksDB.forEach((dbBook) => {
                if (dbBook.isbn == apiBook.asin) {
                  exists = true;
                  console.log("Existe!");
                }
              });

              //Si no existe, añade el libro a la base de datos
              if (!exists) {
                //booksToStoreObj = JSON.parse(booksToStore);
                booksToStore["books"].push(apiBook);

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
            this.books = response.data;
            console.log("Segunda base de datos obtenida!");
          });
        });
      });*/

      axios.get("api/books").then((response) => {
        this.books = response.data;
        //console.log("Segunda base de datos obtenida!");
      });
    },

    BookInformation(isbn) {
      this.$router.push(
        "/dhernandez/ProyectoFinal/liber/Liber/public/book/" + isbn
      );
    },
  },
};
</script>

<style>
body {
  padding: 0;
  margin: 0;
}

#book_container {
  background-color: aqua;
}
</style>