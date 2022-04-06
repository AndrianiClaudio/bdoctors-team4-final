<template>
    <div>
        <ul class="list-group">
            <li
                v-for="(subscription, index) in subscriptions"
                :key="index"
                :id="subscription.id"
                class="list-group-item list-group-item-info"
                :name="subscription.id"
            >
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ subscription.name }}</h4>
                        <div class="d-flex justify-content-between">
                            <b>
                                <em>Price: </em>{{ subscription.price }} &euro;
                            </b>
                            <b>
                                <em>Durata abbonamento: </em
                                >{{ subscription.duration }} ore;
                            </b>
                        </div>
                        <Subscriptions :authorization="tokenApi" />
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
import Subscriptions from "../pages/Subscriptions.vue";

export default {
    name: "Checkout",
    data() {
        return {
            subscriptions: null,
            tokenApi: "",
        };
    },
    components: {
        Subscriptions,
    },
    created() {
        this.subCall();
    },
    methods: {
        subCall() {
            axios
                .get("/api/subscriptions")
                .then((res) => {
                    this.subscriptions = res.data.results.subscriptions;
                    //console.log(this.subscriptions);
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
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
