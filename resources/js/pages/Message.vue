<template>
    <div class="container needs-validation" novalidate>
        <form
            :action="`http://localhost:8000/api/doctors/${doctor.slug}/new`"
            method="post"
        >
            <!-- FIRSTNAME -->
            <div class="mb-3">
                <label for="firstname" class="form-label">firstname</label>
                <input
                    type="text"
                    class="form-control"
                    id="firstname"
                    placeholder="firstname"
                    name="firstname"
                />
                <div class="invalid-feedback">Looks good!</div>
                <!-- <div class="invalid-feedback">Please choose a username.</div> -->
            </div>
            <!-- LASTNAME -->
            <div class="mb-3">
                <label for="lastname" class="form-label">lastname</label>
                <input
                    type="text"
                    class="form-control"
                    id="lastname"
                    placeholder="lastname"
                    name="lastname"
                />
            </div>
            <!-- EMAIL -->
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="email"
                    name="email"
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
                ></textarea>
            </div>

            <!-- BUTTONS -->
            <div class="mb-3">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">
                        Confirm identity
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
    name: "Message",
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
            axios.get(url).then((res) => {
                console.log(res.data.doctors);
                this.doctor = res.data.doctors;
            });
        },
    },
};
</script>

<style></style>
