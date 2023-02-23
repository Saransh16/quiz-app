<template>
    <div class="max-h-screen flex flex-col flex-1 mt-12 mx-24 overflow-y-scroll">
        <main class="flex-1 relative z-0 overflow-y-scroll pt-2 pb-6 focus:outline-none md:py-6" tabindex="0">

            <div v-if="show_result">
                <div class="flex justify-between">
                    <div class="flex-1">
                        <h1 class="text-2xl font-semibold text-gray-900">Result</h1>
                    </div>
                </div>

                <div class="mt-2 mx-auto px-4 sm:px-6 md:px-8 border border-gray-300"></div>

                    <div class="bg-white py-24 px-6 sm:py-32 lg:px-8">
                        <div class="mx-auto max-w-2xl text-center">
                            <p class="text-base font-semibold leading-7 text-indigo-600">You have scored</p>
                            <h3 class="mt-2 text-2xl font-bold tracking-tight text-gray-900 sm:text-6xl">5</h3>
                            <p class="mt-6">
                                <a href="javascript:void(0)" @click="dashboard()">Go to dashboard</a>
                            </p>
                        </div>
                    </div>

            </div>


            <div v-if="!show_result">

                <div class="flex justify-between">
                    <div class="flex-1">
                        <h1 class="text-2xl font-semibold text-gray-900">Question {{current_question + 1}}</h1>
                    </div>
                </div>

                <div class="mt-2 mx-auto px-4 sm:px-6 md:px-8 border border-gray-300"></div>


                <div class="mt-8">
                    <div class="text-xl font-semibold text-gray-800">
                        {{questions[current_question].text}}
                    </div>

                    <div class="mt-6">
                        <fieldset>
                            <legend class="sr-only">Questions</legend>
                            <div class="-space-y-px rounded-md bg-white">

                                <div v-for="(choice, index) in questions[current_question].choices" :key="index">

                                    <label class="rounded-tl-md rounded-tr-md relative border p-4 flex cursor-pointer focus:outline-none">
                                        <input type="radio" v-model="questions[current_question].option_selected" @change="valueSelected(index)" class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer text-blue-600 border-gray-300 focus:ring-blue-500" aria-labelledby="privacy-setting-0-label" aria-describedby="privacy-setting-0-description">
                                        <span class="ml-3 flex flex-col">
                                        <span id="privacy-setting-0-label" class="block text-sm font-medium">{{choice}}</span>
                                        </span>
                                    </label>

                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="mt-16 flex justify-between">

                    <div>
                        <button v-if="current_question != 0" @click="showPrevQues()" type="button" class="ml-1 inline-flex items-center rounded-md border border-transparent bg-purple-600 px-3 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                            Previous
                        </button>
                    </div>

                    <div v-if="current_question != (questions.length - 1)">
                        <button @click="showNextQues()" type="button" class="mr-1 inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Next
                        </button>
                    </div>

                    <div v-if="current_question == (questions.length - 1)">
                        <button @click="showResult()" type="button" class="mr-1 inline-flex items-center rounded-md border border-transparent bg-green-600 px-3 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </main>
        <Toast
            :show="alert.show"
            :title="alert.title"
            :message="alert.message"
            @toast-close="alert.show = false"
        ></Toast>
    </div>
</template>

<script>
import questionService from "@/services/QuestionService.js";
import Toast from '@/components/partials/Toast';

export default {
    name: 'QuizPage',
    components: {
        Toast
    },
    mounted() {
        this.fetchQuestions();
    },
    data: () => {
        return {
            questions: [],
            current_question : 0,
            alert: {
                show: false,
                title: '',
                message: '',
            },
            show_result : false,
        };
    },
    methods: {

        fetchQuestions() {
            questionService.index()
                .then((response) => {
                        console.log(response);
                        this.questions = response.data.questions;
                        this.questions.forEach(ques => {
                            console.log(ques);
                            ques['option_selected'] = '';
                        });
                    },
                    (error) => {
                        console.log(error);
                    });
        },

        showAlert(message, time=3000) {
            this.alert.show = true;
            this.alert.title = message;
            setTimeout(() => {
                this.alert.show = false;
            }, time);
        },

        showPrevQues() {
            this.current_question = this.current_question - 1;
        },

        showNextQues() {
            // if(!this.questions[this.current_question]['option_selected'])
            // {
            //     this.showAlert("Please answer the current question before going to the next one.");
            //     return;
            // }
            this.current_question = this.current_question + 1;
            this.questions[this.current_question]['option_selected'] = '';
            console.log(this.questions);
        },

        showResult() {
            this.show_result = true;
        },

        valueSelected(value, index) {
            console.log(value);
            console.log(index);
        },

        dashboard() {
            this.$router.push('/dashboard');
        }
    }
}
</script>
