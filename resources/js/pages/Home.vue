<template>
    <div class="container">
        Home
        <div v-if="doctors">
            <div v-for="doctor in doctors" :key="doctor.id">
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
                    this.doctors = res.data.doctors;
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
