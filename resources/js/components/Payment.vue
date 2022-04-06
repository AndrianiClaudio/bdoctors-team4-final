<template>
    <div>
        <v-braintree
            authorization="sandbox_bnx5zq54_q4c7qxjt9k79ssbk"
            locale="it_IT"
            @success="onSuccess"
            @error="onError"
            btnText="Completa il pagamento"
            btnClass="btn btn-success"
        >
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
    created() {
        this.user_id = parseInt(document.querySelector("#fulvio").innerHTML);
        document.querySelector("#fulvio").remove();
    },
    mounted() {
        document.querySelector("button.btn.btn-primary").remove();
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
                    axios.post(
                        `
                http://localhost:8000/api/subscription/payment/make?token=${nonce}&amount=${this.amount}&user_id=${this.user_id}`
                    );
                    // .then((res) => {
                    //     console.log(res.data);
                    // });
                });

            // console.log(nonce);
        },
        onError(error) {
            let message = error.message;
            // console.log(message);
            // Whoops, an error has occured while trying to get the nonce
        },
    },
};
</script>

<style></style>
