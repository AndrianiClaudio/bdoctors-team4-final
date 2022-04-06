<template>
    <div>
        <v-braintree
            authorization="xxxxxxxxxxxxxxxxxxxxxx"
            locale="it_IT"
            @success="onSuccess"
            @error="onError"
        ></v-braintree>
    </div>
</template>

<script>
export default {
    name: "Payment",
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
