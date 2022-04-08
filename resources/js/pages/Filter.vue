<template>
    <div class="container-fluid m-0 p-0">
        <!-- <Navbar /> -->
        <div class="row page m-0 p-0">
            <div class="col-2 m-0 p-0">
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
                            v-model="test_v_model"
                            @change="getFilterDoctors(test_v_model)"
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
                <div class="row m-0 p-0">
                    <div class="col">
                        <h5 class="m-2 pb-1">Votazione:</h5>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col m-0 px-3">
                        <select
                            class="select-spec m-0 mb-3"
                            @change="getFilterDoctors(test_v_model)"
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
                </div>
                <div class="row m-0 p-0">
                    <div class="col">
                        <h5 class="m-2 pb-1">Numero recensioni:</h5>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col m-0 px-3">
                        <select
                            class="select-spec m-0 mb-3"
                            @change="getFilterDoctors(test_v_model)"
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
            <div class="col-10 m-0 p-0">
                <div class="row m-0 mt-3 me-3 p-0">
                    <div
                        class="col m-0 p-0 d-flex justify-content-end align-items-center"
                    >
                        <h5 class="m-0 mb-3" v-if="filteredDoctor.length > 1">
                            <strong> {{ filteredDoctor.length }}  dottori </strong>
                            rispettano i filtri selezionati
                        </h5>
                        <h5 class="m-0 mb-3" v-if="filteredDoctor.length == 1">
                            <strong> {{ filteredDoctor.length }}  dottore </strong>
                            rispetta i filtri selezionati
                        </h5>
                        <h5 class="m-0 mb-3" v-if="filteredDoctor.length == 0">
                            <strong> Nessun dottore </strong>
                            rispetta i filtri selezionati
                        </h5>
                    </div>
                </div>
                <div class="row m-0 p-0 mx-3">
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
                                            alt="">
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
                                                {{ doctor.review_mean }} ({{ doctor.reviews.length }} recensioni)
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
            test_v_model: "all",
            selectedVote: "all",
            selectedReviews: "all",
            specs: [],
            filteredDoctor: [],
            doctors: [],
            check_filter: false,
        };
    },
    methods: {
        getFilterDoctors(specialization) {
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
    },
    created() {
        this.getSpecs();
    },
    mounted() {
        if (this.$route.params.specialization) {
            this.test_v_model = this.$route.params.specialization;
        }
        this.getFilterDoctors(this.test_v_model);
    },
};
</script>

<style lang="scss" scoped>
.container-fluid {
    .row.page {
        height: calc(100vh - 70px);
        .col-2 {
            border: 1px solid #3c4996;
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
        .col-10 {
            // border: 1px solid yellowgreen;
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
</style>
