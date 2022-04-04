<template>
    <div class="container-fluid p-0">
        <Navbar />
        <div class="container" v-if="doctors.length > 0">
            <div class="filter-container">
                <label for="vote">ordina per miglior voto</label>
                <select v-model="selectedVote">
                    <option value="5">5 stelle</option>
                    <option value="4">4 stelle</option>
                    <option value="3">3 stelle</option>
                    <option value="2">2 stelle</option>
                    <option value="1">1 stelle</option>
                </select>
            </div>
            <h3>
                Ecco i dottori con specializzazione
                {{ $route.query.specialization.split("_").join(" ") }}
            </h3>
            <ul>
                <li v-for="doctor in doctors" :key="doctor.id">
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
                        <b><em>Reviews</em></b>
                        <ul>
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
                        </ul>
                        <!-- <div
                            v-for="(review, index) in doctor.reviews"
                            :key="`review-${index}`"
                        > -->
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
            </ul>
            <!-- {{ doctors }} -->
        </div>
        <div class="container" v-else>
            <b
                >Non ci sono dottori con specializzazione =
                {{ $route.query.specialization }}</b
            >
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
            selectedVote: "",
            doctors: {
                Type: Array,
            },
        };
    },
    props: {
        specializations: {
            type: String,
        },
    },
    methods: {
        getFilterDoctors(specialization) {
            axios
                .post(`/api/doctors?specialization=${specialization}`)
                .then((res) => {
                    if (this.selectedVote == 5) {
                        console.log("ciao");
                    }
                    this.doctors = res.data.results.doctors;
                    //console.log(this.doctors);
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
    created() {
        console.log(this.selectedVote);
        this.getFilterDoctors(this.$route.query.specialization);
        //console.log($route.query.specialization.split("_").join(" "));
    },
};
</script>

<style></style>
