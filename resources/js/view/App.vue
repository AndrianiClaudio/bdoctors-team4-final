<template>
    <div class="container-fluid p-0">
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            user: null,
        };
    },
    beforeCreate() {
        // axios
        //     .get("/api/logged")
        //     .then((res) => {
        //         console.log(res.data);
        //         this.user = res.data.results.user;
        //         console.log(this.user);
        //     })
        //     .catch((err) => {
        //         console.error(err);
        //     });
    },
    created() {
        // console.log($page.props.user);
        console.log(this.$options.auth);
    },
};
</script>

<style lang="scss" scoped></style>
