<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    	<div class="container">
        <router-link :to="{ name: 'list' }" class="navbar-brand">Chinook</router-link>
    	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    	    <span class="navbar-toggler-icon"></span>
    	  </button>
    	  <div class="collapse navbar-collapse" id="navbar">
    	    <ul class="navbar-nav mr-auto">
    	      <li class="nav-item active">
              <router-link :to="{ name: 'list' }" class="nav-link">Beer Journal</router-link>
    	      </li>
    	      <li class="nav-item">
              <router-link :to="{ name: 'new' }" class="nav-link">New Entry</router-link>
    	      </li>
    	    </ul>
    	    <form class="form-inline my-2 my-lg-0">
    	      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    	      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    	    </form>
    	  </div>
    	</div>
    </nav>
    <main role="main" class="container">
      <router-view></router-view>
    </main>
  </div>
</template>

<style lang="scss">
  @import '/css/app.css';
</style>

<script>
  export default {}
</script>
