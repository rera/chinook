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
    <div class="form-row">
      <div class="col-md-4">
        <div class="form-group">
          <label>Sampled</label>
          <datepicker v-model="sampled" name="uniquename" class="form-control form-control-lg"></datepicker>
        </div>
      </div>
      <div class="col-md-2">
        <label>ABV</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control form-control-lg" v-model="abv">
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group ml-1">
          <label>Rating</label>
          <star-rating v-model="numberRating" v-bind:star-size="40"></star-rating>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="notes">Notes</label>
        <textarea class="form-control form-control-lg" id="notes" rows="5" v-model="notes"></textarea>
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
					brewery: '',
					sampled: '',
					abv: '',
					rating: '',
					notes: ''
        }
      },
      methods: {
        create() {
					window.axios.post(`/api/beers`, this.$data).then(({ data }) => {
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
