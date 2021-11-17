<template>
    <div>
        <Navbar/>
        <Nuxt class="app"/>
    </div>
</template>

<script>

import Navbar from "@/components/Navbar/navbar"

export default {
    components: {
        Navbar
    }
}

</script>

<style lang="scss">

html, body {
    margin: 0;

    .app {
        max-width: 1200px;
        margin: auto;
    }
}

</style>