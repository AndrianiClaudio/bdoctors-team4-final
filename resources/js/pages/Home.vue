<template>
    <div class="container-fluid p-0">
        <Navbar />
        <JumboT />
        <Overview />
        <Specializations />
    </div>
</template>

<script>
    import Navbar from '../components/Navbar.vue'
    import JumboT from '../components/Jumbo-top.vue'
    import Overview from '../components/Overview.vue'
    import Specializations from '../components/Specializations.vue'

    export default {
        name: 'Home',
        components: {
            Navbar,
            JumboT,
            Overview,
            Specializations,
        }
    }
</script>

<style lang="scss" scoped>

</style>