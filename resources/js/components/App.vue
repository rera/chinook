<template>
  <div id="app">
		<div class="card-columns">
	    <beer-component
	      v-for="beer in beers"
	      v-bind="beer"
	      :key="beer.id"
	    ></beer-component>
	  </div>
	</div>
</template>

<style lang="scss">
@import '/css/app.css';
</style>

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
      delete(id) {
        // @TODO
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
