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
          <button class="btn btn-primary">Save Changes</button>
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
        window.axios.get(`/api/beers/edit/${id}`).then((response) => {
            this.beer = response.data;
        });
      },
      methods: {
        update(id, name, brewery) {
					window.axios.put(`/api/beers/${id}`, { name, brewery }).then(() => {
						flash('Beer record updated.', 'success');
					});
        }
      }
    }
</script>
