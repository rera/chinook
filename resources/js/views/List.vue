<template>
	<div class="card-columns">
		<beer-card
			v-for="beer in beers"
			v-bind:key="beer.id"
			v-bind:beer="beer"
			@delete="del"
		></beer-card>
	</div>
</template>

<script>
  export default {
		props: ['query'],
    data() {
      return {
        beers: []
      }
    },
    methods: {
      fetch() {
        window.axios.get('/api/beers', { params: { search: this.query } } )
					.then(response => this.beers = response.data)
					.catch(error => {});
      },
      del(id) {
        window.axios.delete(`/api/beers/${id}`).then(() => {
          let index = this.beers.findIndex(beer => beer.id === id);
          this.beers.splice(index, 1);
        });
      }
    },
		created() {
		  this.fetch();
		}
  }
</script>
