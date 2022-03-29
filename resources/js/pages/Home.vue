<template>
<div class="container">
    Home
    <div v-if="doctors">
        <div v-for="doctor in doctors" :key="doctor.id">
            <h1>Dottore {{doctor.id}}</h1>
            <div>
                <b><em>Nome</em></b>
                {{doctor.firstname}} {{doctor.lastname}} 
            </div>
            <div v-if="doctor.photo">
                <b><em>Photo</em></b>
                <!-- da includere in tag img -->
                {{doctor.photo}}
            </div>
            <div>
                <b><em>Email</em></b>
                {{doctor.email}}
            </div>
            <div>
                <b><em>Address</em></b>
                {{doctor.address}}
            </div>
            <div v-if="doctor.cv">
                <b><em>Curriculum Vitae</em></b>
                {{doctor.address}}
            </div>
            <div v-if="doctor.phone">
                <b><em>Telefono</em></b>
                {{doctor.phone}}
            </div>
            <hr>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'Home',
    data () {
        return {
        doctors: {
        type: Array,
        },
    }
    },
    methods: {
    getAllDoctors() {
        axios.get('api/doctors').
        then((res) => {
        this.doctors = res.data.doctors
        }).catch((err) => {
        console.error(err);
        });
    }
    },
    created() {
    this.getAllDoctors();
    }
}
</script>

<style>

</style>