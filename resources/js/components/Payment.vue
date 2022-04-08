<template>
    <div>
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
        // console.log(this.authorization);
        this.user_id = parseInt(document.querySelector("#fulvio").innerHTML);
        document.querySelector("#fulvio").remove();
        // this.getExpiresDate();
    },
    methods: {
        // getExpiresDate() {
        //     axios
        //         .post(`/api/subscriptions/expires?user_id=${this.user_id}`)
        //         .then((res) => {
        //             this.expires = res.data.expires;
        //         });
        // },
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
                    // this.getExpiresDate();
                    // console.log(this.expires);
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    // Conferma pagamento
                    axios.post(
                        `
                http://localhost:8000/api/subscription/payment/make?token=${nonce}&amount=${this.amount}&user_id=${this.user_id}`
                    );
                });
        },
        onError(error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
            console.log(message);
        },
    },
};
</script>

<style></style>
