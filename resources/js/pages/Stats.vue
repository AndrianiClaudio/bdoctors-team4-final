<template>
    <div class="row m-0 p-0" id="chart" v-if="loading">
        <Bar
            class="col-6"
            :chart-options="chartOptions"
            :chart-data="chartData"
            :chart-id="chartId"
            :dataset-id-key="datasetIdKey"
            :plugins="plugins"
            :css-classes="cssClasses"
            :styles="styles"
            :width="width"
            :height="height"
        />
        <Bar
            class="col-6"
            v-if="loadingVote"
            :chart-options="chartOptions"
            :chart-data="chartDataVote"
            :chart-id="chartId"
            :dataset-id-key="datasetIdKey"
            :plugins="plugins"
            :css-classes="cssClasses"
            :styles="styles"
            :width="width"
            :height="height"
        />
        <div v-else>
            Attendi il caricamento delle tue statistiche relative ai voti delle
            recensioni...
        </div>
    </div>
    <div v-else class="d-flex velse justify-content-center align-items-center">Attendi il caricamento delle tue statistiche ...</div>
</template>

<script>
import { Bar } from "vue-chartjs/legacy";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";
// import { param } from "jquery";

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

export default {
    name: "Stats",
    components: { Bar },
    props: {
        chartId: {
            type: String,
            default: "bar-chart",
        },
        datasetIdKey: {
            type: String,
            default: "label",
        },
        width: {
            type: Number,
            default: 400,
        },
        height: {
            type: Number,
            default: 400,
        },
        cssClasses: {
            default: "",
            type: String,
        },
        styles: {
            type: Object,
            default: () => {},
        },
        plugins: {
            type: Array,
            default: () => [],
        },
    },
    data() {
        return {
            loading: false,
            loadingVote: false,
            user_id: null,

            // GRAPH
            chartData: {
                labels: [
                    "Gennaio",
                    "Febbraio",
                    "Marzo",
                    "Aprile",
                    "Maggio",
                    "Giugno",
                    "Luglio",
                    "Agosto",
                    "Settembre",
                    "Ottobre",
                    "Novembre",
                    "Dicembre",
                    "Totale",
                ],
                datasets: [
                    {
                        label: "Messaggi",
                        backgroundColor: "#4263d0",
                        data: [],
                    },
                    {
                        label: "Recensioni",
                        backgroundColor: "#294193",
                        data: [],
                    },
                ],
            },
            chartDataVote: {
                labels: [
                    "Gennaio",
                    "Febbraio",
                    "Marzo",
                    "Aprile",
                    "Maggio",
                    "Giugno",
                    "Luglio",
                    "Agosto",
                    "Settembre",
                    "Ottobre",
                    "Novembre",
                    "Dicembre",
                    "Totale",
                ],
                datasets: [
                    {
                        label: "0-1",
                        backgroundColor: "#4263D0",
                        data: [],
                    },
                    {
                        label: "1-2",
                        backgroundColor: "#7160C9",
                        data: [],
                    },
                    {
                        label: "2-3",
                        backgroundColor: "#8F5EBF",
                        data: [],
                    },
                    {
                        label: "3-4",
                        backgroundColor: "#A65DB5",
                        data: [],
                    },
                    {
                        label: "4-5",
                        backgroundColor: "#B75EAA",
                        data: [],
                    },
                ],
            },
            chartOptions: {
                responsive: true,
            },
        };
    },

    methods: {
        getMessagesMonthYear() {
            axios
                .get(`/api/message/my?user_id=${this.user_id}`)
                .then((res) => {
                    this.chartData.datasets[0].data =
                        res.data.messageCountMonth;
                    this.chartData.datasets[0].data.push(res.data.count);
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    this.getReviewsMonthYear();
                });
        },
        getReviewsMonthYear() {
            axios
                .get(`/api/review/my?user_id=${this.user_id}`)
                .then((res) => {
                    this.chartData.datasets[1].data = res.data.reviewCountMonth;
                    this.chartData.datasets[1].data.push(res.data.count);
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    this.loading = true;
                });
        },
        getVoteMonthYear() {
            for (let vote = 1; vote <= 5; vote++) {
                axios
                    .get(
                        `/api/review/vote/my?user_id=${this.user_id}&vote=${vote}`
                    )
                    .then((res) => {
                        this.chartDataVote.datasets[vote - 1].data =
                            res.data.reviewCountMonth;
                        this.chartDataVote.datasets[vote - 1].data.push(
                            res.data.count
                        );
                    })
                    .catch((err) => {
                        console.error(err);
                    })
                    .then(() => {
                        this.loadingVote = true;
                    });
            }
        },
    },
    mounted() {
        if (document.getElementById("fulvio")) {
            this.user_id = document.getElementById("fulvio").innerHTML;
            document.getElementById("fulvio").innerHTML = "";
        }
        this.getMessagesMonthYear();
        this.getVoteMonthYear();
    },
};
</script>

<style lang="scss" scoped>
    .velse {
        height: calc(100vh - 3rem);
    }
</style>
