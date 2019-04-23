<template>
  <div>
    <form @submit.prevent="update">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Beer Name:</label>
            <input type="text" class="form-control" v-model="beer.name">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Brewery:</label>
	            <input type="text" class="form-control" v-model="beer.brewery">
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Save &amp; Return to List</button>
        </div>
    </form>
  </div>
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
