<template>
    <div class="container-fluid g-0 p-3 mt-5" v-if="!loading">
        <i class="fa-solid fa-spinner"></i> Caricamento in corso ...
    </div>
    <div v-else>
        <v-braintree
            :authorization="token"
            :locale="locale"
            @success="onSuccess"
            @error="onError"
            btnText="Completa il pagamento"
            btnClass="btn btn-success"
            :card="{
                cardholderName: {
                    required: true,
                },
            }"
        >
        </v-braintree>
    </div>
</template>

<script>
export default {
    name: "Payment",
    data() {
        return {
            loading: true,
            token: "sandbox_kt669qdh_xd36hj6xjdq9bphf",
            locale: "it_IT",
            amount: null,
            user_id: null,
        };
    },
    props: {
        authorization: {
            required: true,
            type: String,
        },
    },
    created() {
        this.user_id = parseInt(document.querySelector("#fulvio").innerHTML);
        document.querySelector("#fulvio").remove();
    },
    methods: {
        onSuccess(payload) {
            let nonce = payload.nonce;
            // Do something great with the nonce...
            // ottengo price da id
            axios
                .post(
                    `http://localhost:8000/api/getPriceFromName?name=${this.$route.params.name}`
                )
                .then((res) => {
                    this.amount = res.data.amount;
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    // Conferma pagamento
                    this.loading = false;
                    axios
                        .post(
                            `http://localhost:8000/api/subscription/payment/make?token=${nonce}&amount=${this.amount}&user_id=${this.user_id}`
                        )
                        .catch((err) => {
                            console.error(err);
                        })
                        .then(() => {
                            this.$router.push({
                                name: "subscriptions",
                            });
                        });
                });
        },
        onError(error) {
            console.error(error);
            // Whoops, an error has occured while trying to get the nonce
            // console.log(message);
        },
    },
};
</script>

<style></style>
