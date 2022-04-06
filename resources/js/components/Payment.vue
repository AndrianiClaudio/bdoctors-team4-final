<template>
    <div>
        <v-braintree
            authorization="sandbox_bnx5zq54_q4c7qxjt9k79ssbk"
            locale="it_IT"
            @success="onSuccess"
            @error="onError"
            btnText="Invia"
        >
            <!-- btnClass="ms__test btn btn-primary" -->
        </v-braintree>
    </div>
</template>

<script>
export default {
    name: "Payment",
    data() {
        return {
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
    created() {},
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
                    console.log(this.amount);
                    console.log(res.data);
                    this.user_id = parseInt(
                        document.querySelector("#fulvio").innerHTML
                    );
                    console.log(this.user_id);
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    axios
                        .post(
                            `
                http://localhost:8000/api/subscription/payment/make?token=${nonce}&amount=${this.amount}&user_id=${this.user_id}`
                        )
                        .then((res) => {
                            console.log(res.data);
                        });
                });

            console.log(nonce);
        },
        onError(error) {
            let message = error.message;
            console.log(message);
            // Whoops, an error has occured while trying to get the nonce
        },
    },
};
</script>

<style></style>
