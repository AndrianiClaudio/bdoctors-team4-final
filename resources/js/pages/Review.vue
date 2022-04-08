<template>
<div class="container-fluid d-flex justify-content-center align-items-center m-0 p-0">
        <div class="form-container p-2">
            <form
                :action="`http://localhost:8000/api/doctors/${doctor.slug}/review`"
                method="post"
                @submit="checkForm($event)"
            >

            <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                <li v-for="(error,index) in errors" :key="index">{{ error }}</li>
                </ul>
            </p>


                <div class="row m-0 mt-2 mb-4 pb-2 p-0">
                    <div class="col">
                        <label for="username" class="form-label">Username:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="username"
                            placeholder="UtenteCasuale"
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
                    <div class="col">
                        <label for="vote" class="form-label">Voto:</label>
                        <select name="vote" id="vote" class="form-control" v-model="vote">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <!-- <input
                            type="number"
                            min=1 max=5
                            class="form-control"
                            id="vote"
                            placeholder="vote"
                            name="vote"
                            v-model="vote"
                        /> -->
                        <span
                            id="vote_validate"
                            class="invalid-feedback"
                            role="alert"
                            v-if="errors.vote"
                        >
                            <strong>Compila questo campo </strong>
                        </span>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col">
                        <label for="content" class="form-label">Recensione:</label>
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
                </div>
                <div class="row justify-content-between m-0 mt-3 mb-2 p-0">
                    <div class="col">
                        <router-link
                        class="btn back"
                        :to="{ name: 'doctor', params: { slug: doctor.slug } }" v-if="doctor.slug"
                        >Torna indietro</router-link>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <button type="submit" class="btn send">
                            Condividi la recensione
                        </button>
                    </div>
                </div>
                <!-- <div class="mb-3">
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
            > -->
            </form>
        </div>
    </div>
<!-- <div class="container-fluid p-0">
    <div class="container">
        <form
            :action="`http://localhost:8000/api/doctors/${doctor.slug}/review`"
            method="post"
            @submit="checkForm($event)"
        >


            Errors
            <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                <li v-for="(error,index) in errors" :key="index">{{ error }}</li>
                </ul>
            </p>

            VOTE
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
            USERNAME
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
            CONTENT
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

            BUTTONS
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
</div> -->
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
                this.doctor = res.data.results.doctors;
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

<style lang="scss" scoped>
.container-fluid {
        background-color: #F6F5F8;
        height: calc(100vh - 70px);
        .form-container {
            background-color: #ffffff;
            border-radius: 19px;
            width: 50%;
            .row {
                .col {
                    textarea {
                        height: 200px;
                        border-radius: 15px;
                        resize: none;
                        &:focus,
                        &:active {
                            -webkit-box-shadow: none;
                            border: 1px solid #ced4da;
                        }
                    }
                    input,
                    select {
                        border-radius: 12px;
                        &:focus,
                        &:active {
                            -webkit-box-shadow: none;
                            border: 1px solid #ced4da;
                        }
                    }
                    .btn {
                        border-radius: 17px;
                        color: #ffffff;
                    }
                    .btn.back {
                        background-color: #646eb3;
                        &:hover {
                            background-color: #606899;
                        }
                    }
                    .btn.send {
                        background-color: #7b83b3;
                        &:hover {
                            background-color: #606899;
                        }
                    }
                }
            }
        }
    }</style>
