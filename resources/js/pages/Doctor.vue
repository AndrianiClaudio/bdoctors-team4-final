<template>
    <div
        class="container-fluid d-flex justify-content-center align-items-center m-0 p-0"
    >
        <div class="prof-container width-ifsmall p-2">
            <div class="row m-0 p-0">
                <div class="min-col col m-0 p-0">
                    <img
                        v-if="doctor.photo"
                        :src="doctor.photo"
                        class="img img-fluid rounded-circle m-3"
                        alt=""
                    />
                    <img
                        v-else
                        class="img img-fluid rounded-circle m-3"
                        src="https://www.ilcedrangolo.it/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png"
                        alt=""
                    />
                </div>
                <div
                    class="col m-3 ms-4 d-flex flex-column justify-content-around m-0 p-0"
                >
                    <div class="row m-0 mb-2 p-0">
                        <div class="col m-0 p-0">
                            <h3 class="mb-0">
                                Dr. {{ doctor.firstname }} {{ doctor.lastname }}
                            </h3>
                        </div>
                    </div>
                    <div class="row m-0 p-0">
                        <div class="col m-0 p-0">
                            <h4 v-if="doctor.specializations">
                                <span
                                    v-for="(
                                        spec, index
                                    ) in doctor.specializations"
                                    :key="`spec-${index}`"
                                >
                                    {{ spec.category }}
                                </span>
                            </h4>
                            <h5 v-else>
                                Nessua specializzazione &egrave; stata ancora
                                selezionata
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
                                </span></router-link
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between m-0 p-0">
                <div class="col-xs-12 col-lg-5 m-0 ms-3 p-0">
                    <div class="row m-0 p-0">
                        <div class="col info-item m-0 mt-3 p-0">
                            Email: {{ doctor.email }}
                        </div>
                    </div>
                    <div v-if="doctor.phone" class="row m-0 p-0">
                        <div class="col info-item mt-3 m-0 p-0">
                            Telefono: {{ doctor.phone }}
                        </div>
                    </div>
                    <div v-if="doctor.address" class="row m-0 p-0">
                        <div class="col info-item mt-3 m-0 p-0">
                            Indirizzo: {{ doctor.address }}
                        </div>
                    </div>
                    <div v-if="doctor.services" class="row m-0 p-0">
                        <div class="col info-item mt-3 m-0 p-0">
                            <b><em>Servizi</em></b>
                            <ul>
                                <li
                                    v-for="(service, index) in doctor.services"
                                    :key="`service-${index}`"
                                >
                                    {{ service.type }}
                                    <ul>
                                        <li class="list-group">
                                            {{ service.description }}
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-6 mt-3 me-3 d-flex justify-content-end m-0 p-0"
                >
                    <embed
                        class="cv dis-none"
                        v-if="doctor.cv"
                        :src="`http://localhost:8000/storage/${doctor.cv}`"
                        type=""
                        width="100%"
                        height="100%"
                    />
                </div>
            </div>
            <div class="row mt-4 mb-2 m-0 p-0">
                <div class="col ms-3 m-0 p-0">
                    <router-link
                        class="btn go-back text-light rounded-pill"
                        :to="{
                            name: 'filter',
                            params: {
                                specialization:
                                    this.$route.params.specialization,
                                vote: this.$route.params.vote,
                                review: this.$route.params.review,
                            },
                        }"
                        >Torna alla ricerca</router-link
                    >
                </div>
                <div class="col d-flex justify-content-end m-0 me-3 p-0">
                    <router-link
                        class="btn me-3 send-rev text-light rounded-pill"
                        :to="{ name: 'review', params: { slug: doctor.slug } }"
                        v-if="doctor.slug"
                        >Recensici il dottore</router-link
                    >

                    <router-link
                        class="btn send-mes text-light rounded-pill"
                        :to="{ name: 'message', params: { slug: doctor.slug } }"
                        v-if="doctor.slug"
                        >Invia un messaggio</router-link
                    >
                </div>
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
            loading: false,
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
            this.loading = false;
            axios
                .get(url)
                .then((result) => {
                    this.doctor = result.data.results.doctors;
                    // console.log(this.doctor);
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    this.loading = true;
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
        // height: 580px;
        .row {
            .min-col {
                max-width: calc(120px + 1.5rem);
                img {
                    @media screen and (max-width: 800px) {
                        text-align: center;
                    }
                    min-width: 120px;
                    height: 120px;
                }
            }
            // .col {
            //     img {
            //         @media screen and (max-width: 800px) {
            //             text-align: center;
            //         }
            //         min-width: 120px;
            //         height: 120px;
            //     }
            // }
            .col.info-item {
                font-size: 1.2em;
            }
        }
    }
}
.cv {
    border-radius: 5px;
}
.go-back {
    background-color: #646eb3;
    &:hover {
        background-color: #606899;
    }
}
.send-rev {
    background-color: #7b83b3;
    &:hover {
        background-color: #606899;
    }
}
.send-mes {
    background-color: #646eb3;
    &:hover {
        background-color: #606899;
    }
}
@media screen and(max-width: 600px) {
    .width-ifsmall {
        width: 90% !important;
    }
    .dis-none {
        display: none;
    }
}
</style>
