<script>
import AppNav from './components/AppNav.vue'

export default {
    components: {
        AppNav,
    }
}
</script>

<template>
    <section class="vue-home">
        <AppNav />
        <router-view></router-view>
    </section>
</template>

<style lang="scss">
@use './styles/general.scss';
</style>
