<template>
  <div id="app" class="container">
    <div class="heading row justify-content-center">
      <h1>Chinook</h1>
    </div>
    <beer-component
      v-for="beer in beers"
      v-bind="beer"
      :key="beer.id"
    ></beer-component>
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
					console.log(data);
					data.forEach(beer => {
						this.beers.push(new Beer(beer));
					})
				});
      }
    },
		created() {
		  this.fetch();
		},
    components: {
      BeerComponent
    }
  }
</script>
