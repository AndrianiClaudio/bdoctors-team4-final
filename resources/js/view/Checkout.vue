<template>
    <div>
        checkout

        <div v-if="test.length > 0">
            {{ test }}
        </div>
    </div>
</template>

<script>
export default {
    name: "Checkout",
    data() {
        return {
            test: "",
        };
    },
    created() {
        if (window.location.search.split("=")) {
            this.test = window.location.search.split("=")[1];
            console.log(this.test);
        }
        console.log("ciao");
    },
};
</script>

<style></style>
