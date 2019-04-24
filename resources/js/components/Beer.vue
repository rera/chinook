<template>
  <div class="card">
    <div class="card-body">
      <button type="button" class="close pull-right" aria-label="Delete" @click="del">
        <span aria-hidden="true">&times;</span>
      </button>
      <h5 class="card-title">
        <router-link :to="`/beers/${beer.id}`">{{ beer.name }}</router-link>
      </h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ beer.brewery }}</h6>
      <p class="card-text">
        {{ beer.abv }}% ABV
        <span class="stars" v-html="$options.filters.ratingStars(beer.rating)"></span>
      </p>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['beer'],
    methods: {
      del() {
        this.$emit('delete', this.beer.id);
      }
    },
    filters: {
      ratingStars: function(value) {
        return "&#9733;".repeat(value);
      }
    }
  }
</script>
