<template>
    <div id="Jumbo-top" class="container-fluid p-0">
        <div class="overlay">
            <img src="/images/jumbo-top.jpg" alt="" />
            <div class="introduction-jumbo d-flex flex-column">
                <div class="card2 text-jumbo text-center">
                    <h1 class="hide-xs mt-4 ms-3 text-white pb-2">
                        Benvenuto in <strong>B</strong>Doctors
                    </h1>
                    <h4 class="hide-sm text-white pb-2">
                        La tua salute &egrave; la nostra priorit&agrave;.
                    </h4>
                    <h6 class="hide-mini text-white pb-2">
                        Cerca tra piu' di 10.000 Dottori su tutto il territorio
                        Italiano.
                    </h6>

                    <form
                        class="d-flex mt-4 mb-4 justify-content-center"
                        action=""
                    >
                        <select
                            class="ps-3"
                            name=""
                            id=""
                            v-model="filterSelected"
                        >
                            <option value="all" selected v-if="loading">
                                <!-- Seleziona una specializzazione -->
                                Ricerca dottori per specializzazione
                            </option>
                            <option value="all" selected v-else>
                                <!-- Seleziona una specializzazione -->
                                Caricamento in corso...
                            </option>
                            <option
                                v-for="spec in specs"
                                :key="spec.id"
                                :value="spec.category"
                            >
                                <!-- :value="spec.id" -->
                                {{ spec.category }}
                            </option>
                        </select>
                        <input
                            type="submit"
                            value="cerca"
                            @click.prevent="filter(filterSelected)"
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Jumbo-top",
    data() {
        return {
            loading: false,
            specs: {
                Type: Array,
            },
            filterSelected: "all",
            filtered: {
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
                })
                .then(() => {
                    this.loading = true;
                });
        },
        filter(specialization) {
            specialization = specialization.toLowerCase();
            this.$router.push({
                name: "filter",
                params: { specialization: specialization },
            });
            // }
        },
    },
    created() {
        this.getSpecs();
    },
};
</script>

<style lang="scss" scoped>
.container-fluid {
    .overlay {
        position: relative;
        width: 100%;
        height: 100%;
        background-color: rgba($color: #3c4996, $alpha: 0.75);
        img {
            max-width: 100%;
            opacity: 0.45;
        }
        .introduction-jumbo {
            border-radius: 20px;
            width: 575px;
            position: absolute;
            // top: 50%;
            top: 31%;
            // bottom: 21%;
            left: 11%;
            @media screen and(max-width: 1000px) {
                padding: 2rem;
                top: 15%;
                left: 11%;
            }
            @media screen and(max-width: 850px) {
                padding: 2rem;
                top: 20px;
                left: 11%;
            }
            @media screen and(max-width: 600px) {
                width: 100%;
                padding: 2rem;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            // JUMBO
            .text-jumbo {
                background-color: #3c4996;
                border-radius: 20px;
                width: 100%;
                height: 80%;
                display: block;
                top: 0px;
                position: relative;
                background-color: #3c4996;
                border-radius: 25px;
                padding: 32px 24px;

                text-decoration: none;
                z-index: 0;
                overflow: hidden;
                padding: 32px 24px;
                &:hover {
                    transition: all 0.25s ease-out;
                    box-shadow: 0px 4px 8px rgba(38, 38, 38, 0.2);
                    top: -2px;
                    border: 1px solid #4553a5;
                    background-color: #4553a5;
                }

                &:before {
                    content: "";
                    position: absolute;
                    z-index: -1;
                    top: -16px;
                    right: -16px;
                    background: #4553a5;
                    height: 37px;
                    width: 37px;
                    border-radius: 37px;
                    transform: scale(2);
                    transform-origin: 50% 50%;
                    transition: transform 0.15s ease-out;
                }

                &:hover:before {
                    transform: scale(2.15);
                    background: #3c4996;
                }

                form {
                    border-radius: 25px;
                    display: flex;
                    select {
                        flex-basis: 100%;
                        position: relative;
                        width: 90%;
                        height: 2.5em;
                        border: 0;
                        border-radius: 25px;
                        // text-align: center;

                        &:focus {
                            outline: none;
                        }

                        @media screen and (max-width: 400px) {
                            display: block;
                            position: relative;
                        }
                    }
                    input {
                        background-color: #58c1f9;
                        position: absolute;
                        right: 20px;
                        width: 30%;
                        height: 2.5em;
                        border: 0;
                        border-radius: 25px;
                        width: 125px;
                        @media screen and (max-width: 400px) {
                            display: block;
                            position: relative;
                        }
                    }
                }
            }
        }
    }
    // SCRITTA LA TUA SALUTE ...
    .hide-sm {
        display: block;
        @media screen and (max-width: 850px) {
            display: none;
        }
    }
    .hide-mini {
        display: block;
        @media screen and (max-width: 700px) {
            display: none;
        }
    }
    .hide-xs {
        display: block;
        @media screen and (max-width: 500px) {
            display: none;
        }
    }
}
</style>
