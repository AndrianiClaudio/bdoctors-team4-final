<template>
    <div id="Specializations" class="container-fluid">
        <div class="container-fluid g-0 p-3 mt-5" v-if="!loading">
            <i class="fa-solid fa-spinner"></i> Caricamento in corso ...
        </div>
        <div v-else>
            <div class="container-fluid g-0 p-0 m-0" v-if="maxi_media_query">
                <div class="row">
                    <div class="col text-center mt-5">
                        <h1 class="title-section">
                            Le nostre
                            <strong class="color-brand">
                                Specializzazioni
                            </strong>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-center mt-5">
                        <div class="specs me-3">
                            <ul class="list-group">
                                <li
                                    class="list-group-item list-hov-none"
                                    :class="counter == index ? 'selected' : ''"
                                    v-for="(spec, index) in specs"
                                    :key="spec.id"
                                    v-on:click="counter = index"
                                >
                                    <h3>{{ spec.category }}</h3>
                                </li>
                            </ul>
                        </div>
                        <div class="pic rounded-3 me-3" v-if="specs[counter]">
                            <img
                                class="img-spec ten"
                                :src="images[counter]"
                                v-show="
                                    specs[counter].category == 'Allergologia'
                                "
                                alt=""
                            />
                            <img
                                class="img-spec twenty"
                                :src="images[counter]"
                                v-show="
                                    specs[counter].category == 'Cardiologia'
                                "
                                alt=""
                            />
                            <img
                                class="img-spec thirty"
                                :src="images[counter]"
                                v-show="
                                    specs[counter].category == 'Dermatologia'
                                "
                                alt=""
                            />
                            <img
                                class="img-spec"
                                :src="images[counter]"
                                v-show="specs[counter].category == 'Ecografia'"
                                alt=""
                            />
                            <img
                                class="img-spec twenty"
                                :src="images[counter]"
                                v-show="
                                    specs[counter].category == 'Immunologia'
                                "
                                alt=""
                            />
                            <img
                                class="img-spec twenty"
                                :src="images[counter]"
                                v-show="
                                    specs[counter].category ==
                                    'Medicina dello Sport'
                                "
                                alt=""
                            />
                            <img
                                class="img-spec"
                                :src="images[counter]"
                                v-show="specs[counter].category == 'Neurologia'"
                                alt=""
                            />
                            <img
                                class="img-spec fourFive"
                                :src="images[counter]"
                                v-show="specs[counter].category == 'Oculistica'"
                                alt=""
                            />
                            <img
                                class="img-spec"
                                :src="images[counter]"
                                v-show="specs[counter].category == 'Pediatria'"
                                alt=""
                            />
                            <img
                                class="img-spec seventy"
                                :src="images[counter]"
                                v-show="specs[counter].category == 'Psicologia'"
                                alt=""
                            />
                            <img
                                class="img-spec ten"
                                :src="images[counter]"
                                v-show="
                                    specs[counter].category ==
                                    'Radiologia e Risonanza'
                                "
                                alt=""
                            />
                        </div>
                        <div class="spec-desc">
                            <!-- Specializzazione active in quel momento -->
                            <div v-if="specs[counter]">
                                <h2 class="fw-bold">
                                    {{ specs[counter].category }}
                                </h2>
                                <p v-html="specs[counter].description"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid g-0 p-3 mt-5" v-else>
                <!-- SELECT A CATEGORY -->
                <select
                    class="form-select form-select-md"
                    aria-label=".form-select-sm specialization"
                    v-model="selected.mini"
                >
                    <option
                        v-for="(spec, index) in specs"
                        :key="`mini-spec-${spec.id}`"
                        :value="getValueFromStr(spec.category)"
                        @click="setCounter(index)"
                    >
                        {{ spec.category }}
                    </option>
                </select>
                <!-- CAT. IMAGE -->
                <img
                    class="img img-fluid"
                    :src="getCurrentImage"
                    alt="Immagine non caricata correttamente"
                />
                <!-- CAT. DESCRIPTION -->
                <p class="mini-p">
                    <em class="fs-4">{{ specs[counter].description }}</em>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Specializations",
    data() {
        return {
            loading: false,
            counter: 0,
            specs: {
                Type: Array,
            },
            // mini
            maxi_media_query: false,
            selected: {
                mini: null,
            },
            images: [
                "https://www.clinicaguarnieri.it/wp-content/uploads/2018/04/allergologia-2.jpg",
                "https://meditronsrl.it/wp-content/uploads/2021/08/Monitor-paziente-per-ospedale.jpg",
                "https://www.clinicamedicasanluca.it/wp-content/uploads/2018/07/dermatologia.jpg",
                "https://www.cmsanmarco.com/wp-content/uploads/2017/08/GINECOLOGIA3-1024x640.jpg",
                "https://www.dire.it/wp-content/uploads/2020/10/medici-laboratorio.jpg",
                "https://www.sanlucapadova.it/wp-content/uploads/2020/01/visita-medico-sportiva-padova.jpg",
                "https://cdn.pixabay.com/photo/2021/12/02/22/15/x-ray-6841384_960_720.jpg",
                "https://www.saluteecultura.it/wp-content/uploads/2018/07/oculistica-occhio-visita-specialistica.jpg",
                "https://nubramedica.it/wp-content/uploads/2017/02/pediatria.jpg",
                "https://images.pexels.com/photos/5699456/pexels-photo-5699456.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260",
                "https://www.istitutocicio.it/prestazioni_specialistiche-radiodiagnostica-tradizionale/images/istituto-cicio-radiologia-04.jpg",
            ],
        };
    },
    computed: {
        getCurrentImage() {
            return this.images[this.counter];
        },
    },
    methods: {
        setCounter(i) {
            // console.log(this.counter, i);
            this.counter = i;
        },
        getValueFromStr(str) {
            return str.split(" ").join("_");
        },
        getSpecs() {
            axios
                .get("api/specializations")
                .then((res) => {
                    this.specs = res.data.results.specs;
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    this.selected.mini = this.specs[this.counter].category
                        .split(" ")
                        .join("_");
                    this.loading = true;
                });
        },
        mediaQueryCheck(scr) {
            if (scr.matches) {
                // If media query matches
                this.maxi_media_query = false;
            } else {
                this.maxi_media_query = true;
            }
        },
    },
    created() {
        let screen = window.matchMedia("(max-width: 700px)");
        this.mediaQueryCheck(screen); // Call listener function at run time
        screen.addEventListener("change", () => {
            this.mediaQueryCheck(screen);
        });

        this.getSpecs();
    },
};
</script>

<style lang="scss" scoped>
.container-fluid {
    // height: 850px;
    .row {
        .col {
            .title-section {
                .color-brand {
                    color: #3c4996;
                }
            }
        }
    }
    .row {
        .col {
            .specs {
                .list-group {
                    width: 300px;
                    .list-hov-none:hover {
                        cursor: pointer;
                    }
                }
            }
            .pic {
                background-color: gray;
                max-width: 470px;
                overflow: hidden;
                .img-spec {
                    object-fit: cover;
                    max-width: 100%;
                    height: 100%;
                }
                .img-spec.ten {
                    object-position: 10%;
                }
                .img-spec.twenty {
                    object-position: 20%;
                }
                .img-spec.thirty {
                    object-position: 30%;
                }
                .img-spec.fourFive {
                    object-position: 45%;
                }
                .img-spec.seventy {
                    object-position: 70%;
                }
            }
            .spec-desc {
                width: 400px;
            }
        }
    }
    .mini-p {
        text-align: center;
    }
}

.selected {
    background-color: #5161b9;
}
</style>
