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
                        <div id="submit" class="submit"></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    name: "Checkout",
    data() {
        return {
            subscriptions: null,
        };
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
};
</script>

<style></style>
