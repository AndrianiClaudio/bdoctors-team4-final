<template>
    <div class="container-fluid d-flex justify-content-center align-items-center m-0 p-0">
        <div class="prof-container p-2">
            <div class="row m-0 p-0">
                <div class="col m-0 p-0">
                    <img v-if="doctor.photo" :src="doctor.photo" class="rounded-circle" alt="">
                    <img v-else class="rounded-circle" src="https://www.ilcedrangolo.it/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png" alt="">
                </div>
                <div class="col m-0 p-0">
                    <div class="row m-0 p-0">
                        <div class="col m-0 p-0">
                            <h3> Dr. {{ doctor.firstname }} {{ doctor.lastname }} </h3>
                        </div>
                    </div>
                    <div class="row m-0 p-0">
                        <div class="col m-0 p-0">
                            <h4 v-if="doctor.specializations">
                                <span
                                    v-for="(spec, index) in doctor.specializations"
                                    :key="`spec-${index}`">
                                    {{ spec.category }}
                                </span>
                            </h4>
                            <h5 v-else>
                                Nessua specializzazione &egrave; stata ancora selezionata
                            </h5>
                        </div>
                    </div>
                    <div v-if="doctor.reviews" class="row m-0 p-0">
                        <div class="col m-0 p-0">
                            {{ doctor.review_mean }}/5 in base a
                            <router-link
                                class="text-primary text-underline"
                                :to="{
                                    name: 'reviews',
                                    params: {
                                        slug: doctor.slug,
                                    },
                                }"
                                >
                                <span v-if="doctor.reviews.length > 1">
                                    {{ doctor.reviews.length }} recensioni
                                </span>
                                <span v-else>
                                        {{ doctor.reviews.length }} recensione
                                </span></router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0 p-0">
                <div class="col m-0 p-0">
                    <div class="row m-0 p-0">
                        <div class="col m-0 p-0">
                            Email: {{ doctor.email }}
                        </div>
                    </div>
                    <div v-if="doctor.phone" class="row m-0 p-0">
                        <div class="col m-0 p-0">
                            Telefono: {{ doctor.phone }}
                        </div>
                    </div>
                    <div v-if="doctor.address" class="row m-0 p-0">
                        <div class="col m-0 p-0">
                            Indirizzo: {{ doctor.address }}
                        </div>
                    </div>
                    <div v-if="doctor.services" class="row m-0 p-0">
                        <div class="col m-0 p-0">
                            <b><em>Servizi</em></b>
                            <ul>
                                <li
                                    v-for="(service, index) in doctor.services"
                                    :key="`service-${index}`"
                                >
                                    {{ service.type }}
                                    <ul>
                                        <li class="list-group"> {{service.description}}</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col m-0 p-0">
                    <div class="row m-0 p-0">
                        <div class="col m-0 p-0">
                            <embed v-if="doctor.cv" :src="`http://localhost:8000/storage/${doctor.cv}`" type="" width="100%" height="100%" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0 p-0">
                <div class="col m-0 p-0">
                    <router-link
                    class="btn btn-success"
                    :to="{ name: 'message', params: { slug: doctor.slug } }"
                    v-if="doctor.slug"
                    >Send a message</router-link
                >
                </div>
                <div class="col m-0 p-0">
                    <router-link
                    class="btn btn-success"
                    :to="{ name: 'review', params: { slug: doctor.slug } }"
                    v-if="doctor.slug"
                    >Send a Review</router-link
                >
                </div>
                <div class="col m-0 p-0">
                    <router-link
                    v-if="fromFilter"
                    class="text-primary text-underline"
                    :to="{
                        name: 'filter',
                        params: {
                            specialization: this.$route.params.specialization,
                            vote: this.$route.params.vote,
                            review: this.$route.params.review,
                        },
                    }"
                    >Torna alla ricerca</router-link
                >
                </div>
            </div>
        </div>
        
        
        <!-- <div class="row row-cols-1 row-cols-md-4 g-4" v-if="doctor">
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
                    RECENSIONI DEL DOTTORE
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
                    </div>
                    SPECIALIZZAZIONI
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
                    SERVIZI
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
                <router-link
                    v-if="fromFilter"
                    class="text-primary text-underline"
                    :to="{
                        name: 'filter',
                        params: {
                            specialization: this.$route.params.specialization,
                            vote: this.$route.params.vote,
                            review: this.$route.params.review,
                        },
                    }"
                    >Torna alla ricerca</router-link
                >
            </div>
        </div> -->
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
            fromFilter: false,
        };
    },
    created() {
        // console.log(this.$route.params);
        if (this.$route.params.specialization) {
            this.selectedSpec = this.$route.params.specialization;
            this.fromFilter = true;
        } else {
            this.selectedSpec = "all";
        }
        if (this.$route.params.vote) {
            this.selectedVote = this.$route.params.vote;
            this.fromFilter = true;
        } else {
            this.selectedSpec = "all";
        }
        if (this.$route.params.review) {
            this.selectedReviews = this.$route.params.review;
            this.fromFilter = true;
        } else {
            this.selectedSpec = "all";
        }

        const url = "http://127.0.0.1:8000/api/doctors/" + this.slug;
        this.getProduct(url);
    },
    methods: {
        getProduct(url) {
            axios.get(url).then((result) => {
                this.doctor = result.data.results.doctors;
                console.log(this.doctor);
            });
        },
    },
};
</script>

<style lang="scss" scoped>
    .container-fluid {
        background-color: #f6f5f8;
        height: calc(100vh - 70px);
        .prof-container {
            background-color: #ffffff;
            border-radius: 19px;
            width: 50%;
            height: 580px;
            .row {
                .col {
                    img {
                        width: 100px;
                        height: 100px;
                    }
                }
            }

        }
    }
</style>
