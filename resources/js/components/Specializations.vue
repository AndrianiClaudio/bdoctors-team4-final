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
            <div class="col d-flex">
                <div class="specs">
                    <ul class="list-group">
                        <li
                            class="list-group-item"
                            v-for="spec in specs"
                            :key="spec.id"
                        >
                            <h3>{{ spec.category }}</h3>
                        </li>
                    </ul>
                </div>
                <div class="pic">
                    <div class="img">Placeholder</div>
                </div>
                <div class="dpec-desc">
                    <!-- Specializzazione active in quel momento -->
                    <h2>Specializzazione</h2>
                    <p>Descrizione</p>
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
                height: 400px;
            }
        }
    }
}
</style>
