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
                            <option value="all" selected>Tutte</option>
                            <option value="5">5 Stelle</option>
                            <option value="4">4 Stelle</option>
                            <option value="3">3 Stelle</option>
                            <option value="2">2 Stelle</option>
                            <option value="1">1 Stella</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-10 m-0 p-0">
                <div class="row m-0 mt-3 me-3 p-0">
                    <div
                        class="col m-0 p-0 d-flex justify-content-end align-items-center"
                    >
                        <h5 class="m-0 mb-3">
                            <strong> <em> Numero </em> dottori </strong>
                            rispettano i filtri selezionati
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
                                        <img
                                            class="rounded-circle"
                                            :src="doctor.photo"
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
                                                Votazione (<em>numero</em>
                                                recensioni)
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
                                                    >Send a message</router-link
                                                >
                                            </div>
                                        </div>
                                        <div class="row m-0 p-0">
                                            <div class="col">
                                                <router-link
                                                    class="btn rounded-pill btn-color-b"
                                                    :to="{
                                                        name: 'message',
                                                        params: {
                                                            slug: doctor.slug,
                                                        },
                                                    }"
                                                    v-if="doctor.slug"
                                                    >Send a message</router-link
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
                                                    >View Profile</router-link
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

        <!-- <div class="container">
            <div class="filter-container">
                <label for="vote">Filtra per voto</label>
                <select
                    @change="getFilterDoctors($route.params.specialization)"
                    v-model="selectedVote"
                >
                    <option value="5">5 stelle</option>
                    <option value="4">4 stelle</option>
                    <option value="3">3 stelle</option>
                    <option value="2">2 stelle</option>
                    <option value="1">1 stelle</option>
                </select>
                <p>{{ selectedVote }}</p>
            </div>
            <h3>
                Ecco i dottori con specializzazione
                {{ $route.params.specialization.split("_").join(" ") }}
            </h3>
            <ul v-if="filteredDoctor.length > 0">
                <li v-for="doctor in filteredDoctor" :key="doctor.id">
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
                    </div> -->
        <!-- RECENSIONI DEL DOTTORE -->
        <!-- <div v-if="doctor.reviews">
                        <hr />
                        <b><em>Reviews</em></b>
                        <p>{{ doctor.review_mean.toFixed(1) }}</p> -->

        <!-- nope <ul>
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
                        </ul> nope -->
        <!-- </div> -->
        <!-- SPECIALIZZAZIONI -->
        <!-- <hr />
                    <div v-if="doctor.specializations">
                        <b><em>Specializations</em></b>
                        <div
                            v-for="(spec, index) in doctor.specializations"
                            :key="`spec-${index}`"
                        >
                            {{ spec.category }}
                        </div>
                    </div> -->
        <!-- SERVIZI -->
        <!-- <div v-if="doctor.services">
                        <b><em>Services</em></b>
                        <div
                            v-for="(service, index) in doctor.services"
                            :key="`service-${index}`"
                        >
                            {{ service.type }}
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
                    <hr />
                </li>
            </ul> -->
        <!-- {{ doctors }} -->
        <!-- </div>
        <div class="container" v-if="doctors.length === 0">
            <b
                >Non ci sono dottori con specializzazione =
                {{ $route.params.specialization.split("_").join(" ") }}</b
            >
        </div>
        <div class="container" v-if="check_filter">
            <b>Non ci sono dottori.</b>
        </div> -->
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
            specs: [],
            selectedVote: "all",
            filteredDoctor: [],
            doctors: [],
            check_filter: false,
        };
    },
    // props: {
    //     specializations: {
    //         type: String,
    //     },
    // },
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
                        console.log(this.doctors);
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
