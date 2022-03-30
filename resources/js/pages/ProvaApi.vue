<template>
    <div>prova2</div>
</template>

<script>
export default {
    name: "ProvaApi",
    data() {
        return {
            doctors: {
                type: Array,
            },
        };
    },
    methods: {
        getAllDoctors() {
            axios
                .get("api/doctors/v2")
                .then((res) => {
                    console.log(res);
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
    created() {
        this.getAllDoctors();
    },
};
</script>

<style></style>
