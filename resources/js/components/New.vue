<template>
  <form @submit.prevent="create" class="container">
    <div class="form-row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Beer Name</label>
          <input type="text" class="form-control form-control-lg" v-model="name">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Brewery</label>
          <input type="text" class="form-control form-control-lg" v-model="brewery">
        </div>
      </div>
    </div>
    <router-link to="/" tag="button" class="btn btn-link">&larr; Cancel New Beer</router-link>
    <button class="btn btn-primary float-right">Save &amp; Exit</button>
  </form>
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
