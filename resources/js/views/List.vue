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
  function Beer({ id, name, brewery, sampled, abv, rating, notes }) {
    this.id = id;
    this.name = name;
    this.brewery = brewery;
    this.sampled = sampled;
    this.abv = abv;
    this.rating = rating;
    this.notes = notes;
  }

  export default {
    data() {
      return {
        beers: []
      }
    },
    methods: {
      fetch() {
        window.axios.get('/api/beers').then(({ data }) => {
					data.forEach(beer => {
						this.beers.push(new Beer(beer));
					})
				});
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
