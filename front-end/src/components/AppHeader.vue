<script>
export default {
    name: 'AppHeader'
}
</script>

<template>

    <header class="bg-light">
        <nav class="py-3 bg-light">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="logo d-flex align-items-center">
                    <img src="../../public/img/logo-dark.png" alt="profile-photo" width="50px">
                    <h6 class="ps-3 m-0 text-uppercase">federico sensi</h6>
                </div>
                <div class="links d-flex justify-content-between">
                    <a href="#">
                        <h6 class="text-uppercase m-0">home</h6>
                    </a>
                    <a href="#about">
                        <h6 class="text-uppercase m-0">about</h6>
                    </a>
                    <a href="#projects">
                        <h6 class="text-uppercase m-0">projects</h6>
                    </a>
                    <a href="#">
                        <h6 class="text-uppercase m-0">contact</h6>
                    </a>
                </div>
            </div>
        </nav>
    </header>

</template>
