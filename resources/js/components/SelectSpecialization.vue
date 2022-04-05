<template>
    <form class="d-flex mt-4 mb-4 justify-content-center" action="">
        <select name="" id="" v-model="filterSelected">
            <option value="all" disabled selected>
                Seleziona una specializzazione
            </option>
            <option v-for="spec in specs" :key="spec.id" :value="spec.category">
                <!-- :value="spec.id" -->
                {{ spec.category }}
            </option>
        </select>
        <input
            type="submit"
            value="search"
            @click.prevent="filterSelected(filterSelected, filterSelected)"
        />
    </form>
</template>

<script>
export default {
    name: "SelectSpecialization",
    data() {
        return {
            specs: {
                Type: Array,
            },
        };
    },
};
</script>

<style></style>
