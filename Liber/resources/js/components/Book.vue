<template>
  <html lang="es">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Liber</title>
    </head>

    <body>
      <p @click="rateBook(user_id, isbn, rating)">
        Soy el libro con el isbn {{ isbn }}, que chulo {{ isbn2 }}. Esto es una
        prueba: {{ prueba }}
      </p>
      <star-rating
        v-model="rating"
        v-bind:rating="rating"
        v-bind:show-rating="false"
        @rating-selected="rateBook(user_id, isbn, rating)"
      ></star-rating>

      <form @submit.prevent="rateBook(user_id, isbn, rating)">
        <input type="text" name="search" placeholder="Busca un libro" />
        <button type="submit" id="search_button">Buscar</button>
      </form>
    </body>
  </html>
</template>

<script>
import StarRating from "vue-star-rating";

export default {
  props: ["isbn"],
  data() {
    return {
      rating: 0,
      user_id: 1,
      prueba: "nada",
    };
  },
  computed: {
    isbn2() {
      return this.isbn + "a";
    },
  },
  methods: {
    rateBook(user_id, book_isbn, rating) {
      console.log(
        "User_id: " +
          user_id +
          "\nBook_isbn: " +
          book_isbn +
          "\nRating: " +
          rating
      );

      /*axios.get("api/showRatings").then((response) => {
        console.log(response.data);
        //JSON.stringify(booksToStore);
      });*/

      axios.get("api/books").then((patata) => {
        console.log(patata.data);
        //console.log("Segunda base de datos obtenida!");
      });

      /*axios.post("api/rateBook", { user_id, book_isbn, rating }).then(() => {
        console.log("Done!");
      });*/
    },
  },
};
</script>

<style>
</style>