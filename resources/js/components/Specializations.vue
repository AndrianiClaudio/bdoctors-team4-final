<template>
    <div class="container-fluid">
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
                <div class="specs">
                    <ul class="list-group">
                        <li
                            class="list-group-item"
                            :class="counter == index ? 'selected' : ''"
                            v-for="(spec, index) in specs"
                            :key="spec.id"
                            v-on:click="counter = index"
                        >
                            <h3>{{ spec.category }}</h3>
                        </li>
                    </ul>
                </div>
                <div class="pic rounded-3">
                    <img class="img-spec" v-if="specs[counter].category == 'Neurology'" src="https://www.centromedicosantanna.com/images/Immagini/ImmaginiSito/img_articoli/02_neurologia.jpg" alt="">
                    <img class="img-spec" v-if="specs[counter].category == 'Ophthalmology'" src="https://cdn.diabetesselfmanagement.com/2006/05/dsm-what-is-an-ophthalmologist-shutterstock_1038422095-1000x667.jpg" alt="">
                    <img class="img-spec" v-if="specs[counter].category == 'Nuclear Magnetic'" src="https://www.my-personaltrainer.it/2020/04/16/risonanza-magnetica_900x760.jpeg" alt="">
                    <img class="img-spec" v-if="specs[counter].category == 'X-Ray'" src="https://healthviewdiagnosticcentre.advertroindia.co.in/uploads-advertro-03-08-2019/healthviewdiagnosticcentre/products/33062/doctors-watching-x-ray-shot_23-2147763766.jpg" alt="">
                    <img class="img-spec" v-if="specs[counter].category == 'Surgical'" src="https://images.theconversation.com/files/277995/original/file-20190604-69087-6q2xjq.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop" alt="">
                    <img class="img-spec" v-if="specs[counter].category == 'Cardiology'" src="https://static.medmonks.com/home/img/blog/cardiologist-india.jpg" alt="">
                    <img class="img-spec" v-if="specs[counter].category == 'Dental Clinic'" src="https://carrumdownsdentist.com.au/wp-content/uploads/2021/08/dentist-langwarrin.jpg" alt="">
                </div>
                <div class="spec-desc">
                    <!-- Specializzazione active in quel momento -->
                    <div v-if="specs[counter]">
                        <h2>{{ specs[counter].category }}</h2>
                        <p v-html="specs[counter].description">
                            
                        </p>
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
                    width: 300px;
                }
            }
            .pic {
                background-color: gray;
                width: 470px;
                overflow: hidden;
                .img-spec {
                    width: 470px;
                    height: 418px;
                }
            }
            .spec-desc {
                width: 300px;
                // width: 400px;
            }
        }
    }
}

.selected {
    background-color: #5161b9;
}
</style>
