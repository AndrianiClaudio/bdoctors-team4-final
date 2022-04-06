<template>
    <div>
        checkout

        <v-braintree
            authorization="xxxxxxxxxxxxxxxxxxxxxx"
            @success="onSuccess"
            @error="onError"
        ></v-braintree>
    </div>
</template>

<script>
export default {
    name: "Checkout",
    data() {
        return {};
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
        },
        onError(error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
        },
    },
};
</script>

<style></style>
