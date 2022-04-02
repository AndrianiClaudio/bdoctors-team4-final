<template>
    <div class="cards d-flex justify-content-between">
        <hr class="hr" />
        <!-- PREV PAGE CLICK -->
        <div class="d-flex align-items-center left-arrow">
            <i
                class="fas fa-chevron-left"
                @click.prevent="getDoctors(slider.prev_page_url)"
                v-if="slider.prev_page_url"
            ></i>
            <i class="fa-solid fa-xmark-large" v-else></i>
        </div>

        <!-- CARD DOCTOR -->
        <div
            v-for="doctor in slider.doctors"
            :key="doctor.id"
            class="card p-3 text-center"
            style="width: 25rem"
        >
            <!-- IMAGE -->
            <img
                class="card-img-top img img-fluid mx-auto py-2"
                :src="`http://localhost:8000/storage/${doctor.photo}`"
                alt="Immagine non caricata correttamente."
                v-if="doctor.photo"
            />
            <img
                class="card-img-top img img-fluid mx-auto py-2"
                src="../../../public/images/doctor.jpg"
                alt="Immagine non caricata non esistente."
                v-else
            />
            <div class="card-body">
                <!-- FULLNAME -->
                <h5 class="card-title">
                    {{ doctor.firstname }} {{ doctor.lastname }}
                </h5>

                <!--SPECIALIZATIONS -->
                <p class="card-text">
                    <!-- futuro link ?  -->
                    <em class="d-block text-info">Specializations</em>
                    <span
                        v-for="(
                            specialization, index
                        ) in doctor.specializations"
                        :key="`specialization-${index}`"
                        class="badge rounded-pill bg-info text-dark"
                    >
                        {{ specialization.category }}
                    </span>
                    <span
                        class="text-center"
                        v-if="!doctor.specializations.length > 0"
                        >Dottore senza specializzazioni</span
                    >
                </p>
                <!--SPECIALIZATIONS -->
                <p class="card-text">
                    <!-- futuro link ?  -->
                    <em class="d-block text-success">Services</em>
                    <!-- key concatena service+index, altrimenti possibili conflitti con specializations o altri futuri cicli-->
                    <span
                        v-for="(service, index) in doctor.services"
                        :key="`service-${index}`"
                        class="badge rounded-pill bg-success text-dark"
                    >
                        {{ service.type }}
                    </span>
                    <span v-if="!doctor.services.length > 0"
                        >Dottore senza servizi</span
                    >
                </p>
                <!-- ROUTER LINK -->
                <b class="text-underline text-primary">Options</b>
                <p class="card-text">
                    <router-link
                        class="btn btn-success"
                        type="button"
                        :to="{ name: 'message', params: { slug: doctor.slug } }"
                        v-if="doctor.slug"
                        >Send a Message</router-link
                    >
                    <router-link
                        class="btn btn-success"
                        type="button"
                        :to="{ name: 'review', params: { slug: doctor.slug } }"
                        v-if="doctor.slug"
                        >Send a Review</router-link
                    >
                    <router-link
                        class="btn btn-secondary"
                        type="button"
                        :to="{ name: 'doctor', params: { slug: doctor.slug } }"
                        v-if="doctor.slug"
                        >Show Doctor Info</router-link
                    >
                </p>
            </div>
        </div>
        <!-- NEXT PAGE CLICK -->
        <div class="d-flex align-items-center right-arrow">
            <i
                class="fas fa-chevron-right"
                @click.prevent="getDoctors(slider.next_page_url)"
                v-if="slider.next_page_url"
            ></i>
            <i class="fa-solid fa-xmark-large" v-else></i>
        </div>
        <hr class="hr" />
    </div>
</template>

<script>
export default {
    name: "SliderPaginate",
    data() {
        return {
            slider: {
                doctors: [],
                next_page_url: null,
                prev_page_url: null,
            },
        };
    },
    methods: {
        getDoctors(url) {
            // <!-- al click su freccia: chiamata api ... aggiorna i medici di slider-->
            axios
                .get(url)
                .then((res) => {
                    this.slider.doctors = res.data.results.pagination.data;
                    this.slider.prev_page_url =
                        res.data.results.pagination.prev_page_url;
                    this.slider.next_page_url =
                        res.data.results.pagination.next_page_url;
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
    created() {
        this.getDoctors("http://127.0.0.1:8000/api/doctors/paginate/testCla");
    },
};
</script>

<style lang="scss" scoped>
//
</style>
