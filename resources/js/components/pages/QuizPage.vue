<template>
    <div>
        I am here in quiz page
    </div>
</template>

<script>
import questionService from "@/services/QuestionService.js";

export default {
    name : 'QuizPage',
    mounted() {
        this.fetchQuestions();
    },
    methods: {

        fetchQuestions() {
            questionService.index()
            .then((response) => {
                console.log(response);
            },
            (error) => {
                console.log(error);
            });
        }
    }
}
</script>
