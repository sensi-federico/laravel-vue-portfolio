<script>
import AppHeader from './components/AppHeader.vue';

export default {
    components: {
        AppHeader
    }
}
</script>

<template>
    <section class="vue-home">
        <AppHeader />
        <router-view></router-view>
    </section>
</template>

<style lang="scss">
@use './styles/general.scss';
</style>
