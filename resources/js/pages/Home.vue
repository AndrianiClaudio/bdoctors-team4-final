<template>
    <div class="container">
        Home
        <div v-if="doctors">
            <div v-for="(doctor, index) in doctors" :key="index">
                <h1>Dottore {{ doctor.id }}</h1>
                <div>
                    <b><em>Nome</em></b>
                    {{ doctor.firstname }} {{ doctor.lastname }}
                </div>
                <div v-if="doctor.photo">
                    <b><em>Photo</em></b>
                    <img
                        :src="doctor.photo"
                        :alt="doctor.firstname + ' ' + doctor.lastname"
                    />
                </div>
                <router-link
                    class="btn btn-success"
                    :to="{ name: 'message', params: { slug: doctor.slug } }"
                    >Send a message</router-link
                >
                <router-link
                    class="btn btn-secondary"
                    :to="{ name: 'review', params: { slug: doctor.slug } }"
                    >Write a review</router-link
                >
                <router-link
                    class="btn btn-info"
                    :to="{ name: 'doctor', params: { slug: doctor.slug } }"
                    >View</router-link
                >
                <hr />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            doctors: {
                type: Array,
            },
        };
    },
    methods: {
        getAllDoctors() {
            axios
                .get("api/doctors")
                .then((res) => {
                    this.doctors = res.data.doctors.data;
                    console.log(res);
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
    created() {
        this.getAllDoctors();
    },
};
</script>

<style></style>
