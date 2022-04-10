<template>
    <div class="container-fluid m-0 p-0">
        <!-- <Navbar /> -->
        <div class="row page m-0 p-0">
            <div class="col-xl-2 col-xs-12 m-0 p-0">
                <div class="row m-0 p-0">
                    <div class="col">
                        <h4 class="fw-bold border-bottom m-2 pb-2">
                            Filtra per:
                        </h4>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col">
                        <h5 class="m-2 pb-1">Specializzazione:</h5>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col m-0 px-3">
                        <select
                            class="select-spec m-0 mb-3"
                            name=""
                            id=""
                            v-model="selectedSpec"
                            @change="getFilterDoctors(selectedSpec)"
                        >
                            <option value="all">Tutti</option>
                            <option
                                v-for="(spec, index) in specs"
                                :key="`spec-${index}`"
                                :value="spec.category.toLowerCase()"
                            >
                                {{ spec.category }}
                            </option>
                        </select>
                    </div>
                </div>
                <!-- <div class="row m-0 p-0">
                    <div class="col">
                        <h5 class="m-2 pb-1">Votazione:</h5>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col m-0 px-3">
                        <select
                            class="select-spec m-0 mb-3"
                            @change="getFilterDoctors(selectedSpec)"
                            v-model="selectedVote"
                        >
                            <option value="all">Tutte</option>
                            <option value="5">5 Stelle</option>
                            <option value="4">4 Stelle</option>
                            <option value="3">3 Stelle</option>
                            <option value="2">2 Stelle</option>
                            <option value="1">1 Stella</option>
                        </select>
                    </div>
                </div> -->
                <div class="row m-0 p-0">
                    <div class="col">
                        <h5 class="m-2 pb-1">Numero recensioni:</h5>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col m-0 px-3">
                        <select
                            class="select-spec m-0 mb-3"
                            @change="getFilterDoctors(selectedSpec)"
                            v-model="selectedReviews"
                        >
                            <option value="all">Tutte</option>
                            <option value="25">&#62; 25</option>
                            <option value="20">20-25</option>
                            <option value="15">15-20</option>
                            <option value="10">10-15</option>
                            <option value="5">&#60; 10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-xs-12 m-0 p-0">
                <div class="row m-0 mt-3 me-3 p-0">
                    <div
                        class="col m-0 p-0 d-flex justify-content-between align-items-center"
                    >
                        <div>
                            <em>Voto: </em>
                            <i
                                class="fa-solid fa-arrow-down-1-9"
                                @click.prevent="setVote('asc')"
                            ></i>
                            <i
                                class="fa-solid fa-arrow-up-9-1"
                                @click.prevent="setVote('desc')"
                            ></i>
                            <br>
                            <em>Numero recensioni :</em>
                            <i
                                class="fa-solid fa-arrow-down-1-9"
                                @click.prevent="setReview('asc')"
                            ></i>
                            <i
                                class="fa-solid fa-arrow-up-9-1"
                                @click.prevent="setReview('desc')"
                            ></i>
                            <!-- setReview -->
                        </div>
                        <h5 class="m-0 dis-none mb-3" v-if="filteredDoctor.length > 1">
                            <strong>
                                {{ filteredDoctor.length }} dottori
                            </strong>
                            rispettano i filtri selezionati
                        </h5>
                        <h5 class="m-0 dis-none mb-3" v-if="filteredDoctor.length == 1">
                            <strong>
                                {{ filteredDoctor.length }} dottore
                            </strong>
                            rispetta i filtri selezionati
                        </h5>
                        <h5 class="m-0 dis-none mb-3" v-if="filteredDoctor.length == 0">
                            <strong> Nessun dottore </strong>
                            rispetta i filtri selezionati
                        </h5>
                    </div>
                </div>
                <div class="row m-0 p-0 mx-3" v-if="loading">
                    <div class="col m-0 p-0">
                        <ul class="list-group" v-if="filteredDoctor.length > 0">
                            <li
                                class="list-group-item"
                                v-for="doctor in filteredDoctor"
                                :key="doctor.id"
                            >
                                <div class="row m-0 p-0">
                                    <div
                                        class="col m-0 p-0 d-flex justify-content-center"
                                    >
                                        <!-- Se c'e' doctor.photo -->
                                        <img
                                            v-if="doctor.photo"
                                            class="rounded-circle"
                                            :src="`http://localhost:8000/storage/${doctor.photo}`"
                                            alt="Immagine profilo del dottore."
                                        />
                                        <!-- Else -->
                                        <img
                                            v-else
                                            class="rounded-circle"
                                            src="https://www.ilcedrangolo.it/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png"
                                            alt=""
                                        />
                                    </div>
                                    <div
                                        class="col d-flex flex-column justify-content-around m-0 p-0"
                                    >
                                        <div class="row m-0 p-0">
                                            <div class="col m-0 p-0">
                                                <div
                                                    class="text-uppercase fw-bold text-lighter"
                                                    v-for="(
                                                        spec, index
                                                    ) in doctor.specializations"
                                                    :key="`spec-${index}`"
                                                >
                                                    {{ spec.category }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0 p-0">
                                            <div class="col m-0 p-0">
                                                <h4 class="mb-0">
                                                    Dr. {{ doctor.firstname }}
                                                    {{ doctor.lastname }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row m-0 p-0">
                                            <div class="col m-0 p-0">
                                                {{ doctor.review_mean }} ({{
                                                    doctor.reviews.length
                                                }}
                                                recensioni)
                                                <!-- <em># recensioni: </em> -->
                                                <!-- {{ doctor.reviews.length }} -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col m-0 p-0">
                                        <ul v-if="doctor.services">
                                            <li
                                                v-for="(
                                                    service, index
                                                ) in doctor.services"
                                                :key="`service-${index}`"
                                            >
                                                {{ service.type }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div
                                        class="col d-flex flex-column justify-content-around align-items-center m-0 p-0"
                                    >
                                        <div class="row m-0 p-0">
                                            <div class="col">
                                                <router-link
                                                    class="btn rounded-pill btn-color-a"
                                                    :to="{
                                                        name: 'message',
                                                        params: {
                                                            slug: doctor.slug,
                                                            specialization:
                                                                selectedSpec,
                                                            vote: selectedVote,
                                                            review: selectedReviews,
                                                        },
                                                    }"
                                                    v-if="doctor.slug"
                                                    >Messaggia</router-link
                                                >
                                            </div>
                                        </div>

                                        <div class="row m-0 p-0">
                                            <div class="col">
                                                <router-link
                                                    class="btn rounded-pill btn-color-b"
                                                    :to="{
                                                        name: 'doctor',
                                                        params: {
                                                            slug: doctor.slug,
                                                            specialization:
                                                                selectedSpec,
                                                            vote: selectedVote,
                                                            review: selectedReviews,
                                                        },
                                                    }"
                                                    v-if="doctor.slug"
                                                    >Vedi profilo</router-link
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div v-else>Caricamento dottori in corso ...</div>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
export default {
    name: "FilterSpec",
    components: {
        Navbar,
    },
    data() {
        return {
            loading: false,
            selectedSpec: "all",
            selectedVote: "all",
            selectedReviews: "all",
            specs: [],
            filteredDoctor: [],
            doctors: [],
            check_filter: false,
            tmp: [],

            // voteAsc: false,
            // voteDesc: false,
        };
    },
    methods: {
        getFilterDoctors(specialization) {
            this.loading = false;

            axios
                .post(`/api/doctors?specialization=${specialization}`)
                .then((res) => {
                    this.filteredDoctor = res.data.results.doctors;
                    // console.log(this.filteredDoctor);
                    if (this.selectedVote && this.selectedVote !== "all") {
                        this.check_filter = false;
                        this.doctors = this.filteredDoctor;
                        this.filteredDoctor = [];
                        // console.log(this.doctors);
                        this.doctors.forEach((doctor) => {
                            if (
                                doctor.review_mean >=
                                    parseInt(this.selectedVote) &&
                                doctor.review_mean <
                                    parseInt(this.selectedVote) + 1
                            ) {
                                this.filteredDoctor.push(doctor);
                            }
                        });
                        if (this.filteredDoctor.length === 0) {
                            this.check_filter = true;
                        }
                    }

                    if (this.selectedReviews != "all") {
                        if (this.selectedReviews === "25") {
                            this.filteredDoctor = this.filteredDoctor.filter(
                                (doctor) => {
                                    return (
                                        doctor.reviews.length >
                                        parseInt(this.selectedReviews)
                                    );
                                }
                            );
                        } else if (this.selectedReviews === "5") {
                            //
                            this.filteredDoctor = this.filteredDoctor.filter(
                                (doctor) => {
                                    return (
                                        doctor.reviews.length <
                                        parseInt(this.selectedReviews) + 5
                                    );
                                }
                            );
                        } else {
                            // VALORI DI MEZZO
                            this.filteredDoctor = this.filteredDoctor.filter(
                                (doctor) => {
                                    return (
                                        doctor.reviews.length >=
                                            parseInt(this.selectedReviews) &&
                                        doctor.reviews.length <=
                                            parseInt(this.selectedReviews) + 5
                                    );
                                }
                            );
                        }
                    }
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    axios
                        .post(
                            `/api/doctors/standard?specialization=${specialization}`
                        )
                        .then((res) => {
                            this.tmp = res.data.results.doctors;
                            // console.log(this.tmp);
                            if (
                                this.selectedVote &&
                                this.selectedVote !== "all"
                            ) {
                                this.check_filter = false;
                                this.doctors = this.tmp;
                                this.tmp = [];
                                // console.log(this.doctors);
                                this.doctors.forEach((doctor) => {
                                    if (
                                        doctor.review_mean >=
                                            parseInt(this.selectedVote) &&
                                        doctor.review_mean <
                                            parseInt(this.selectedVote) + 1
                                    ) {
                                        this.tmp.push(doctor);
                                    }
                                });
                                if (this.tmp.length === 0) {
                                    this.check_filter = true;
                                }
                            }

                            if (this.selectedReviews != "all") {
                                if (this.selectedReviews === "25") {
                                    this.tmp = this.tmp.filter((doctor) => {
                                        return (
                                            doctor.reviews.length >
                                            parseInt(this.selectedReviews)
                                        );
                                    });
                                } else if (this.selectedReviews === "5") {
                                    //
                                    this.tmp = this.tmp.filter((doctor) => {
                                        return (
                                            doctor.reviews.length <
                                            parseInt(this.selectedReviews) + 5
                                        );
                                    });
                                } else {
                                    // VALORI DI MEZZO
                                    this.tmp = this.tmp.filter((doctor) => {
                                        return (
                                            doctor.reviews.length >=
                                                parseInt(
                                                    this.selectedReviews
                                                ) &&
                                            doctor.reviews.length <=
                                                parseInt(this.selectedReviews) +
                                                    5
                                        );
                                    });
                                }
                            }
                        })
                        .catch((err) => {
                            console.error(err);
                        })
                        .then(() => {
                            this.filteredDoctor = this.filteredDoctor.concat(
                                this.tmp
                            );
                            this.tmp = [];

                            console.log(this.filteredDoctor);
                            this.loading = true;
                        });
                });
        },
        getSpecs() {
            axios
                .get("api/specializations")
                .then((res) => {
                    // console.log(res.data.results.specs);
                    this.specs = res.data.results.specs;
                    // console.log(this.specs);
                })
                .catch((err) => {
                    console.error(err);
                });
        },
        setVote(type) {
            if (type === "asc") {
                this.filteredDoctor = this.filteredDoctor.sort(
                    this.compare("review_mean", "asc")
                );
                // ordina asc
                // alert("asc");
            } else if (type === "desc") {
                // ordina desc
                // alert("desc");
                this.filteredDoctor = this.filteredDoctor.sort(
                    this.compare("review_mean", "desc")
                );
            }
        },
        setReview(type) {
            if (type === "asc") {
                this.filteredDoctor = this.filteredDoctor.sort(
                    this.compare("reviews_count", "asc")
                );
                // ordina asc
                // alert("asc");
            } else if (type === "desc") {
                // ordina desc
                // alert("desc");
                this.filteredDoctor = this.filteredDoctor.sort(
                    this.compare("reviews_count", "desc")
                );
            }
        },

        compare(key, order = "desc") {
            return (a, b) => {
                if (!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) {
                    return 0;
                }
                let varA =
                    typeof a[key] === "string" ? a[key].toLowerCase() : a[key];
                let varB =
                    typeof b[key] === "string" ? b[key].toLowerCase() : b[key];

                let comparison = 0;
                if (varA > varB) {
                    comparison = 1;
                } else if (varA < varB) {
                    comparison = -1;
                }

                return order == "desc" ? comparison * -1 : comparison;
            };
        },
    },
    created() {
        // const products = [
        //     { title: "A", price: 10 },
        //     { title: "B", price: 5 },
        //     { title: "C", price: 8 },
        // ];

        // console.log(
        //     this.filteredDoctor.sort(this.compare("review_mean", "asc"))
        // );
        // console.log(this.$route.params);
        this.getSpecs();
    },
    mounted() {
        // console.log(this.$route.params.specialization);
        // if (!this.$route.params) {
        //     this.$route.params.specialization = "all";
        //     this.$route.params.selectedVote = "all";
        //     this.$route.params.selectedReview = "all";
        // }
        // console.log(this.$route.params);
        if (this.$route.params.specialization) {
            this.selectedSpec = this.$route.params.specialization;
        }
        if (this.$route.params.vote) {
            this.selectedVote = this.$route.params.vote;
        }
        if (this.$route.params.review) {
            this.selectedReviews = this.$route.params.review;
        }
        // console.log(this.$route.params);
        this.getFilterDoctors(this.selectedSpec);
    },
};
</script>

<style lang="scss" scoped>
.container-fluid {
    .row.page {
        height: calc(100vh - 70px);
        .col-xl-2 {
            // height: calc(100vh - 70px);
            border-right: 1px solid #3c4996;
            .row {
                .col {
                    .select-spec {
                        width: 100%;
                        border-radius: 15px;
                        &:focus {
                            outline: none;
                        }
                    }
                }
            }
        }
        .col-xl-10 {
            height: calc(100vh - 70px);
            overflow: auto;
            .row {
                .col {
                    .list-group {
                        .list-group-item {
                            .row {
                                .col {
                                    img {
                                        width: 100px;
                                        height: 100px;
                                    }
                                }
                                .col {
                                    .row {
                                        .col {
                                            .text-lighter {
                                                color: #b5b5b5;
                                            }
                                            .btn-color-a {
                                                background-color: #7b83b3;
                                                &:hover {
                                                    background-color: #606899;
                                                }
                                            }
                                            .btn-color-b {
                                                background-color: #646eb3;
                                                &:hover {
                                                    background-color: #606899;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
@media screen and(max-width: 600px) {
    .dis-none {
        display: none;
    }
}
</style>
