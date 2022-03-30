<template>
    <div class="container">
        <form
            :action="`http://localhost:8000/api/doctors/${doctor.slug}/review`"
            method="post"
            @submit="checkForm($event)"
        >


            <!-- Errors -->
            <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                <li v-for="(error,index) in errors" :key="index">{{ error }}</li>
                </ul>
            </p>

            <!-- VOTE -->
            <div class="mb-3">
                <label for="vote" class="form-label">vote</label>
                <input
                    type="number"
                    min=1 max=5
                    class="form-control"
                    id="vote"
                    placeholder="vote"
                    name="vote"
                    v-model="vote"
                />
            </div>
            <!-- USERNAME -->
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input
                    type="text"
                    class="form-control"
                    id="username"
                    placeholder="username"
                    name="username"
                    v-model="username"
                />
            </div>
            <!-- CONTENT -->
            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <textarea
                    class="form-control"
                    id="content"
                    rows="3"
                    name="content"
                    v-model="content"
                ></textarea>
            </div>

            <!-- BUTTONS -->
            <div class="mb-3">
                <div class="col-auto">
                    <button
                        type="submit"
                        class="btn btn-primary mb-3"
                        
                    >
                        Confirm Review
                    </button>
                </div>
            </div>
            <router-link
                class="btn btn-info"
                :to="{ name: 'doctor', params: { slug: doctor.slug } }"
                >Back to Doctor info</router-link
            >
            <router-link class="btn btn-info" :to="{ name: 'home' }"
                >Back to Home</router-link
            >
        </form>
    </div>
</template>

<script>
export default {
    name: "Review",
    props: ["slug"],
    data() {
        return {
            doctor: [],
            // v-model
            errors: [],
            vote: null,
            username: null,
            content: null,
        };
    },
    created() {
        const url = "http://127.0.0.1:8000/api/doctors/" + this.slug;
        this.getProduct(url);
    },
    methods: {
        getProduct(url) {
            axios.get(url).then((res) => {
                // console.log(res.data.doctors);
                this.doctor = res.data.doctors;
            });
        },
        checkForm(e) {
            if (this.vote && this.username && this.content) {
                return true;
            }


            this.errors = [];

            if (!this.vote) {
                this.errors.push("vote required.");
            }
            if (!this.username) {
                this.errors.push("username required.");
            }
            if (!this.content) {
                this.errors.push("content required.");
            }

console.log(this.errors);
            e.preventDefault();
        },
    },
};
</script>

<style></style>
