<template>
	<div>
		<div class="form-row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Beer Name</label>
					<input type="text" class="form-control form-control-lg" v-model="beer.name">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Brewery</label>
					<input type="text" class="form-control form-control-lg" v-model="beer.brewery">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Sampled</label>
					<date-picker v-model="beer.sampled" class="form-control form-control-lg"></date-picker>
				</div>
			</div>
			<div class="col-md-2">
				<label>ABV</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control form-control-lg" v-model="beer.abv">
					<div class="input-group-append">
						<span class="input-group-text">%</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group ml-1">
					<label>Rating</label>
					<star-rating v-model="numberRating" v-bind:star-size="40" active-color="#fcba41"></star-rating>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="notes">Notes</label>
				<textarea class="form-control form-control-lg" id="notes" rows="5" v-model="beer.notes"></textarea>
			</div>
		</div>
	</div>
</template>

<script>
  export default {
    props: ['beer'],
    computed: {
      numberRating: {
        get: function() {
          return Number(this.beer.rating);
        },
        set: function (value) {
          this.beer.rating = value;
        }
      }
    }
  }
</script>
