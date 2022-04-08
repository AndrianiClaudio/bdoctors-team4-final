<template>
    <div class="container-fluid p-0">
        <div class="row row-cols-1 row-cols-md-4 g-4" v-if="doctor">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ doctor.firstname }} {{ doctor.lastname }}
                    </h5>
                    <hr />
                    <b><em>Email</em></b>
                    {{ doctor.email }}
                    <hr />
                    <b><em>Address</em></b>
                    {{ doctor.address }}
                    <div v-if="doctor.cv">
                        <hr />
                        <b><em>Curriculum Vitae</em></b>
                        {{ doctor.address }}
                    </div>
                    <div v-if="doctor.phone">
                        <hr />
                        <b><em>Telefono</em></b>
                        {{ doctor.phone }}
                    </div>
                    <!-- RECENSIONI DEL DOTTORE -->
                    <div v-if="doctor.reviews">
                        <hr />
                        <b
                            >Media recensioni:
                            <em>{{ doctor.review_mean }}</em></b
                        >
                        <br />
                        <b
                            >Numero recensioni:
                            <em>{{ doctor.reviews.length }}</em></b
                        >
                        <br />
                        <router-link
                            class="text-primary text-underline"
                            :to="{
                                name: 'reviews',
                                params: {
                                    slug: doctor.slug,
                                },
                            }"
                            >Mostra tutte le recensioni</router-link
                        >
                        <!-- <ul>
                            <li
                                v-for="(review, index) in doctor.reviews"
                                :key="`review-${index}`"
                            >
                                <div v-if="review.username">
                                    <b> {{ review.username }}</b>
                                </div>
                                <div v-else>
                                    <b> Utente anonimo</b>
                                </div>
                                <b>Voto: </b>{{ review.vote }}
                            </li>
                        </ul> -->
                    </div>
                    <!-- SPECIALIZZAZIONI -->
                    <hr />
                    <div v-if="doctor.specializations">
                        <b><em>Specializations</em></b>
                        <div
                            v-for="(spec, index) in doctor.specializations"
                            :key="`spec-${index}`"
                        >
                            {{ spec.category }}
                        </div>
                    </div>
                    <!-- SERVIZI -->
                    <div v-if="doctor.services">
                        <b><em>Services</em></b>
                        <div
                            v-for="(service, index) in doctor.services"
                            :key="`service-${index}`"
                        >
                            {{ service.type }}
                        </div>
                    </div>
                </div>
                <router-link
                    class="btn btn-success"
                    :to="{ name: 'message', params: { slug: doctor.slug } }"
                    v-if="doctor.slug"
                    >Send a message</router-link
                >
                <router-link
                    class="btn btn-success"
                    :to="{ name: 'review', params: { slug: doctor.slug } }"
                    v-if="doctor.slug"
                    >Send a Review</router-link
                >
                <router-link class="btn btn-info" :to="{ name: 'home' }"
                    >Back to Home</router-link
                >
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";

export default {
    name: "Doctor",
    components: {
        Navbar,
    },
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
                // console.log(result.data.doctors);
                this.doctor = result.data.results.doctors;
            });
        },
    },
};
</script>

<style lang="scss"></style>
