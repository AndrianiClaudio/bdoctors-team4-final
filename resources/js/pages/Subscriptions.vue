<template>
    <div v-if="!loading">Caricamento in corso ...</div>
    <ul v-else class="list-group">
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
                        <b> <em>Price: </em>{{ subscription.price }} &euro; </b>
                        <b>
                            <em>Durata abbonamento: </em
                            >{{ subscription.duration }} ore;
                        </b>
                    </div>
                    <router-link
                        :to="`/dashboard/checkout/${subscription.name}`"
                        :user="user"
                        >Prosegui con il piano {{subscription.name}}</router-link
                    >
                </div>
            </div>
        </li>
    </ul>
</template>
<script>
export default {
    name: "Subscriptions",
    data() {
        return {
            loading: false,
            subscriptions: null,
            tokenApi: "",
            user: "",
        };
    },
    components: {},
    created() {
        this.subCall();
        this.user_id = parseInt(document.querySelector("#fulvio").innerHTML);
    },
    methods: {
        subCall() {
            this.loading = false;
            axios
                .get("/api/subscriptions")
                .then((res) => {
                    this.subscriptions = res.data.results.subscriptions;
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    this.loading = true;
                });
        },
    },
};
</script>

<style></style>
