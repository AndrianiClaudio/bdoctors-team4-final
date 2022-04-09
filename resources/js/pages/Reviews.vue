<template>
    <div class="container-fluid d-flex justify-content-center align-items-center m-0 p-0">
        <div class="list-container p-2">
            <ul v-if="doctor" class="list-group">
                <li 
                    class="list-group-item"
                    v-for="review in doctor.reviews" :key="review.id"
                >
                    <div class="row m-0 p-0">
                        <div class="col d-flex justify-content-start align-items-center m-0 p-0">
                            <h5 class="d-flex align-items-center mb-0">
                                Recensione scritta da:
                                    <strong>
                                        <span class="ms-1" v-if="!review.username"> Utente anonimo </span>
                                        <span class="ms-1" v-else> {{review.username}} </span>
                                    </strong>
                            </h5>
                            <h6 v-if="review.created_at" class="text-secondary d-flex align-items-start mb-0 ms-2">
                                <em>{{ review.created_at }} </em>
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
                                    <i class="bi bi-star-fill"></i></span><span
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
            doctor: [],
        };
    },
    created() {
        const url = "http://127.0.0.1:8000/api/doctors/" + this.slug;
        this.getProduct(url);
    },
    methods: {
        getProduct(url) {
            axios.get(url).then((result) => {
                this.doctor = result.data.results.doctors;
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
            overflow: auto;
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
