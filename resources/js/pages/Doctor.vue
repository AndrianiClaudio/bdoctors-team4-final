<template>
    <div>
        <div class="row row-cols-1 row-cols-md-4 g-4" v-if="doctor">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ doctor.firstname }} {{ doctor.lastname }}
                    </h5>
                    <div>
                        <b><em>Email</em></b>
                        {{ doctor.email }}
                    </div>
                    <div>
                        <b><em>Address</em></b>
                        {{ doctor.address }}
                    </div>
                    <div v-if="doctor.cv">
                        <b><em>Curriculum Vitae</em></b>
                        {{ doctor.address }}
                    </div>
                    <div v-if="doctor.phone">
                        <b><em>Telefono</em></b>
                        {{ doctor.phone }}
                    </div>
                </div>
                <router-link
                    class="btn btn-success"
                    :to="{ name: 'message', params: { slug: doctor.slug } }"
                    >Send a message</router-link
                >
                <router-link class="btn btn-info" :to="{ name: 'home' }"
                    >Back to Home</router-link
                >
            </div>
        </div>
    </div>
</template>

<script>
// import Axios from "axios";

export default {
    name: "Doctor",
    props: ["slug"],
    data() {
        return {
            doctor: [],
        };
    },
    created() {
        const url = "http://127.0.0.1:8000/api/doctors/" + this.slug;
        this.getProduct(url);
    },
    methods: {
        getProduct(url) {
            axios.get(url).then((result) => {
                console.log(result.data.doctors);
                this.doctor = result.data.doctors;
            });
        },
    },
};
</script>

<style lang="scss"></style>
