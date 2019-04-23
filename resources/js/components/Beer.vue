<template>
  <div class="card">
    <div class="card-body">
      <button type="button" class="close pull-right" aria-label="Delete">
        <span aria-hidden="true">&times;</span>
      </button>
      <h5 class="card-title">
        <a href="#">{{ name }}</a>
      </h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ brewery }}</h6>
      <!-- <p class="card-text">{{ brewery }}</p> -->
    </div>
  </div>
</template>

<script>
    export default {
        props: ['id', 'name', 'brewery', 'type']
    }
</script>
