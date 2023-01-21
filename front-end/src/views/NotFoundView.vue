<script>
import AppBanner from '../components/AppBanner.vue';
export default {
  name: 'NotFoundView',
  components: { AppBanner }
}
</script>

<template>
  <AppBanner title="404 - Page not found" />
  <div class="container py-5">
    <p class="lead">
      😨 Ops, Page not found!
    </p>
    <router-link to="/" class="btn btn-primary">Go to Home Page</router-link>

  </div>

</template>


<style lang="scss" scoped>

</style>