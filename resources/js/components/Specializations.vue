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
                    <div class="img">Placeholder</div>
                </div>
                <div class="spec-desc">
                    <!-- Specializzazione active in quel momento -->
                    <div v-if="specs[counter]">
                        <h2>{{ specs[counter].category }}</h2>
                        <p>
                            {{ specs[counter].description }}
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
    height: 650px;
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
                    width: 200px;
                }
            }
            .pic {
                background-color: gray;
                width: 250px;
                height: 418px;
            }
            .spec-desc {
                width: 200px;
            }
        }
    }
}

.selected {
    background-color: #5161b9;
}
</style>
