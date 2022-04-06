<template>
    <div id="Specializations" class="container-fluid">
        <div class="row">
            <div class="col text-center mt-5">
                <h1 class="title-section">
                    Le nostre
                    <strong class="color-brand"> Specializzazioni </strong>
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
                        v-show="specs[counter].category == 'Allergologia'"
                        src="https://www.clinicaguarnieri.it/wp-content/uploads/2018/04/allergologia-2.jpg"
                        alt=""
                    />
                    <img
                        class="img-spec twenty"
                        v-show="specs[counter].category == 'Cardiologia'"
                        src="https://meditronsrl.it/wp-content/uploads/2021/08/Monitor-paziente-per-ospedale.jpg"
                        alt=""
                    />
                    <img
                        class="img-spec thirty"
                        v-show="specs[counter].category == 'Dermatologia'"
                        src="https://www.clinicamedicasanluca.it/wp-content/uploads/2018/07/dermatologia.jpg"
                        alt=""
                    />
                    <img
                        class="img-spec"
                        v-show="specs[counter].category == 'Ecografia'"
                        src="https://www.cmsanmarco.com/wp-content/uploads/2017/08/GINECOLOGIA3-1024x640.jpg"
                        alt=""
                    />
                    <img
                        class="img-spec twenty"
                        v-show="specs[counter].category == 'Immunologia'"
                        src="https://www.dire.it/wp-content/uploads/2020/10/medici-laboratorio.jpg"
                        alt=""
                    />
                    <img
                        class="img-spec twenty"
                        v-show="
                            specs[counter].category == 'Medicina dello Sport'
                        "
                        src="https://www.sanlucapadova.it/wp-content/uploads/2020/01/visita-medico-sportiva-padova.jpg"
                        alt=""
                    />
                    <img
                        class="img-spec"
                        v-show="specs[counter].category == 'Neurologia'"
                        src="https://cdn.pixabay.com/photo/2021/12/02/22/15/x-ray-6841384_960_720.jpg"
                        alt=""
                    />
                    <img
                        class="img-spec fourFive"
                        v-show="specs[counter].category == 'Oculistica'"
                        src="https://www.saluteecultura.it/wp-content/uploads/2018/07/oculistica-occhio-visita-specialistica.jpg"
                        alt=""
                    />
                    <img
                        class="img-spec"
                        v-show="specs[counter].category == 'Pediatria'"
                        src="https://nubramedica.it/wp-content/uploads/2017/02/pediatria.jpg"
                        alt=""
                    />
                    <img
                        class="img-spec seventy"
                        v-show="specs[counter].category == 'Psicologia'"
                        src="https://images.pexels.com/photos/5699456/pexels-photo-5699456.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                        alt=""
                    />
                    <img
                        class="img-spec ten"
                        v-show="
                            specs[counter].category == 'Radiologia e Risonanza'
                        "
                        src="https://www.istitutocicio.it/prestazioni_specialistiche-radiodiagnostica-tradizionale/images/istituto-cicio-radiologia-04.jpg"
                        alt=""
                    />
                </div>
                <div class="spec-desc">
                    <!-- Specializzazione active in quel momento -->
                    <div v-if="specs[counter]">
                        <h2 class="fw-bold">{{ specs[counter].category }}</h2>
                        <p v-html="specs[counter].description"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Specializations",
    data() {
        return {
            counter: 0,
            specs: {
                Type: Array,
            },
        };
    },
    methods: {
        getSpecs() {
            axios
                .get("api/specializations")
                .then((res) => {
                    this.specs = res.data.results.specs;
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
    created() {
        this.getSpecs();
    },
};
</script>

<style lang="scss" scoped>
.container-fluid {
    height: 850px;
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
                    width: 400px;
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
}

.selected {
    background-color: #5161b9;
}
</style>
