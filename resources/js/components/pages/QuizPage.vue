<template>
    <div class="max-h-screen flex flex-col flex-1 mt-12 mx-24 overflow-y-scroll">
        <main class="flex-1 relative z-0 overflow-y-scroll pt-2 pb-6 focus:outline-none md:py-6" tabindex="0">
    
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
                            <!-- Checked: "bg-blue-50 border-blue-200 z-10", Not Checked: "border-gray-200" -->
                            <label class="rounded-tl-md rounded-tr-md relative border p-4 flex cursor-pointer focus:outline-none">
                                <input type="radio" name="privacy-setting" value="Public access" class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer text-blue-600 border-gray-300 focus:ring-blue-500" aria-labelledby="privacy-setting-0-label" aria-describedby="privacy-setting-0-description">
                                <span class="ml-3 flex flex-col">
                                <!-- Checked: "text-blue-900", Not Checked: "text-gray-900" -->
                                <span id="privacy-setting-0-label" class="block text-sm font-medium">{{questions[current_question].option_A}}</span>
                                </span>
                            </label>

                            <!-- Checked: "bg-blue-50 border-blue-200 z-10", Not Checked: "border-gray-200" -->
                            <label class="relative border p-4 flex cursor-pointer focus:outline-none">
                                <input type="radio" name="privacy-setting" value="Private to Project Members" class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer text-blue-600 border-gray-300 focus:ring-blue-500" aria-labelledby="privacy-setting-1-label" aria-describedby="privacy-setting-1-description">
                                <span class="ml-3 flex flex-col">
                                <!-- Checked: "text-blue-900", Not Checked: "text-gray-900" -->
                                <span id="privacy-setting-1-label" class="block text-sm font-medium">{{questions[current_question].option_B}}</span>
                                </span>
                            </label>

                            <!-- Checked: "bg-blue-50 border-blue-200 z-10", Not Checked: "border-gray-200" -->
                            <label class="rounded-bl-md rounded-br-md relative border p-4 flex cursor-pointer focus:outline-none">
                                <input type="radio" name="privacy-setting" value="Private to you" class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer text-blue-600 border-gray-300 focus:ring-blue-500" aria-labelledby="privacy-setting-2-label" aria-describedby="privacy-setting-2-description">
                                <span class="ml-3 flex flex-col">
                                <!-- Checked: "text-blue-900", Not Checked: "text-gray-900" -->
                                <span id="privacy-setting-2-label" class="block text-sm font-medium">{{questions[current_question].option_C}}</span>
                                </span>
                            </label>

                            <!-- Checked: "bg-blue-50 border-blue-200 z-10", Not Checked: "border-gray-200" -->
                            <label class="rounded-bl-md rounded-br-md relative border p-4 flex cursor-pointer focus:outline-none">
                                <input type="radio" name="privacy-setting" value="Private to you" class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer text-blue-600 border-gray-300 focus:ring-blue-500" aria-labelledby="privacy-setting-2-label" aria-describedby="privacy-setting-2-description">
                                <span class="ml-3 flex flex-col">
                                <!-- Checked: "text-blue-900", Not Checked: "text-gray-900" -->
                                <span id="privacy-setting-2-label" class="block text-sm font-medium">{{questions[current_question].option_D}}</span>
                                </span>
                            </label>                            
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
                    <button @click="showNextQues()" type="button" class="mr-1 inline-flex items-center rounded-md border border-transparent bg-green-600 px-3 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Submit
                    </button>                
                </div>                
            </div>

        </main>

    </div>
</template>

<script>
import questionService from "@/services/QuestionService.js";

export default {
    name: 'QuizPage',
    mounted() {
        this.fetchQuestions();
    },
    data: () => {
        return {
            questions: [],
            current_question : 0
        };
    },
    methods: {

        fetchQuestions() {
            questionService.index()
                .then((response) => {
                        console.log(response);
                        this.questions = response.data.questions;
                    },
                    (error) => {
                        console.log(error);
                    });
        },

        showPrevQues() {
            this.current_question = this.current_question - 1;
        },

        showNextQues() {
            this.current_question = this.current_question + 1;
        }
    }
}
</script>
