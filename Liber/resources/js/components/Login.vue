<template>
  <div>
    <p>Tu email es: {{ user2.email }}</p>

    <form @submit.prevent="login">
      <input
        type="text"
        id="name"
        v-model="user.name"
        placeholder="Pon tu nombre"
      />
      <button type="submit" id="login_button">Login</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        name: "a",
      },
    };
  },
  computed: {
    user2: {
      get() {
        return this.$store.state.apiBooks.user;
      },
    },
  },
  methods: {
    login() {
      this.$store.dispatch("apiBooks/loginUser", this.user);
    },
  },
};
</script>

<style>
</style>