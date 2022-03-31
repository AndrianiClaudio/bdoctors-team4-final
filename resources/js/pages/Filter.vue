<template>
    <div class="container-fluid p-0">
        <Navbar />
        <div class="container">
            vue filter Specializzazione: {{ $route.query.specialization }}
        </div>
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
export default {
    name: "FilterSpec",
    components: {
        Navbar,
    },
    // props: {
    //     specializations: {
    //         type: String,
    //     },
    // },
    created() {
        console.log(this.$route.query.specialization);
    },
};
</script>

<style></style>
