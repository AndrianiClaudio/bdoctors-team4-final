<template>
    <div class="container-fluid d-flex justify-content-center align-items-center m-0 p-0">
        <div class="form-container p-2">
            <form
                :action="`http://localhost:8000/api/doctors/${doctor.slug}/message`"
                method="post"
                @submit="checkForm($event)"
            >   
                <div class="row m-0 mt-2 mb-4 pb-2 p-0">
                    <div class="col">
                        <label for="firstname" class="form-label">Nome:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="firstname"
                            placeholder="Mario"
                            name="firstname"
                            v-model="firstname"
                        />
                        <span
                            id="firstname_validate"
                            class="invalid-feedback"
                            role="alert"
                            v-if="errors.firstname"
                        >
                            <strong>Compila questo campo </strong>
                        </span>
                    </div>
                    <div class="col">
                        <label for="lastname" class="form-label">Cognome:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="lastname"
                            placeholder="Rossi"
                            name="lastname"
                            v-model="lastname"
                        />
                        <span
                            id="lastname_validate"
                            class="invalid-feedback"
                            role="alert"
                            v-if="errors.lastname"
                        >
                            <strong>Compila questo campo </strong>
                        </span>
                    </div>
                </div>
                <div class="row m-0 mb-4 pb-2 p-0">
                    <div class="col">
                        <label for="email" class="form-label">Email:</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            placeholder="mario.rossi@email.com"
                            name="email"
                            v-model="email"
                        />
                        <span
                            id="email_validate"
                            class="invalid-feedback"
                            role="alert"
                            v-if="errors.email"
                        >
                            <strong>Compila questo campo </strong>
                        </span>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col">
                        <label for="content" class="form-label">Messaggio:</label>
                        <textarea
                            class="form-control p-2"
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
                        :to="{ name: 'filter'}"
                        v-if="doctor.slug"
                        >Torna indietro</router-link>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <button type="submit" class="btn send">
                            Invia il messaggio
                        </button>
                    </div>
                </div>
                    <!-- <div class="mb-3">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">
                                Confirm message
                            </button>
                        </div>
                    </div> -->
                    <!-- <router-link
                        class="btn btn-info"
                        :to="{ name: 'doctor', params: { slug: doctor.slug } }"
                        v-if="doctor.slug"
                        >Back to Doctor info</router-link
                    > -->
                    <!-- <router-link class="btn btn-info" :to="{ name: 'home' }"
                        >Back to Home</router-link
                    > -->
            </form>

            <!-- <form
                :action="`http://localhost:8000/api/doctors/${doctor.slug}/message`"
                method="post"
                @submit="checkForm($event)"
            >
                FIRSTNAME
                <div class="mb-3">
                    <label for="firstname" class="form-label">firstname</label>
                    <input
                        type="text"
                        class="form-control"
                        id="firstname"
                        placeholder="firstname"
                        name="firstname"
                        v-model="firstname"
                    />
                    <span
                        id="firstname_validate"
                        class="invalid-feedback"
                        role="alert"
                        v-if="errors.firstname"
                    >
                        <strong>Compila questo campo </strong>
                    </span>
                </div>
                LASTNAME
                <div class="mb-3">
                    <label for="lastname" class="form-label">lastname</label>
                    <input
                        type="text"
                        class="form-control"
                        id="lastname"
                        placeholder="lastname"
                        name="lastname"
                        v-model="lastname"
                    />
                    <span
                        id="lastname_validate"
                        class="invalid-feedback"
                        role="alert"
                        v-if="errors.lastname"
                    >
                        <strong>Compila questo campo </strong>
                    </span>
                </div>
                EMAIL
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="email"
                        name="email"
                        v-model="email"
                    />
                    <span
                        id="email_validate"
                        class="invalid-feedback"
                        role="alert"
                        v-if="errors.email"
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
                        <button type="submit" class="btn btn-primary mb-3">
                            Confirm message
                        </button>
                    </div>
                </div>
                <router-link
                    class="btn btn-info"
                    :to="{ name: 'doctor', params: { slug: doctor.slug } }"
                    v-if="doctor.slug"
                    >Back to Doctor info</router-link
                >
                <router-link class="btn btn-info" :to="{ name: 'home' }"
                    >Back to Home</router-link
                >
            </form> -->
        </div>
    </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
export default {
    name: "Message",
    components: { Navbar },
    props: ["slug"],
    data() {
        return {
            doctor: [],
            // v-model
            errors: {
                firstname: false,
                lastname: false,
                email: false,
                content: false,
            },
            firstname: null,
            lastname: null,
            email: null,
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
                // console.log(this.errors[key]);
            }

            // validate form
            let firstname = document.getElementById("firstname");
            if (!this.firstname) {
                this.errors.firstname = true;
                firstname.classList.add("is-invalid");
                // console.log(this.errors.firstname);
            } else {
                firstname.classList.remove("is-invalid");
            }

            let lastname = document.getElementById("lastname");
            if (!this.lastname) {
                this.errors.lastname = true;
                lastname.classList.add("is-invalid");
            } else {
                lastname.classList.remove("is-invalid");
            }

            let email = document.getElementById("email");
            if (!this.email) {
                this.errors.email = true;
                email.classList.add("is-invalid");
            } else {
                email.classList.remove("is-invalid");
            }

            let content = document.getElementById("content");
            if (!this.content) {
                this.errors.content = true;
                content.classList.add("is-invalid");
            } else {
                content.classList.remove("is-invalid");
            }
            // se tutto ok submit form
            if (this.firstname && this.lastname && this.email && this.content) {
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
            // height: 580px;
            .row {
                .col {
                    textarea {
                        height: 300px;
                        border-radius: 15px;
                        resize: none;
                        &:focus,
                        &:active {
                            -webkit-box-shadow: none;
                            border: 1px solid #ced4da;
                        }
                    }
                    input {
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
    }
</style>
