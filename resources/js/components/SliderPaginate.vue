<template>
    <div class="container-fluid g-0 p-3 mt-5" v-if="!loading">
        <i class="fa-solid fa-spinner"></i> Caricamento in corso ...
    </div>
    <div
        v-else
        id="SliderPaginate"
        class="cards d-flex justify-content-between mb-5 mt-5"
    >
        <hr class="hr" />
        <!-- PREV PAGE CLICK -->
        <div class="d-flex align-items-center left-arrow">
            <i
                role="button"
                class="fas fa-chevron-left p-3"
                @click.prevent="getPremiumDoctors(slider.prev_page_url)"
                v-if="slider.prev_page_url"
            ></i>
            <i class="fa-solid fa-xmark-large" v-else></i>
        </div>

        <!-- CARD DOCTOR -->
        <div class="card" v-for="doctor in slider.doctors" :key="doctor.id">
            <div class="img-box">
                <img
                    :src="`http://localhost:8000/storage/${doctor.photo}`"
                    alt="Immagine profilo del dottore."
                    v-if="doctor.photo"
                />
                <img
                    v-else
                    class="card-img-top img mx-auto py-2"
                    src="https://www.ilcedrangolo.it/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png"
                />
            </div>
            <div class="details">
                <h2>{{ doctor.firstname }} {{ doctor.lastname }}</h2>
                <div class="spec">
                    <span
                        v-for="(
                            specialization, index
                        ) in doctor.specializations"
                        :key="`specialization-${index}`"
                    >
                        {{ specialization.category }}
                    </span>
                    <span
                        class="text-center"
                        v-if="!doctor.specializations.length > 0"
                        >Dottore senza specializzazioni</span
                    >
                </div>
                <div class="actions">
                    <router-link
                        class="button"
                        type="button"
                        :to="{
                            name: 'message',
                            params: { slug: doctor.slug },
                        }"
                        v-if="doctor.slug"
                        ><i class="far fa-envelope"></i
                    ></router-link>
                    <router-link
                        class="button"
                        type="button"
                        :to="{
                            name: 'review',
                            params: { slug: doctor.slug },
                        }"
                        v-if="doctor.slug"
                        ><i class="far fa-star"></i
                    ></router-link>
                    <router-link
                        class="button"
                        type="button"
                        :to="{
                            name: 'doctor',
                            params: { slug: doctor.slug },
                        }"
                        v-if="doctor.slug"
                        ><i class="fa-solid fa-circle-info"></i
                    ></router-link>
                </div>
            </div>
        </div>
        <!-- NEXT PAGE CLICK -->
        <div class="d-flex align-items-center right-arrow">
            <i
                role="button"
                class="fas fa-chevron-right p-3"
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
            loading: false,
            slider: {
                doctors: [],
                next_page_url: null,
                prev_page_url: null,
            },
            screen: window.matchMedia("(max-width: 800px)"),
            // maxi_media_query: null,
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
                    // console.log(res);
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    this.loading = true;
                });
        },
        mediaQueryCheck(scr) {
            if (scr.matches) {
                // If media query matches
                // this.maxi_media_query = true;
                // console.log(this.maxi_media_query);
                this.loading = false;
                this.getPremiumDoctors(
                    "http://127.0.0.1:8000/api/doctors/paginate/premium/single"
                );
            } else {
                this.loading = false;
                this.getPremiumDoctors(
                    "http://127.0.0.1:8000/api/doctors/paginate/premium"
                );
                // this.maxi_media_query = false;
                // console.log(this.maxi_media_query);
            }
        },
    },
    created() {
        this.mediaQueryCheck(this.screen); // Call listener function at run time
        this.screen.addEventListener("change", () => {
            this.mediaQueryCheck(this.screen);
        });
        // this.getPremiumDoctors(
        //     "http://127.0.0.1:8000/api/doctors/paginate/premium"
        // );
        // this.getDoctors("http://127.0.0.1:8000/api/doctors/paginate/testCla");
    },
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");
.cards {
    gap: 2em;
}
.card {
    display: flex;
    flex-direction: row;
    border-radius: 25px;
    flex-basis: calc(80% / 3);
    justify-content: space-around;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.5);

    .img-box {
        padding-left: 1em;
        text-align: center;
    }
    .img-box img {
        width: 75px;
        border-radius: 50%;
    }
    .details {
        padding: 2em;
    }
}

.button {
    border: none;
    background: none;
    font-size: 24px;

    color: #505da8;
    cursor: pointer;
    transition: 0.5s;
    &:hover {
        color: #3c4996;
    }
}

.left-arrow,
.right-arrow {
    margin: auto auto;
    min-width: 43px;
    max-height: 43px;
    cursor: pointer;
    &:hover {
        border-radius: 2rem;
        background-color: #96fbc4;
        color: white;
    }
}

@media screen and (max-width: 992px) {
    .card {
        flex-direction: column;
    }
}
@media screen and (max-width: 800px) {
    .card {
        flex-direction: row;
        flex-basis: unset;
    }
}
@media screen and (max-width: 425px) {
    .img-box {
        display: none;
    }
}
</style>
