<template>
  <div>
    <p>Soy el libro con el isbn {{ isbn }}, que chulo {{ isbn2 }}</p>
    <star-rating
      v-model="rating"
      v-bind:rating="rating"
      v-bind:show-rating="false"
      @rating-selected="rateBook(user_id, isbn, rating)"
    ></star-rating>
  </div>
</template>

<script>
import StarRating from "vue-star-rating";

export default {
  props: ["isbn"],
  data() {
    return {
      rating: 0,
      user_id: 1,
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

      axios.post("api/rateBook", { user_id, book_isbn, rating }).then(() => {
        console.log("Done!");
      });
    },
  },
};
</script>

<style>
</style>