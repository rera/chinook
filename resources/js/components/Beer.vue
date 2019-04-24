<template>
  <div class="card">
    <div class="card-body">
      <button type="button" class="close pull-right" aria-label="Delete" @click="del">
        <span aria-hidden="true">&times;</span>
      </button>
      <h5 class="card-title">
        <router-link :to="`/beers/${id}`">{{ name }}</router-link>
      </h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ brewery }}</h6>
      <p class="card-text">
        {{ abv }}% ABV
        <span class="stars" v-html="$options.filters.ratingStars(rating)"></span>
      </p>
    </div>
  </div>
</template>

<script>
    export default {
        props: ['id', 'name', 'brewery', 'sampled', 'abv', 'rating', 'notes'],
        methods: {
          del() {
            this.$emit('delete', this.id);
          }
        },
        filters: {
          ratingStars: function(value) {
            return "&#9733;".repeat(value);
          }
        }
    }
</script>
