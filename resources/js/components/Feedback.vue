<template>
    <div class="feedback-form">
        <form @submit.prevent="submitFeedback">
            <label for="name">Name:</label>
            <input type="text" v-model="name" required>

            <label for="phone">Phone:</label>
            <input type="text" v-model="phone" required>

            <label for="message">Message:</label>
            <textarea rows="8" v-model="message" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            phone: '',
            message: '',
        };
    },
    methods: {
        submitFeedback() {
            axios.post('/api/feedback', {
                name: this.name,
                phone: this.phone,
                message: this.message,
            })
                .then(response => {
                    console.log(response.data.message);
                })
                .catch(error => {
                    console.error('Error saving feedback:', error);
                });
        },
    },
};
</script>

<style scoped>
.feedback-form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    background-image: url("/images/feedback-form.png");
}

label {
    margin-top: 10px;
    color: #333;
    display: block;
}

input,
textarea {
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}
input:focus-visible,
textarea:focus-visible {
    outline-color: aqua;
}
button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}</style>
