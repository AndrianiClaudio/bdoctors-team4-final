<template>
    <div class="container-fluid g-0 p-3 mt-5" v-if="!loading">
        <i class="fa-solid fa-spinner"></i> Caricamento in corso ...
    </div>
    <div v-else class="container-fluid justify-content-center text-center">
        <!-- {{ doctor.reviews }} -->
        <ul v-if="doctor">
            <li v-for="review in doctor.reviews" :key="review.id">
                Recensione scritta da :
                <em v-if="!review.username">Utente anonimo</em>
                <em v-else>{{ review.content }}</em>
                <p>
                    <span
                        v-for="(star, index) in review.vote"
                        :key="`review-${review.id}-star-${index}`"
                    >
                        <i class="bi bi-star-fill"></i>
                    </span>
                    <span
                        v-for="(star, index) in 5 - review.vote"
                        :key="`star-${index}`"
                    >
                        <i class="bi bi-star"></i>
                    </span>
                </p>
                <p>Recensione scritta il {{ review.created_at }}</p>
                <hr />
            </li>
        </ul>
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
        getProduct(url) {
            this.loading = false;
            axios
                .get(url)
                .then((result) => {
                    this.doctor = result.data.results.doctors;
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

<style></style>
