<template>
    <div>
        <ul class="list-group" v-if="!expires_date">
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
                        <router-link
                            :to="`/dashboard/checkout/${subscription.name}`"
                            :user="user"
                            >sgancia i soldi</router-link
                        >
                    </div>
                </div>
            </li>
        </ul>
        <div v-else>Test se ci sono gia sub attive per l'user</div>
    </div>
</template>
<script>
export default {
    name: "Subscriptions",
    data() {
        return {
            subscriptions: null,
            tokenApi: "",
            user: "",
            expires_date: null,
        };
    },
    components: {},
    created() {
        // this.getUser();
        this.subCall();
        this.user_id = parseInt(document.querySelector("#fulvio").innerHTML);
        // alert(this.user_id);
        this.getExpiresDate();
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
        getExpiresDate() {
            axios
                .get(`/api/subcsription/expires?user_id=${this.user_id}`)
                .then((res) => {
                    console.log(res);
                });
        },
    },
};
</script>

<style></style>
