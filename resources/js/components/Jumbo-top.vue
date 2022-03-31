<template>
    <div class="container-fluid p-0">
        <div class="overlay">
            <img src="../../../storage/app/public/images/jumbo-top.jpg" alt="">
            <div class="introduction-jumbo d-flex flex-column">
                <div class="card2 text-jumbo text-center">
                    <h1 class="mt-4 ms-3 text-white pb-2">
                        Benvenuto in <strong>B</strong>Doctors
                    </h1>
                    <h4 class="mimmo text-white pb-2">
                        La tua salute &egrave; la nostra priorit&agrave;.
                    </h4>
                    <h6 class="text-white pb-2">
                        Cerca tra piu' di 10.000 Dottori su tutto il territorio
                        Italiano.
                    </h6>

                    <form
                        class="d-flex mt-4 mb-4 justify-content-center"
                        action=""
                    >
                        <select name="" id="">
                            <option value="" disabled selected>
                                Seleziona una specializzazione
                            </option>
                            <option
                                v-for="spec in specs"
                                :key="spec.id"
                                value=""
                            >
                                {{ spec.category }}
                            </option>
                        </select>
                        <input type="submit" value="search" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Jumbo-top",
    // props: ["specs "],
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
                .catch((err) => {});
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
            top: 31%;
            left: 11%;

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
                    position: relative;
                    select {
                        width: 90%;
                        height: 2.5em;
                        border: 0;
                        border-radius: 25px;
                    }
                    input {
                        background-color: #58c1f9;
                        position: absolute;
                        top: 0;
                        right: 20px;
                        width: 30%;
                        height: 2.5em;
                        border: 0;
                        border-radius: 25px;
                    }
                }
            }
        }
    }
}
</style>
