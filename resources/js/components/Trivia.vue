<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <template v-if="!beforeStart">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Welcome to
                    Trivia
                    Game</h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="flex space-y-2 flex-col items-center justify-between">
                    <button @click.prevent="getTrivial"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Click
                        to Start</button>
                </div>
            </div>
        </template>
        <template v-if="beforeStart && !done">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">{{
                    questions[currentQuestionIndex].question }}</h2>
            </div>
            <div class="space-y-4 mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <template :key="index" v-for="(item, index) in questions[currentQuestionIndex].options">
                    <div class="flex items-center">
                        <input id="option1" :value="index" v-model="questions[currentQuestionIndex].selected_option"
                            name="options" type="radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="option1" class="ml-2 block text-base font-medium text-gray-900">{{ item }}</label>
                    </div>
                </template>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="flex space-y-2 flex-col items-center justify-between">
                    <button @click="nextQuestion"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Next</button>
                </div>
            </div>
        </template>
        <template v-if="beforeStart && done">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Good Job</h2>
                <h2 class="mt-10 text-center text-xl font-bold leading-9 tracking-tight text-gray-900">here is your score: <span
                        class="text-indigo-600">{{ calculateScore() }}/{{ questions.length }}</span></h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="flex space-y-2 flex-col items-center justify-between">
                    <button @click="restartGame()"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Restart</button>
                </div>
            </div>
        </template>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'Trivia',
    data() {
        return {
            beforeStart: false,
            done: false,
            questions: [],
            currentQuestionIndex: 0,
        }
    },

    methods: {
        getTrivial() {
            axios.get('/api/questions')
                .then(response => {
                    this.questions = response.data.map(item => {
                        return {
                            question: item.question,
                            options: JSON.parse(item.options),
                            correct_option: item.correct_option,
                            selected_option: null
                        }
                    });
                    this.beforeStart = true;
                })
        },
        nextQuestion() {
            if (this.currentQuestionIndex >= this.questions.length - 1) {
                this.done = true;
            } else {
                this.currentQuestionIndex++;
            }
        },
        restartGame() {
            this.beforeStart = false;
            this.done = false;
            this.currentQuestionIndex = 0;
        },

        calculateScore() {
            let result = this.questions.reduce((acc, item) => {
                if (Number(item.selected_option) == Number(item.correct_option)) {
                    acc++;
                }
                return acc
            }, 0);
            return result
        }
    },
}
</script>