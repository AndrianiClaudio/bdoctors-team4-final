<template>
    <div class="container" id="chart">
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
    </div>
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
import { param } from "jquery";

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
            tmp: [],
            user_id: null,
            messageCountMonthYear: null,
            reviewCountMonthYear: null,
            // messageCountMonth: [],
            // voteCountMonth: [],
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
                ],
                datasets: [
                    {
                        label: "Messaggi",
                        backgroundColor: "#f8A979",
                        data: [6, 7, 6, 8, 0, 0, 0, 0, 0, 0, 0, 0],
                    },
                    {
                        label: "Recensioni",
                        backgroundColor: "#387979",
                        data: [2, 3, 3, 5, 0, 0, 0, 0, 0, 0, 0, 0],
                    },
                ],
                // datasets: [{ data: this.messageCountMonthYear }],
            },
            chartOptions: {
                responsive: true,
            },
        };
    },

    methods: {
        getMessagesMonthYear() {
            // console.log(this.chartData.datasets[0].data);
            axios
                .get(`/api/message/my?user_id=${this.user_id}`)
                .then((res) => {
                    this.tmp = [];
                    this.messageCountMonthYear = res.data.messageCountMonth;
                    for (const key in this.messageCountMonthYear) {
                        console.log(
                            "message--",
                            this.messageCountMonthYear[key]
                        );
                        this.chartData.datasets[0].data.push(
                            this.messageCountMonthYear[key]
                        );
                    }
                })
                .catch((err) => {
                    console.error(err);
                });
            console.log(this.chartData.datasets[0].data);
        },
        getReviewsMonthYear() {
            axios
                .get(`/api/review/my?user_id=${this.user_id}`)
                .then((res) => {
                    this.tmp = [];
                    this.reviewCountMonthYear = res.data.reviewCountMonth;
                    for (const key in this.reviewCountMonthYear) {
                        console.log("review--", this.reviewCountMonthYear[key]);
                        this.chartData.datasets[1].data.push(
                            this.reviewCountMonthYear[key]
                        );
                    }
                })
                .catch((err) => {
                    console.error(err);
                });
        },
        // getVoteMonthYear() {

        // }
    },
    created() {
        if (document.getElementById("fulvio")) {
            this.user_id = document.getElementById("fulvio").innerHTML;
            document.getElementById("fulvio").innerHTML = "";
        }
        // console.log(this.user_id);
        // numero di messaggi e recensioni ricevute per mese/anno
        this.getMessagesMonthYear();
        this.getReviewsMonthYear();

        // grafico a barre fasce di voto ricevuti per mese/anno
        // this.getVoteMonthYear();
    },
};
</script>
