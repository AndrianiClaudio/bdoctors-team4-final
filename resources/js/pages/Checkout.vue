<template>
    <div>
        <div class="row">
            <div class="col">
                stai acquistando la sponsorizzazione {{ $route.params.name }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <Payment :authorization="tokenApi" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary">Primary</button>
            </div>
        </div>
    </div>
</template>
<script>
import Payment from "../components/Payment.vue";

export default {
    name: "Checkout",
    data() {
        return {
            tokenApi: "",
        };
    },
    components: {
        Payment,
    },
    created() {},
    methods: {},
    mounted() {
        axios
            .get("/api/subscription/generate")
            .then((res) => {
                this.tokenApi = res.data.token;
                //console.log(res.data.token);
            })
            .catch((err) => {
                console.error(err);
            });
    },
};
</script>

<style></style>
