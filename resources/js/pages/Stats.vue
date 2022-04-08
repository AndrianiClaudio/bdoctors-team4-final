<template>
    <div class="container" id="chart" v-if="loading">
        <Bar
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
    <div v-else>Attendi il caricamento delle tue statistiche ...</div>
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
                        backgroundColor: "#f8A979",
                        data: [],
                    },
                    {
                        label: "Recensioni",
                        backgroundColor: "#387979",
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
                        backgroundColor: "#f8A979",
                        data: [],
                    },
                    {
                        label: "1-2",
                        backgroundColor: "#387979",
                        data: [],
                    },
                    {
                        label: "2-3",
                        backgroundColor: "#f879ef",
                        data: [],
                    },
                    {
                        label: "3-4",
                        backgroundColor: "#38cc73",
                        data: [],
                    },
                    {
                        label: "4-5",
                        backgroundColor: "#38dddd",
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
