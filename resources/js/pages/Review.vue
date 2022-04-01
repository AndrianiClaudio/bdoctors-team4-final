<template>
<div class="container-fluid p-0">
    <Navbar />
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
                <span
                    id="vote_validate"
                    class="invalid-feedback"
                    role="alert"
                    v-if="errors.vote"
                >
                    <strong>Compila questo campo </strong>
                </span>
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
                <span
                    id="username_validate"
                    class="invalid-feedback"
                    role="alert"
                    v-if="errors.username"
                >
                    <strong>Compila questo campo </strong>
                </span>
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
                <span
                    id="content_validate"
                    class="invalid-feedback"
                    role="alert"
                    v-if="errors.content"
                >
                    <strong>Compila questo campo </strong>
                </span>
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
                :to="{ name: 'doctor', params: { slug: doctor.slug } }" v-if="doctor.slug"
                >Back to Doctor info</router-link
            >
            <router-link class="btn btn-info" :to="{ name: 'home' }"
                >Back to Home</router-link
            >
        </form>
    </div>
</div>
</template>

<script>
import Navbar from '../components/Navbar.vue'
export default {
    name: "Review",
    components: {Navbar},
    props: ["slug"],
    data() {
        return {
            doctor: [],
            // v-model
            errors: {
                vote: false,
                username: false,
                content: false,
            },
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
    e.preventDefault();

            // reset errors
            for (const key in this.errors) {
                this.errors[key] = false;
            }

            // validate form
            let vote = document.getElementById("vote");
            if (!this.vote) {
                this.errors.vote = true;
                vote.classList.add("is-invalid");
                // console.log(this.errors.vote);
            } else {
                vote.classList.remove("is-invalid");
            }

            let username = document.getElementById("username");
            if (!this.username) {
                this.errors.username = true;
                username.classList.add("is-invalid");
            } else {
                username.classList.remove("is-invalid");
            }

            let content = document.getElementById("content");
            if (!this.content) {
                this.errors.content = true;
                content.classList.add("is-invalid");
            } else {
                content.classList.remove("is-invalid");
            }
            // se tutto ok submit form
            if (this.vote && this.username && this.content) {
                //continue submitting
                e.currentTarget.submit();
            }
            return false;
        },
    },
};
</script>

<style></style>
