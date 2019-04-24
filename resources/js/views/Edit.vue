<template>
  <form @submit.prevent="update" class="container">
    <beer-form v-bind:beer="beer"></beer-form>

    <router-link to="/" tag="button" class="btn btn-link">&larr; Back to the beers</router-link>
    <button class="btn btn-primary float-right">Save &amp; Exit</button>
  </form>
</template>

<script>
  export default {
    data() {
      return {
        beer: {}
      }
    },
    created() {
      window.axios.get(`/api/beers/${this.$route.params.id}/edit`).then((response) => {
        this.beer = response.data;
      });
    },
    methods: {
      update() {
        window.axios.put(`/api/beers/${this.$route.params.id}`, this.beer).then(() => {
          this.$router.push('/');
        });
      }
    }
  }
</script>
