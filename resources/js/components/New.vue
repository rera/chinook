<template>
  <div>
    <form @submit.prevent="create">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Beer Name:</label>
            <input type="text" class="form-control" v-model="name">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Brewery:</label>
	            <input type="text" class="form-control" v-model="brewery">
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Save New Beer</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
      data() {
        return {
					name: '',
					brewery: ''
        }
      },
      methods: {
        create() {
					window.axios.post(`/api/beers`, this.$data).then(({ data }) => {
						this.$router.push('/');
					});
        }
      }
    }
</script>
