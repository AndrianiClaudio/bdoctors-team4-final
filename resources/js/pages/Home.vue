<template>
    <div class="container-fluid p-0">
        <Navbar />
        <JumboT />
        <Overview />
        <Specializations />
        <div v-if="doctors">
            <div v-for="(doctor, index) in doctors" :key="index">
                <h1>Dottore {{ doctor.id }}</h1>
                <div>
                    <b><em>Nome</em></b>
                    {{ doctor.firstname }} {{ doctor.lastname }}
                </div>
                <div v-if="doctor.photo">
                    <b><em>Photo</em></b>
                    <img
                        :src="/storage/ + doctor.photo"
                        :alt="doctor.firstname + ' ' + doctor.lastname"
                    />
                </div>
                <router-link
                    class="btn btn-success"
                    :to="{ name: 'message', params: { slug: doctor.slug } }"
                    >Send a message</router-link
                >
                <router-link
                    class="btn btn-secondary"
                    :to="{ name: 'review', params: { slug: doctor.slug } }"
                    >Write a review</router-link
                >
                <router-link
                    class="btn btn-info"
                    :to="{ name: 'doctor', params: { slug: doctor.slug } }"
                    >View</router-link
                >
                <hr />
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import JumboT from "../components/Jumbo-top.vue";
import Overview from "../components/Overview.vue";
import Specializations from "../components/Specializations.vue";

export default {
    name: "Home",
    components: {
        Navbar,
        JumboT,
        Overview,
        Specializations,
    },
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
                .get("api/doctors")
                .then((res) => {
                    this.doctors = res.data.results.doctors.data;
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

<style lang="scss" scoped></style>
