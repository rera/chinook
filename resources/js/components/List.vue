<template>
	<div class="card-columns">
		<beer-component
			v-for="beer in beers"
			v-bind="beer"
			:key="beer.id"
			@delete="del"
		></beer-component>
	</div>
</template>

<script>
  function Beer({ id, name, brewery, style}) {
    this.id = id;
    this.name = name;
		this.brewery = brewery;
		this.type = style;
  }

  import BeerComponent from './Beer.vue';

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
    components: {
      BeerComponent
    },
		created() {
		  this.fetch();
		}
  }
</script>
