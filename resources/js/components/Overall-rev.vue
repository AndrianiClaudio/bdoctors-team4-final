<template>
    <div id="Overall-rev" class="container-fluid p-0 d-flex">
        <div class="overlay">
            <div class="row align-items-center m-0 p-0">
                <!-- {{ r/and_reviews }} -->
                <div
                    v-for="rew in rand_reviews"
                    :key="rew.id"
                    class="col d-flex justify-content-center m-0 mt-2 p-0"
                >
                    <div
                        class="card-rev d-flex flex-column justify-content-around p-3"
                    >
                        <div
                            class="rev-top d-flex align-items-center justify-content-start"
                        >
                            <strong v-if="rew.username" class="me-2">{{ rew.username }}:</strong>
                            <strong v-else class="me-2">Utente Casuale:</strong>
                            <span class="stars">
                                <i
                                    v-for="(i, index) in 5"
                                    :key="index"
                                    class="fa-solid fa-star"
                                ></i>
                            </span>
                        </div>
                        <div class="content-rev">
                            <em> {{ rew.content }} </em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Overall-rev",
    data() {
        return {
            rand_reviews: [],
        };
    },
    methods: {
        getRandomReview() {
            axios
                .get("/api/reviews/random")
                .then((result) => {
                    // console.log(result.data.rand_reviews);
                    this.rand_reviews = result.data.rand_reviews;
                    // console.log(this.rand_reviews);
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
    created() {
        this.getRandomReview();
    },
};
</script>

<style lang="scss" scoped>
.container-fluid {
    position: relative;
    height: 532px;
    background: url("https://www.mediyos.com/assets/web/img/bg-special.png");
    background-repeat: no-repeat;
    background-size: cover;
    .overlay {
        background-color: rgba($color: #5363b9, $alpha: 0.75);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        .row {
            height: 450px;
            .col {
                .card-rev {
                    background-color: #ffffff;
                    border-radius: 12px;
                    // height: 200px;
                    width: 280px;
                    .rev-top {
                        font-size: 1.2em;
                        .fa-solid.fa-star {
                            color: rgb(255, 217, 0);
                        }
                    }
                }
            }
        }
    }
}
</style>
