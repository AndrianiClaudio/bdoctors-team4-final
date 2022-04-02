<template>
    <div class="container-fluid p-0">
        <router-view></router-view>
    </div>
</template>

<script>
import SliderPaginate from "../components/SliderPaginate";
export default {
    name: "App",
    components: { SliderPaginate },

    created() {},
};
</script>

<style lang="scss" scoped></style>
