<template>
    <div id="SliderPaginate" class="cards">
        <div class="card" v-for="doctor in slider.doctors" :key="doctor.id">
            <div class="img-avatar">
                <img
                    :src="`http://localhost:8000/storage/${doctor.photo}`"
                    alt="Immagine profilo del dottore."
                    v-if="doctor.photo"
                />
                <img
                    v-else
                    class="card-img-top img img-fluid mx-auto py-2"
                    src="https://www.ilcedrangolo.it/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png"
                />
            </div>
            <div class="card-text">
                <div class="portada"></div>
                <div class="title-total">
                    <div
                        class="title"
                        v-for="(service, index) in doctor.services"
                        :key="`service-${index}`"
                    >
                        {{ specialization.category }}
                    </div>
                    <h2>{{ doctor.firstname }} {{ doctor.lastname }}</h2>

                    <div class="desc">
                        Morgan has collected ants since they were six years old
                        and now has many dozen ants but none in their pants.
                    </div>
                    <div class="actions">
                        <button><i class="far fa-heart"></i></button>
                        <button><i class="far fa-envelope"></i></button>
                        <button><i class="fas fa-user-friends"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <!-- PREV PAGE CLICK -->
        <div class="d-flex align-items-center left-arrow">
            <i
                class="fas fa-chevron-left"
                @click.prevent="getPremiumDoctors(slider.prev_page_url)"
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
                alt="Immagine profilo del dottore."
                v-if="doctor.photo"
            />
            <!-- Else -->
            <img
                v-else
                class="card-img-top img img-fluid mx-auto py-2"
                src="https://www.ilcedrangolo.it/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png"
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
                @click.prevent="getPremiumDoctors(slider.next_page_url)"
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
        getPremiumDoctors(url) {
            // <!-- al click su freccia: chiamata api ... aggiorna i medici di slider-->
            axios
                .get(url)
                .then((res) => {
                    this.slider.doctors = res.data.results.pagination.data;
                    // console.log(res.data.results.pagination);
                    this.slider.prev_page_url =
                        res.data.results.pagination.prev_page_url;
                    this.slider.next_page_url =
                        res.data.results.pagination.next_page_url;
                })
                .catch((err) => {
                    console.error(err);
                });
        },

        // getDoctors(url) {
        //     // <!-- al click su freccia: chiamata api ... aggiorna i medici di slider-->
        //     axios
        //         .get(url)
        //         .then((res) => {
        //             this.slider.doctors = res.data.results.pagination.data;
        //             this.slider.prev_page_url =
        //                 res.data.results.pagination.prev_page_url;
        //             this.slider.next_page_url =
        //                 res.data.results.pagination.next_page_url;
        //         })
        //         .catch((err) => {
        //             console.error(err);
        //         });
        // },
    },
    created() {
        this.getPremiumDoctors(
            "http://127.0.0.1:8000/api/doctors/paginate/premium"
        );
        // this.getDoctors("http://127.0.0.1:8000/api/doctors/paginate/testCla");
    },
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");
.cards {
    font-family: Roboto, sans-serif;
    margin: 0;
    height: 100vh;
    display: grid;
    align-items: center;
    justify-items: center;
    background-image: linear-gradient(to top, #96fbc4 0%, #f9f586 100%);
}
.card {
    background: #fff;
    border-radius: 4px;
    box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.5);
    max-width: 400px;
    display: flex;
    flex-direction: row;
    border-radius: 25px;
    position: relative;
}
.card h2 {
    margin: 0;
    padding: 0 1rem;
}
.card .title {
    padding: 1rem;
    text-align: right;
    color: green;
    font-weight: bold;
    font-size: 12px;
}
.card .desc {
    padding: 0.5rem 1rem;
    font-size: 12px;
}
.card .actions {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    align-items: center;
    padding: 0.5rem 1rem;
}
.card svg {
    width: 85px;
    height: 85px;
    margin: 0 auto;
}

.img-avatar {
    width: 80px;
    height: 80px;
    position: absolute;
    border-radius: 50%;
    border: 6px solid white;
    background-image: linear-gradient(-60deg, #16a085 0%, #f4d03f 100%);
    top: 15px;
    left: 85px;
}

.card-text {
    display: grid;
    grid-template-columns: 1fr 2fr;
}

.title-total {
    padding: 2.5em 1.5em 1.5em 1.5em;
}

path {
    fill: white;
}

.img-portada {
    width: 100%;
}

.portada {
    width: 100%;
    height: 100%;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    background-image: url("https://m.media-amazon.com/images/S/aplus-media/vc/cab6b08a-dd8f-4534-b845-e33489e91240._CR75,0,300,300_PT0_SX300__.jpg");
    background-position: bottom center;
    background-size: cover;
}

button {
    border: none;
    background: none;
    font-size: 24px;
    color: #8bc34a;
    cursor: pointer;
    transition: 0.5s;
    &:hover {
        color: #4caf50;
        transform: rotate(22deg);
    }
}
</style>
