<template>
    <div class="container-fluid p-0">
        <Navbar />
        <JumboT />
        <Overview />
    </div>
</template>

<script>
    import Navbar from '../components/Navbar.vue'
    import JumboT from '../components/Jumbo-top.vue'
    import Overview from '../components/Overview.vue'

    export default {
        name: 'Home',
        components: {
            Navbar,
            JumboT,
            Overview,
        }
    }
</script>

<style lang="scss" scoped>

</style>