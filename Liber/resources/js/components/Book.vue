<template>
  <div>
    <p>Soy el libro con el isbn {{ isbn }}, que chulo {{ isbn2 }}</p>
    <star-rating
      v-model="rating"
      v-bind:rating="rating"
      v-bind:show-rating="false"
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
    };
  },
  computed: {
    isbn2() {
      return this.isbn + "a";
    },
  },
};
</script>

<style>
</style>