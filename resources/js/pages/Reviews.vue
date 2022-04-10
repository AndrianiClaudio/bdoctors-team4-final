<template>
    <div class="container-fluid g-0 p-3 mt-5" v-if="!loading">
        <i class="fa-solid fa-spinner"></i> Caricamento in corso ...
    </div>
    <div
        v-else
        class="container-fluid d-flex justify-content-center align-items-center m-0 p-0"
    >
        <div class="list-container p-2">
            <ul v-if="doctor" class="list-group">
                <li
                    class="list-group-item"
                    v-for="review in doctor.reviews"
                    :key="review.id"
                >
                    <div class="row m-0 p-0">
                        <div
                            class="col d-flex justify-content-start align-items-center m-0 p-0"
                        >
                            <h5 class="d-flex align-items-center mb-0">
                                Recensione scritta da:
                                <strong>
                                    <span class="ms-1" v-if="!review.username">
                                        Utente anonimo
                                    </span>
                                    <span class="ms-1" v-else>
                                        {{ review.username }}
                                    </span>
                                </strong>
                            </h5>
                            <h6
                                v-if="review.created_at"
                                class="text-secondary d-flex align-items-start mb-0 ms-2"
                            >
                                In data: {{ getDate(review.created_at) }}
                            </h6>
                        </div>
                    </div>
                    <div class="row m-0p-0">
                        <div class="col-3 d-flex align-items-center m-0 p-0">
                            <div class="ms-3 stars">
                                <span
                                    v-for="(star, index) in review.vote"
                                    :key="`review-${review.id}-star-${index}`"
                                    class="me-2"
                                >
                                    <i class="bi bi-star-fill"></i></span
                                ><span
                                    v-for="(star, index) in 5 - review.vote"
                                    :key="`star-${index}`"
                                    class="me-2"
                                >
                                    <i class="bi bi-star"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center">
                            <div class="ms-3 content">
                                {{ review.content }}
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "Reviews",
    props: ["slug"],
    data() {
        return {
            loading: false,
            doctor: [],
        };
    },
    created() {
        const url = "http://127.0.0.1:8000/api/doctors/" + this.slug;
        this.getProduct(url);
    },
    methods: {
        getDate(dt) {
            return (
                dt.split("T")[0] +
                " alle ore " +
                dt.split("T")[1].split(".")[0].split(":")[0] +
                ":" +
                dt.split("T")[1].split(".")[0].split(":")[1]
            );
        },
        getProduct(url) {
            this.loading = false;
            axios
                .get(url)
                .then((result) => {
                    this.doctor = result.data.results.doctors;
                    console.log(this.doctor);
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    this.loading = true;
                });
        },
    },
};
</script>

<style lang="scss" scoped>
.container-fluid {
    background-color: #f6f5f8;
    height: calc(100vh - 70px);
    .list-container {
        background-color: #ffffff;
        border-radius: 19px;
        width: 60%;
        height: 650px;
        overflow-x: hidden;
        overflow-y: auto;
        * {
            word-wrap: break-word;
        }
    }
}
.stars {
    color: #ffcf2f;
    font-size: 1.7em;
}
.content {
    font-size: 1.1em;
}
</style>
