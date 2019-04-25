<template>
  <form @submit.prevent="create" class="container">
    <beer-form v-bind:beer="beer"></beer-form>
    <a href="javascript:void(null)" @click="$router.go(-1)">&larr; Cancel New Beer</a>
    <button class="btn btn-primary float-right">Save &amp; Exit</button>
  </form>
</template>

<script>
  export default {
    data() {
      return {
        beer: {
  				name: '',
  				brewery: '',
  				sampled: '',
  				abv: '',
  				rating: '',
  				notes: ''
        }
      }
    },
    methods: {
      create() {
				window.axios.post(`/api/beers`, this.beer).then(({ data }) => {
          this.term = '';
          this.$router.push('/');
				});
      }
    },
    computed: {
       numberRating: {
         get: function() {
           return Number(this.rating);
         },
         set: function (value) {
           this.rating = value;
         }
       }
    }
  }
</script>
